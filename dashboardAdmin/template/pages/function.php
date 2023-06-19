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


$selectId = mysqli_query($koneksi,"SELECT max(id_user) FROM user");
$data2 = mysqli_fetch_array($selectId);
$id = $data2["max(id_user)"]+1;

	$target_dir = "../../assets/images/image-user/";
	$target_file =$target_dir.basename($file["image"]["name"]);
	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$imageName = 'image_'.$id.'.'.$filetype;
	$target_image =$target_dir.basename($imageName);
	$sizeFile = $file["image"]["size"];

	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_image)) {
				$query = mysqli_query($koneksi,"INSERT INTO user VALUES 
					('','$username','$password','$email','$imageName','user')");
			}else{
				echo "gagal";
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
function insertDataMusic($data,$file){
	global $koneksi;
	$artist = $data['artist'];
	$genre = $data['genre'];
	$lirik = $data['lirik'];
	$title = $file['title']['name'];
	$image = $file["image"]["name"];

	$target_dir = "../../assets/images/cover-music/";
	$target_file =$target_dir.basename($file["image"]["name"]);
	$sizeFile = $file["image"]["size"];

	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)) {
				$query = mysqli_query($koneksi,"INSERT INTO music VALUES 
					('','$title','$genre','$artist','$image','$lirik')");
			}else{
				echo "galgal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}
	return mysqli_affected_rows($koneksi);
}













