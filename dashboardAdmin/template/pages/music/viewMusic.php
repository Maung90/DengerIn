<?php require_once '../../partials/session.php'; ?>
<?php 
require '../function.php';
if (isset($_POST['submit'])) {
	if ( insertDataMusic($_POST,$_FILES) <= 0) {
		echo "insert gagal";
	}
}


?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Music</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="../../assets/css/style2.css"> 
	<link rel="stylesheet" href="../../assets/css/style.css"> 
	<link rel="shortcut icon" href="http://localhost/DengerIn/dashboardAdmin/template/assets/images/icon-mini.png" />

	<link rel="stylesheet" href="../../assets/DataTables/dataTables/css/dataTables.bootstrap5.css">
	<style>
		.form-control:focus{
			color: grey;
		}

	</style>
</head>
<body>
	<div class="container-scroller">
		<?php require_once '../../partials/_sidebar.html'; ?>
		<div class="container-fluid page-body-wrapper">
			<?php require_once '../../partials/_navbar.html'; ?>

			<div class="main-panel">
				<div class="content-wrapper">
					<div class="page-header">
						<h3 class="page-title"> Music </h3>
					</div>
					<div class="row">
						<div class="col-lg-5 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tambah data Music</h4>
									<form class="forms-sample" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="exampleInputName1">Title</label>
											<input  style="color: grey" type="file" name="title" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="title" required>
										</div>
										<div class="form-group">
											<label for="exampleInputName1">Artist</label>
											<input  style="color: grey" type="text" name="artist" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="Artist" required>
										</div>
										<div class="form-group">
											<label for="exampleInputName1">Genre</label>
											<input  style="color: grey" type="text" name="genre" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="Genre" required>
										</div>
										<div class="form-group">
											<label>Cover Music</label>
											<div class="input-group col-xs-12">
												<input  style="color: grey" type="file" name="image" class="form-control" autocomplete="off" placeholder="Upload Image" required>
												<span class="input-group-append">
												</span>
											</div>
										</div>
									<button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
									<button type="reset" class="btn btn-dark">Cancel</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-7 grid-margin stretch-card">
						<div class="card">
							<div class="card-body" >
								<h4 class="card-title">Tabel data</h4>
								<p class="card-description">Tabel data<code>Music</code>
								</p>
								<div class="table-responsive" style="overflow: scroll; scrollbar-width: thin;">
									<table class="table table-hover" id="tabel-data">
										<thead>
											<tr>
												<th>Title</th>
												<th>Artist</th>
												<th>Genre</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$query = mysqli_query($koneksi,"SELECT * FROM music");
											while ($data = mysqli_fetch_array($query)) : ?>
												<tr>
													<td> <?=  str_replace( '.mp3',' ', $data['judul']);?> </td>
													<td><?=$data['penyanyi']  ?> </td>
													<td> <?=$data['genre']  ?></td>
													<td>
														<a class="badge badge-danger" href="deleteMusic.php?id=<?=$data['id_music']?> " style="text-decoration: none;">delete</a>
														<label class="badge badge-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $data['id_music']; ?>" style="cursor: pointer;">
															update
														</label>

														<!-- Modal -->
														<div class="modal fade" id="exampleModal-<?= $data['id_music']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Update data</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">

																		<form class="forms-sample" method="POST" action="updateMusic.php" enctype="multipart/form-data">
																			<input  style="color: grey" type="hidden" name="id" value="<?=$data['id_music']?> ">
																			<div class="form-group">
																				<label for="exampleInputName1">Judul</label>
																				<input  style="color: grey" type="file" name="titleUpdate" class="form-control" id="exampleInputName1" value="<?=$data['judul']  ?>" autocomplete="off" placeholder="Judul Lagu">
																			</div>
																			<div class="form-group">
																				<label for="exampleInputEmail3">Artist</label>
																				<input  style="color: grey" type="text" name="penyanyiUpdate" class="form-control" id="exampleInputEmail3" value="<?=$data['penyanyi']  ?>" autocomplete="off" placeholder="Artist" required>
																			</div>
																			<div class="form-group">
																				<label for="exampleInputPassword4">Genre</label>
																				<input  style="color: grey" type="text" value="<?=$data['genre']  ?>" name="genreUpdate" class="form-control" autocomplete="off" placeholder="Genre Lagu " required>
																			</div>
																			<div class="form-group">
																				<label>Cover Lagu</label>
																				<div class="input-group col-xs-12">
																					<input  style="color: grey" type="file" value="<?=$data['poster_lagu']  ?>" name="imageUpdate" class="form-control file-upload-info" autocomplete="off" placeholder="Upload Image">
																				</div>
																			</div>
																			<div class="form-group">
																				<button type="submit" name="submitUpdate" class="btn btn-primary me-2">Submit</button>
																			</div>
																		</form>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																		</div>
																	</div>
																</div>
															</div>

														</td>
													</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:../../../../partials/_footer.html -->

				<?php require_once '../../partials/_footer.html'; ?>
				<!-- partial -->
			</div>
		</div>
	</div>

	<!-- plugins:js -->
	<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="../../assets/js/off-canvas.js"></script>
	<script src="../../assets/js/hoverable-collapse.js"></script>
	<script src="../../assets/js/misc.js"></script>
	<script src="../../assets/js/settings.js"></script>
	<script src="../../assets/js/todolist.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page -->
	<!-- End custom js for this page -->
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>

	<script src="../../assets/DataTables/dataTables/js/jquery.dataTables.js"></script>
	<script src="../../assets/DataTables/dataTables/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#tabel-data').DataTable();
		});
	</script>
</body>
</html>