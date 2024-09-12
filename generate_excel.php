<?php

session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}

    require('function.php');

    // Jika form di-submit
    if (isset($_POST['filter'])) {
        // Mendapatkan input dari user
        $requestDate = $_POST['requestDate'];
        $requestType = $_POST['requestType'];

        // Query untuk filter data berdasarkan input
        $query = "SELECT * FROM requestor5 WHERE 1=1";

        if (!empty($requestDate)) {
            $query .= " AND requestDate = '$requestDate'";
        }

        if (!empty($requestType)) {
            $query .= " AND requestType = '$requestType'";
        }

        $data = mysqli_query($conn, $query);

        // export ke Excel
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data_CWR.xls");

        echo '
        <center>
            <h1>Data CWR</h1>
        </center>

        <table border="1" class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <th>Request Date</th>
                <th>Request Type</th>
                <th>Asset\'s Tag No</th>
                <th>User\'s Issue</th>
            </tr>
        ';

        while ($d = mysqli_fetch_array($data)) {
            echo '
            <tr>
                <td>' . $d['id'] . '</td>
                <td>' . $d['requestDate'] . '</td>
                <td>' . $d['requestType'] . '</td>
                <td>' . $d['assetTagNo'] . '</td>
                <td>' . $d['userIssue'] . '</td>
            </tr>
            ';
        }

        echo '</table>';
        exit; 
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1 class="text-center my-4">Export Data CWR</h1>

        <!-- Form untuk filter data menggunakan Bootstrap -->
        <form method="POST" action="" class="row g-3">
            <div class="col-md-6">
                <label for="requestDate" class="form-label">Request Date</label>
                <input type="date" class="form-control" name="requestDate" id="requestDate">
            </div>

            <div class="col-md-6">
                <label for="requestType" class="form-label">Request Type</label>
                <select class="form-select" name="requestType" id="requestType">
                    <option value="">--Select Type--</option>
                    <option value="Type1">R</option>
                    <option value="Type2">A</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" name="filter" class="btn btn-primary">Export to Excel</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
