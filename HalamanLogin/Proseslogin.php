<?php
session_start();
include 'Koneksi.php';

$usernames = $_POST['username'];
$password = $_POST['password']; 

$query = mysqli_query($koneksi,"SELECT * FROM userd WHERE username = '$usernames' AND password = '$password'");

$data = mysqli_num_rows($query);
print_r($data);
$data2 = mysqli_fetch_array($query);
$role = $data2['role'];

if ($data > 0) {
    $_SESSION['username'] = $usernames;
    if($role == 'user') {
        header("Location:../HalamanUser/index.html");
    }elseif($role == 'admin'){
        print "admin";
    }else{
        print "Tidak ada username atau password";
    }
}else{
    header("location:Form.php");
}

?>