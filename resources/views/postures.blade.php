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
        </div>
        <div class="input-group">
            <label class="input-group-addon">
                <i title="Resim Ekle" class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                <input type="file" name="photo" id="inputPosture" class="form-control" aria-describedby="basic-addon1" accept="image/jpeg" onchange="fileUpload(this)">
            </label>
            <span id="spanPosture">{{$project->projectPhoto ? $project->projectPhoto->original_name : "Plan resmini yükleyiniz..." }}</span>
            <span class="input-group-addon">
                <button type="button" title="Tasarlayıcıda Aç" class="btn btn-warning btn-sm rounded-circle"
                    onclick="window.location='{{ URL::route('projectDesigner', $project->id) }}'"><i class="icon-designer"></i></button>
            </span>
        </div>
        <img id="imgPosture" @if($project->projectPhoto) src="{{$project->getImageUrl()}}" @endif>
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

              document.getElementById("photoForm").submit();
          }
      }
  </script>
@endsection
