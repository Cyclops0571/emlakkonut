@extends('layouts.app')

@section('content')
    <div class="card card-size">
        <div class="card-header">
            Yeni Numarataj
        </div>
        <form name="numarataj" method="post" action="{{URL::route('numaratajSave')}}">
            {{csrf_field()}}
        <div>
            Ada
            <select name="island">
                @foreach($islands as $island)
                    <option value="{{$island->id}}">Ada: {{$island->island_kkys}}</option>
                @endforeach
            </select>
        </div>
        <div>
            Parcel
            <select name="Parcel">
                @foreach($parcels as $parcel)
                    <option value="{{$parcel->id}}">Parcel: {{$parcel->parcel}}</option>
                @endforeach
            </select>
        </div>
        <div>
            Blok
            <select name="block">
                @foreach($blocks as $block)
                    <option value="{{$block->id}}">Block: {{$block->block_no}}</option>
                @endforeach
            </select>
        </div>
        <div>
            Kat
            <select name="floor">
            </select>
        </div>
            <input type="submit">
        </form>
    </div>
@endsection

@section('javascript')
    <script>
    $('select[name=block]').on('change', function () {
        $.ajax(
            {
                type: 'post',
                url: "{{URL::route('ajax.floorsOfBlock')}}",
                data: {
                    blockId: $('select[name=block] option:selected').val(),
                    "_token": "{{ csrf_token() }}"
                },
                success: function(floors) {
                    $('select[name=floor]').html('');
                    floors.forEach(function(floor) {
                        $('select[name=floor]').append($(new Option(floor.floor_numbering, floor.id)))
                        console.log(floor)
                    });

                }

            });
    })
    </script>
@endsection