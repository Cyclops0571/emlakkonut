@extends('layouts.app')

<style>
  #map {
    width: 84.1%;
    height: 500px;
  }

  .mapnav {
    margin-left: 1.4%;
    background-color: #044a89;
    width: 13%;
  }

  .mapnav .nav-item {
    border-bottom: 1px solid #0e1a35;
    text-align: center;
  }

  .file {
    color: #fff;
    margin: 0 auto;
  }

  #imgProjeKroki {
    padding: 0 15px;
    width: 100%;
  }
</style>

@section('content')
  @if($projectLocation)
    <p>
      {{$projectLocation->map_data}}
    </p>
  @endif
  <div class="card card-size">
    <form enctype="multipart/form-data" action="{{URL::route('mapSave')}}" method="post">
      {{csrf_field()}}
      <input id="inputPositions" type="hidden" name="positions">
      <div class="card-header">
        Proje Konumu
        <button class="btn btn-success btn-sm rounded-circle" style="float: right"><i class="icon-save"></i></button>
      </div>
      <div class="row">
        <ul class="mapnav nav nav-pills flex-column">
          <li class="nav-item">
            <div class="input-group">
              <label class="input-group-addon file">
                <i class="icon-kroki" style="color: #fff;"></i>
                <span style="color: #fff; font-size: 1rem;">Kroki</span>
                <input type="file" name="photo" id="inputProjeKroki" class="form-control"
                       aria-describedby="basic-addon1" accept="image/jpeg" onchange="fileUpload(this)">
              </label>
            </div>
          </li>
        </ul>
        <div id="map"></div>
        <img id="imgProjeKroki" @if($projectLocation->photo) src="{{$projectLocation->photo->getImageUrl()}}" @endif>
      </div>
    </form>
  </div>
@endsection

@section('javascript')
  @parent
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI8qNnWc7vcryJwCLs3Q5DWymgNyO3UTM&libraries=drawing&callback=initMap"
      async defer></script>
  <script>
      function initMap() {
          var polygonArray = [];
          var map = new google.maps.Map(document.getElementById("map"), {
              center: {lat: 41.0082, lng: 28.9784},
              zoom: 14,
              scaleControl: false,
              streetViewControl: false,
              mapTypeControl: false
          });
          var drawingManager = new google.maps.drawing.DrawingManager({
              drawingMode: google.maps.drawing.OverlayType.POLYGON,
              drawingControl: true,
              drawingControlOptions: {
                  style: google.maps.MapTypeControlStyle.VERTICAL_BAR,
                  position: google.maps.ControlPosition.RIGHT_CENTER,
                  drawingModes: ["polygon"]
              },
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

          google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
              var points = [];
              for (var i = 0; i < polygon.getPath().getLength(); i++) {
                  points.push(polygon.getPath().getAt(i).toUrlValue(6));
              }
              polygonArray.push(points);
              $("#inputPositions").attr('value', JSON.stringify(polygonArray));
          });
      }

      function showArrays(event) {
        // Since this polygon has only one path, we can call getPath() to return the
        // MVCArray of LatLngs.
        var vertices = this.getPath();

        var contentString = '<b>Bermuda Triangle polygon</b><br>' +
            'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';

        // Iterate over the vertices.
        for (var i =0; i < vertices.getLength(); i++) {
          var xy = vertices.getAt(i);
          contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
              xy.lng();
        }

        // Replace the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);

        infoWindow.open(map);
      }

      function fileUpload(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader(),
                  sId = input.getAttribute("id");

              reader.onload = function (e) {
                  if (sId === "inputProjeKroki") {
                      $("#imgProjeKroki").attr('src', e.target.result);
                  }
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>
@endsection