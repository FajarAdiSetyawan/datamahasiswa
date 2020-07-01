<?php

require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo  '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading text-center">User Berhasi Dibuat!</h4>
          </div>';
  } else {
    echo mysqli_error($conn);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <title>Registrasi</title>
</head>

<body>



  <div class="container rounded p-2" align="center">
    <div align="center" class="border border-info shadow rounded " style="width:400px;margin-top:5%;">
      <form action="" class="p-3" method="post">
        <h3 align="center">Registrasi</h3>
        <hr class="bg-info">
        <div class="form-group" align="left">
          <label class="email" for="email">Email</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="far fa-envelope"></i></div>
            </div>
            <input type="email" class="form-control" id="email" placeholder="ketikkan Email anda" name="email" required>
          </div>
        </div>
        <div class="form-group" align="left">
          <label class="password" for="password">Password</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
            <input type="password" class="form-control" id="password" placeholder="ketikkan password anda" name="password">
          </div>
        </div>
        <div class="form-group" align="left">
          <label class="confpass" for="confpass">Konfirmasi Password</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
            <input type="password" class="form-control" id="confpass" placeholder="ketikkan Konfirmasi Password anda" name="confpass">
          </div>
        </div>
        <button type="submit" class="btn btn-block btn-outline-success" name="register" id="register"><i class="fas fa-user-plus"></i> Register</button>
        <hr class="bg-info">
        <h6 align="center">Sudah Punya Akun ?</h6>
        <a class="btn btn-block btn-outline-primary" href="login.php" role="button"><i class="fas fa-sign-in-alt"></i> Login</a>
      </form>
    </div>
  </div>



  <!-- Optional JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>