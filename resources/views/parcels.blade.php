@extends('layouts.app')

<style>
input[type="file"] {
    display: none !important;
}
.custom-file {
    margin-left: 1rem;
    margin-top: .5rem;
}
.icon-size {
    font-size: 1.4rem;
}
</style>

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Parseller
            <button class="btn btn-primary btn-sm rounded-circle float-right"><i class="icon-plus"></i></button>
        </div>
        <div class="input-group">
            <label class="custom-file">
                <i class="icon-Quantity icon-size"></i>
                <input type="file" id="inputParcel" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
            </label>
            <input type="text" id="inputTParcel" class="form-control" placeholder="Parsel tipini giriniz..." aria-describedby="basic-addon1" autofocus>
            <button class="input-group-addon" id="basic-addon1"><i class="icon-Accept"></i></button>
            <button class="input-group-addon" id="basic-addon1"><i class="icon-Cancel"></i></button>
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
                    <button class="btn btn-success btn-sm rounded-circle" onclick="window.location='{{ url('designer') }}'"><i class="icon-designer"></i></button>
                    <button class="btn btn-danger btn-sm rounded-circle"><i class="icon-delete"></i></button>
                    <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
                </span>
            </li>
        </ul>
    </div>
</main>
@endsection