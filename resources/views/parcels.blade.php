@extends('layouts.app')

@section('content')
    <div class="card card-size">
      <div class="card-header">
        Parseller
        <!-- <button class="btn btn-primary btn-sm rounded-circle float-right"><i class="icon-plus"></i></button> -->
      </div>
      <input type="text" id="inputParcel" class="form-control" placeholder="Parsel tipini giriniz..."
             aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
      <ul id="listParcels" class="list-group list-group-flush">
        @foreach($project->Parcels as $parcel)
          <li class="list-group-item justify-content-between">
            <form name="{{$parcel->id}}" method="post" action="{{URL::route('photo.parcelStore')}}"
                  enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$parcel->id}}">
              <span>
                <label class="custom-file">
                  <i class="icon-Quantity"></i>
                  <input type="file" name="photo" class="form-control" aria-describedby="basic-addon1"
                         onchange="fileUpload(this)">
                </label>
                {{$parcel->parcel}}
              </span>
            </form>
            <form name="{{$parcel->id}}" method="post" action="{{URL::route('photo.parcelStore')}}"
                  enctype="multipart/form-data">
              {{csrf_field()}}
              <span>
                <button class="btn btn-success btn-sm rounded-circle" type="submit"><i class="icon-Accept"></i></button>
                <button class="btn btn-success btn-sm rounded-circle" type="button"
                        onclick="window.location='{{ URL::route('parcelDesigner', $parcel->id) }}'">
                  <i class="icon-designer"></i>
                </button>
                <button class="btn btn-danger btn-sm rounded-circle"><i class="icon-delete"></i></button>
                <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
              </span>
            </form>
          </li>
        @endforeach
      </ul>
    </div>
@endsection

@section('javascript')
  @parent
  <script>
      function fileUpload(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  // $('#imgPosture').attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);

              // document.getElementById("spanPosture").innerHTML = input.files[0].name;
          }
      }
  </script>
@endsection