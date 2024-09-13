<?php 

require ('function.php');
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}


$dataKaryawan = query("SELECT * FROM karyawan");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Karyawan</title>
  </head>
  <body>
    <div class="container">
    <h1>Data Karyawan</h1>

<table class="table table-bordered text-center">
<thead>
<tr>
  <th scope="col">No</th>
  <th scope="col">Nama Lengkap</th>
  <th scope="col">Tanggal Lahir</th>
  <th scope="col">Alamat</th>
  <th scope="col">No Handphone</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php $i = 1 ;?>
<?php foreach($dataKaryawan as $row) :?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $row['namaLengkap']; ?></td>
      <td><?= $row['tanggalLahir']; ?></td>
      <td><?= $row['alamat']; ?></td>
      <td><?= $row['noHandphone']; ?></td>
      <td>
        <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('are you sure to delete this item?')">delete</a> 
        <a href="edit.php?id=<?= $row['id']; ?>">edit</a>
      </td>
    </tr>
<?php $i++ ;?>
<?php endforeach ;?>


</tbody>
</table>
<a href="add_karyawan.php" class="btn btn-primary">Tambah Data</a>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>