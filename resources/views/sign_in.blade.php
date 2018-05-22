<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <link rel="icon" href="{{url('')}}/assets/img/ship-01.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

  <title>Sistem Galangan</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('')}}/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('')}}/dist/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}
      
      <i class="fas fa-ship fa-7x"></i>
      <h1 class="h3 mb-3 font-weight-normal" style="margin-top: 20px">Sistem Galangan</h1>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p style="margin-top: 20px">Belum memiliki aku? <a href="{{url('')}}/user/sign_up">Sign Up</a></p>

      @if(isset($success))
      <div class="alert alert-success" role="alert">
        Akun anda berhasil teregistrasi
      </div>
      @endif

      @if(isset($failed))
      <div class="alert alert-danger" role="alert">
        Terjadi kesalahan saat registrasi, {{$failed}}
      </div>
      @endif

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
