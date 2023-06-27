<?php
session_start();
include 'Koneksi.php';

$usernames = $_POST['username'];
$password = $_POST['password']; 

$query = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$usernames' AND password = '$password'");

$data = mysqli_num_rows($query);
print_r($data);
$data2 = mysqli_fetch_array($query);
$role = $data2['role'];

if ($data > 0) {
    $_SESSION['id'] = $data2['id_user'];
    $_SESSION['username'] = $usernames;
    $_SESSION['role'] = $role;
    if($role == 'user') {
        header("Location:../HalamanUser/index.php");
    }elseif($role == 'admin'){
        header("Location:../dashboardAdmin/template/index.php");
    }else{
        print "Tidak ada username atau password";
    }
}else{
    header("location:Form.php");
}

?>