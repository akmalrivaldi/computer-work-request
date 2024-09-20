<?php 

// session
session_start();

    if ( !isset($_SESSION['login'])){
        header("location: login.php");
        exit;
    }


require ('function.php');


// // pagination
// // konfigurasi
// $jumlahPerHalaman = 8;
// $jumlahData = count(query("SELECT * FROM stok_warung"));
// $jumlahHalaman = ceil($jumlahData / $jumlahPerHalaman);
// if(isset($_GET['halaman']) ){

//   $halamanAktif = $_GET['halaman'];
  
// }else{
//   $halamanAktif = 1;
// }
// // halaman = 2 awal data 5
//  $awalData = ($jumlahPerHalaman * $halamanAktif) - $jumlahPerHalaman;

$brng = query("SELECT * FROM requestor5");


// search






?>
 



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data CWR</title>
  </head>
  <body>

  <div class="container-fluid">
  <table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Request Date</th>
      <th scope="col">Request Type</th>
      <th scope="col">Asset Tag No</th>
      <th scope="col">User Issue</th>
      <th scope="col">User</th>
      <th scope="col">Approved By</th>
      <th scope="col">Approved By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($brng as $row) :?>
    <!-- <tr>
      <td>1</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr> -->
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= $row['requestDate']; ?></td>
      <td><?= $row['requestType']; ?></td>
      <td><?= $row['assetTagNo']; ?></td>
      <td><?= $row['userIssue']; ?></td>
      <td><?= $row['user']; ?></td>
      <td><?= $row['approvedBy1']; ?></td>
      <td><?= $row['approvedBy2']; ?></td>
      <td>
        <a href="cwr_its.php?id=<?= $row['id']; ?>">View</a>
      </td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>
<div class="container-fluid">
  <div class="row justify-between">
  <div class="col-4 pb-3">
  <a href="tambah.php" class="btn btn-primary justify-content-center" tabindex="-1" role="button" aria-disabled="true">add item</a>
  </div>
  </div>
</div>


   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>