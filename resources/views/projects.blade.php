@extends('layouts.app')

@section('content')
    <?php
    /** @var \App\Model\EstateProject[] $project */
    ?>
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
      <div class="card card-size">
        <div class="card-header">
          Projeler
          <button class="btn btn-primary btn-sm rounded-circle float-right"><i class="icon-plus"></i></button>
        </div>
        <input id="inputProject" type="text" class="form-control" placeholder="Proje adı giriniz..."
               onkeyup="filter(this)" autofocus>
        <ul id="listProjects" class="list-group list-group-flush">
          @foreach($projects as $project)
            <li class="list-group-item list-group-item-action" onclick="return window.location='{{URL::route('postures', $project->id)}}'">
              {{$project->ProjeAdi}}
            </li>
          @endforeach
        </ul>
      </div>
    </main>
@endsection
@section('javascript')
  @parent
  <script>
      function filter(p) {
          var input, filter, ul, li, id = p.getAttribute("id");
          input = document.getElementById(id);
          filter = input.value.toUpperCase();

          if (id.indexOf("Project") > -1) {
              ul = document.getElementById("listProjects");
          } else if (id.indexOf("Apartment") > -1) {
              ul = document.getElementById("listApartments");
          } else if (id.indexOf("Floor") > -1) {
              ul = document.getElementById("listFloors");
          } else if (id.indexOf("Parcel") > -1) {
              ul = document.getElementById("listParcels");
          } else if (id.indexOf("Posture") > -1) {
              ul = document.getElementById("listPostures");
          }

          li = ul.getElementsByTagName("li");

          for (var i in li) {
              if (li[i].innerHTML) {
                  if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                      li[i].style.display = "";
                  } else {
                      li[i].style.display = "none";
                  }
              }
          }
      }
  </script>
@endsection