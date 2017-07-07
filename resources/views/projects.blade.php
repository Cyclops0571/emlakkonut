@extends('layouts.app')

@section('content')
<ul class="list-group">
    <li class="list-group-item justify-content-between">
        Projeler
        <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></button>
    </li>
    <li class="list-group-item">
        <input type="text" class="form-control" placeholder="Proje adı giriniz...">
    </li>
    <li class="list-group-item list-group-item-action">
        My World Ataşehir
    </li>
    <li class="list-group-item active">
        Batışehir
    </li>
    <li class="list-group-item list-group-item-action">
        Varyap Meridian
    </li>
</ul>
@endsection