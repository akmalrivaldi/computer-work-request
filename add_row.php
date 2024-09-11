<?php 
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}

$rows = isset($_POST['rows']) ? $_POST['rows'] : 1;
$rows++;
echo '
<tr>
    <td><?php echo $i?></td>
    <td><input type="text" name="old_sparepart" class="form-control"></td>
    <td><input type="number" name="old_qty" class="form-control"></td>
    <td><input type="text" name="new_sparepart" class="form-control"></td>
    <td><input type="number" name="new_qty" class="form-control"></td>
    <td><input type="text" name="reason" class="form-control"></td>
    <td><input type="number" name="last_stock" class="form-control"></td>
</tr>
';

?>