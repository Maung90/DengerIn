<?php require_once '../../partials/session.php'; ?>
<?php
	require '../function.php';
	$id = $_SESSION['id'];
	$select = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user = '$id' ");

$r = mysqli_fetch_array($select);
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Playlist</title>
	<link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css"> 
	<link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css"> 
	<link rel="stylesheet" href="../../assets/css/style.css">
	<link rel="stylesheet" href="../../assets/css/style2.css"> 
	<link rel="shortcut icon" href="../../assets/images/favicon.png" /> 
</head>
<body>
	<div class="container-scroller">
		<?php require_once '../../partials/_sidebar.html'; ?>
		<div class="container-fluid page-body-wrapper">
			<?php require_once '../../partials/_navbar.html'; ?>

			<div class="main-panel">
				<div class="content-wrapper">
					<div class="page-header">
						<h3 class="page-title"> Playlist </h3>	
						<nav aria-label="breadcrumb">
							<label class="badge badge-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="cursor: pointer;">+ Tambah Playlist</label> 
							<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Buat Playlist Baru</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body"> 
											<form class="forms-sample" method="POST" action="aksi.php" enctype="multipart/form-data">
												<input type="hidden" name="id"	value="<?=$r['id_user']?>">
												<div class="form-group">
													<label for="exampleInputName1">Nama Playlist</label>
													<input type="text" name="namaPlaylist" class="form-control" required id="exampleInputName1" autocomplete="off" placeholder="Nama Playlist" style="color: cccfff;">
												</div>
												<div class="form-group">
													<label for="exampleInputName2">Sampul Playlist</label>
													<div class="input-group col-xs-12">
														<input type="file" name="cover" class="form-control" required autocomplete="off" id="exampleInputName2" placeholder="Upload Image" style="color: cccfff;">
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" name="insertPlaylist" class="btn btn-primary me-2">Submit</button>
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</nav>
					</div>		
					<div class="row">
						<div class="col-12 mb-3">
							<form action="" method="POST">
								<input type="text" class="p-2 text-lightgrey" style="border:none;width: 30%;background-color: #191c24; color:#f0f0f0; font-size: 15px;" placeholder="&nbsp;search playlist. . .">
							</form>
						</div>
						<?php 
						$query = mysqli_query($koneksi,"SELECT * FROM playlist_name WHERE id_user = '1' ");
						while($data = mysqli_fetch_array($query)) : 
							?>
						<div class="col-lg-3 mt-2">
							<div class="card">
								<img class="card-img-top" alt="..." style="text-align: center;" src="../../assets/images/cover-playlist/<?=$data['imagePlaylist'];?>">
								<div class="card-body">
									<h5 class="card-title">
										<?=$data['playlist_name'];?>
									</h5>
									<div class="d-flex justify-content-between">
										<a href="#" class="btn btn-primary">Lihat Detail</a>
										<a href="aksi.php?delete=true&id=<?=$data['id_playlist_name'];?>" class="btn btn-danger" onclick="confirm('yakin akan dihapus?');">Hapus</a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
				<?php require_once '../../partials/_footer.html'; ?> 
			</div> 
		</div>
	</div>



















 
	<script src="../../assets/vendors/js/vendor.bundle.base.js"></script> 
	<script src="../../assets/js/off-canvas.js"></script> 
	<script src="../../assets/js/hoverable-collapse.js"></script>
	<script src="../../assets/js/misc.js"></script>
	<script src="../../assets/js/settings.js"></script>
	<script src="../../assets/js/todolist.js"></script> 
</body> 
</html>