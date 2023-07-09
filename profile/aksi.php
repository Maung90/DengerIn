<<<<<<< HEAD
<?php 
require_once '../sessionUser.php';
require '../koneksi.php';

/* Update Data */
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	$query = mysqli_query($koneksi,"UPDATE user SET 
		username = '$username',
		password = '$password',
		email = '$email'
		WHERE id_user = '$id' ");
	if ($query) {
		header("Location:profile.php");
	}else{
		echo "<p style='color:red; font-size:35px;' align='center' > Error 502 </p>";
	}
}
/* Update Gambar */
elseif(isset($_POST['ubahPP'])){
	$id = $_POST['id'];
	$image = $_FILES["image"]["name"];

	$target_dir = "../dashboardAdmin/template/assets/images/image-user/";
	$target_file =$target_dir.basename($_FILES["image"]["name"]);
	$sizeFile = $_FILES["image"]["size"];

	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)) {
				$query = mysqli_query($koneksi,"UPDATE user SET 
					image = '$image' WHERE id_user = '$id' ");
					header('Location:profile.php');
			}else{
				echo "gagal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}

} else{
	echo "<script> 
	alert('Tidak Punya Akses !');
	document.location = 'profile.php';
	</script>";
=======
<?php 
require_once '../sessionUser.php';
require '../koneksi.php';

/* Update Data */
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	$query = mysqli_query($koneksi,"UPDATE user SET 
		username = '$username',
		password = '$password',
		email = '$email'
		WHERE id_user = '$id' ");
	if ($query) {
		header("Location:profile.php");
	}else{
		echo "<p style='color:red; font-size:35px;' align='center' > Error 502 </p>";
	}
}
/* Update Gambar */
elseif(isset($_POST['ubahPP'])){
	$id = $_POST['id'];
	$image = $_FILES["image"]["name"];

	$target_dir = "../dashboardAdmin/template/assets/images/image-user/";
	$target_file =$target_dir.basename($_FILES["image"]["name"]);
	$sizeFile = $_FILES["image"]["size"];

	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)) {
				$query = mysqli_query($koneksi,"UPDATE user SET 
					image = '$image' WHERE id_user = '$id' ");
					header('Location:profile.php');
			}else{
				echo "gagal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}

} else{
	echo "<script> 
	alert('Tidak Punya Akses !');
	document.location = 'profile.php';
	</script>";
>>>>>>> efd2f3d2e959609ab85a6ecb24aa0ec85783481b
}