<?php 
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}
    require ('function.php');

    if (isset($_POST['submit'])){

        if(tambah($_POST) > 0){
            echo "<script>
            alert('item added successfully!');
            document.location.href = 'cwr.php';
        </script>";
        }else{
            echo "
            <script>
            alert('item failed added!');
            document.location.href = 'cwr.php';
            </script>
            ";
        }
    }
    if (isset($_POST['submit2'])){

        if(tambahITS($_POST) > 0){
            echo "<script>
            alert('item added successfully!');
            document.location.href = 'cwr.php';
        </script>";
        }else{
            echo "
            <script>
            alert('item failed added!');
            document.location.href = 'cwr.php';
            </script>
            ";
        }
    }

    $rows = 1;
$cwr = query("SELECT * FROM requestor5");
// // Inisialisasi jumlah baris default
// if (!isset($_POST['rows'])) {
//     $rows = 1; // Jumlah baris awal
// } else {
//     $rows = $_POST['rows']; // Jumlah baris setelah submit
// }

// // Jika tombol 'Add Row' ditekan, tambahkan satu baris
// if (isset($_POST['add_row'])) {
//     $rows++;
// }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Computer Work Request</title>
  </head>
  <body>
    <div class="container border">

    <!-- Requestor -->
    <h5 class="text-center border mt-3 p-1" style="background-color: #b3bab5;">Filled By Requestor</h5>
    
    <!-- form Requestor -->
    <form action="" method="post">
    <div class="mb-3 row">
    <label for="requestDate" class="col-sm-2 col-form-label">Request Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="requestDate" name="requestDate" required >
    </div>
    </div>

    <div class="col-sm-10">
      <input type="text" class="form-control d-none" id="kode" name="kode" value="<?php echo $kodeReq?>" readonly >
    </div>

    <div class="mb-3 row">
    <label for="requestType" class="col-sm-2 col-form-label">Request Type</label>
    <div class="col-sm-10">
    <input class="form-check-input" type="radio" name="requestType" id="repair" value="R">
  <label class="form-check-label me-5" for="repair">
    Repair
  </label>
    <input class="form-check-input" type="radio" name="requestType" id="additonal" value="A">
  <label class="form-check-label" for="additional">
    Additional
  </label>
    </div>
    </div>

    <div class="mb-3 row">
    <label for="assetTagNo" class="col-sm-2 col-form-label">Asset's Tag No</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="assetTagNo" name="assetTagNo">
      <span style="font-size: 10px;"><i>*leave blank for additional request</i></span>
    </div>
    </div>

    <div class="mb-3 row">
        <label for="userIssue" class="col-sm-2 col-form-label">User's Issue</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="userIssue" id="userIssue" style="height: 150px;"></textarea>
        </div>
    </div>
    <div class="row text-center">
        <!-- Kolom 1 -->
        <div class="col-md-4">
            <p>Requestor</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>(Name)</p>
        </div>
        <div class="col-md-4">
            <p>Requestor</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>(Name)</p>
        </div>
        <div class="col-md-4">
            <p>Requestor</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>(Name)</p>
        </div>
    <input class="btn btn-primary justify-item-center mb-2" type="submit" name="submit" value="Submit">
    </form>
    <a target="_blank" href="export.php">EXPORT DATA</a>
    <table class="table table-striped text-center d-none
    ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Request Date</th>
      <th scope="col">Request Type</th>
      <th scope="col">Asset Tag No</th>
      <th scope="col">User's Issue</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($cwr as $row) :?>
      <td><?= $row['id']; ?></td>
      <td><?= $row['requestDate']; ?></td>
      <td><?= $row['requestType']; ?></td>
      <td><?= $row['assetTagNo']; ?></td>
      <td><?= $row['userIssue']; ?></td>
      <td>
      </td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>
    </form>
    




    <!-- ITS dept. -->
    <form action="" method="post" >
    <h5 class="text-center border mt-3 p-1" style="background-color: #b3bab5;">Filled By ITS Dept.</h5>
    <div class="mb-3 row">
    <label for="helpDeskTicketNo" class="col-sm-2 col-form-label">Helpdesk Ticket No</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="helpDeskTicketNo" name="helpDeskTicketNo" value="<?php  echo $kodeTik; ?>" readonly required >
      <span style="font-size: 10px;"><i>*format:2017/ITS/0001</i></span>
    </div>
    </div>

    <div class="mb-3 row">
    <label for="receivedDate" class="col-sm-2 col-form-label">Received Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="receivedDate" name="receivedDate" required >
    </div>
    </div>

    <div class="mb-3 row">
    <label for="EstComplDate" class="col-sm-2 col-form-label">Est.Compl.Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="EstComplDate" name="EstComplDate"  required>
    </div>
    </div>

    <div class="mb-3 row">
    <label for="ActualComplDate" class="col-sm-2 col-form-label">Actual.Compl.Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="ActualComplDate" name="ActualComplDate" required>
    </div>
    </div>


            <div class="mb-3 mt-2 row">
    <label for="rootIssue" class="col-sm-2 mb-3 col-form-label">Root Issue</label>
    <div class="col-sm-10">
    <input class="form-check-input" type="radio" name="rootIssue" id="hardware" value="Hardware" > 
  <label class="form-check-label me-5" for="hardware">
    Hardware
  </label>
    <input class="form-check-input" type="radio" name="rootIssue" id="electricity" value="Electricity">
  <label class="form-check-label me-5" for="Electricity">
    Electricity
  </label>
    <input class="form-check-input" type="radio" name="rootIssue" id="office" value="Office/Others">
  <label class="form-check-label me-5" for="office">
    Office/Others
  </label>
    <input class="form-check-input" type="radio" name="rootIssue" id="email" value="Email/Virus/Spam">
  <label class="form-check-label me-5" for="email">
    Email/Virus/Spam
  </label>
    </div>
    </div>
    <form id="add-row-form" action="" method="post">
    <input type="hidden" name="rows" id="rows" value="<?php echo $rows; ?>">
    <div class="table-responsive">
        <table class="table text-center" id="sparepart-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Old Sparepart</th>
              <th>Qty</th>
              <th>New Sparepart</th>
              <th>Qty</th>
              <th>Reason for Change</th>
              <th>Last Stock</th>
            </tr>
          </thead>
          <tbody>
          <?php
            // Loop untuk menampilkan input berdasarkan jumlah baris
            for ($i = 0; $i < $rows; $i++) {
                ?>
                <tr>
                  <td><?php echo $i?></td>
                  <td><input type="text" name="old_sparepart" class="form-control"></td>
                  <td><input type="number" name="old_qty" class="form-control"></td>
                  <td><input type="text" name="new_sparepart" class="form-control"></td>
                  <td><input type="number" name="new_qty" class="form-control"></td>
                  <td><input type="text" name="reason" class="form-control"></td>
                  <td><input type="number" name="last_stock" class="form-control"></td>
                </tr>
                <?php
            }
            ?>
          </tbody>
        </table>
      </div>
       <button type="button" id="add-row" class="btn btn-primary mb-3">Add Row</button>
       <div class="row text-center">
        <!-- Kolom 1 -->
        <div class="col-md-4">
            <p>Requestor</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>(Name)</p>
        </div>
        <div class="col-md-4">
            <p>Requestor</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>(Name)</p>
        </div>
        <div class="col-md-4">
            <p>Requestor</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>(Name)</p>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
          <button type="submit" name="submit2" class="btn btn-success mb-3 ms-2">Submit</button>
          <a href="logout.php" class="btn btn-danger" onclick="return confirm('are you sure to logout?')">logout</a>
          </div>
        </div>
      </form>
    </form>
    
    </div>
    

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#add-row').click(function(e) {
        e.preventDefault();

        // AJAX request untuk menambah baris tanpa reload
        $.ajax({
            url: 'add_row.php', // Buat file terpisah untuk menangani add row
            method: 'POST',
            data: {rows: $('#rows').val()},
            success: function(response) {
                // Tambahkan row baru ke table
                $('#sparepart-table tbody').append(response);
                $('#rows').val(parseInt($('#rows').val()) + 1); // Tambah jumlah baris
            }
        });
    });
});
</script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>