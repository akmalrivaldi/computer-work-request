<?php 
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}
    require ('function.php');
    $id = intval($_GET['id']); 
    $barang = query("SELECT * FROM requestor5 WHERE id = $id")[0];
    if (empty($barang)) {
        echo "<script>alert('Data not found'); window.location.href='cwr.php';</script>";
        exit;
    }

    // if (isset($_POST['submit'])){

    //     if(tambah($_POST) > 0){
    //         echo "<script>
    //         alert('item added successfully!');
    //         document.location.href = 'cwr.php';
    //     </script>";
    //     }else{
    //         echo "
    //         <script>
    //         alert('item failed added!');
    //         document.location.href = 'cwr.php';
    //         </script>
    //         ";
    //     }
    // }
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
   <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
    <style>
      .col-md-4 input{
        text-align: center;
      }

      .d-flex a img:hover{
        transform: scale(1.1);
        transition: 99ms linear ;
      }

    .hover-text {
    visibility: hidden;
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    text-align: center;
    width: 100%;
    transition: visibility 0.2s, opacity 0.2s;
    opacity: 0;
  }
  a:hover .hover-text {
    visibility: visible;
    opacity: 1;
    background-color: blue;
  }

  input[type=date]::-webkit-input-placeholder{
    display: none;
  }
    </style>
  </head>
  <body>
    <div class="d-flex justify-content-end me-4 mt-3">
      <a href="generate_excel.php">
        <img src="image/office365.png" alt="Generate excel" aria-label="generate Excel" title="Generate Excel">
        <span class="hover-text">Generate Excel</span>
      </a>
    </div>
    <div class="container border">

    <!-- Requestor -->
    <h5 class="text-center border mt-3 p-1" style="background-color: #b3bab5;">Filled By Requestor</h5>
    
    <!-- form Requestor -->
    <form action="" method="post">
    <div class="mb-3 row">
    <label for="requestDate" class="col-sm-2 col-form-label">Request Date</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="requestDate" name="requestDate" value="<?= isset($barang['requestDate']) ? $barang['requestDate'] : ''; ?>" disabled readonly>

    </div>
    </div>

    <div class="col-sm-10">
      <input type="text" class="form-control d-none" id="kode" name="kode" value="<?= isset($barang['id']) ? $barang['id'] : ''; ?>" disabled readonly>
    </div>

    <div class="mb-3 row">
    <label for="requestType" class="col-sm-2 col-form-label">Request Type</label>
    <div class="col-sm-10">
    <input class="form-check-input" type="radio" name="requestType" id="repair" value="R" <?= isset($barang['requestType']) && $barang['requestType'] == 'R' ? 'checked' : ''; ?> disabled readonly>
  <label class="form-check-label me-5" for="R">
    Repair
  </label>
  <input class="form-check-input" type="radio" name="requestType" id="additional" value="A" <?= isset($barang['requestType']) && $barang['requestType'] == 'A' ? 'checked' : ''; ?> disabled readonly>
  <label class="form-check-label" for="A">
    Additional
  </label>
    </div>
    </div>

    <div class="mb-3 row">
    <label for="assetTagNo" class="col-sm-2 col-form-label">Asset's Tag No</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="assetTagNo" name="assetTagNo" value="<?= isset($barang['assetTagNo']) ? $barang['assetTagNo'] : ''; ?>" disabled readonly>
      <span style="font-size: 10px;"><i>*leave blank for additional request</i></span>
    </div>
    </div>

    <div class="mb-3 row">
        <label for="userIssue" class="col-sm-2 col-form-label">User's Issue</label>
        <div class="col-sm-10">
        <textarea class="form-control" name="userIssue" id="userIssue" style="height: 150px;" disabled readonly><?= isset($barang['userIssue']) ? $barang['userIssue'] : ''; ?></textarea>
        </div>
    </div>
    <div class="row text-center">
        <!-- Kolom 1 -->
        <div class="col-md-4">
            <p>User</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>Name</p>
            <input type="text" name="user" class="form" value="<?= isset($barang['user']) ? $barang['user'] : ''; ?>" disabled readonly>
        </div>
        <div class="col-md-4">
            <p>Approved By</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>Ass. Manager</p>
            <input type="text" name="approvedBy1" class="form mb-4" value="<?= isset($barang['approvedBy1']) ? $barang['approvedBy1'] : ''; ?>" disabled readonly>
        </div>
        <div class="col-md-4">
            <p>Aproved By</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>Manager</p>
            <input type="text" name="approvedBy2" class="form mb-4" value="<?= isset($barang['approvedBy2']) ? $barang['approvedBy2'] : ''; ?>" disabled readonly>
        </div>
    </form>
    <!-- <a target="_blank" href="export.php">EXPORT DATA</a> -->
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
      <input type="date" class="form-control" id="receivedDate" name="receivedDate" required>
    </div>
    </div>

    <div class="mb-3 row">
    <label for="EstComplDate" class="col-sm-2 col-form-label">Est.Compl.Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="EstComplDate" name="EstComplDate" required>
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
    <input class="form-check-input" type="radio" name="rootIssue" id="hardware" value="Hardware"> 
  <label class="form-check-label me-5" for="hardware">
    Hardware
  </label>
    <input class="form-check-input" type="radio" name="rootIssue" id="electricity" value="Electricity">
  <label class="form-check-label me-5" for="Electricity">
    Electricity
  </label>
    <input class="form-check-input" type="radio" name="rootIssue" id="office" value="Office/Others" >
  <label class="form-check-label me-5" for="office">
    Office/Others
  </label>
    <input class="form-check-input" type="radio" name="rootIssue" id="email" value="Email/Virus/Spam" >
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
            for ($i = 1; $i <= $rows; $i++) {
                ?>
                <tr>
                  <td><input type="text" name="old_sparepart" class="form-control" ></td>
                  <td><input type="number" name="old_qty" class="form-control" ></td>
                  <td><input type="text" name="new_sparepart" class="form-control" ></td>
                  <td><input type="number" name="new_qty" class="form-control" ></td>
                  <td><input type="text" name="reason" class="form-control" ></td>
                  <td><input type="number" name="last_stock" class="form-control" ></td>
                </tr>
                <?php
            }
            ?>
          </tbody>
        </table>
      </div>
       <button type="button" id="add-row" class="btn btn-success mb-4">Add Row</button>
       <div class="row text-center">
        <!-- Kolom 1 -->
        <div class="col-md-3">
            <p>PIC</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>Name</p>
            <input type="text" name="pic" class="form mb-4" required >
        </div>
        <div class="col-md-3">
            <p>Approved By</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>Ass/Manager</p>
            <input type="text" name="approvedBy" class="form mb-4" required >
        </div>
        <div class="col-md-3">
            <p>Confirm By</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>User</p>
            <input type="text" name="confirmByUser" class="form mb-4" required > 
        </div>
        <div class="col-md-3">
            <p>Confirm By</p>
            <br><br> <!-- Spasi untuk area tanda tangan -->
            <p>____________________</p>
            <p>Ass/Manager</p>
            <input type="text" name="ConfirmByAssOrManager" class="form mb-4" required >
        </div>
        <button type="submit" name="submit2" class="btn btn-primary mb-3">Submit</button>
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
            url: 'add_row.php',
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