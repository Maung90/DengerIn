<?php 
require_once '../sessionUser.php';
require '../koneksi.php';
if (!isset($_GET['id'])) {
	header('Location:index.php');
}
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM music WHERE id_music = '$id' ");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Music</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<nav class="navbar bg-dark shadow">
		<div class="container-fluid d-flex justify-content-between">
			<a class="navbar-brand text-white" style="font-family: 'Roboto Slab', serif;font-size: 25px;">DengerIn</a>
			<div class="dropdown-custom">
				<label class="profile">
					<i class="fa-regular fa-circle-user text-white iconn"></i>
				</label>
				<ul class="dropdown-menu-custom">
					<li><a class="dropdown-item-custom" style=" text-decoration: none;color: black;" href="#">
						<i class="fa-regular fa-circle-user"></i>&nbsp; Change Profile</a></li>
						<li><a class="dropdown-item-custom" style=" text-decoration: none;color: black;" href="../logout.php"> 
							<i class="fa-solid fa-right-from-bracket"></i> &nbsp;Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="container-fluid content-custom">
				<div class="row">
					<div class="col-1 bg-dark d-flex justify-content-center" style="height: 110vh;">
						<nav class="nav flex-column sidebar">
							<a class="nav-link" href="http://localhost/DengerIn/HalamanUser/index.php">
								<center>
									<i class="fa-solid fa-house text-white iconn"></i>
								</center>
							</a>
							<a class="nav-link" href="#">
								<i class="fa-solid fa-search iconn" style="color:lightgreen;"></i>
							</a>
							<a class="nav-link" href="#">
								<i class="fa-solid fa-heart text-white iconn"></i>
							</a>

							<!--  -->
							<div class="scroll" id="style-1">
								<a class="nav-link" href="#">
									<i class="fa-solid fa-chart-simple text-white iconn"></i>
								</a>
								<div id="" class="scroll-item">
									<?php 
               // $query = mysqli_query($koneksi,"SELECT * FROM playlist 
               //  INNER JOIN playlist_name ON playlist.id_playlist_name = playlist_name.id_playlist_name WHERE id_user = '$id' ");
               //  while ($data = mysqli_fetch_array($query)) : ?> 
               <a class="list-item" href="#list-item-1">
               	<img src="../cover1.jpg" class="playlist" alt="...">
               </a>
               <?php //endwhile; ?>
              </div> 
             </div>
            </nav>
           </div>

           <div class="col-11" style="background-color: #0c0c0c;">
           	<div class="row m-4" style="height: 60%;">
           		<div class="col-7" style="background-image:url('../dashboardAdmin/template/assets/images/cover-music/<?=$data['poster_lagu']?>');background-repeat: no-repeat;background-size: cover;">
           		</div>
           		<div class="col-5" style="height: 100%;background-color: #202020;">
           			<p style="color:lightgreen;margin: 5px;" align="center">
           				<?=$data['lirik']; ?>
           			</p>
           		</div>
           	</div>
           	<div class="col-12 m-4 d-flex justify-content-center align-items-center">
           		<i class="fa-solid fa-heart text-white" style="font-size:40px"></i>
           		<audio controls style="width:80%;margin:0 10px">
           			<source src="../dashboardAdmin/template/assets/music/<?=$data['judul']; ?>" type="audio/mp3">
           			</audio>
           		<i class="fa-solid fa-square-plus text-white" style="font-size:40px;margin-right:10px ;"></i>
           		</div>
           	</div>
           </div>













           <script>
           	let dropdown = document.querySelector('.dropdown-custom');
           	let menuDropdown = document.querySelector('.dropdown-menu-custom');
           	dropdown.addEventListener('click',function () {
           		menuDropdown.style.display = 'block';
           	});
           	dropdown.addEventListener('dblclick',function () {
           		menuDropdown.style.display = 'none';
           	});
           </script> 
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
          </body>
          </html>