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
}elseif(isset($_GET['delete'])) {
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
else{
	echo "<script>
	alert('Tidak memiliki akses');
	window.location = 'viewPlaylist.php';
	</script>";
}