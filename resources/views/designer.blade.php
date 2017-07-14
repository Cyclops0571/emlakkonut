@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
<!-- Submodules -->
<script src="submodules/squares/js/squares-renderer.js"></script>
<script src="submodules/squares/js/squares.js"></script>
<script src="submodules/squares/js/squares-elements-jquery.js"></script>
<script src="submodules/squares/js/squares-controls.js"></script>
<script src="submodules/wcp-editor/js/wcp-editor.js"></script>
<script src="submodules/wcp-editor/js/wcp-editor-controls.js"></script>
<script src="submodules/wcp-tour/js/wcp-tour.js"></script>
<script src="submodules/wcp-compress/js/wcp-compress.js"></script>
<script src="submodules/wcp-icons/js/wcp-icons.js"></script>
<!-- Image Map Pro Editor -->
<script src="js/image-map-pro-defaults.js"></script>
<script src="js/image-map-pro-editor.js"></script>
<script src="js/image-map-pro-editor-content.js"></script>
<script src="js/image-map-pro-editor-local-storage.js"></script>
<script src="js/image-map-pro-editor-init-jquery.js"></script>
<!-- Image Map Pro Plugin -->
<script src="js/image-map-pro.js"></script>
<!-- Submodules -->
<link rel="stylesheet" href="submodules/squares/css/squares.css">
<link rel="stylesheet" href="submodules/squares/css/squares-editor.css">
<link rel="stylesheet" href="submodules/squares/css/squares-controls.css">
<link rel="stylesheet" href="submodules/wcp-editor/css/wcp-editor.css">
<link rel="stylesheet" href="submodules/wcp-editor/css/wcp-editor-controls.css">
<link rel="stylesheet" href="submodules/wcp-tour/css/wcp-tour.css">
<!-- Image Map Pro Editor -->
<link rel="stylesheet" href="css/image-map-pro-editor.css">
<!-- Image Map Pro Plugin -->
<link rel="stylesheet" href="css/image-map-pro.css">

<style>
    body {
        padding-top: 60px !important;
    }
</style>

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <h4 class="editor-title">Tasarlayıcı / Daireler</h4>
    <div id="wcp-editor"></div>
</main>
@endsection