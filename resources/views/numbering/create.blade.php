@extends('layouts.app')

@section('content')
    <div class="card card-size">
        <div class="card-header">
            Yeni Numarataj
        </div>
        <form name="numbering" method="post" action="{{URL::route('numbering.store')}}">
            {{csrf_field()}}
            <div>
                Numarataj İsmi
                <input type="text" name="name">
            </div>
            <div>
                Ada
                <select name="islandId">
                    @foreach($islands as $island)
                        <option value="{{$island->id}}">Ada: {{$island->island_kkys}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                Parcel
                <select name="parcelId">
                    @foreach($parcels as $parcel)
                        <option value="{{$parcel->id}}">Parcel: {{$parcel->parcel}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                Blok
                <select name="blockId" id="block">
                    @foreach($blocks as $block)
                        <option value="{{$block->id}}">Block: {{$block->block_no}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                Kat
                <select name="floorId" id="floorId">
                </select>
            </div>
            <input type="submit">
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
                        floors.forEach(function(floor) {
                            $('#floorId').append($(new Option(floor.floor_numbering, floor.id)))
                            console.log(floor)
                        });

                    }

                });
        })
    </script>
@endsection