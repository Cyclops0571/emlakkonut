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

        .myVideosModal, .v360Modal{
            display:none;
        }

        .deleteThis{
            position: absolute;
            top: 25%;
            left: 35%;
            display:none;
            background: transparent;
            border: 0px;
            cursor: pointer;
        }

        .col-md-12:hover .deleteThis{
            display:block;
        }

        .docsDeleteBtn{
            background: transparent;
            border: 0px;
            cursor: pointer;
        }
        .docsDeleteBtn img{
            width: 58px;
        }
    </style>
@endsection

@section('content')
    <img src="/img/DRAG_DROP.svg" class="img-up"/>
    <form id="addPhotosForm" action="{{URL::route('photo.apartmentStore', $project->id)}}" method="post" class="dropzone">
        {{csrf_field()}}
    </form>

    @if ($apartmentsWithoutImage)
        <div class="card card-size">
            <div class="card-header">
                İmajı Yüklenmemiş Katlar
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="icon-Search" style="font-size: 1.25rem;"></i></span>
                <input type="text" id="inputFloor" class="form-control" placeholder="Ara..." aria-describedby="basic-addon1"
                       onkeyup="filter(this)" autofocus>
            </div>
            <ul id="listFloors" class="list-group list-group-flush">
                @foreach($apartmentsWithoutImage as $apartment)
                    <li class="list-group-item justify-content-between">
                        <div class="row">
                            <div class="col-md-9">
                                {{$apartment->BlokNo}}_{{$apartment->KapiNo}}
                            </div>

                            <div class="col-md-3 text-right">
                                <button type="button" title="Tasarlayıcıda Aç" class="btn btn-warning btn-sm rounded-circle" style="cursor: pointer;"
                                onclick="window.location='{{ URL::route('showApartment', $apartment->id) }}'"><i class="icon-designer"></i></button>
                            </div>

                        </div>
                    
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-size">
        <div class="card-header">
            İmajı Yüklenmiş Katlar
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="icon-Search" style="font-size: 1.25rem;"></i></span>
            <input type="text" id="inputOK" class="form-control" placeholder="Ara..." aria-describedby="basic-addon1"
                   onkeyup="filter(this)" autofocus>
        </div>
        <ul id="listOKs" class="list-group list-group-flush">
            @foreach($apartmentsWithImage as $apartment)
                <li class="list-group-item justify-content-between">
          <span>
            <label class="custom-file">
              <img src="{{$apartment->photo->getThumbnailUrl()}}" class="list-img"/>
              <input type="file" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
            </label>
              {{$apartment->BlokNo}}_{{$apartment->KapiNo}}
          </span>
                    <span>
            {{--<button class="btn btn-primary btn-sm rounded-circle"><i class="icon-update"></i></button>--}}
                        {{--<button class="btn btn-success btn-sm rounded-circle btn-margin-left"--}}
                        {{--onclick="window.location='{{ URL::route('floorDesigner', $floor->id) }}'">--}}
                        {{--<i class="icon-designer"></i>--}}
                        {{--</button>--}}
                        {{--<button class="btn btn-danger btn-sm rounded-circle btn-margin-left"><i class="icon-delete"></i></button>--}}
                        {{--<button class="btn btn-success btn-sm rounded-circle btn-margin-left"><i class="icon-settings"></i></button>--}}
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
            init: function () {
                this.on("queuecomplete", function () {
                    window.location.reload();
                })
            }
        }

    </script>
@endsection
