@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Kat Planı
            <span class="float-right">
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-Asset-2"></i></button>
                <!-- <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></button> -->
            </span>
        </div>
        <input id="inputFloor" type="text" class="form-control" placeholder="Plan tipini giriniz..." aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
        <ul id="listFloors" class="list-group list-group-flush">

                <li class="list-group-item justify-content-between">
                    <span>
                        <label class="custom-file">
                            <i class="icon-Quantity icon-size"></i>
                            <input type="file" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
                        </label>
                        A 1
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