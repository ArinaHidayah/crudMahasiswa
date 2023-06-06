<?php
require 'DatabaseConn/DatabaseConn.php'; 

$rows = query("SELECT * FROM regular");

//tombol cari
function cariData($keyword) {

$query= "SELECT * FROM regular WHERE

  nim LIKE '%$keyword%' OR
  nama LIKE '%$keyword%' OR
  alamat LIKE '%$keyword%' OR
  email LIKE '%$keyword%' OR
  tgllahir LIKE '%$keyword%' OR
  jeniskel LIKE '%$keyword%' OR
  fakultas LIKE '%$keyword%' OR
  jurusan LIKE '%$keyword%'

  ";

  return query($query);

}

//mengecek ketika tombol cari sudah ditekan
if (isset($_GET["cari"])) {

  $rows = cariData($_GET["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>tabel mahasiswa</title>
</head>
<body>
  <h1 class="title">TABEL MAHASISWA</h1>
   <a href="adddata/"><button type="button" class="btn btn-secondary">TAMBAH DATA MAHASISWA</button></a>
    <form action="" method="GET">
    <input type="text" placeholder="Search.." autocomplete="off" size="35px" name="keyword" id="keyword">
    <button class="btn btn-warning p-8" name="cari">Cari</button>
 </form>
   <table class="content-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Action</th>
            <th>nim</th>
            <th>nama</th>
            <th>alamat</th>
            <th>email</th>
            <th>tgllahir</th>
            <th>jeniskel</th>
            <th>fakultas</th>
            <th>jurusan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach ($rows as $mhs):?>
          <tr>
            <td><?= $i; ?></td>
            <td><a href="editdata/?nim=<?=$mhs["nim"] ?>"><button" type="buton" class="btn btn-primary">Edit
              <a href="delete/?nim=<?=$mhs["nim"] ?>" onclick= "return confirm('yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
            <td><?= $mhs["nim"]; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["alamat"]; ?></td>
            <td><?= $mhs["email"]; ?></td>
            <td><?= $mhs["tgllahir"]; ?></td>
            <td><?= $mhs["jeniskel"]; ?></td>
            <td><?= $mhs["fakultas"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>


<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>