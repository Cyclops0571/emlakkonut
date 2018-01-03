@extends('layouts.app')

<style>
    .form-control {
        padding: 0.375rem 0.75rem !important;
        border: 1px solid #ced4da !important;
        border-radius: 0.25rem !important;
    }
</style>

@section('content')
    <div class="card card-size">
        <div class="card-header">
            Yeni Numarataj
        </div>
        <form name="numbering" method="post" action="{{URL::route('numbering.store')}}" class="form-row">
            {{csrf_field()}}
            <div class="form-group col-md-6">
                <label for="idNumName">Numarataj İsmi</label>
                <input id="idNumName" type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="idIsland">Ada</label>
                <select id="idIsland" name="islandId" class="form-control">
                    <option>Hepsi</option>
                    @foreach($islands as $island)
                        <option value="{{$island->id}}">Ada: {{$island->island_kkys}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="idParcel">Parcel</label>
                <select id="idParcel" name="parcelId" class="form-control">
                    <option>Hepsi</option>
                    @foreach($parcels as $parcel)
                        <option value="{{$parcel->id}}">Parcel: {{$parcel->parcel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="block">Blok</label>
                <select name="blockId" id="block" class="form-control">
                    <option>Hepsi</option>
                    @foreach($blocks as $block)
                        <option value="{{$block->id}}">Block: {{$block->block_no}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="floorId">Kat</label>
                <select name="floorId" id="floorId" class="form-control">
                    <option>Hepsi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
@endsection

@section('javascript')
    <script>
        $('#block').on('change', function () {
            $.ajax(
                {
                    type: 'post',
                    url: "{{URL::route('ajax.floorsOfBlock')}}",
                    data: {
                        blockId: $('#block').find('option:selected').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(floors) {
                        $('#floorId').html('');
                        $('#floorId').append($(new Option('Hepsi')))
                        floors.forEach(function(floor) {
                            $('#floorId').append($(new Option(floor.floor_numbering, floor.id)))
                        });

                    }

                });
        })
    </script>
@endsection