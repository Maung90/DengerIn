<?php 
require '../function.php';
if (isset($_GET['id'])) {
	if (deleteDataMusic($_GET['id']) > 0) {
		header('Location:viewMusic.php');
	}else{
		echo "delete gagal";
	}
}else{
	header('Location:viewMusic.php');
}


?>