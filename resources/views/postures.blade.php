@extends('layouts.app')

<style>
#spanPosture {
  width: 100%;
  margin: auto;
}
#imgPosture {
  width: 100%;
}
.myVideosModal, .v360Modal{
    display:none;
}
</style>

@section('content')
    <!-- Videos Modal -->
    <div class="myVideosModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{URL::route('addVideosUrl', $project->id)}}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Video Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('.myVideosModal').slideToggle('slow');">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                        {{csrf_field()}}
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">                            
                                <span id="spanPosture">Video 1</span>
                                <input type="text" name="url1Name" class="form-control" placeholder="Put name" value="{{ count($allUrls) > 0 ? $allUrls[0]->name : '' }}">
                                <br>
                                <input type="text" name="url1" class="form-control" placeholder="Video Id: u29jYUU1L1M" value="{{ count($allUrls) > 0 ? $allUrls[0]->url : '' }}">
                            </li>
                            <li class="list-group-item">
                                <span id="spanPosture">Video 2</span>
                                <input type="text" name="url2Name" class="form-control" placeholder="Put name" value="{{ count($allUrls) > 1 ? $allUrls[1]->name : '' }}">
                                <br>
                                <input type="text" name="url2" class="form-control" placeholder="Video Id: u29jYUU1L1M" value="{{ count($allUrls) > 1 ? $allUrls[1]->url : '' }}">
                            </li>
                            <li class="list-group-item">
                                <span id="spanPosture">Video 3</span>
                                <input type="text" name="url3Name" class="form-control" placeholder="Put name" value="{{ count($allUrls) > 2 ? $allUrls[2]->name : '' }}">
                                <br>
                                <input type="text" name="url3" class="form-control" placeholder="Video Id: u29jYUU1L1M" value="{{ count($allUrls) > 2 ? $allUrls[2]->url : '' }}">
                            </li>
                            <li class="list-group-item">
                                <span id="spanPosture">Video 4</span>
                                <input type="text" name="url4Name" class="form-control" placeholder="Put name" value="{{ count($allUrls) > 3 ? $allUrls[3]->name : '' }}">
                                <br>
                                <input type="text" name="url4" class="form-control" placeholder="Video Id: u29jYUU1L1M" value="{{ count($allUrls) > 3 ? $allUrls[3]->url : '' }}">
                            </li>
                        </ul>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('.myVideosModal').slideToggle('slow');">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 360 Modal -->
    <div class="v360Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{URL::route('add360Url', $project->id)}}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">360 Url</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('.v360Modal').slideToggle('slow');">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                        {{csrf_field()}}
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <input type="text" name="url1" class="form-control" placeholder="360 URL" value="{{ count($v360Urls) > 0 ? $v360Urls[0]->url : '' }}">
                            </li>
                        </ul>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('.v360Modal').slideToggle('slow');">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="card card-size">

        <div class="card-header">
            Genel Vaziyet Planı
        </div>
        <div class="input-group">
            <form id="photoForm" method="post" action="{{URL::route('photo.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$project->id}}">
                <label class="input-group-addon">
                    <i title="Resim Ekle" class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                    <input type="file" name="photo" id="inputPosture" class="form-control" aria-describedby="basic-addon1" accept="image/jpeg" onchange="fileUpload(this)">
                </label>
            </form>
            <span id="spanPosture">{{$project->projectPhoto ? $project->projectPhoto->original_name : "Plan resmini yükleyiniz..." }}</span>
            <form>
                <label class="input-group-addon" style="cursor: pointer;">
                    <a data-toggle="modal" data-target="#v360Modal" style="width: 32px; margin-right: -12px;" onclick="$('.v360Modal').slideToggle('slow');">
                        <img src="{{ asset('img/virtual_tour.svg')}}" />
                    </a>
                </label>
            </form>
            <form id="galleryForm" method="post" action="{{URL::route('uploadFiles', $project->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="folder" value="gallery">
                <label class="input-group-addon" style="cursor: pointer;">
                    <img src="{{ asset('img/foto.svg')}}" style="width: 32px; margin-right: -12px;" role="button"/>
                    <input type="file" name="gallery[]" id="inputGallery" class="form-control" aria-describedby="basic-addon1" accept="image/jpeg, image/png" multiple onchange="galleryUpload(this)">
                </label>
            </form>

            <form id="docsForm" method="post" action="{{URL::route('uploadFiles', $project->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="folder" value="docs">
                <label class="input-group-addon" style="cursor: pointer;">
                    <img src="{{ asset('img/doc.svg')}}" style="width: 32px; margin-right: -12px;" role="button"/>
                    <input type="file" name="docs[]" id="inputDocs" class="form-control" aria-describedby="basic-addon1" accept="application/pdf" multiple onchange="docUpload(this)">
                </label>
            </form>
            
            <form>
                <label class="input-group-addon" style="cursor: pointer;">
                    <a data-toggle="modal" data-target="#videoModal" style="width: 32px; margin-right: -12px;" onclick="$('.myVideosModal').slideToggle('slow');">
                        <img id="addVideo" src="{{ asset('img/video.svg')}}" />
                    </a>
                </label>
            </form>
            
            <form>
                <label class="input-group-addon" style="cursor: pointer;">
                    <button type="button" title="Tasarlayıcıda Aç" class="btn btn-warning btn-sm rounded-circle"
                        onclick="window.location='{{ URL::route('projectDesigner', $project->id) }}'"><i class="icon-designer"></i></button>
                </label>
            </form>
        </div>
        <img id="imgPosture" @if($project->projectPhoto) src="{{ asset( trim( $project->getImageUrl() ) )}}" @endif>

        <div class="card-header">
            Galeri
        </div>
        <div class="row">
            @foreach( $project->getFolderFilesUrl('gallery') as $photo)
                <div class="col-md-3">
                    <span style="position: absolute; left: 34%; top: 24%;">
                        <img src="img/reup.png" width="32px" onclick="upGalImg()">
                        <img src="img/del.png" width="32px" onclick="delGalImg()">
                    </span>
                    <img id="imgPosture" src="{{ asset( $photo ) }}"/>
                </div>
            @endforeach
        </div>

        <div class="card-header">
            Dokümanlar
        </div>
        <div class="row">
            @php($i = 0)
            @foreach( $project->getFolderFilesUrl('docs') as $doc)
                <div class="col-md-3">
                    <a href="{{ asset( $doc ) }}" target="_blank">
                        @php
                            $ext = pathinfo($doc, PATHINFO_EXTENSION);
                            $fileName = basename($doc, ".".$ext);
                        @endphp
                        <label class="input-group-addon"  style="cursor: pointer;"> {{ $fileName }} </label>
                    </a>
                </div>
            @endforeach
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
      
      function docUpload(input) {
          if (input.files && input.files[0]) {
              document.getElementById("docsForm").submit();
          }
      }

      function galleryUpload(input) {
          if (input.files && input.files[0]) {
              document.getElementById("galleryForm").submit();
          }
      }

      function upGalImg(input) {
          
      }

      function delGalImg(input) {
          
      }
  </script>
@endsection
