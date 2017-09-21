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

    <style>
      body {
        padding-top: 150px;
        padding-bottom: 50px;
        background: url('/img/login_background.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      .icon-color {
        color: #005aab;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="form-header">
        <img src="/img/logo.png" class="form-logo">
      </div>
      <form class="form-signin" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Hoş geldiniz!</h2>
        <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <span class="input-group-addon" id="basic-addon1"><i class="icon-user icon-color"></i></span>
          <input type="text" id="name" class="form-control" placeholder="Kullanıcı Adı" aria-describedby="basic-addon1"
                 name="name" value="{{ app()->isLocal() ? config('app.kkysUser') : old('name')  }}" required autofocus>
        </div>
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }} pass">
          <span class="input-group-addon" id="basic-addon1"><i class="icon-lock icon-color"></i></span>
          <input type="password" id="password" class="form-control" placeholder="Şifre" aria-describedby="basic-addon1"
                 name="password" value="{{app()->isLocal() ? config('app.kkysPassword') : '' }}" required>
        </div>
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
      </form>
    </div>
  </body>
</html>