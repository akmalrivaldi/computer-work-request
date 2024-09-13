<?php 
    session_start();

    if ( !isset($_SESSION['login'])){
        header("location: login.php");
        exit;
    }

require ('function.php');
$id = $_GET['id'];

if(hapus($_POST) > 0){
    echo "
    <script>
    alert('delete item successfull!');
    document.location.href = 'tampil_karyawan.php';
    </script>
    ";
}else{
    echo "
    <script>
    alert('delete item failed!');
    document.location.href = 'tampil_karyawan.php';
    </script>
    ";
}

?>