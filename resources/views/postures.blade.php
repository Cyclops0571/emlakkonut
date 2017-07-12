@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Genel Vaziyet Planı
            <button class="btn btn-primary btn-sm rounded-circle float-right"><i class="icon-plus"></i></button>
        </div>
        <div class="input-group">
            <input id="inputPosture" type="file" class="form-control" placeholder="Plan tipini giriniz..." aria-describedby="basic-addon1" autofocus>
            <button class="input-group-addon" id="basic-addon1"><i class="icon-Accept"></i></button>
            <button class="input-group-addon" id="basic-addon1"><i class="icon-Cancel"></i></button>
        </div>
        <ul id="listPostures" class="list-group list-group-flush">
        </ul>
    </div>
</main>
@endsection