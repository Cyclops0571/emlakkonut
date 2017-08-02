@extends('layouts.app')

@section('content')
    <?php
    /** @var \App\Model\EstateProject[] $project */
    ?>
      <div class="card card-size">
        <div class="card-header">
          Projeler
          <!-- <button class="btn btn-primary btn-sm rounded-circle float-right"><i class="icon-plus"></i></button> -->
        </div>
        <input id="inputProject" type="text" class="form-control" placeholder="Proje adı giriniz..." onkeyup="filter(this)" autofocus>
        <ul id="listProjects" class="list-group list-group-flush">
          @foreach($projects as $project)
            <li class="list-group-item list-group-item-action" onclick="return window.location='{{URL::route('postures', $project->id)}}'">
              {{$project->ProjeAdi}}
            </li>
          @endforeach
        </ul>
      </div>
@endsection

@section('javascript')
  @parent
  <script>
  </script>
@endsection