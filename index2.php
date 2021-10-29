<?php
// Create database connection using config file
	include_once("sambung.php");
// Fetch all users data from database
	$result = mysqli_query($con, "SELECT * FROM peserta ");
?>
	<html>
	<head> 
 	<title>Halaman Utama</title>
	</head>
	<body>
		<a href="validasi.php">Tambah Data Baru</a><br/><br/>
 		<table width='80%' border=1>
 		<tr>
 		<th>Nama</th> <th>Email</th><th>website</th> 
 		<th>komentar</th> <th>Update</th>
 		</tr>
	<?php 
		while($user_data = mysqli_fetch_array($result)) { 
			echo "<tr>";
			echo "<td>".$user_data['nama']."</td>";
			echo "<td>".$user_data['email']."</td>";
			echo "<td>".$user_data['website']."</td>"; 
			echo "<td>".$user_data['komentar']."</td>";
		} 
		?>
	</table>
</body>
</html>