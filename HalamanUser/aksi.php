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
}else{
	echo "<script>
		alert('Tidak Memiliki Akses!');
		document.location = 'search.php';
	</script>";
}
?>