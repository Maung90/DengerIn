<?php 
require '../function.php';
$key = $_GET["key"];



?>









<div class="table-responsive" style="overflow: scroll; scrollbar-width: thin;" id="tabel">
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
			<?php 
			if ($key == '') {			
			// PAGINATION
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

				$query = mysqli_query($koneksi,"SELECT * FROM user WHERE role != 'admin' LIMIT $posisi,$batas ");
			}else{
				// PAGINATION
				$halaman = @$_GET['page'];
				$batas = 4;

				$query2 = mysqli_query($koneksi,"SELECT * FROM user WHERE role = 'user' AND username LIKE '%$key%' OR email LIKE '%$key%' ");
				$jmlData = mysqli_num_rows($query2);
				$jmlHalaman = ceil($jmlData/$batas);

				if (!empty($halaman)) {
					$posisi = ($halaman-1)* $batas;
				}else{
					$posisi =0;
					$halaman = 1;
				}

				$query = mysqli_query($koneksi,"SELECT * FROM user WHERE role != 'admin' AND username LIKE '%$key%' OR email LIKE '%$key%' LIMIT $posisi,$batas ");
			}
			while ($data = mysqli_fetch_array($query)) : 
				if ($data['role'] != 'admin') :
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
														<input type="file" value="<?=$data['image']  ?>" name="imageUpdate" class="form-control file-upload-info" autocomplete="off" placeholder="Upload Image">
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
					<?php endif; endwhile; ?>
				</tbody>
			</table>
		</div>
		<ul class="pagination mt-2">
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
			<?php	} ?>
			<li class="page-item">
				<a class="page-link" href="?page=<?=$halaman+=1;  ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>


		<!-- </nav> -->
	</div>
</div>