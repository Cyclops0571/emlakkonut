<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="/img/logo.png">
  </a>
  <ul class="nav nav-pills flex-column">
    <li class="nav-item" id="projects">
      <a class="nav-link active" href="{{URL::route('projects')}}" onclick="onClickActiveNav('projects')"><i
            class="icon-Projects_Icon"></i> Projeler
      </a>
    </li>
    <li class="nav-item" id="postures">
      <a class="nav-link" href="{{URL::route('postures', session('projectID', Auth::user()->estateProject[0]->id))}}" onclick="onClickActiveNav('postures')"><i class="icon-General"></i>
        Vaziyet Planı
      </a>
    </li>
    <li class="nav-item" id="parcels">
      <a class="nav-link" href="{{URL::route('parcels')}}" onclick="onClickActiveNav('parcels')"><i class="icon-Plots"></i>
        Parseller
      </a>
    </li>
    <li class="nav-item" id="floors">
      <a class="nav-link" href="{{URL::route('floors')}}" onclick="onClickActiveNav('floors')"><i class="icon-Kat_Plani"></i>
        Kat Planı
      </a>
    </li>
    <li class="nav-item" id="apartments">
      <a class="nav-link" href="{{URL::route('apartments')}}" onclick="onClickActiveNav('apartments')"><i class="icon-Houses"></i>
        Daireler
      </a>
    </li>
    <li class="nav-item" id="location">
      <a class="nav-link" href="{{URL::route('location')}}" onclick="onClickActiveNav('location')"><i class="icon-Map"></i>
        Konum
      </a>
    </li>
  </ul>
</nav>