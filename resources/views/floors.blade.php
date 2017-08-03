@extends('layouts.app')

@section('css')
  @parent
  <link href="/css/dropzone.css" rel="stylesheet">
  <style>
    .dropzone {
      border: 2px dashed rgba(0, 0, 0, 0.3) !important;
      margin: auto;
      width: 60%;
    }
    .dropzone .dz-message {
      margin: 4rem 2rem 2rem 2rem;
    }
    .img-up {
      width: 3rem;
      position: absolute;
      left: 48%;
      top: 2.5rem;
    }
  </style>
@endsection

@section('content')
  <img src="/img/DRAG_DROP.svg" class="img-up"/>
  <form id="addPhotosForm" action="{{URL::route('photo.floorStore', $project->id)}}" method="post" class="dropzone">
    {{csrf_field()}}
  </form>
  <div class="card card-size">
    <div class="card-header">
      İmajı Yüklenmemiş Katlar
    </div>
    <input id="inputFloor" type="text" class="form-control" placeholder="Plan tipini giriniz..."
           aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
    @if ($floorsWithoutImage)
      <ul id="listFloors" class="list-group list-group-flush">
        @foreach($floorsWithoutImage as $floor)
          <li class="list-group-item justify-content-between">
            {{$floor->block->block_no}}_{{$floor->floor_numbering}}
          </li>
        @endforeach
      </ul>
    @endif
  </div>

  <div class="card card-size">
    <div class="card-header">
      İmajı Yüklenmiş Katlar
    </div>
    <input id="inputFloorOK" type="text" class="form-control" placeholder="Plan tipini giriniz..."
           aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
    <ul id="listFloorsOK" class="list-group list-group-flush">
      @foreach($floorsWithImage as $floor)
        <li class="list-group-item justify-content-between">
          <span>
              <label class="custom-file">
                  <i class="icon-Quantity"></i>
                  <input type="file" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
              </label>
              A 1
          </span>
          <span>
            <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-update"></i></button>
            <button class="btn btn-success btn-sm rounded-circle btn-margin-left"
                    onclick="window.location='{{ URL::route('floorDesigner', $floor->id) }}'">
              <i class="icon-designer"></i>
            </button>
            <button class="btn btn-danger btn-sm rounded-circle btn-margin-left"><i class="icon-delete"></i></button>
            <button class="btn btn-success btn-sm rounded-circle btn-margin-left"><i class="icon-settings"></i></button>
          </span>
        </li>
      @endforeach
    </ul>
  </div>
@endsection

@section('javascript')
  @parent
  <script src="/js/dropzone.js"></script>
  <script>
    Dropzone.options.addPhotosForm = {
        paramName: 'photo',
        acceptedFiles: '.jpg, .jpeg',
        maxFiles: 1000,
        dictDefaultMessage: "Yüklemek istediğiniz fotoğraflarınızı buraya sürükleyip bırakınız.",
        dictFallbackMessage: 'Kullandığınız internet tarayıcısı sürükle bırak özelliğini desteklememektedir',
        dictFileTooBig: 'Yüklemek istediğiniz dosyanın boyutu (@{{filesize}}MiB) çok büyük. Maksimum dosya boyutu @{{maxFilesize}}MiB olabilir.',
        dictInvalidFileType: "Bu tipde bir dosya yükleyemesiniz. Yanlızca '.jpg veya .jpeg uzantılı dosyalar yükleyebilirsiniz",
        dictResponseError: "Server @{{statusCode}} hatası döndü",
        dictCancelUpload: "Yüklemeyi iptal et",
        dictCancelUploadConfirmation: "Yüklemeyi iptal etmek istediğinize emin misiniz?",
        dictRemoveFile: "Dosyayı sil",
        dictMaxFilesExceeded: "Bir seferde daha fazla dosya yükleyemezsiniz. Yüklenebilecek maksimum dosya sayısı: @{{maxFiles}}",
    }
  </script>
@endsection
