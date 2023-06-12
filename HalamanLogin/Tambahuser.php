<?php
include 'Koneksi.php';

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

mysqli_query($koneksi,"INSERT INTO userd VALUES  ('','$username','$password','$email','profile.img','user')");
header("location:Form.php");
?>