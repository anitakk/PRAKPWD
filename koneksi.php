<?php

// deklarasi varieabel agar terhubung ke databse
$host = "localhost";
$username = "root";
$password = "";
$databasename = "akademik";

// membuat koneksi
$con = @mysqli_connect($host, $username, $password, $databasename);
// untuk mengecek koneksi
if (!$con) {
    echo "Error: " . mysqli_conncect_error();
    exit();
}
?>