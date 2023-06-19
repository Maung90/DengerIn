<?php 
require '../function.php';
if (isset($_POST['submit'])) {
	if ( insertDataUser($_POST,$_FILES) <= 0) {
		echo "insert gagal";
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman user</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="../../assets/css/style.css">
	<link rel="stylesheet" href="../../assets/css/style2.css">
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
						<h3 class="page-title"> User </h3>
						<nav aria-label="breadcrumb">
							<form class="breadcrumb-item d-none d-lg-flex search">
								<input type="text" class="form-control" id="key" placeholder="Search username or email">
							</form>
						</nav>
					</div>
					<div class="row">
						<div class="col-lg-5 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tambah data user</h4>
									<form class="forms-sample" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="exampleInputName1">username</label>
											<input type="text" name="username" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="Username" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail3">Email address</label>
											<input type="email" name="email" class="form-control" id="exampleInputEmail3" autocomplete="off" placeholder="Email" required>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword4">Password</label>
											<input type="password" name="password" class="form-control" id="exampleInputPassword4" autocomplete="off" placeholder="Password" required>
										</div>
										<div class="form-group">
											<label>File upload</label>
											<div class="input-group col-xs-12">
												<input type="file" name="image" class="form-control" autocomplete="off" placeholder="Upload Image" required>
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
						<div class="col-lg-7 grid-margin stretch-card" >
							<div class="card">
								<div class="card-body" >
									<h4 class="card-title">Tabel data</h4>
									<p class="card-description">Tabel data<code>user</code>
									</p>
									<div class="table-responsive" style="overflow: scroll; scrollbar-width: thin;" id="tabel">
										<table class="table table-hover" >
											<thead>
												<tr>
													<th>Image</th>
													<th>Username</th>
													<th>Password</th>
													<th>Email</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<!-- PAGINATION -->
												<?php 
												$halaman = @$_GET['page'];
												$batas = 4;
												$query2 = mysqli_query($koneksi,"SELECT * FROM user WHERE role = 'user'");
												$jmlData = mysqli_num_rows($query2);
												$jmlHalaman = ceil($jmlData/$batas);

												if (!empty($halaman)) {
													$posisi = ($halaman-1)* $batas;
												}else{
													$posisi =0;
													$halaman = 1;
												}

												$query = mysqli_query($koneksi,"SELECT * FROM user WHERE role = 'user' LIMIT $posisi, $batas");
												while ($data = mysqli_fetch_array($query)) :

													?>
													<tr>
														<td class="py-1">
															<img src="../../assets/images/image-user/<?=$data['image']?> " alt="image" />
														</td>
														<td> <?=$data['username']  ?> </td>
														<td><?=$data['password']  ?> </td>
														<td> <?=$data['email']  ?></td>
														<td>
															<a class="badge badge-danger" href="delete.php?id=<?=$data['id_user']?> " style="text-decoration: none;">delete</a>
															<label class="badge badge-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $data['id_user']; ?>" style="cursor: pointer;">
																update
															</label>

															<!-- Modal -->
															<div class="modal fade" id="exampleModal-<?= $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Update data</h1>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			
																			<form class="forms-sample" method="POST" action="updateUser.php" enctype="multipart/form-data">
																				<input type="hidden" name="id" value="<?=$data['id_user']?> ">
																				<div class="form-group">
																					<label for="exampleInputName1">username</label>
																					<input type="text" name="usernameUpdate" class="form-control" id="exampleInputName1" value="<?=$data['username']  ?>" autocomplete="off" placeholder="Username">
																				</div>
																				<div class="form-group">
																					<label for="exampleInputEmail3">Email address</label>
																					<input type="email" name="emailUpdate" class="form-control" id="exampleInputEmail3" value="<?=$data['email']  ?>" autocomplete="off" placeholder="Email">
																				</div>
																				<div class="form-group">
																					<label for="exampleInputPassword4">Password</label>
																					<input type="password" value="<?=$data['password']  ?>" name="passwordUpdate" class="form-control" id="exampleInputPassword4" autocomplete="off" placeholder="Password">
																				</div>
																				<div class="form-group">
																					<label>Upload Image</label>
																					<div class="input-group col-xs-12">
																						<input type="file" value="<?=$data['image']  ?>" name="imageUpdate" class="form-control" autocomplete="off" placeholder="Upload Image">
																						<!-- <span class="input-group-append">
																						</span> -->
																					</div>
																				</div>
																				<div class="form-group">
																					<button type="submit" name="submitUpdate" class="btn btn-primary me-2">Submit</button>
																				</div>
																			</form>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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

										<ul class="pagination mt-2" id="pag">
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
											for ($i=1; $i <= $jmlHalaman; $i++) { 
												// if ($i == $halaman) { ?>
													<li class="page-item"><a class="page-link" href="?page=<?=$i  ?> "><?=$i  ?></a></li>
													<?php /*}*/
												// else{
													?>
													<!-- <li class="page-item "><a class="page-link text-white bg-primary"> <?=$i;?> </a></li> -->
													<?php	
												}
												?>

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
				var page = document.getElementById('pag');
				key.addEventListener('keyup',function(){
					page.style.display = 'none';
            //buat object ajax
					var ajax = new XMLHttpRequest();

					ajax.onreadystatechange = function(){
						if(ajax.readyState == 4 && ajax.status == 200){
							tabel.innerHTML = ajax.responseText;
						}
					}
            //eksekusi ajax
					ajax.open('GET','tabelUser.php?key=' + key.value ,true);
					ajax.send();
				});
			</script>
		</body>
		</html>