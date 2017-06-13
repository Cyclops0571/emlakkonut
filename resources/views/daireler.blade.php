@extends('layouts.master')
@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <ul class="list-group">
        <li class="list-group-item justify-content-between">Daireler<button class="btn btn-primary btn-sm">+</button><button class="btn btn-primary btn-sm">+</button></li>
        <li class="list-group-item"><input type="text" class="form-control" placeholder="Daire tipini giriniz..." aria-describedby="basic-addon1"></li>
        <li class="list-group-item">Tip 1</li>
        <li class="list-group-item">Tip 2</li>
        <li class="list-group-item">Tip 3</li>
    </ul>
</main>
@endsection