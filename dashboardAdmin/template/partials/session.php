<?php 


session_start();
if (!isset($_SESSION['role'])) {
			echo "<script>
			alert('Tidak memiliki akses');
			window.location = 'http://localhost/DengerIn/dashboardAdmin/template/logout.php';
			</script>";
}else{
		if ($_SESSION['role'] != 'admin') {
			echo "<script>
			alert('Tidak memiliki akses');
			window.location = 'http://localhost/DengerIn/HalamanUser/index.html';
			</script>";
		}
}






?>