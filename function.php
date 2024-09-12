<?php 
$conn = mysqli_connect('localhost', 'root', '', 'db_cwr');


$query = mysqli_query($conn, "SELECT max(substr(id, 9,10)) as kodeTerbesar FROM requestor5");
$res = mysqli_fetch_array($query);
$kodeReq = $res['kodeTerbesar'];
$urutan = (int) substr($kodeReq, 3, 3);
$urutan++;
$date = date("Ymd");
$angka = "00";
$kodeReq = $date . sprintf($angka . "%03s", $urutan);

$query = mysqli_query($conn, "SELECT max(substr(helpDeskTicketNo, 9,10)) as kodeTerbesar FROM its");
$res = mysqli_fetch_array($query);
$kodeTik = $res['kodeTerbesar'];
$urutan = (int) substr($kodeTik, 3, 3);
$urutan++;
$date = date("Y");
$angka = "/ITS/";
$kodeTik = $date . sprintf($angka .  "%04s", $urutan);

function query($query){

    global $conn;
    $rows = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data){
    global $conn;
    $kode = htmlspecialchars($data['kode']);
    $requestDate = htmlspecialchars($data['requestDate']);
    $requestType = htmlspecialchars($data['requestType']);
    $assetTagNo = htmlspecialchars($data['assetTagNo']);
    $userIssue = htmlspecialchars($data['userIssue']);
    $user= htmlspecialchars($data['user']);
    $approvedBy1 = htmlspecialchars($data['approvedBy1']);
    $approvedBy2 = htmlspecialchars($data['approvedBy2']);

    $query = "INSERT INTO requestor5 VALUES
    ('$kode', 
    '$requestDate', 
    '$requestType', 
    '$assetTagNo', 
    '$userIssue', 
    '$user', 
    '$approvedBy1', 
    '$approvedBy2')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahITS($data){
    global $conn;
    $helpDeskTicketNo= htmlspecialchars($data['helpDeskTicketNo']);
    $receivedDate = htmlspecialchars($data['receivedDate']);
    $EstComplDate = htmlspecialchars($data['EstComplDate']);
    $ActualComplDate = htmlspecialchars($data['ActualComplDate']);
    $rootIssue = htmlspecialchars($data['rootIssue']);
    // $no = $data['no'];
    $old_sparepart = htmlspecialchars($data['old_sparepart']);
    $old_qty = $data['old_qty'];
    $new_sparepart = htmlspecialchars($data['new_sparepart']);
    $new_qty = $data['new_qty'];
    $reason = htmlspecialchars($data['reason']);
    $last_stock = $data['last_stock'];
    $pic = $data['pic'];
    $approvedBy = $data['approvedBy'];
    $confirmByUser = $data['confirmByUser'];
    $ConfirmByAssOrManager = $data['ConfirmByAssOrManager'];

    $query = "INSERT INTO ITS VALUES
    ('',
    '$helpDeskTicketNo', 
    '$receivedDate', 
    '$EstComplDate', 
    '$ActualComplDate', 
    '$rootIssue',  
    '$old_sparepart', 
    '$old_qty', 
    '$new_sparepart', 
    '$new_qty', '
    $reason', 
    '$last_stock',
    '$pic',
    '$approvedBy',
    '$confirmByUser',
    '$ConfirmByAssOrManager')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahKaryawan($data){
    global $conn;
    $namaLengkap = htmlspecialchars($data['namaLengkap']);
    $tanggalLahir = htmlspecialchars($data['tanggalLahir']);
    $alamat = htmlspecialchars($data['alamat']);
    $noHandphone = htmlspecialchars($data['noHandphone']);

    $query = "INSERT INTO karyawan VALUES('','$namaLengkap', '$tanggalLahir', '$alamat', '$noHandphone')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function register($data){
    global $conn;
    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_escape_string($conn,$data['password']);
    $password2 = mysqli_escape_string($conn,$data['password2']);
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    // cek username valid
    if (mysqli_fetch_assoc($result)){
        echo "<script>
            alert ('username is already exists');
        </script>";
        return false;
    }

    // cek password valid
    if ( $password !== $password2){
        echo "<script>
        alert ('password not correct. please check the password.');
         </script>";
         return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // entry data to database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);


}

?>