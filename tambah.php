<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// cek tombol submit

if (isset($_POST["submit"])) {
  // cek data

  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data BERHASIL ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('data GAGAL ditambahkan!');
            document.location.href = 'index.php';
          </script>";
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <title>Tambah Data</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand" href="#">Tambah Data Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <h1 class="text-center mt-2">Tambah Data Mahasiswa</h1>

  <form action="" method="post" class="p-5" enctype="multipart/form-data">
    <input type="hidden" name="id">
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-5">
        <input type="text" class="form-control shadow-sm rounded" name="nama" id="nama" placeholder="Nama" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="nim" class="col-sm-2 col-form-label">NIM</label>
      <div class="col-sm-5">
        <input type="text" class="form-control shadow-sm rounded" name="nim" id="nim" placeholder="NIM" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-5">
        <input type="email" class="form-control shadow-sm rounded" name="email" id="email" placeholder="Email" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
      <div class="col-sm-5">
        <input type="jurusan" class="form-control shadow-sm rounded" name="jurusan" id="jurusan" placeholder="Jurusan" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
      <div class="col-sm-5">
        <input type="file" name="gambar" id="gambar" required>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-outline-success shadow rounded"><i class="fas fa-user-plus"></i> Tambah Data</button>
  </form>

  <!-- Optional JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>