<?php 
require '../function.php';
if (isset($_GET['id'])) {
	if (deleteDataUser($_GET['id']) > 0) {
		header('Location:viewUser.php');
	}else{
		echo "delete gagal";
	}
}else{
	header('Location:viewUser.php');
}



?>