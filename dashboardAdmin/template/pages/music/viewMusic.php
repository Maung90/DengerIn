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
								<input type="text" class="form-control" placeholder="Search products">
							</form>
						</nav>
					</div>
					<div class="row">
						<div class="col-lg-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic form elements</h4>
									<p class="card-description"> Basic form elements </p>
									<form class="forms-sample">
										<div class="form-group">
											<label for="exampleInputName1">Name</label>
											<input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail3">Email address</label>
											<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword4">Password</label>
											<input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
										</div>
										<div class="form-group">
											<label for="exampleSelectGender">Gender</label>
											<select class="form-control" id="exampleSelectGender">
												<option>Male</option>
												<option>Female</option>
											</select>
										</div>
										<div class="form-group">
											<label>File upload</label>
											<div class="input-group col-xs-12">
												<input type="file" class="form-control file-upload-info" placeholder="Upload Image">
												<span class="input-group-append">
												</span>
											</div>
										</div>
										<button type="submit" class="btn btn-primary me-2">Submit</button>
										<button type="reset" class="btn btn-dark">Cancel</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body" >
									<h4 class="card-title">Tabel data</h4>
									<p class="card-description">Tabel data<code>user</code>
									</p>
									<div class="table-responsive" style="overflow: scroll; scrollbar-width: thin;">
										<table class="table table-hover">
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
												
												<tr>
													<td class="py-1">
														<img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
													</td>
													<td>Jacob</td>
													<td>Photoshop</td>
													<td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
													<td>
														<label class="badge badge-danger">delete</label>
														

														<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
															update
														</button>

														<!-- Modal -->
														<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		...
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																		<button type="button" class="btn btn-primary">Save changes</button>
																	</div>
																</div>
															</div>
														</div>

													</td>
												</tr>
											</tbody>
										</table>
									</div>

									<!-- <nav aria-label="..."> -->
										<ul class="pagination">
											<li class="page-item disabled">
												<a class="page-link" href="#" aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item active"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item">
												<a class="page-link" href="#" aria-label="Next">
													<span aria-hidden="true">&raquo;</span>
												</a>
											</li>
										</ul>

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
	</body>
	</html>