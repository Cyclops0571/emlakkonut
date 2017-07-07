@extends('layouts.app')

<style>
    .card-size {
        width: 60rem;
        margin: 0 auto;
    }

    #map {
        width: 50rem;
        height: 400px;
    }

    .mapnav {
        margin-left: 15px;
        background-color: #044a89;
        width: 10rem;
    }

    .mapnav .nav-item {
        border-bottom: 1px solid #0e1a35;
    }
</style>

@section('content')
<div class="card card-size">
    <div class="card-header">
        Proje Konumu
    </div>
    <div class="row">
        <ul class="mapnav nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-kroki" style="color: #fff;"></i> <p>Proje Görseli</p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-kroki" style="color: #fff;"></i> <p>Kroki</p></a>
            </li>
        </ul>
        <div id="map"></div>
    </div>
</div>
<script>
    function initMap() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: { lat: position.coords.latitude, lng: position.coords.longitude },
                    zoom: 10,
                    zoomControl: false,
                    scaleControl: false,
                    streetViewControl: false
                });
                var drawingManager = new google.maps.drawing.DrawingManager({
                    drawingMode: google.maps.drawing.OverlayType.MARKER,
                    drawingControl: true,
                    drawingControlOptions: {
                        style: google.maps.MapTypeControlStyle.VERTICAL_BAR,
                        position: google.maps.ControlPosition.RIGHT_CENTER,
                        drawingModes: ['marker']
                    },
                    markerOptions: { icon: 'http://basaksehirbahcesehir.com/wp-content/uploads/2015/11/kroki2-150x150.jpg' },
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
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }
</script>
@endsection