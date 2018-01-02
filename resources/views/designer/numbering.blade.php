@extends('layouts.app')

<style>
    body {
        padding-bottom: 0 !important;
    }
    .background-grey{
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
    <div id="wcp-editor"></div>
    <div class="wcp-eklediklerim" style="background-color: white">
        <div id="wcp-editor-list-title">Eklediklerim</div>
        <div class="d-flex" style="margin-top: 4rem;">
            <select style="height: 3rem;" id="blockSelection">
                <option>Seç</option>
                @foreach($numbering->getBlocks() as $block)
                    <option value="{{$block}}">{{$block}}</option>
                @endforeach
            </select>
            <select style="height: 3rem;" id="directionSelection">
                <option>Seç</option>
                @foreach($numbering->getBlocks() as $block)
                    @foreach($numbering->getDirections($block) as $direction)
                        <option data-block="{{$block}}" value="{{$direction}}">{{$direction}}</option>
                    @endforeach
                @endforeach
            </select>
            <select style="height: 3rem;" id="floorSelection">
                <option value="">Seç</option>
                @foreach($numbering->getBlocks() as $block)
                    @foreach($numbering->getDirections($block) as $direction)
                        @foreach($numbering->getFloors($block, $direction) as $floor)
                            <option data-block="{{$block}}" data-direction="{{$direction}}" value="{{$floor}}">{{$floor}}</option>
                        @endforeach
                    @endforeach
                @endforeach
            </select>
        </div>
        <ul style="list-style: none;" id="apartmant-list">
            @foreach($numbering->apartments as $apartment)
                <li
                    data-block="{{$apartment->BlokNo}}" data-direction="{{$apartment->Yon}}"
                    data-floor="{{$apartment->BulunduguKat}}">
                    {{$apartment->BlokNo . ' - ' . $apartment->Yon . ' - ' . $apartment->BulunduguKat . ' - Kapı No:' .  $apartment->KapiNo}}
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
        function addObjectToDesigner() {
            x = 10;
            y = 10;
            html = '<div id="imp-poly-tooltip" style="left: '+ x +'px; top: '+ y +'px;">Click the first point or press ENTER to finish <i class="fa fa-times" aria-hidden="true" id="imp-poly-tooltip-close-button"></i></div>';

            $('#imp-editor-shapes-container').append(html);
        }

        var blockValue = '';
        var directionValue = '';
        var floorValue = '';
        const directionOptions = document.getElementById('directionSelection').options;
        const floorOptions = document.getElementById('floorSelection').options;
        $('#apartmant-list li').on('click', function() {
           document.querySelectorAll('#apartmant-list li').forEach(function(li){
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
                        }
                    }
                }
            });
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