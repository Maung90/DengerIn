<?php 
session_start();
if (!isset($_SESSION['role'])) {
			echo "<script>
			alert('Tidak memiliki akses');
			window.location = 'http://localhost/DengerIn/HalamanLogin/Form.php';
			</script>";
}
?>