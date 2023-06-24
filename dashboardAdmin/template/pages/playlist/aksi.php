<?php 

require '../function.php';

if (isset($_POST['insertPlaylist'])) {
	$namaPlaylist = $_POST['namaPlaylist'];
	$imagePlaylist = $_POST['imagePlaylist'];
	$query = mysqli_query($koneksi,"INSERT INTO playlistN")
}
else{
			echo "<script>
			alert('Tidak memiliki akses');
		window.location = 'viewPlaylist.php';
			</script>";
}