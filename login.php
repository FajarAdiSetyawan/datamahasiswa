<?php

session_start();

require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil email berdasar id
  $result = mysqli_query($conn, "SELECT email FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan email
  if ($key === hash('sha256', $row['email'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result =  mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

  //cek email
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      //set session
      $_SESSION["login"] = true;

      // cek remember me (cookie)
      if (isset($_POST['remember'])) {
        //buat cookie
        setcookie('id', $row['id'], time() + 60); // cookie hilang dalam 60s
        //enkripsi email
        setcookie('key', hash('sha256', $row['email']), time() + 60);
      }

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
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
  <title>Login</title>
</head>

<body>

  <?php if (isset($error)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <h6 class="text-center">Email/Password Salah</h6>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <div class="container rounded p-2" align="center">
    <div align="center" class="border border-info shadow rounded " style="width:400px;margin-top:5%;">
      <form action="" class="p-3 rounded" method="post">
        <h3 align="center">Login</h3>
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
        <div class="checkbox" align="left">
          <label for="remember"><input type="checkbox" id="remember" name="remember"> Ingat saya</label>
        </div>
        <button type="submit" class="btn btn-block btn-outline-success" name="login" id="login"><i class="fas fa-sign-in-alt"></i> Login</button>
        <hr class="bg-info">
        <h6 align="center">Belum Punya Akun ?</h6>
        <a class="btn btn-block btn-outline-primary" href="registrasi.php" role="button"><i class="fas fa-user-plus"></i> Registrasi</a>
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