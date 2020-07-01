<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// pagination
$jmlDataPerhalaman = 5;
$jmlData = count(query("SELECT * FROM mahasiswa"));
$jmlHalaman = ceil($jmlData / $jmlDataPerhalaman);

$halAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jmlDataPerhalaman * $halAktif) - $jmlDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jmlDataPerhalaman");

// cari
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/all.css">
  <link href="css/floating-labels.css" rel="stylesheet">

  <title>Admin</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah.php">Tambah Data</a>
        </li>

      </ul>

      <div class="row mr-1">
        <form class="form-inline" method="post">
          <div class="col">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="keyword" id="search" autocomplete="off" autofocus>
              <span class="input-group-append">
                <div class="input-group-text bg-white"><i class="fa fa-search"></i></div>
              </span>
            </div>
          </div>
        </form>

      </div>

      <div class="text-center">
        <div class="spinner-border text-primary" role="status" id="spinner">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <a class="nav-link text-primary" href="print.php" target="_blank"><i class="fas fa-print"></i> Print</a>
      <a class="nav-link text-danger" href="logout.php" data-toggle="modal" data-target="#logutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </nav>

  <h1 class="text-center mt-2">Data Mahasiswa</h1>

  <div class="shadow p-2 m-5 bg-white rounded">
    <div class="table-responsive-sm p-1" id="container">
      <table class="table table-striped table-sm">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="text-center">No.</th>
            <th scope="col" class="text-center">Gambar</th>
            <th scope="col" class="text-center">NIM</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Jurusan</th>
            <th scope="col" class="text-center aksi">Aksi</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
          <tr>
            <td scope="row" class="text-center"><?= $i; ?></td>
            <td scope="row" class="text-center"><img src="img/<?= $row["gambar"] ?>" alt="" width="50" class="rounded-circle"></td>
            <td scope="row" class="text-center"><?= $row["nim"]; ?></td>
            <td scope="row" class="text-center"><?= $row["nama"]; ?></td>
            <td scope="row" class="text-center"><?= $row["email"]; ?></td>
            <td scope="row" class="text-center"><?= $row["jurusan"]; ?></td>
            <td scope="row" class="text-center aksi">
              <a href="ubah.php?id=<?= $row["id"] ?>" role="button" class="btn btn-warning"><i class="fas fa-user-edit"></i> Ubah</a>
              <a href="hapus.php?id=<?= $row["id"] ?>" data-toggle="modal" data-target="#hapusModal" role="button" class="btn btn-danger"><i class="fas fa-trash"></i> hapus</a>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>

      </table>
    </div>
  </div>

  <!-- Hapus Modal -->
  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapusModalLabel">Hapus ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Hapus Data Mahasiswa
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a href="hapus.php?id=<?= $row["id"] ?>" type="button" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="logutModal" tabindex="-1" role="dialog" aria-labelledby="logutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logutModalLabel">Logout ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Logout dari web
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a href="logout.php" type="button" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- pagination -->

  <nav aria-label="...">
    <ul class="pagination justify-content-center">
      <?php if ($halAktif > 1) : ?>
        <li class="page-item">
          <a class="page-link" href="?halaman=<?= $halAktif - 1 ?>" aria-disabled="true">Previous</a>
        </li>
      <?php else : ?>
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
      <?php endif; ?>
      <?php for ($i = 1; $i <= $jmlHalaman; $i++) : ?>
        <?php if ($i == $halAktif) : ?>
          <li class="page-item active" aria-current="page">
            <span class="page-link">
              <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: white;"><?= $i; ?></a>
              <span class="sr-only">(current)</span>
            </span>
          </li>
        <?php else : ?>
          <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
        <?php endif; ?>
      <?php endfor; ?>
      <?php if ($halAktif < $jmlHalaman) : ?>
        <li class="page-item">
          <a class="page-link" href="?halaman=<?= $halAktif + 1 ?>" aria-disabled="true">Next</a>
        </li>
      <?php else : ?>
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-disabled="true">Next</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>






  <!-- Optional JavaScript -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>