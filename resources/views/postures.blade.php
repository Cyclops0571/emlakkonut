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
                <img src="/img/foto.svg" style="width: 32px; margin-right: -12px;" role="button"/>
            </span>
            <span class="input-group-addon">
                <img src="/img/doc.svg" style="width: 32px; margin-right: -12px;" role="button"/>
            </span>
            <span class="input-group-addon">
                <img src="/img/video.svg" style="width: 32px; margin-right: -12px;" role="button" data-toggle="modal" data-target="#videoModal"/>
            </span>
            <span class="input-group-addon">
                <button type="button" title="Tasarlayıcıda Aç" class="btn btn-warning btn-sm rounded-circle"
                    onclick="window.location='{{ URL::route('projectDesigner', $project->id) }}'"><i class="icon-designer"></i></button>
            </span>
        </div>
        <img id="imgPosture" @if($project->projectPhoto) src="{{$project->getImageUrl()}}" @endif>
      </div>
    </form>
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Video Ekle</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><input type="text" class="form-control" placeholder="URL"></li>
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            <button type="button" class="btn btn-primary">Kaydet</button>
        </div>
        </div>
    </div>
    </div>
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

              /*$("#photoForm").post({
                url: "{{URL::route('photo.store')}}",
                dataType: "multipart/form-data",
                success: function (response) {
                    alert("The server says: " + response);
                }
              });*/
          }
      }
  </script>
@endsection
