<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
    <div id="app">
      <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ url('img/logo.png') }}">
        </a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">{{isset($project) ? $project->ProjeAdi : ''}}</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" id="logout-form" action="{{ route('logout') }}" method="POST">
            <button class="btn btn-md btn-primary btn-block" type="submit">Çıkış</button>
            {{ csrf_field() }}
          </form>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          @include('layouts.sidebar')
          @yield('content')
          @if($errors->any())
            <ul class="alert alert-danger">
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          @endif
          @if(Session::has('success'))
            <ul class="alert alert-success">
              <li>{{Session::get('success')}}</li>
            </ul>
          @endif;
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @section('javascript')
      <script>
          function onClickActiveNav(p) {
              $(".nav li").removeClass("active");
              $('#' + p).addClass('active');
          }
      </script>
    @show
  </body>
</html>