@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <div class="card card-size">
        <div class="card-header">
            Projeler
            <button class="btn btn-primary btn-sm rounded-circle float-right"><i class="icon-plus"></i></button>
        </div>
        <input id="inputProject" type="text" class="form-control" placeholder="Proje adı giriniz..." onkeyup="filter(this)" autofocus>
        <ul id="listProjects" class="list-group list-group-flush">
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
    </div>
</main>
@endsection