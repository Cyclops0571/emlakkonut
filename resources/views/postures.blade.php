@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <ul class="list-group">
        <li class="list-group-item justify-content-between">
            Genel Vaziyet Planı
            <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></button>
        </li>
        <li class="list-group-item">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Plan tipini giriniz..." aria-describedby="basic-addon1" autofocus>
                <span class="input-group-addon" id="basic-addon1"><i class="icon-Accept"></i></span>
                <span class="input-group-addon" id="basic-addon1"><i class="icon-Cancel"></i></span>
            </div>
        </li>
    </ul>
</main>
@endsection