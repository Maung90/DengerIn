<?php 

$koneksi = mysqli_connect('localhost','root','','dengerin');
if (!$koneksi) {
	echo "koneksi gagal";
}

/* ------------------- USER --------------------- */
function insertDataUser($data,$file){
	global $koneksi;
	$username = $data['username'];
	$password = $data['password'];
	$email = $data['email'];
	$image = $file["image"]["name"];

	$target_dir = "../../assets/images/image-user/";
	$target_file =$target_dir.basename($file["image"]["name"]);
	$sizeFile = $file["image"]["size"];

	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)) {
				$query = mysqli_query($koneksi,"INSERT INTO user VALUES 
					('','$username','$password','$email','$image','user')");
			}else{
				echo "galgal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}
	return mysqli_affected_rows($koneksi);
}
function updateDataUser($data,$file){
	global $koneksi;
	$id = $data['id'];
	$username = $data['usernameUpdate'];
	$password = $data['passwordUpdate'];
	$email = $data['emailUpdate'];
	$image = $file["imageUpdate"]["name"];

	$target_dir = "../../assets/images/image-user/";
	$target_file =$target_dir.basename($file["imageUpdate"]["name"]);
	$sizeFile = $file["imageUpdate"]["size"];

	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["imageUpdate"]["tmp_name"],$target_file)) {
				$query = mysqli_query($koneksi,"UPDATE user SET 
					id_user = '$id',
					username = '$username',
					password = '$password',
					email = '$email',
					image = '$image' WHERE id_user = '$id' ");
			}else{
				echo "galgal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}
	return mysqli_affected_rows($koneksi);
}
function deleteDataUser($id){
	global $koneksi;
	$query = mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id' ");
	return mysqli_affected_rows($koneksi);
}

/* ------------------- MUSIC --------------------- */
function deleteDataMusic($id){
	global $koneksi;
	$query = mysqli_query($koneksi,"DELETE FROM music WHERE id_music = '$id' ");
	return mysqli_affected_rows($koneksi);
}
?>