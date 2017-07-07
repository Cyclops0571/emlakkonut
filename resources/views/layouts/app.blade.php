<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Emlak Konut') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="img/logo.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Batışehir</a>
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
                <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="img/logo.png">
                    </a>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="projects"><i class="icon-Projects_Icon"></i> Projeler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="postures"><i class="icon-General"></i> Vaziyet Planı</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="parcels"><i class="icon-Plots"></i> Parseller</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="floors"><i class="icon-Kat_Plani"></i> Kat Planı</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="apartments"><i class="icon-Houses"></i> Daireler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="location"><i class="icon-Map"></i> Konum</a>
                        </li>
                    </ul>
                </nav>

                <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
