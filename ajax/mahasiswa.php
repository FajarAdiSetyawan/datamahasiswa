<?php
//
usleep(500000);

require '../functions.php';

$search = $_GET["search"];


$query = "SELECT * FROM mahasiswa WHERE 
  nama LIKE '%$search%' OR 
  nim LIKE '%$search%' OR 
  email LIKE '%$search%' OR 
  jurusan LIKE '%$search%'";

$mahasiswa = query($query);

?>

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
        <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Hapus?');" role="button" class="btn btn-danger"><i class="fas fa-trash"></i> hapus</a>
      </td>
    </tr>
    <?php $i++ ?>
  <?php endforeach; ?>

</table>