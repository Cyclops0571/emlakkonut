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
      color: #aaa;
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
  <form id="addPhotosForm" action="{{URL::route('photo.parcelStore', $project->id)}}" method="post" class="dropzone">
    {{csrf_field()}}
  </form>


  <div class="card card-size">
    <div class="card-header">
      Numarataj
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1"><i class="icon-Search" style="font-size: 1.25rem;"></i></span>
      <input type="text" id="inputParcel" class="form-control" placeholder="Ara..." aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
      <span class="input-group-addon">
          <form id="newParcel" name="newParcel" method="post" action="{{URL::route('newParcel', $project->id)}}">
              {{csrf_field()}}
             <button type="button" title="Yeni Ekle" class="btn btn-primary btn-sm rounded-circle" onclick="$('#addPhotosForm').click();">
                 <i class="icon-plus"></i>
             </button>
          </form>
      </span>
    </div>
    <ul id="listParcels" class="list-group list-group-flush">
      @foreach($project->Parcels as $parcel)
        <li class="list-group-item d-flex justify-content-between"
            style="{{$parcel->status !== 1 ? 'background-color:lightgrey': ''}}">
          <form name="{{$parcel->id}}" method="post" action="{{URL::route('photo.parcelStore', $project->id)}}"
                enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$parcel->id}}">
            <span>
                <label class="custom-file">
                  @if($parcel->parcelPhoto)
                    <img src="{{$parcel->parcelPhoto->getThumbnailUrl()}}" class="list-img"/>
                  @else
                    <i title="Resim Ekle" class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                  @endif
                  <input type="file" name="photo" class="form-control" aria-describedby="basic-addon1"
                         onchange="this.form.submit();">
                </label>
                Ada: {{$parcel->island->island_kkys}} - Numarataj: {{$parcel->parcel}}
              </span>
          </form>
          <form action="{{URL::route('toggleParcelStatus', $parcel->id)}}" method="post">
            {{csrf_field()}}
            <span>
              <button type="button" title="Tasarlayıcıda Aç" class="btn btn-warning btn-sm rounded-circle"
                      onclick="window.location='{{ URL::route('parcelDesigner', $parcel->id) }}'">
                <i class="icon-designer"></i>
              </button>
              @if($parcel->status !== 1)
                <button title="Aktifleştir" class="btn btn-success btn-sm rounded-circle btn-margin-left">
                    <img src="/img/checked.svg" style="width: 14px; height: 21px;"/>
                  </button>
              @else
                <button title="Pasifleştir" class="btn btn-danger btn-sm rounded-circle btn-margin-left">
                    <img src="/img/cancel.svg" style="width: 14px; height: 21px;"/>
                  </button>
              @endif
            </span>
          </form>
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
          init: function () {
              this.on("queuecomplete", function () {
                  window.location.reload();
              })
          }
      }

  </script>
@endsection
