@extends('layouts.app')

<style>
    body {
        padding-top: 150px;
        padding-bottom: 50px;
        background: url('/img/bg.png') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .navbar,
    .sidebar {
        display: none !important;
    }

    .icon-color {
        color: #005aab;
    }
</style>

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-1 pt-3">
    <div class="container">
        <div class="form-header">
            <img src="/img/logo.png" class="form-logo">
        </div>
        <form class="form-signin"role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h2 class="form-signin-heading">Hoş geldiniz!</h2>
            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1"><i class="icon-user icon-color"></i></span>
                <input type="email" id="email" class="form-control" placeholder="Kullanıcı Adı" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }} pass">
                <span class="input-group-addon" id="basic-addon1"><i class="icon-lock icon-color"></i></span>
                <input type="password" id="password" class="form-control" placeholder="Şifre" aria-describedby="basic-addon1" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
        </form>
    </div>
</main>
@endsection
