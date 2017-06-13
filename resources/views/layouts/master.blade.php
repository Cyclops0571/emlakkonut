<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emlak Konut Yönetim Paneli</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
          crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
  </head>

  <style>
    body {
      padding-top: 200px;
      background-color: #f6f7fa;
    }

    h1 {
      margin-bottom: 20px;
      padding-bottom: 9px;
      border-bottom: 1px solid #eee;
    }

    a,
    a:hover,
    a:focus {
      color: #fff;
    }

    .navbar-brand {
      width: 350px;
      /*background-color: #005aab;*/
    }

    .navbar-brand>img {
      width: 104px;
      margin-left: 80px;
      margin-bottom: 20px;
    }

    .nav-link {
      padding: 1rem;
    }

    .nav-pills .nav-item.show .nav-link,
    .nav-pills .nav-link.active {
      background-color: #044a89;
    }

    .nav-pills .nav-item.show .nav-link,
    .nav-pills .nav-link:hover,
    .nav-pills .nav-link:focus {
      background-color: #044a89;
    }

    .sidebar {
      position: fixed;
      top: -4px;
      bottom: 0;
      left: 0;
      z-index: 2000;
      padding: 20px;
      overflow-x: hidden;
      overflow-y: auto;
      /* Scrollable contents if viewport is shorter than content. */
      border-right: 1px solid #eee;
      background-color: #005aab;
    }

    .sidebar {
      padding-left: 0;
      padding-right: 0;
    }

    .sidebar .nav {
      margin-bottom: 20px;
    }

    .sidebar .nav-item {
      width: 100%;
    }

    .sidebar .nav-item+.nav-item {
      margin-left: 0;
    }

    .sidebar .nav-link {
      border-radius: 0;
    }

    .placeholders {
      padding-bottom: 3rem;
    }

    .placeholder img {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    main>h2 {
      font-size: 24px;
      text-align: center;
    }

    .list-group {
      max-width: 600px;
      margin: 0 auto;
    }

    .navbar {
      border-bottom: 1px solid #d3e2f0;
    }

    .bg-inverse {
      background-color: #fff !important;
    }

    .navbar-inverse .navbar-nav .nav-link {
      color: #0e1a35;
    }

    .navbar-inverse .navbar-nav .nav-link:focus,
    .navbar-inverse .navbar-nav .nav-link:hover {
      color: #0e1a35;
    }
  </style>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
              aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="../../assets/img/logo.png">
      </a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Batışehir</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <button class="btn btn-md btn-primary btn-block" type="submit">Çıkış</button>
        </form>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <a class="navbar-brand" href="#">
            <img src="../../assets/img/logo.png">
          </a>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="projeler.html">Projeler <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vaziyet-plani.html">Vaziyet Planı</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parseller.html">Parseller</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kat-plani.html">Kat Planı</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daireler.html">Daireler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="konum.html">Konum</a>
            </li>
          </ul>
        </nav>
        @yield('content')
      </div>
    </div>
  </body>

</html>