<?php

// koneksi ke database
$conn = mysqli_connect("sql109.epizy.com", "epiz_26022556", "hNwc2tAD1mNTT", "epiz_26022556_phpdasar");

// ambil data dari table mahasiswa/query data

// ambil data (fetch)mahasiswa dari object result 
//mysqli_fetch_row() // mengembalikan array numeric [0],[1]
//mysqli_fetch_assoc() // mengembalikan array associative
//mysqli_fetch_array() // mengembalikan array numeric & associative (data double)
//mysqli_fetch_object() // mengembalikan object

// while ($mhs = mysqli_fetch_assoc($result)) {
//   var_dump($mhs);
// }


function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;

  // ambil data dari form
  $nama = htmlspecialchars($data["nama"]);
  $nim = htmlspecialchars($data["nim"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  // upload gambar dulu
  $gambar = upload();

  if (!$gambar) {
    return false;
  }

  // query insert data
  $query = "INSERT INTO mahasiswa VALUE 
            ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $sizeFile = $_FILES['gambar']['size'];
  $errorFile = $_FILES['gambar']['error'];
  $tmpFile = $_FILES['gambar']['tmp_name'];

  // cek gambar diupload
  if ($errorFile === 4) {
    echo  "<script>
            alert('yang anda pilih bukan gambar !');
          </script>";
    return false;
  }

  // cek ekstensi file
  $ekstensiFile = ['jpg', 'jpeg', 'png'];
  $cekekstensi = explode('.', $namaFile); // fajar.png = ['fajar', 'png']
  $cekekstensi = strtolower(end($cekekstensi)); // huruf kecil, menggambil ekstensi file
  if (!in_array($cekekstensi, $ekstensiFile)) {
    echo "<script>
            alert('yang anda pilih bukan gambar !');
          </script>";
    return false;
  }

  // cek size
  if ($sizeFile > 1000000) {
    echo "<script>
            alert('ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  //buat nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $cekekstensi;

  // gambar diupload
  move_uploaded_file($tmpFile, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  // ambil data dari form
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $nim = htmlspecialchars($data["nim"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  //cek user pilih gambar baru
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  // query update data
  $query = "UPDATE mahasiswa SET  
            nama = '$nama', 
            nim = '$nim', 
            email = '$email', 
            jurusan = '$jurusan', 
            gambar = '$gambar' 
            WHERE id = $id";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{

  $query = "SELECT * FROM mahasiswa WHERE 
  nama LIKE '%$keyword%' OR 
  nim LIKE '%$keyword%' OR 
  email LIKE '%$keyword%' OR 
  jurusan LIKE '%$keyword%'";
  return query($query);
}


function registrasi($data)
{
  global $conn;

  $email = htmlspecialchars($data["email"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confpass = mysqli_real_escape_string($conn, $data["confpass"]);

  // cek email sudah ada / belum
  $resultEmail = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
  if (mysqli_fetch_assoc($resultEmail)) {
    echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong class="text-center">Email</strong> sudah ada !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    return false;
  }


  // cek pass

  if ($password !== $confpass) {
    echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong class="text-center">Konfirmasi Passsword</strong> yang anda masukkan salah !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // masuk ke db
  mysqli_query($conn, "INSERT INTO user VALUES('', '$email', '$password')");
  return mysqli_affected_rows($conn);
}
