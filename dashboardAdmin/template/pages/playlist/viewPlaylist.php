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
	<link rel="shortcut icon" href="http://localhost/DengerIn/dashboardAdmin/template/assets/images/icon-mini.png" /> 
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
						<?php 
						$query = mysqli_query($koneksi,"SELECT * FROM playlist_name  WHERE id_user = '1'");
						while($data = mysqli_fetch_array($query)) : 
							?>
							<div class="col-2" style="margin: 10px;">
								<div class="card" style="width:12rem;height: 350px;">
									<img class="card-img-top" alt="..." style="text-align: center;" src="../../assets/images/cover-playlist/<?=$data['imagePlaylist'];?>">
									<div class="card-body">
										<h5 class="card-title">
											<?=$data['playlist_name'];?>
										</h5>
										<div class="d-flex justify-content-between">
											<label class="badge badge-primary" style="text-decoration:none; margin:1px; cursor: pointer; " data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $data['id_playlist_name']; ?>">Lihat Detail</label>
											<a href="aksi.php?delete=true&id=<?=$data['id_playlist_name'];?>" class="badge badge-danger" onclick="confirm('yakin akan dihapus?');" style="text-decoration:none; margin:1px; ">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="exampleModal-<?= $data['id_playlist_name']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel"><?=$data['playlist_name'];?></h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<?php 
												$queryPlaylist = mysqli_query($koneksi,"SELECT * FROM playlist 
													INNER JOIN playlist_name ON playlist.id_playlist_name = playlist_name.id_playlist_name
													INNER JOIN music ON playlist.id_music = music.id_music
													WHERE playlist.id_user = '1' AND playlist.id_playlist_name =" .$data['id_playlist_name']);
												$i = 0;
												if (mysqli_num_rows($queryPlaylist) > 0)  : ?>
											<table width="100%" class="table table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Judul</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<?php 
													while($dataMusic = mysqli_fetch_array($queryPlaylist)) : 
														$i++;
														?>
														<tr>
															<td><?=$i;?> </td>
															<td><?=$dataMusic['judul']?> </td>
															<td><a href="aksi.php?id_music=<?=$dataMusic['id_music']?>&id_user=<?=$dataMusic['id_user']?>&id_playlist=<?=$dataMusic['id_playlist_name']?>" class="btn btn-danger" onclick="confirm('yakin dihapus?');">hapus</a></td>
														</tr>
													<?php endwhile;
												else :
													echo "Belum ada lagu pada playlist ini ";
												endif; ?>
											</table>
										</div>
										<div class="modal-footer">
											<label  class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate-<?= $data['id_playlist_name']; ?>">Ubah</label>
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInsertMusic-<?= $data['id_playlist_name']; ?>">Tambah Lagu</button>
										</div>
									</div>
								</div>
							</div>

							<!-- modal update judul & cover playlist -->
							<div class="modal fade" id="modalUpdate-<?= $data['id_playlist_name']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel"><?=$data['playlist_name'];?></h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form action="aksi.php" method="POST" enctype="multipart/form-data">
											<div class="modal-body">
												<?php 
												$queryPlaylist = mysqli_query($koneksi,"SELECT * FROM playlist_name 
													WHERE id_playlist_name =" .$data['id_playlist_name']);
												$i = 0;
												$dataMusic = mysqli_fetch_array($queryPlaylist);  ?>
												<input type="hidden" name="id" value="<?=$dataMusic['id_playlist_name']?>">
												<label for="">Nama Playlist</label>
												<input type="text" class="form-control m-2" name="namaPlaylist" value="<?=$dataMusic['playlist_name']?>">
												<label for="">Cover Playlist</label>
												<input type="file" class="form-control m-2" name="coverPlaylist" value="<?=$dataMusic['imagePlaylist']?>">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" name="updatePlaylist">Save changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>


							<!-- modal update judul & cover playlist -->
							<div class="modal fade" id="modalInsertMusic-<?= $data['id_playlist_name']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel"><?=$data['playlist_name'];?></h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form action="aksi.php" method="POST">
											<div class="modal-body">
												<input type="hidden" name="id_playlist_name" value="<?=$dataMusic['id_playlist_name']?>">
												<input type="hidden" name="id_user" value="<?=$dataMusic['id_user']?>">
												<?php 
												$queryMusic = mysqli_query($koneksi,"SELECT * FROM music ");
												while ($dataMusic2 = mysqli_fetch_array($queryMusic)) :
													$queryMusic2 = mysqli_query($koneksi,"SELECT * FROM playlist WHERE id_music =".$dataMusic2['id_music'].
														" AND id_playlist_name =".$dataMusic['id_playlist_name']);
														if (mysqli_num_rows($queryMusic2) < 1) : ?>
															<label for="" class="d-flex justify-content-between"> 
																<?=$dataMusic2['judul']?>
																<input type="checkbox" name="musicPlaylist[]" value="<?=$dataMusic2['id_music']?>">
															</label>
														<?php  endif; endwhile; ?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" name="insertMusicPlaylist">Save changes</button>
													</div>
												</form>
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