<!DOCTYPE html>
<html>
<head>
	<title>Export Data</title>
</head>
<body>
 
	<?php
    require ('function.php');
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data.xls");
	?>
 
	<center>
		<h1>Data CWR</h1>
	</center>
 
	<table border="1" style="text-align: center">
		<tr>
			<th>ID</th>
			<th>Request Date</th>
			<th>Request Type</th>
			<th>Asset's Tag No</th>
			<th>User's Issue</th>
		</tr>
		<?php 
		// menampilkan data pegawai
		$data = mysqli_query($conn,"select * from requestor5");
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $d['id'] . "'"?></td>
			<td><?php echo $d['requestDate']; ?></td>
			<td><?php echo $d['requestType']; ?></td>
			<td><?php echo $d['assetTagNo']; ?></td>
			<td><?php echo $d['userIssue']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>