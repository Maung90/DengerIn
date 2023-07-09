<?php 
require_once '../sessionUser.php';
require '../koneksi.php';

if (isset($_POST['insertMusicPlaylist'])) {
	$idPlaylistName = $_POST['playlistName'];
	$id_user = $_POST['id_user'];
	$id_music = $_POST['id_music'];
	$query = mysqli_query($koneksi,"INSERT INTO playlist VALUES('','$idPlaylistName','$id_music','$id_user')");

	if ($query) {
		header("Location:detailMusic.php?id=$id_music");
	}
}else if(isset($_POST['buatPlaylist'])){
	$id_music = $_POST['id_music'];
	$id = $_POST['id_user'];
	$namaPlaylist = $_POST['namaPlaylist'];
	$coverPlaylist = $_FILES['coverPlaylist']['name'];

	$target_dir = "../dashboardAdmin/template/assets/images/cover-playlist/";
	$target_file =$target_dir.basename($_FILES["coverPlaylist"]["name"]);
	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$imageName = $namaPlaylist.'.'.$filetype;
	$target_image =$target_dir.basename($imageName);
	$sizeFile = $_FILES["coverPlaylist"]["size"];

	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["coverPlaylist"]["tmp_name"],$target_image)) {
				$query = mysqli_query($koneksi,"INSERT INTO playlist_name VALUES 
					('','$id','$namaPlaylist','$imageName')");
				if ($query) {
					header("Location:detailMusic.php?id=$id_music");
				}else{
					echo "<script>
					alert('insert gagal');
					document.location = 'detailMusic.php?id=$id_music';
					</script>";
				}
			}else{
				echo "gagal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}
}else if(isset($_GET['id_music']) && isset($_GET['id_playlist'])) {
	$id_music = $_GET['id_music'];
	$idPlaylistName = $_GET['id_playlist'];
	$id_user = $_SESSION['id'];
	$query = 	mysqli_query($koneksi,"DELETE FROM playlist WHERE id_user = '$id_user' AND id_music = '$id_music' AND id_playlist_name = '$idPlaylistName' ");
	if ($query) {
		header("Location:library.php");
	}else{
		echo "<script>
		alert('Hapus lagu gagal!');
		document.location = 'library.php';
		</script>";
	}

}else{
	echo "<script>
	alert('Tidak Memiliki Akses!');
	document.location = 'search.php';
	</script>";
}
?>