<?php 
require '../function.php';
if (isset($_POST['submitUpdate'])) {
	if (updateMusic($_POST,$_FILES) > 0) {
		header('Location:viewMusic.php');
	}else{
		echo "update gagal";
	}
}else{
	header('Location:viewMusic.php');
}


?>