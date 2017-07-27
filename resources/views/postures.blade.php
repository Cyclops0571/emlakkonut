@extends('layouts.app')

<style>
#spanPosture {
  width: 100%;
  margin: auto;
}
#imgPosture {
  width: 100%;
}
</style>

@section('content')
    <form id="photoForm" method="post" action="{{URL::route('photo.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$project->id}}">
      <div class="card card-size">
        <div class="card-header">
          Genel Vaziyet Planı
          <button type="button" class="btn btn-success btn-sm rounded-circle float-right"
                  onclick="window.location='{{ URL::route('projectDesigner', $project->id) }}'"><i class="icon-designer"></i></button>
        </div>
        <div class="input-group">
            <label class="input-group-addon">
                <i class="icon-Quantity icon-size"></i>
                <input type="file" name="photo" id="inputPosture" class="form-control" aria-describedby="basic-addon1" accept="image/jpeg" onchange="fileUpload(this)">
            </label>
            <span
                id="spanPosture">{{$project->projectPhoto ? $project->projectPhoto->original_name : "Plan resmini yükleyiniz..." }}</span>
            <button class="input-group-addon" id="basic-addon1"><i class="icon-Accept"></i></button>
            <!-- <button class="input-group-addon" id="basic-addon1" onclick=""><i class="icon-Cancel"></i></button> -->
        </div>
        <img id="imgPosture" src="{{$project->getPhotoPath()}}">
      </div>
    </form>
@endsection

@section('javascript')
  @parent
  <script>
      function fileUpload(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#imgPosture').attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);

              document.getElementById("spanPosture").innerHTML = input.files[0].name;
          }
      }
  </script>
@endsection
