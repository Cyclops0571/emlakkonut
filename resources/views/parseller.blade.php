@extends('layouts.master')
@section('content')
  <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <ul class="list-group">
      <li class="list-group-item justify-content-between">Parseller
        <button class="btn btn-primary btn-sm">+</button>
      </li>
      <li class="list-group-item">
        <input type="text" class="form-control" placeholder="Parsel tipini giriniz..." aria-describedby="basic-addon1">
      </li>
      <li class="list-group-item">Parsel 1</li>
      <li class="list-group-item">Parsel 2</li>
      <li class="list-group-item">Parsel 3</li>
    </ul>
  </main>
@endsection