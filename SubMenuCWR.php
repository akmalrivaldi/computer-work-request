<?php 
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}
require ('function.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>

    <style>
        /* Menyusun kotak di tengah halaman */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            width: 100%;
            height: 100%;
            cursor: pointer;
            background-color: #acddf2;
            border-radius: 20px;
            box-shadow: 5px 5px 5px 5px #d2f2fc;
            transition: transform 0.5s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-body p {
            font-size: 1rem;
        }

        .card-body h5 {
            font-size: 2rem;
        }

        .card-body .img1 {
            width: 4rem;
            height: 4rem;
        }

        .card-body .img2 {
            width: 5rem;
            height: 5rem;
        }

        /* Penyesuaian layout pada mobile */
        @media (max-width: 768px) {
            .card-body h5 {
                font-size: 1.5rem;
            }
            .card-body p {
                font-size: 0.9rem;
            }
            .card-body .img1,
            .card-body .img2 {
                width: 3rem;
                height: 3rem;
            }
        }
    </style>
  </head>
  <body>
    <div class="container center-container">
        <div class="row">
            <!-- Kotak Menu Pertama -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card text-center" onclick="location.href='cwr.php';">
                    <div class="card-body">
                        <h5 class="card-title">CWR</h5>
                        <p class="card-text">Computer Work Request</p>
                        <img class="img1" src="image/img5.png" alt="">
                    </div>
                </div>
            </div>

            <!-- Kotak Menu Kedua -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card text-center" onclick="location.href='https://www.example.com/menu2';">
                    <div class="card-body">
                        <h5 class="card-title">SWR</h5>
                        <p class="card-text">Software Work Request</p>
                        <img class="img2" src="image/img4.png" alt="">
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="card text-center" onclick="location.href='data_cwr.php';">
                    <div class="card-body">
                        <h5 class="card-title">Data CWR</h5>
                        <p class="card-text"></p>
                        <img class="img2" src="image/img4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
