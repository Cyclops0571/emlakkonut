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
        <input type="text" id="inputProject" class="form-control" placeholder="Ara..." aria-describedby="basic-addon1"
               onkeyup="filter(this)" autofocus>
      </div>
      <ul id="listProjects" class="list-group list-group-flush">
        @foreach($projects as $myProject)
          <li class="list-group-item list-group-item-action d-flex justify-content-between"
              onclick="return window.location='{{URL::route('postures', $myProject->id)}}'"
              style="{{$project->status !== 1 ? 'background-color:lightgrey': ''}}">
              <span style="max-width: 95%">
                <img src="{{$myProject->getThumbnailUrl()}}" class="list-img"/>
                {{$myProject->ProjeAdi}}
              </span>
            <span>
              <form action="{{URL::route('toggleProjectStatus', $myProject->id)}}" method="post">
                {{csrf_field()}}
                @if($myProject->status !== 1)
                <button type="submit" title="Aktifleştir" class="btn btn-success btn-sm rounded-circle">
                  <img src="/img/checked.svg" style="width: 14px; height: 21px;"/>
                </button>
              @else
                <button type="submit" title="Pasifleştir" class="btn btn-danger btn-sm rounded-circle btn-margin-left">
                  <img src="/img/cancel.svg" style="width: 14px; height: 21px;"/>
                </button>
              @endif
              </form>
              </span>
          </li>
        @endforeach
      </ul>
    </div>
@endsection

@section('javascript')
  @parent
  <script></script>
@endsection