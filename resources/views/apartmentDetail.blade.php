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

@section('content')
    <!-- Videos Modal -->
    <div class="myVideosModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{URL::route('apartmentAddVideosUrl', $apartment->id)}}" enctype="multipart/form-data">
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
                                <input type="text" name="url1" class="form-control" placeholder="Video URL" value="{{ count($allUrls) > 0 ? $allUrls[0]->url : '' }}">
                            </li>
                            <li class="list-group-item">
                                <span id="spanPosture">Video 2</span>
                                <input type="text" name="url2Name" class="form-control" placeholder="Put name" value="{{ count($allUrls) > 1 ? $allUrls[1]->name : '' }}">
                                <br>
                                <input type="text" name="url2" class="form-control" placeholder="Video URL" value="{{ count($allUrls) > 1 ? $allUrls[1]->url : '' }}">
                            </li>
                            <li class="list-group-item">
                                <span id="spanPosture">Video 3</span>
                                <input type="text" name="url3Name" class="form-control" placeholder="Put name" value="{{ count($allUrls) > 2 ? $allUrls[2]->name : '' }}">
                                <br>
                                <input type="text" name="url3" class="form-control" placeholder="Video URL" value="{{ count($allUrls) > 2 ? $allUrls[2]->url : '' }}">
                            </li>
                            <li class="list-group-item">
                                <span id="spanPosture">Video 4</span>
                                <input type="text" name="url4Name" class="form-control" placeholder="Put name" value="{{ count($allUrls) > 3 ? $allUrls[3]->name : '' }}">
                                <br>
                                <input type="text" name="url4" class="form-control" placeholder="Video URL" value="{{ count($allUrls) > 3 ? $allUrls[3]->url : '' }}">
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
    <!-- End 360 Modal -->
    
    <div class="card card-size">

        <div class="card-header">
            Apartment Details: {{$apartment->BlokNo}}_{{$apartment->KapiNo}}
        </div>
        <div class="input-group">
            <!-- <form id="photoForm" method="post" action="{{URL::route('photo.apartmentStore', $project->id)}}" enctype="multipart/form-data" style="margin-bottom: 0;">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$apartment->id}}">
                <label class="input-group-addon">
                    <i title="Resim Ekle" class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                    <input type="file" name="photo" id="inputPosture" class="form-control" aria-describedby="basic-addon1" accept="image/jpeg" onchange="fileUpload(this)">
                </label>
            </form> -->
            <span id="spanPosture"></span>

            <form id="galleryForm" method="post" action="{{URL::route('apartmentUploadFiles', $apartment->id)}}" enctype="multipart/form-data" style="margin-bottom: 0;">
                {{csrf_field()}}
                <input type="hidden" name="folder" value="gallery">
                <label class="input-group-addon" style="cursor: pointer;">
                    <img src="{{ asset('img/foto.svg')}}" style="width: 32px; margin-right: -12px;" role="button"/>
                    <input type="file" name="gallery[]" id="inputGallery" class="form-control" aria-describedby="basic-addon1" accept="image/jpeg, image/png" multiple onchange="galleryUpload(this)">
                </label>
            </form>

            <form id="docsForm" method="post" action="{{URL::route('apartmentUploadFiles', $apartment->id)}}" enctype="multipart/form-data" style="margin-bottom: 0;">
                {{csrf_field()}}
                <input type="hidden" name="folder" value="docs">
                <label class="input-group-addon" style="cursor: pointer;">
                    <img src="{{ asset('img/doc.svg')}}" style="width: 32px; margin-right: -12px;" role="button"/>
                    <input type="file" name="docs[]" id="inputDocs" class="form-control" aria-describedby="basic-addon1" accept="application/pdf" multiple onchange="docUpload(this)">
                </label>
            </form>
            
            <form style="margin-bottom: 0;">
                <label class="input-group-addon" style="cursor: pointer;">
                    <a data-toggle="modal" data-target="#videoModal" onclick="$('.myVideosModal').slideToggle('slow');">
                        <img id="addVideo" src="{{ asset('img/video.svg')}}" style="width: 32px; margin-right: -12px;" />
                    </a>
                </label>
            </form>
        </div>
        <div><hr style="margin: 0;"></div>
        <!-- <img id="imgPosture" @if($apartment->projectPhoto) src="{{ asset( trim( $apartment->getImageUrl() ) )}}" @endif> -->

        <div class="card-header">
            Galeri
        </div>
        <div class="row">
            @foreach( $apartment->getFolderFilesUrl('gallery') as $photo)
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 25px;">
                            <img id="imgPosture" src="{{ asset( $photo ) }}">
                            <form method="post" action="{{URL::route('apartmentDeleteFile', $apartment->id)}}">
                                {{csrf_field()}}
                                @php
                                    $fileName = basename($photo);
                                @endphp
                                <input type="hidden" name="folder" value="gallery">
                                <input type="hidden" name="deleteFileName" value="{{$fileName}}"/>
                                <button class="deleteThis" onclick="$(this).hide();"> <img src="{{ asset( 'img/delete.png' ) }}"></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card-header">
            Dokümanlar
        </div>
        <div class="row">
            @php($i = 0)
            @foreach( $apartment->getFolderFilesUrl('docs') as $doc)
            <div class="col-sm-12 col-md-12 col-lg-6">
                <table style="border: 1px solid #ccc; width: 100%;">
                    <tr>
                        <td style="border-right: 1px solid #ccc; width: 58px;">
                            <form style="margin: 0;" method="post" action="{{URL::route('apartmentDeleteFile', $apartment->id)}}">
                                {{csrf_field()}}
                                @php
                                    $fileName = basename($doc);
                                @endphp
                                <input type="hidden" name="folder" value="docs">
                                <input type="hidden" name="deleteFileName" value="{{$fileName}}"/>
                                <button class="docsDeleteBtn" onclick="$(this).hide();"> <img src="{{ asset( 'img/delete.png' ) }}"></button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ asset( $doc ) }}" target="_blank">
                                @php
                                    $ext = pathinfo($doc, PATHINFO_EXTENSION);
                                    $fileName = basename($doc, ".".$ext);
                                @endphp
                                <label class="input-group-addon"  style="cursor: pointer;"> {{ $fileName }} </label>
                            </a>
                        </td>
                    </tr>
                </table>
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
