@extends('layouts.app')

<style>
input[type="file"] {
    display: none !important;
}
.custom-file {
    margin: 1rem;
}
</style>

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Genel Vaziyet Planı
            <button class="btn btn-primary btn-sm rounded-circle float-right"><i class="icon-designer"></i></button>
        </div>
        <label class="custom-file">
            <i class="icon-Quantity"></i>
            <input type="file" id="inputPosture" onchange="fileUpload(this)">
            <span id="spanPosture">Plan resmini yükleyiniz...</span>
        </label>
        <img id="imgPosture" src="#">
    </div>
</main>
@endsection

@section('javascript')
  @parent
  <script>
    function fileUpload(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgPosture')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);

            document.getElementById("spanPosture").innerHTML = input.files[0].name;
        }
    }
  </script>
@endsection