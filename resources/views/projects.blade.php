@extends('layouts.app')

@section('content')
    <?php
    /** @var \App\Model\EstateProject[] $project */
    ?>
      <div class="card card-size">
        <div class="card-header">
          Projeler
        </div>
        <input id="inputProject" type="text" class="form-control" placeholder="Proje adı giriniz..." onkeyup="filter(this)" autofocus>
        <ul id="listProjects" class="list-group list-group-flush">
          @foreach($projects as $project)
            <li class="list-group-item list-group-item-action justify-content-between" onclick="return window.location='{{URL::route('postures', $project->id)}}'">
              <span style="max-width: 95%">
                <img src="https://i.ytimg.com/vi/CjwhePYkrAo/hqdefault.jpg" class="list-img"/>
                {{$project->ProjeAdi}}
              </span>
              <span>
                <button type="button" class="btn btn-success btn-sm rounded-circle"><img src="/img/checked.svg" style="width: 14px; height: 20px;"/></button>
                <button type="button" class="btn btn-danger btn-sm rounded-circle btn-margin-left"><img src="/img/cancel.svg" style="width: 14px; height: 20px;"/></button>
              </span>
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