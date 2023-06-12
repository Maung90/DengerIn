<?php 

$koneksi = mysqli_connect('localhost','root','','dengerin');
if (!$koneksi) {
	echo "koneksi gagal";
}


function insertDataUser($data){
	global $koneksi;
	$username = $data['username'];
	$password = $data['password'];
	$email = $data['email'];
	$image = $data['image'];

	$query = mysqli_query($koneksi,"INSERT INTO user VALUES 
		('','$username','$password','$email','$image','user')
		");
	return mysqli_affected_rows($koneksi);
}
function updateDataUser($data){
	global $koneksi;
	$id = $data['id'];
	$username = $data['usernameUpdate'];
	$password = $data['passwordUpdate'];
	$email = $data['emailUpdate'];
	$image = $data['imageUpdate'];

	$query = mysqli_query($koneksi,"UPDATE user SET 
		id_user = '$id',
		username = '$username',
		password = '$password',
		email = '$email',
		image = '$image' WHERE id_user = '$id' ");
	return mysqli_affected_rows($koneksi);
}
function deleteDataUser($id){
	global $koneksi;
	$query = mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id'
		");
	return mysqli_affected_rows($koneksi);
}
?>