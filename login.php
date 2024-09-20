<?php 
require ('function.php');

session_start();
// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])){

  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id'");
  $row = mysqli_fetch_assoc($result);

  if($key === hash('sha256', $row['username'])){
    $_SESSION['login'] = true;
  }

}


if (isset($_SESSION['login'])){

    header("location: index.php");
    exit;

}



if (isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result)){

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])){

            // cek session
            $_SESSION['login'] = true;

            // set cookie

            if (isset($_POST['remember'])){

              setcookie('id', $row['id'], time() + 60);
              setcookie('key', hash('sha256', $row['username']), time() + 60);
            }
            header("location: index.php");
            exit;
        }else{
          echo "<script>
          alert ('password or username incorrect.');
           </scrip>";
        }
    }
}

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login page</title>
  </head>
  <body>



  <div class="container">
  <div class="row text-center mb-1 pt-5 mt-5">
          <div class="col">
          <img class="img1" src="image/img6.png" alt="" style="width: 25%">
            <h2>Log-in</h2>
          </div>
        </div>
  <div class="row justify-content-center pb-3 mt-1">
          <div class="col-md-4">
            <form action="" method="post" >
              <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input
                  autocomplete="off"
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="input username..."
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input
                  autocomplete="off"
                  type="password"
                  name="password"
                  placeholder="input password..."
                  class="form-control"
                  id="email"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3" >
              <input class="form-check-input" name="remember" type="checkbox" value="" id="remember">
              <label class="form-check-label" for="remember" name="remember">
                Remember me
              </label>
              </div>
              <button type="submit" name="login" class="btn btn-success px-6 ">Log-in</button>
              <a href="register.php" class="btn btn-primary px-6 ">Register</a>
            </form>
          </div>
        </div>
  </div>
 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>