@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <ul class="list-group">
        <li class="list-group-item justify-content-between">
            Kat Planı
            <span>
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-Asset-2"></i></button>
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></button>
            </span>
        </li>
        <li class="list-group-item"><input type="text" class="form-control" placeholder="Plan tipini giriniz..." aria-describedby="basic-addon1"></li>
        <li class="list-group-item justify-content-between">
            A1
            <span>
                <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
            </span>
        </li>
        <li class="list-group-item justify-content-between">
            A2
            <span>
                <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
            </span>
        </li>
        <li class="list-group-item justify-content-between">
            A3
            <span>
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-update"></i></button>
                <button class="btn btn-success btn-sm rounded-circle"><i class="icon-designer"></i></button>
                <button class="btn btn-danger btn-sm rounded-circle"><i class="icon-delete"></i></button>
                <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
            </span>
        </li>
    </ul>
</main>
@endsection