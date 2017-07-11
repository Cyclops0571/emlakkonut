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
                    <a class="nav-link" href="#"><i class="icon-kroki" style="color: #fff;"></i> <p>Proje Görseli</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-kroki" style="color: #fff;"></i> <p>Kroki</p></a>
                </li>
            </ul>
            <div id="map"></div>
        </div>
    </div>
</main>
@endsection