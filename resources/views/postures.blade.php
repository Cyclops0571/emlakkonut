@extends('layouts.app')

<style>
input[type="file"] {
    display: none !important;
}
.custom-file {
    margin-left: 1rem;
    margin-top: .5rem;
    width: 100%;
}
.icon-size {
    font-size: 1.4rem;
}
</style>

@section('content')
  <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <form method="post" action="{{URL::route('photo.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$project->id}}">
      <div class="card card-size">
        <div class="card-header">
            Genel Vaziyet Planı
            <button class="btn btn-success btn-sm rounded-circle float-right" onclick="window.location='{{ url('designer') }}'"><i class="icon-designer"></i></button>
        </div>
        <div class="input-group">
            <label class="custom-file">
                <i class="icon-Quantity icon-size"></i>
                <input type="file" id="inputPosture" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
                <span id="spanPosture">Plan resmini yükleyiniz...</span>
            </label>
            <button class="input-group-addon" id="basic-addon1"><i class="icon-Accept"></i></button>
            <button class="input-group-addon" id="basic-addon1"><i class="icon-Cancel"></i></button>
        </div>
        <img id="imgPosture" src="http://www.kentplus.com/CmsFiles/Project/13/SitePlan/Vaziyet_Plani.jpg">
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
