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
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="../../assets/css/style2.css">
	<link rel="stylesheet" href="../../assets/css/style.css">
	<!-- End layout styles -->
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
						<h3 class="page-title"> Music </h3>
						<nav aria-label="breadcrumb">
							<form class="breadcrumb-item d-none d-lg-flex search">
								<input type="text" class="form-control" id="key" placeholder="Search by title">
							</form>
						</nav>
					</div>
					<div class="row">
						<div class="col-lg-5 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tambah data Music</h4>
									<form class="forms-sample" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="exampleInputName1">Title</label>
											<input type="file" name="title" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="title" required>
										</div>
										<div class="form-group">
											<label for="exampleInputName1">Artist</label>
											<input type="text" name="artist" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="Artist" required>
										</div>
										<div class="form-group">
											<label for="exampleInputName1">Genre</label>
											<input type="text" name="genre" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="Genre" required>
										</div>
										<div class="form-group">
											<label>Cover Music</label>
											<div class="input-group col-xs-12">
												<input type="file" name="image" class="form-control" autocomplete="off" placeholder="Upload Image" required>
												<span class="input-group-append">
												</span>
											</div>
										</div>
										<div class="form-group">
											<label>Lirik</label>
											<div class="input-group col-xs-12">
												<textarea name="lirik" class="form-control" cols="30" rows="10" placeholder="Lirik"></textarea>
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
									<table class="table table-hover" id="tabel">
										<thead>
											<tr>
												<th>Title</th>
												<th>Artist</th>
												<th>Genre</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<!-- PAGINATION -->
											<?php 
											$halaman = @$_GET['page'];
											$batas = 4;

											$query2 = mysqli_query($koneksi,"SELECT * FROM music ");
											$jmlData = mysqli_num_rows($query2);
											$jmlHalaman = ceil($jmlData/$batas);

											if (!empty($halaman)) {
												$posisi = ($halaman-1)* $batas;
											}else{
												$posisi =0;
												$halaman = 1;
											}

											$query = mysqli_query($koneksi,"SELECT * FROM music LIMIT $posisi, $batas");
											while ($data = mysqli_fetch_array($query)) :?>
												<tr>
													<td> <?=$data['judul']  ?> </td>
													<td><?=$data['penyanyi']  ?> </td>
													<td> <?=$data['genre']  ?></td>
													<td>
														<a class="badge badge-danger" href="delete.php?id=<?=$data['id_music']?> " style="text-decoration: none;">delete</a>
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

																		<form class="forms-sample" method="POST" action="updateUser.php" enctype="multipart/form-data">
																			<input type="hidden" name="id" value="<?=$data['id_music']?> ">
																			<div class="form-group">
																				<label for="exampleInputName1">title</label>
																				<input type="text" name="titleUpdate" class="form-control" id="exampleInputName1" value="<?=$data['judul']  ?>" autocomplete="off" placeholder="Username">
																			</div>
																			<div class="form-group">
																				<label for="exampleInputEmail3">Artist</label>
																				<input type="email" name="penyanyiUpdate" class="form-control" id="exampleInputEmail3" value="<?=$data['penyanyi']  ?>" autocomplete="off" placeholder="Email">
																			</div>
																			<div class="form-group">
																				<label for="exampleInputPassword4">Genre</label>
																				<input type="password" value="<?=$data['genre']  ?>" name="genreUpdate" class="form-control" id="exampleInputPassword4" autocomplete="off" placeholder="Password">
																			</div>
																			<div class="form-group">
																				<label>Cover Lagu</label>
																				<div class="input-group col-xs-12">
																					<input type="file" value="<?=$data['image']  ?>" name="imageUpdate" class="form-control file-upload-info" autocomplete="off" placeholder="Upload Image">
																				</div>
																			</div>
																			<div class="form-group">
																				<label>Lirik Lagu</label>
																				<textarea name="lirikUpdate" class="form-control" cols="30" rows="10"><?=$data['lirik']   ?> </textarea>
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

									<ul class="pagination mt-2" id="page">
										<?php if ($halaman <=1) : ?>
											<li class="page-item">
												<a class="page-link" aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
										<?php else : ?>
											<li class="page-item">
												<a class="page-link" href="?page=<?=$halaman-=1;   ?> " aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
										<?php endif; ?>
										<?php 
										for ($i=1; $i <= $jmlHalaman; $i++) { ?>
											<li class="page-item"><a class="page-link" href="?page=<?=$i  ?> "><?=$i  ?></a></li>
										<?php 	} ?>

										<li class="page-item">
											<a class="page-link" href="?page=<?=$halaman+=1;  ?>" aria-label="Next">
												<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
									</ul>
									<!-- TUTUP PAGINATION -->



									<!-- </nav> -->
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
















	<!-- container-scroller -->
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
	<script>
            //ambil elemen
		var key = document.getElementById('key');
		var tabel = document.getElementById('tabel');
		var page = document.getElementById('page');

		key.addEventListener('keyup',function(){
			page.style.display='none';

            //buat object ajax
			var ajax = new XMLHttpRequest();

			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					tabel.innerHTML = ajax.responseText;
				}
			}
            //eksekusi ajax
			ajax.open('GET','tabelMusic.php?key=' + key.value ,true);
			ajax.send();
		});
	</script>
</body>
</html>