@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Parseller
            <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></button>
        </div>
        <div class="input-group">
            <input id="inputParcel" type="text" class="form-control" placeholder="Parsel tipini giriniz..." aria-describedby="basic-addon1" autofocus>
            <span class="input-group-addon" id="basic-addon1"><i class="icon-Accept"></i></span>
            <span class="input-group-addon" id="basic-addon1"><i class="icon-Cancel"></i></span>
        </div>
        <ul id="listParcels" class="list-group list-group-flush">
            <li class="list-group-item justify-content-between">
                Parsel 1
                <span>
                    <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
                </span>
            </li>
            <li class="list-group-item justify-content-between">
                Parsel 2
                <span>
                    <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
                </span>
            </li>
            <li class="list-group-item justify-content-between">
                Parsel 3
                <span>
                    <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-update"></i></button>
                    <button class="btn btn-success btn-sm rounded-circle"><i class="icon-designer"></i></button>
                    <button class="btn btn-danger btn-sm rounded-circle"><i class="icon-delete"></i></button>
                    <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
                </span>
            </li>
        </ul>
    </div>
</main>
@endsection