<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "dengerin";

$koneksi = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (mysqli_connect_errno()){
    print "gagal";
}else{
    print " ";
}

?>