@extends('layouts.app')

<<<<<<< HEAD
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
@endsection
=======
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> 5fb47b68a1fc55429bab6b28de8682134345b148
