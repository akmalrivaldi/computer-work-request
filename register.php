<?php 


require ('function.php');

if (isset($_POST['register']))

  if(register($_POST) > 0){

    echo "<script>
      alert ('Register successfull');
      document.location.href = 'login.php';
    </script>";
  }else(
    mysqli_error($conn)
  );

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>register page</title>
  </head>
  <body>



  <div class="container">
  <div class="row text-center mb-1 pt-5 mt-5">
          <div class="col">
            <h2>Register</h2>
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
                  id="password"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="password2" class="form-label">confirm password</label>
                <input
                  autocomplete="off"
                  type="password"
                  name="password2"
                  placeholder="confirm password..."
                  class="form-control"
                  id="password2"
                  aria-describedby="emailHelp"
                />
              </div>
              <button type="submit" name="register" class="btn btn-primary px-5 mx-auto">register</button>
            </form>
          </div>
        </div>
  </div>
 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>