<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{ url('img/logo.png') }}">
  </a>
  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a id="projects" class="nav-link active" href="{{URL::route('projects')}}" onclick="onClickActiveNav('projects')"><i
            class="icon-Projects_Icon"></i> Projeler
      </a>
    </li>
    <li class="nav-item">
      <a id="postures" class="nav-link" href="{{URL::route('postures', session('projectID', Auth::user()->estateProject[0]->id))}}" onclick="onClickActiveNav('postures')"><i class="icon-General"></i>
        Vaziyet Planı
      </a>
    </li>
    <li class="nav-item">
      <a id="parcels" class="nav-link" href="{{URL::route('parcels', session('projectID', Auth::user()->estateProject[0]->id))}}" onclick="onClickActiveNav('parcels')"><i class="icon-Plots"></i>
        Numarataj
      </a>
    </li>
    <li class="nav-item">
      <a id="floors" class="nav-link" href="{{URL::route('floors', session('projectID', Auth::user()->estateProject[0]->id))}}" onclick="onClickActiveNav('floors')"><i class="icon-Kat_Plani"></i>
        Kat Planı
      </a>
    </li>
    <li class="nav-item">
      <a id="apartments" class="nav-link" href="{{URL::route('apartments')}}" onclick="onClickActiveNav('apartments')"><i class="icon-Houses"></i>
        Daireler
      </a>
    </li>
    <li class="nav-item">
      <a id="location" class="nav-link" href="{{URL::route('location')}}" onclick="onClickActiveNav('location')"><i class="icon-Map"></i>
        Konum
      </a>
    </li>
  </ul>
</nav>