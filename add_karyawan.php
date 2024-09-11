<?php
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}

require('function.php');
if (isset($_POST['submit'])){

    if(tambahKaryawan($_POST) > 0){
        echo "<script>
        alert('item added successfully!');
    </script>";
    }else{
        echo "
        <script>
        alert('item failed added!');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Data Karyawan Baru</h1>

        <!-- Form to add new menu -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="noHandphone" class="form-label">No Handphone</label>
                <input type="text" class="form-control" id="noHandphone" name="noHandphone" autocomplete="off" required>
            </div>
            <!-- <div class="mb-3">
                <label for="image" class="form-label">Menu Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div> -->
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="subMenuHR.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
