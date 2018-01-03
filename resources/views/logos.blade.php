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
    
    .card-size{
      width: 300px;
    }
  </style>
@endsection

@section('content')

  <img src="/img/DRAG_DROP.svg" class="img-up"/>
  <form id="addPhotosForm" action="{{URL::route('uploadLogo', $project->id)}}" method="post" class="dropzone">
    {{csrf_field()}}
  </form>


  <div class="card card-size" >
    <div class="card-header">
      Project Logo: <span id="spanPosture">{{ $project->ProjeAdi }}</span>
    </div>
    <img id="imgPosture" @if($project->getLogoUrl()) src="{{ asset( trim( $project->getLogoUrl() ) )}}" @endif>
  </div>
@endsection

@section('javascript')
  @parent
  <script src="/js/dropzone.js"></script>
  <script>
      var maxImageWidth = 300,
      maxImageHeight = 300;
      var isOk = false;
      Dropzone.options.addPhotosForm = {
          paramName: 'logo',
          acceptedFiles: '.png',
          maxFiles: 1,
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
              // Register for the thumbnail callback.
              // When the thumbnail is created the image dimensions are set.
              this.on("thumbnail", function(file) {
                // Do the dimension checks you want to do
                if (file.width == maxImageWidth && file.height == maxImageHeight) {
                  // Show image
                  $('#imgPosture').attr('src', file.dataURL);
                  isOk = true;
                  file.acceptDimensions();
                }
                else {
                  file.rejectDimensions();
                }
              });
              
              this.on("queuecomplete", function (file) {
                if(isOk)
                  window.location.reload();
              });
          },
          
          // Instead of directly accepting / rejecting the file, setup two
          // functions on the file that can be called later to accept / reject
          // the file.
          accept: function(file, done) {
            file.acceptDimensions = done;
            file.rejectDimensions = function() { done("Invalid dimension."); };
            // Of course you could also just put the `done` function in the file
            // and call it either with or without error in the `thumbnail` event
            // callback, but I think that this is cleaner.
          }
      }

  </script>
@endsection
