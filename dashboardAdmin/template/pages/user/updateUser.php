
<?php 
require '../function.php';
if (isset($_POST['submitUpdate'])) {
	if (updateDataUser($_POST,$_FILES) > 0) {
		header('Location:viewUser.php');
	}else{
		echo "update gagal";
	}
} ?>
</div>