@extends('layouts.app')

<style>
input[type="file"] {
    display: none !important;
}
.input-group {
    padding-left: .5rem;
    padding-right: .5rem;
}
.icon-size {
    font-size: 1.4rem;
}
.justify-content-between .btn {
    margin-left: 8px;
}
</style>

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Daireler
            <span class="float-right">
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-Asset-2"></i></button>
                <!-- <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></button> -->
            </span>
        </div>
        <div class="input-group">
            <label class="input-group-addon">
                <i class="icon-Quantity icon-size"></i>
                <input type="file" id="inputParcel" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
            </label>
            <input id="inputApartment" type="text" class="form-control" placeholder="Daire tipini giriniz..." aria-describedby="basic-addon1" autofocus>
            <button class="input-group-addon" id="basic-addon1" onclick="addItem()"><i class="icon-Accept"></i></button>
            <!-- <button class="input-group-addon" id="basic-addon1" onclick=""><i class="icon-Cancel"></i></button> -->
        </div>
        <ul id="listApartments" class="list-group list-group-flush">

                <li class="list-group-item justify-content-between">
                    <span>
                        <i class="icon-Quantity icon-size"></i>
                        Tip 1
                    </span>
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