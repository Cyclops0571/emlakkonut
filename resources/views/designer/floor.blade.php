@extends('layouts.app')

<style>
  body {
    padding-bottom: 0 !important;
  }
</style>

<!-- Submodules -->
<link rel="stylesheet" href="/submodules/squares/css/squares.css">
<link rel="stylesheet" href="/submodules/squares/css/squares-editor.css">
<link rel="stylesheet" href="/submodules/squares/css/squares-controls.css">
<link rel="stylesheet" href="/submodules/wcp-editor/css/wcp-editor.css">
<link rel="stylesheet" href="/submodules/wcp-editor/css/wcp-editor-controls.css">
<link rel="stylesheet" href="/submodules/wcp-tour/css/wcp-tour.css"><!-- Image Map Pro Editor -->
<link rel="stylesheet" href="/css/image-map-pro-editor.css"><!-- Image Map Pro Plugin -->
<link rel="stylesheet" href="/css/image-map-pro.css">

@section('content')
  <h4 class="editor-title">Tasarlayıcı / Parsel Planı</h4>
  <div id="wcp-editor"></div>
@endsection

@section('javascript')
  @parent
  {{--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"--}}
  {{--integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"--}}
  {{--crossorigin="anonymous"></script>--}}
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <!-- Submodules -->
  <script src="/submodules/squares/js/squares-renderer.js"></script>
  <script src="/submodules/squares/js/squares.js"></script>
  <script src="/submodules/squares/js/squares-elements-jquery.js"></script>
  <script src="/submodules/squares/js/squares-controls.js"></script>
  <script src="/submodules/wcp-editor/js/wcp-editor.js"></script>
  <script src="/submodules/wcp-editor/js/wcp-editor-controls.js"></script>
  <script src="/submodules/wcp-tour/js/wcp-tour.js"></script>
  <script src="/submodules/wcp-compress/js/wcp-compress.js"></script>
  <script src="/submodules/wcp-icons/js/wcp-icons.js"></script>
  <script src="/js/image-map-initiator.js"></script>
  <!-- Image Map Pro Editor -->
  <script>
      var objectJson = {!! $floor->parcelInteractivity ? $floor->parcelInteractivity->interactiveJson     : json_encode(false) !!};
      var imagePath = {!! json_encode($floor->parcelPhoto->getImageUrl()) !!};
      var imageWidth = {{$floor->parcelPhoto->width}};
      var imageHeight = {{$floor->parcelPhoto->height}};
      var postUrl = {!! json_encode(URL::route('floorInteractivity')) !!};
      (function ($, window, document, undefined) {
          imageMapInitiate({{$floor->id}}, objectJson, imagePath, imageWidth, imageHeight, postUrl);
      })(jQuery, window, document);
  </script>
  <script src="/js/image-map-pro-editor.js"></script>
  <script src="/js/image-map-pro-editor-content.js"></script>
  <script src="/js/image-map-pro-editor-local-storage.js"></script>
  <script src="/js/image-map-pro-editor-init-jquery.js"></script>
  <!-- Image Map Pro Plugin -->
  <script src="/js/image-map-pro.js"></script>
@endsection