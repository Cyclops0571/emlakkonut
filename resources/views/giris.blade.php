<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emlak Konut - Giriş</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
  </head>

  <style>
    body {
      padding-top: 150px;
      padding-bottom: 50px;
      background: url('../assets/img/bg.png') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .form-header {
      max-width: 600px;
      padding: 15px 0;
      margin: 0 auto;
      background-color: #005aab;
      text-align: center;
    }

    .form-logo {
      width: 150px;
    }

    .form-signin {
      max-width: 600px;
      padding: 50px 100px;
      margin: 0 auto;
      background-color: #fff;
    }

    .form-signin-heading {
      font-size: 28px;
      text-align: center;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 20px;
      color: #666;
    }

    .form-signin .checkbox {
      font-weight: normal;
    }

    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>

  <body>
    <div class="container">
      <div class="form-header">
        <img src="../assets/img/logo.png" class="form-logo">
      </div>
      <form class="form-signin">
        <h2 class="form-signin-heading">Hoş geldiniz!</h2>
        <label for="inputEmail" class="sr-only">Kullanıcı Adı</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Kullanıcı Adı" required autofocus>
        <label for="inputPassword" class="sr-only">Şifre</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Şifre" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me">
            Beni Hatırla
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
      </form>
    </div>
  </body>

</html>