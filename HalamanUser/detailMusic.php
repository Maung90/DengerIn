<?php 
require_once '../sessionUser.php';
require '../koneksi.php';
if (!isset($_GET['id'])) {
	header('Location:index.php');
}
$id = $_GET['id'];
$id_user = $_SESSION['id'];
$query = mysqli_query($koneksi,"SELECT * FROM music WHERE id_music = '$id' ");
$data = mysqli_fetch_array($query);
$rep = array('.mp3','-','_'); 

$query1 = mysqli_query($koneksi,"SELECT * FROM music WHERE id_music != '$id' ORDER BY RAND()");
$randMusic1 = mysqli_fetch_array($query1);

$query2 = mysqli_query($koneksi,"SELECT * FROM music WHERE id_music != '$id' ORDER BY RAND()");
$randMusic2 = mysqli_fetch_array($query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Music</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="music.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<form action="" method="POST">
		<input type="hidden" id="id_music" name="id_music" value="<?=$id?> ">
		<input type="hidden" id="id_user" name="id_user" value="<?=$id_user?> ">
	</form>
	<nav class="navbar bg-dark shadow">
		<div class="container-fluid d-flex justify-content-between">
			<a class="navbar-brand text-white" style="font-family: 'Roboto Slab', serif;font-size: 25px;">DengerIn</a>
			<div class="dropdown-custom">
				<label class="profile">
					<i class="fa-regular fa-circle-user text-white iconn"></i>
				</label>
				<ul class="dropdown-menu-custom">
					<li>
						<a class="dropdown-item-custom" href="../profile/profile.php">
							<i class="fa-regular fa-circle-user"></i>&nbsp; Change Profile
						</a>
					</li>
					<li>
						<a class="dropdown-item-custom" href="../logout.php"> 
							<i class="fa-solid fa-right-from-bracket"></i> &nbsp;Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid content-custom">
		<div class="row">
			<div class="col-1 bg-dark d-flex justify-content-center" style="height: 120vh;">
				<nav class="nav flex-column sidebar">
					<a class="nav-link" href="http://localhost/DengerIn/HalamanUser/index.php">
						<center>
							<i class="fa-solid fa-house text-white iconn"></i>
						</center>
					</a>
					<a class="nav-link" href="http://localhost/DengerIn/HalamanUser/search.php">
						<i class="fa-solid fa-search iconn" style="color:lightgreen;"></i>
					</a>
					<a class="nav-link" href="http://localhost/DengerIn/HalamanUser/index.php">
						<i class="fa-solid fa-heart text-white iconn"></i>
					</a>
					<div class="scroll" id="style-1">
						<a class="nav-link" href="http://localhost/DengerIn/HalamanUser/index.php">
							<i class="fa-solid fa-chart-simple text-white iconn"></i>
						</a>
						<div id="" class="scroll-item">
							<?php 
							$query = mysqli_query($koneksi,"SELECT * FROM playlist_name WHERE id_user = '$id_user' ");
							while ($list = mysqli_fetch_array($query)) :  ?> 
								<a class="list-item" href="#">
									<img src="../dashboardAdmin/template/assets/images/cover-playlist/<?=$list['imagePlaylist']?>" class="playlist" alt="...">
								</a>
							<?php endwhile; ?>
						</div> 
					</div>
				</nav>
			</div>
			<div class="col-11" style="background-color: #0c0c0c;">
				<div class="row m-5" style="height: 100vh;">
					<div class="col-12" style="font-size: 25px;color:lightgrey;line-height: 0px;">

					</div>
					<div class="col-7 " style="margin-top:-60px;height: 70%;background-image:url('../dashboardAdmin/template/assets/images/cover-music/<?=$data['poster_lagu']?>');background-repeat: no-repeat;background-size: cover;">
					</div>
					<div class="col-5" style="margin-top:-60px;height: 70%;background-color: #202020;border-radius: 0 5px;">
						<div style="margin-top: 180px;">
							<p style="color:white;font-size: 35px;font-weight: bolder;" align="center">
								<?= str_replace($rep,' ',$data['judul'])?>
							</p>
							<p style="color:white;font-size: 20px;" align="center">
								<?=$data['penyanyi']?>
							</p>
						</div>
					</div>
					<div class="col-12 d-flex justify-content-center align-items-center" style="border-radius: 0 0 5px 5px;margin-top:-100px;background-color:#202020;height: 110px;">
						<audio controls id="myAudio" style="width:60%;margin:0 10px;">
							<source src="../dashboardAdmin/template/assets/music/<?=$data['judul']; ?>" type="audio/mp3">
							</audio>
							<div class="controls">
								<input type="range" id="seekBar" min="0" max="100" value="0" >
								<?php
								$queryFavorit = mysqli_query($koneksi,"SELECT * FROM favorit WHERE id_music = '$id' AND id_user = '$id_user' ");
								if (mysqli_num_rows($queryFavorit) >= 1): ?>
									<i class="fa-solid fa-heart text-danger" id="deleteButton" style="display:inline;"></i>
									<i class="fa-solid fa-heart text-white" id="insertButton" style="display:none;"></i>
								<?php else: ?>
									<i class="fa-solid fa-heart text-danger" id="deleteButton" style="display:none;"></i>
									<i class="fa-solid fa-heart text-white" id="insertButton" style="display:inline;"></i>
								<?php endif ?>

								<a href="http://localhost/DengerIn/HalamanUser/detailMusic.php?id=<?=$randMusic1['id_music']?>" style="text-decoration: none;">
									<i class="fa-solid fa-backward-step text-white"></i>
								</a>

								<i class="fa-solid fa-play" id="playButton"></i>

								<a href="http://localhost/DengerIn/HalamanUser/detailMusic.php?id=<?=$randMusic2['id_music']?>" style="text-decoration: none;">
									<i class="fa-solid fa-forward-step text-white"></i>
								</a>

								<i class="fa-solid fa-square-plus text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
								<span style="font-size:20px; color: lightgreen; width:50px;" id="currentTimeDisplay">0:00</span>
								<input type="range" id="volumeBar" min="0" max="1" step="0.1" value="1">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal insert ke playlist -->
			<form action="aksi.php" method="POST">
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Playlist</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<input type="hidden" name="id_music" value="<?=$id?> ">
								<input type="hidden" name="id_user" value="<?=$id_user?> ">
								<?php 
								$queryPlaylist = mysqli_query($koneksi,"SELECT * FROM playlist_name WHERE id_user = '$id_user' ");
								while ($list = mysqli_fetch_array($queryPlaylist)) :
									$idplaylist = $list['id_playlist_name'];
									$queryPlaylist1 = mysqli_query($koneksi,"SELECT * FROM playlist WHERE id_user = '$id_user' AND id_music = '$id' AND id_playlist_name = '$idplaylist' ");
									$list1 = mysqli_num_rows($queryPlaylist1);
									if ($list1 >= 1) : ?>
										<input type="radio" class="m-3" value="<?=$list['id_playlist_name'];?>" name="playlistName" readonly disabled><?=$list['playlist_name']  ?>
										<i style="color: red;">(Telah Ada di dalam Playlist)</i><br>
									<?php else : ?>
										<input type="radio" class="m-3" value="<?=$list['id_playlist_name'];?>" name="playlistName"> <?=$list['playlist_name'] ?><br>
									<?php endif;
								endwhile; 	?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal1">Buat Playlist Baru</button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" name="insertMusicPlaylist" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!-- Tutup Modal insert ke playlist -->


			<!-- Modal buat baru playlist -->
			<form action="aksi.php" method="POST" enctype="multipart/form-data">
				<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Buat Playlist</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<input type="hidden" name="id_music" value="<?=$id?> ">
								<input type="hidden" name="id_user" value="<?=$id_user?> ">
								<label for="" class="mt-2">Nama Playlist</label>
								<input type="text" name="namaPlaylist" placeholder="playlist name" class="form-control">
								<label for="" class="mt-2">Cover Playlist</label>
								<input type="file" name="coverPlaylist" class="form-control">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" name="buatPlaylist" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--Tutup Modal buat baru playlist -->
			<script>
				let dropdown = document.querySelector('.dropdown-custom');
				let menuDropdown = document.querySelector('.dropdown-menu-custom');
				dropdown.addEventListener('click',function () {
					menuDropdown.style.display = 'block';
				});
				dropdown.addEventListener('dblclick',function () {
					menuDropdown.style.display = 'none';
				});

				const audioElement = document.getElementById('myAudio');
				const playButton = document.getElementById('playButton');
				const seekBar = document.getElementById('seekBar');
				const volumeBar = document.getElementById('volumeBar');
				const currentTimeDisplay = document.getElementById('currentTimeDisplay');

				playButton.addEventListener('click', () => {
					if (audioElement.paused) {
						audioElement.play();
						playButton.classList.remove('fa-play');
						playButton.classList.add('fa-pause');
					} else {
						audioElement.pause();
						playButton.classList.remove('fa-pause');
						playButton.classList.add('fa-play');
					}
				});

				seekBar.addEventListener('input', () => {
					const seekTime = (audioElement.duration / 100) * seekBar.value;
					audioElement.currentTime = seekTime;
				});

				audioElement.addEventListener('timeupdate', () => {
					const progress = (audioElement.currentTime / audioElement.duration) * 100;
					seekBar.value = progress;
					const currentTime = audioElement.currentTime;
					currentTimeDisplay.textContent = formatTime(currentTime);
				});
				volumeBar.addEventListener('input', () => {
					audioElement.volume = volumeBar.value;
				});

				function formatTime(timeInSeconds) {
					const minutes = Math.floor(timeInSeconds / 60);
					const seconds = Math.floor(timeInSeconds % 60);
					return `${minutes}:${seconds.toString().padStart(2, '0')}`;
				}
			</script>
			<script>
				$(document).ready(function() {
					$('#insertButton').click(function() {
						$('#insertButton').hide();
						$('#deleteButton').show();
    								// Mengambil data dari input atau elemen lain jika diperlukan
						var data = {
      // Properti dan nilai data yang akan disimpan di database
							id_music : $('#id_music').val(),
							id_user : $('#id_user').val()
						};
   												 // Mengirim data ke server menggunakan AJAX
						$.ajax({
											      type: 'POST', // Metode HTTP yang digunakan (misalnya, POST atau GET)
											      url: 'insert.php', // URL endpoint server untuk memproses permintaan
											      data: data, // Data yang akan dikirim ke server
											      success: function(response) {
											        // Penanganan respons dari server setelah permintaan berhasil
											      	console.log(response);
											      },
											      error: function(xhr, status, error) {
											        // Penanganan kesalahan jika permintaan gagal
											      	console.log(xhr.responseText);
											      }
											     });
					});

					$('#deleteButton').click(function() {
						$('#deleteButton').hide();
						$('#insertButton').show();
    								// Mengambil data dari input atau elemen lain jika diperlukan
						var data = {
      // Properti dan nilai data yang akan disimpan di database
							id_music : $('#id_music').val(),
							id_user : $('#id_user').val()
						};
   												 // Mengirim data ke server menggunakan AJAX
						$.ajax({
											      type: 'POST', // Metode HTTP yang digunakan (misalnya, POST atau GET)
											      url: 'delete.php', // URL endpoint server untuk memproses permintaan
											      data: data, // Data yang akan dikirim ke server
											      success: function(response) {
											        // Penanganan respons dari server setelah permintaan berhasil
											      	console.log(response);
											      },
											      error: function(xhr, status, error) {
											        // Penanganan kesalahan jika permintaan gagal
											      	console.log(xhr.responseText);
											      }
											     });
					});



				});
			</script> 
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		</body>
		</html>