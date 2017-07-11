@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Daireler
            <span>
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-Asset-2"></i></button>
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></button>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Daire tipini giriniz..." aria-describedby="basic-addon1">
        <ul id="listProjects" class="list-group list-group-flush">
            <li class="list-group-item justify-content-between">
                Tip 1
                <span>
                    <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
                </span>
            </li>
            <li class="list-group-item justify-content-between">
                Tip 2
                <span>
                    <button class="btn btn-success btn-sm rounded-circle"><i class="icon-settings"></i></button>
                </span>
            </li>
            <li class="list-group-item justify-content-between">
                Tip 3
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