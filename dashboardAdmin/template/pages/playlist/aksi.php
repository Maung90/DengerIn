<?php 

require '../function.php';

if (isset($_POST['insertPlaylist'])) {
	if (insertPlaylist($_POST,$_FILES)) {
		echo "<script>
		window.location = 'viewPlaylist.php';
		</script>";
	}else{
		echo "<script>
		alert('insert gagal');
		window.location = 'viewPlaylist.php';
		</script>";
	}
}
/* delete playlist */
elseif(isset($_GET['delete'])) {
	if (isset($_GET['id'])) {
		if (deletePlaylist($_GET['id'])) {
			echo "<script>
			alert('delete berhasil');
			window.location = 'viewPlaylist.php';
			</script>";
		}else{
			echo "<script>
			alert('delete gagal');
			window.location = 'viewPlaylist.php';
			</script>";
		}
	}else{	
		echo "<script>
		alert('Tidak memiliki akses');
		window.location = 'viewPlaylist.php';
		</script>";
	}
}
/* Update cover dan nama playlist */
elseif (isset($_POST['updatePlaylist'])) {
	if (updatePlaylist($_POST,$_FILES)) {
		echo "<script>
		window.location = 'viewPlaylist.php';
		</script>";
	}else{
		echo "<script>
		alert('insert gagal');
		window.location = 'viewPlaylist.php';
		</script>";
	}
}
/* Hapus music di playlist */
elseif(isset($_GET['id_music']) AND isset($_GET['id_user']) AND isset($_GET['id_playlist'])) {
	$id_music = $_GET['id_music'];
	$id_user = $_GET['id_user'];
	$id_playlist = $_GET['id_playlist'];
	$query = mysqli_query($koneksi,"DELETE FROM playlist WHERE id_music = '$id_music' AND id_user = '$id_user' AND id_playlist_name = '$id_playlist' ");
	if ($query) {
		echo "<script>
		window.location = 'viewPlaylist.php';
		</script>";
	}else{
		echo "<script>
		alert('delete gagal');
		window.location = 'viewPlaylist.php';
		</script>";
	}
}
/* insert music ke playlist*/
elseif (isset($_POST['insertMusicPlaylist'])) {
	if (insertMusicPlaylist($_POST)) {
		echo "<script>
		window.location = 'viewPlaylist.php';
		</script>";
	}else{
		echo "<script>
		alert('insert gagal');
		window.location = 'viewPlaylist.php';
		</script>";
	}
}

else{
	echo "<script>
	alert('Tidak memiliki akses');
	window.location = 'viewPlaylist.php';
	</script>";
}