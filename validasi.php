<html>
<head>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<?php
	// Create database connection using config file
	include_once("sambung.php");
	// Fetch all users data from database
	$result = mysqli_query($con, "SELECT * FROM peserta ");
	?>
	<?php
	// define variables and set to empty values
	$namaErr = $emailErr = $websiteErr = $komentarErr = "";
	$nama = $email = $website =$komentar = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["nama"])) {
			$namaErr = "Nama harus diisi";
		}else {
			$nama = test_input($_POST["nama"]);
		}
		if (empty($_POST["email"])) {
			$emailErr = "Email harus diisi";
		}else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Email tidak sesuai format"; 
			}
		}
		if (empty($_POST["website"])) {
			$website = "";
		}else {
			$website = test_input($_POST["website"]);
		}
		if (empty($_POST["komentar"])) {
			$komentar = "";
		}else {
			$komentar = test_input($_POST["komentar"]);
		}
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>
	<h2>Posting Komentar </h2>
	<p><span class = "error">* Harus Diisi.</span></p>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			<tr>
				<td>Nama:</td>
				<td><input type = "text" name = "nama">
					<span class = "error">* <?php echo $namaErr;?></span>
				</td>
			</tr>
				<tr>
					<td>E-mail: </td>
					<td><input type = "text" name = "email">
						<span class = "error">* <?php echo $emailErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Website:</td>
					<td> <input type = "text" name = "website">
						<span class = "error"><?php echo $websiteErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Komentar:</td>
					<td> <textarea name = "komentar" rows = "5" cols = "40"></textarea></td>
				</tr>
				<td>
					<input type = "submit" name = "submit" value = "Submit"> 
				</td>
			</table>
		</form>
		<?php
		echo "<h2>Data yang anda isi:</h2>";
		echo $nama;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $website;
		echo "<br>";
		echo $komentar;
		echo "<br>";
		?>
		<?php
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$website = $_POST['website'];
		$komentar = $_POST['komentar'];
		// include database connection file
		include_once("sambung.php");
		// Insert user data into table
		$result = mysqli_query($con, "INSERT INTO peserta(nama,email,website,komentar) VALUES('$nama', '$email','$website','$komentar')");
			// Show message when user added
		echo "Data berhasil disimpan. <a href='index2.php'>View Users</a>";
	}
	?>
	</body>
	</html>
