@extends('layouts.app')

@section('content')
    <?php
    /** @var \App\Model\EstateProject[] $project */
    ?>
      <div class="card card-size">
        <div class="card-header">
          Projeler
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="icon-Search" style="font-size: 1.25rem;"></i></span>
            <input type="text" id="inputProject" class="form-control" placeholder="Ara..." aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
        </div>
        <ul id="listProjects" class="list-group list-group-flush">
          @foreach($projects as $project)
            <li class="list-group-item list-group-item-action justify-content-between" onclick="return window.location='{{URL::route('postures', $project->id)}}'">
              <span style="max-width: 95%">
                <img src="{{$project->getThumbnailUrl()}}" class="list-img"/>
                {{$project->ProjeAdi}}
              </span>
              <span>
                <button type="button" title="Aktifleştir" class="btn btn-success btn-sm rounded-circle"><img src="/img/checked.svg" style="width: 14px; height: 21px;"/></button>
                <button type="button" title="Pasifleştir" class="btn btn-danger btn-sm rounded-circle btn-margin-left"><img src="/img/cancel.svg" style="width: 14px; height: 21px;"/></button>
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