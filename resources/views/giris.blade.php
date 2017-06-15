<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emlak Konut - Giriş</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
    body {
        padding-top: 150px;
        padding-bottom: 50px;
        background: url('../img/bg.png') no-repeat center center fixed;
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
        border-radius: 0;
    }

    .form-signin input[type="password"] {
        border-radius: 0;
    }

    .form-control {
        border: 0;
        border-bottom: 1px solid rgba(0, 0, 0, .15);
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group-addon {
        background-color: transparent;
        border: 0;
        border-bottom: 1px solid rgba(0, 0, 0, .15);
        border-radius: 0;
    }

    .pass {
        margin-bottom: 50px;
    }
</style>

<body>
    <div class="container">
        <div class="form-header">
            <img src="../img/logo.png" class="form-logo">
        </div>
        <form class="form-signin">
            <h2 class="form-signin-heading">Hoş geldiniz!</h2>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="icon-user"></i></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Kullanıcı Adı" aria-describedby="basic-addon1" required
                    autofocus>
            </div>
            <div class="input-group pass">
                <span class="input-group-addon" id="basic-addon1"><i class="icon-lock"></i></span>
                <input type="password" id="inputPassword" class="form-control" placeholder="Şifre" aria-describedby="basic-addon1" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
        </form>
    </div>
</body>

</html>