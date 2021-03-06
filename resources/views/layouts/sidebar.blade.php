<?php
    $sidebarProject = '';
    $sidebarPosture = '';
    $sidebarNumbering = '';
    $sidebarFloor = '';
    $sidebarApartment = '';
    $sidebarLocation = '';
    $logoController = '';
//    echo Route::currentRouteAction();
switch (str_replace('App\Http\Controllers\\', '', Route::currentRouteAction())) {
    case 'ProjectController@logos':
        $logoController = 'active';
        break;
    case 'ProjectController@projects':
    case 'ProjectController@toggleStatus':
    case 'DesignerController@project':
    case 'InteractiveController@project':
    case 'PhotoController@store':
        $sidebarProject = 'active';
        break;
    case 'HomeController@postures':
        $sidebarPosture = 'active';
        break;
    case 'NumberingController@edit':
    case 'NumberingController@toggleStatus':
    case 'DesignerController@numbering':
    case 'InteractiveController@numbering':
    case 'PhotoController@pnumberingStore':
    case 'NumberingController@create':
    case 'NumberingController@index':
        $sidebarNumbering = 'active';
        break;
    case 'FloorController@index':
    case 'DesignerController@floor':
    case 'InteractiveController@floor':
    case 'PhotoController@floorStore':
        $sidebarFloor = 'active';
        break;
    case 'ApartmentController@index':
    case 'PhotoController@apartmentStore':
        $sidebarApartment = 'active';
        break;
    case 'MapController@location':
        $sidebarLocation = 'active';
        break;
}
?>
<?php $currentAction = Route::currentRouteAction();?>
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{ url('img/logo.png') }}">
  </a>
  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a id="projects" class="nav-link {{$sidebarProject}}" href="{{URL::route('projects')}}" onclick="onClickActiveNav('projects')">
        <i class="icon-Projects_Icon"></i> Projeler
      </a>
    </li>
    <li class="nav-item">
      <a id="block360" class="nav-link {{$logoController}}"
         href="{{URL::route('logos', session('projectID', Auth::user()->estateProject[0]->id))}}"
         onclick="onClickActiveNav('block360')"><i class="icon-Plots"></i>
        Logo
      </a>
    </li>
    <li class="nav-item">
      <a id="postures" class="nav-link {{$sidebarPosture}}"
         href="{{URL::route('postures', session('projectID', Auth::user()->estateProject[0]->id))}}"
         onclick="onClickActiveNav('postures')"><i class="icon-General"></i>
        Vaziyet Planı
      </a>
    </li>
    <li class="nav-item">
      <a id="numbering" class="nav-link {{$sidebarNumbering}}"
         href="{{URL::route('numbering.index', session('projectID', Auth::user()->estateProject[0]->id))}}"
         onclick="onClickActiveNav('numbering')"><i class="icon-Plots"></i>
        Numarataj
      </a>
    </li>
    <li class="nav-item">
      <a id="floors" class="nav-link {{$sidebarFloor}}"
         href="{{URL::route('floors', session('projectID', Auth::user()->estateProject[0]->id))}}"
         onclick="onClickActiveNav('floors')"><i class="icon-Kat_Plani"></i>
        Kat Planı
      </a>
    </li>
    <li class="nav-item">
      <a id="apartments" class="nav-link {{$sidebarApartment}}"
         href="{{URL::route('apartments', session('projectID', Auth::user()->estateProject[0]->id))}}"
         onclick="onClickActiveNav('apartments')"><i class="icon-Houses"></i>
        Daireler
      </a>
    </li>
    <li class="nav-item">
      <a id="location" class="nav-link {{$sidebarLocation}}"
         href="{{URL::route('location',session('projectID', Auth::user()->estateProject[0]->id))}}"
         onclick="onClickActiveNav('location')"><i class="icon-Map"></i>
        Konum
      </a>
    </li>
  </ul>
</nav>