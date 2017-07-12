@extends('layouts.app')

<style>
    #map {
        width: 50rem;
        height: 500px;
    }

    .mapnav {
        margin-left: 15px;
        background-color: #044a89;
        width: 10rem;
    }

    .mapnav .nav-item {
        border-bottom: 1px solid #0e1a35;
        text-align: center;
    }
</style>

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Proje Konumu
        </div>
        <div class="row">
            <ul class="mapnav nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="icon-kroki" style="color: #fff;"></i>
                        <p>Proje Görseli</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="icon-kroki" style="color: #fff;"></i>
                        <p>Kroki</p>
                    </a>
                </li>
            </ul>
            <div id="map"></div>
        </div>
    </div>
</main>
@endsection

@section('javascript')
  @parent
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI8qNnWc7vcryJwCLs3Q5DWymgNyO3UTM&libraries=drawing&callback=initMap" async defer></script>
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
@endsection