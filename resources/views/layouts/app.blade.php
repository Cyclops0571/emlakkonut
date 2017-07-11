<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
    <div id="app">
      <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="img/logo.png">
        </a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Batışehir</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" id="logout-form" action="{{ route('logout') }}" method="POST">
            <button class="btn btn-md btn-primary btn-block" type="submit">Çıkış</button>
            {{ csrf_field() }}
          </form>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          @include('layouts.sidebar')
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI8qNnWc7vcryJwCLs3Q5DWymgNyO3UTM&libraries=drawing&callback=initMap"
        async defer></script>

    @section('javascript')
      <script>
          function onClickActiveNav(p) {
              $(".nav li").removeClass("active");
              $('#' + p).addClass('active');
          }

          function initMap() {
              var map = new google.maps.Map(document.getElementById("map"), {
                  center: {lat: 41.0082, lng: 28.9784},
                  zoom: 10,
                  zoomControl: false,
                  scaleControl: false,
                  streetViewControl: false,
                  mapTypeControl: false
              });
              var drawingManager = new google.maps.drawing.DrawingManager({
                  drawingMode: google.maps.drawing.OverlayType.MARKER,
                  drawingControl: true,
                  drawingControlOptions: {
                      style: google.maps.MapTypeControlStyle.VERTICAL_BAR,
                      position: google.maps.ControlPosition.RIGHT_CENTER,
                      drawingModes: ["marker"]
                  },
                  markerOptions: {icon: 'http://basaksehirbahcesehir.com/wp-content/uploads/2015/11/kroki2-150x150.jpg'},
                  circleOptions: {
                      fillColor: '#ffff00',
                      fillOpacity: 1,
                      strokeWeight: 5,
                      clickable: false,
                      editable: true,
                      zIndex: 1
                  }
              });
              drawingManager.setMap(map);
          }
      </script>
    @show
  </body>
</html>