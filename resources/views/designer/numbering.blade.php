@extends('layouts.app')

<style>
    body {
        padding-bottom: 0 !important;
    }

    .background-grey {
        background-color: #ababab;
    }
</style>

<!-- Submodules -->
<link rel="stylesheet" href="/submodules/squares/css/squares.css">
<link rel="stylesheet" href="/submodules/squares/css/squares-editor.css">
<link rel="stylesheet" href="/submodules/squares/css/squares-controls.css">
<link rel="stylesheet" href="/submodules/wcp-editor/css/wcp-editor.css">
<link rel="stylesheet" href="/submodules/wcp-editor/css/wcp-editor-controls.css">
<link rel="stylesheet" href="/submodules/wcp-tour/css/wcp-tour.css"><!-- Image Map Pro Editor -->
<link rel="stylesheet" href="/css/image-map-pro-editor.css"><!-- Image Map Pro Plugin -->
<link rel="stylesheet" href="/css/image-map-pro.css">

@section('content')
    <h4 class="editor-title">Tasarlayıcı / Numarataj Planı</h4>
    <div id="wcp-editor" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div class="wcp-eklediklerim" style="background-color: white">
        <div id="wcp-editor-list-title">Eklediklerim</div>
        <div class="d-flex" style="margin-top: 4rem;">
            <select style="height: 3rem; width: 100px;" id="blockSelection">
                <option>Seç</option>
                @foreach($numbering->getBlocks() as $block)
                    <option value="{{$block}}">{{$block}}</option>
                @endforeach
            </select>
            <select style="height: 3rem; width: 100px;" id="directionSelection">
                <option>Seç</option>
                @foreach($numbering->getBlocks() as $block)
                    @foreach($numbering->getDirections($block) as $direction)
                        <option data-block="{{$block}}" value="{{$direction}}">{{$direction}}</option>
                    @endforeach
                @endforeach
            </select>
            <select style="height: 3rem; width: 100px;" id="floorSelection">
                <option value="">Seç</option>
                @foreach($numbering->getBlocks() as $block)
                    @foreach($numbering->getDirections($block) as $direction)
                        @foreach($numbering->getFloors($block, $direction) as $floor)
                            <option data-block="{{$block}}" data-direction="{{$direction}}"
                                    value="{{$floor}}">{{$floor}}</option>
                        @endforeach
                    @endforeach
                @endforeach
            </select>
        </div>
        <ul style="list-style: none; padding: 10px; width: 300px; max-height: 200px; overflow-y: auto;"
            id="apartmant-list" draggable="true" ondragstart="drag(event)">
            <h5>Seçilenler</h5>
            @foreach($apartments as $apartment)
                <li data-block="{{$apartment->BlokNo}}" data-direction="{{$apartment->Yon}}"
                    data-floor="{{$apartment->BulunduguKat}}" data-apartment_id="{{$apartment->id}}" style="">
                    {{$apartment->BlokNo . ' - ' . $apartment->Yon . ' - ' . $apartment->BulunduguKat . ' - Kapı No:' .  $apartment->KapiNo}}
                </li>
            @endforeach
        </ul>
        <hr style="margin: 0"/>
        <ul style="list-style: none; padding: 10px; width: 300px; max-height: 200px; overflow-y: auto;"
            id="all-apart-list" draggable="true" ondragstart="drag(event)">
            <h5>Tümü</h5>
            @foreach($apartments as $apartment)
                <li id="{{$apartment->id}}"
                    data-block="{{$apartment->BlokNo}}" data-direction="{{$apartment->Yon}}"
                    data-floor="{{$apartment->BulunduguKat}}" data-apartment_id="{{$apartment->id}}" style="">
                    {{$apartment->BlokNo . ' - ' . $apartment->Yon . ' - ' . $apartment->BulunduguKat . ' - Kapı No:' .  $apartment->KapiNo}}
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
        var blockValue = '';
        var directionValue = '';
        var floorValue = '';
        var allApartments = {!! json_encode($apartments->toArray()); !!};
        var interactiveContents = {!! json_encode($interactiveContents) !!}
        var selectedApartments = allApartments;
        const directionOptions = document.getElementById('directionSelection').options;
        const floorOptions = document.getElementById('floorSelection').options;

        function screenToCanvasSpace(x, y, canvas) {
            return {
                x: Math.round((x - canvas.offset().left) * 1000) / 1000,
                y: Math.round((y - canvas.offset().top) * 1000) / 1000
            }
        }

        function getColor(apartment) {
            switch (apartment.GayrimenkulDurumu) {
                case 'Satıldı':
                    return '#ff0000';
                case 'Uygun':
                    return '#018701';
                case 'Ön Satış':
                    return '#6d6d6d';
                default:
                    return '#ff0000';
            }
        }

        function addObjectToDesigner(e) {
            var point = screenToCanvasSpace(e.pageX, e.pageY, editor.canvas);
            var isEventInsideCanvas = false;
            if (point.x > 0 && point.x < editor.canvasWidth * editor.zoom && point.y > 0 && point.y < editor.canvasHeight * editor.zoom) {
                isEventInsideCanvas = true;
            }

            if (!isEventInsideCanvas) {
                return;
            }

            var xPadding = 0;
            var yPadding = 0;
            var paddingSize = 10;
            var columnCount = 10;
            selectedApartments.forEach(function (apartment) {
                s = editor.createOval();
                s.x = ((point.x - 3 + xPadding) / editor.canvasWidth) * 100;
                s.y = ((point.y - 3 + yPadding) / editor.canvasHeight) * 100;
                xPadding += paddingSize * editor.zoom;
                if (xPadding >= paddingSize * columnCount * editor.zoom) {
                    xPadding = 0;
                    yPadding += paddingSize * editor.zoom;
                }
                s.width = 1;
                s.height = 1;
                s.default_style.background_color = getColor(apartment);
                s.tooltip_content = JSON.parse(interactiveContents[apartment.id]);
            });
            // redraw once
            editor.redraw();
        }



        $('#apartmant-list').on('mousedown', function() {
            numberingFilter();
        });

        $('#all-apart-list li').on('mousedown', function() {
            selectedApartments = [];
            selectedApartments.push(getApartmentById($(this).data('apartment_id')));
        });

        $('#apartmant-list ul').on('click', function () {
            document.querySelectorAll('#apartmant-list ul').forEach(function (li) {
                li.classList.remove('background-grey');
            });
            this.classList.add('background-grey');

        });

        function getApartmentById(id) {
            for (var i = 0, apartmentsLength = allApartments.length; i < apartmentsLength; i++) {
                if (id == allApartments[i].id) {
                    return allApartments[i];
                }
            }
            return null;
        }

        $('#all-apart-list li').on('click', function () {
            document.querySelectorAll('#all-apart-list li').forEach(function (li) {
                li.classList.remove('background-grey');
            });
            this.classList.add('background-grey');

        });

        $('#blockSelection').on('change', function () {
            blockValue = this.value;
            document.getElementById('directionSelection');
            numberingFilter();
        });

        $('#directionSelection').on('change', function () {
            directionValue = this.value;
            numberingFilter();
        });

        $('#floorSelection').on('change', function () {
            floorValue = this.value;
            numberingFilter();
        });

        function isSet(value) {
            return value !== "" && value !== 'Seç';
        }

        function numberingFilter() {
            selectedApartments = [];
            const apartmentList = document.querySelectorAll('#apartmant-list li');
            if (!isSet(blockValue) && !isSet(directionValue) && !isSet(floorValue)) {
                apartmentList.forEach(function (apartmentLi) {
                    apartmentLi.style.display = 'block';
                });
                return;
            }

            document.querySelectorAll('#apartmant-list li').forEach(function (apartmentLi) {
                apartmentLi.style.display = 'none';
                if (!isSet(floorValue) || apartmentLi.dataset.floor === floorValue) {
                    if (!isSet(directionValue) || apartmentLi.dataset.direction === directionValue) {
                        if (!isSet(blockValue) || apartmentLi.dataset.block === blockValue) {
                            apartmentLi.style.display = 'block';
                            var apartment = getApartmentById(apartmentLi.dataset.apartment_id);
                            if (apartment) {
                                selectedApartments.push(apartment);
                            }
                        }
                    }
                }
            });
        }

        function drag(e) {
        }

        function drop(e) {
            e.preventDefault();
            addObjectToDesigner(e);
        }

        function allowDrop(e) {
            e.preventDefault();
        }
    </script>
    {{--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"--}}
    {{--integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"--}}
    {{--crossorigin="anonymous"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <!-- Submodules -->
    <script src="/submodules/squares/js/squares-renderer.js"></script>
    <script src="/submodules/squares/js/squares.js"></script>
    <script src="/submodules/squares/js/squares-elements-jquery.js"></script>
    <script src="/submodules/squares/js/squares-controls.js"></script>
    <script src="/submodules/wcp-editor/js/wcp-editor.js"></script>
    <script src="/submodules/wcp-editor/js/wcp-editor-controls.js"></script>
    <script src="/submodules/wcp-tour/js/wcp-tour.js"></script>
    <script src="/submodules/wcp-compress/js/wcp-compress.js"></script>
    <script src="/submodules/wcp-icons/js/wcp-icons.js"></script>
    <script src="/js/image-map-initiator.js"></script>
    <!-- Image Map Pro Editor -->
    <script>
        var objectJson = {!! $numbering->numberingInteractivity ? $numbering->numberingInteractivity->interactiveJson     : json_encode(false) !!};
        var imagePath = {!! json_encode($numbering->numberingPhoto->getImageUrl()) !!};
        var imageWidth = {{$numbering->numberingPhoto->width}};
        var imageHeight = {{$numbering->numberingPhoto->height}};
        var postUrl = {!! json_encode(URL::route('numberingInteractivity')) !!};
        (function ($, window, document, undefined) {
            imageMapInitiate({{$numbering->id}}, objectJson, imagePath, imageWidth, imageHeight, postUrl);
        })(jQuery, window, document);
    </script>
    <script src="/js/image-map-pro-editor.js"></script>
    <script src="/js/image-map-pro-editor-content.js"></script>
    <script src="/js/image-map-pro-editor-local-storage.js"></script>
    <script src="/js/image-map-pro-editor-init-jquery.js"></script>
    <!-- Image Map Pro Plugin -->
    <script src="/js/image-map-pro.js"></script>
@endsection