<?php 
require_once '../sessionUser.php';
require '../koneksi.php';

$id_user = $_SESSION['id'];

$query = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user = '$id_user' ");
$data = mysqli_fetch_array($query);
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Awal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="../HalamanUser/style.css">
</head>
<body>
  <!-- navbar -->
  <nav class="navbar bg-dark shadow">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand text-white" style="font-family: 'Roboto Slab', serif;font-size: 25px;">DengerIn</a>
      <div class="dropdown-custom">
        <label class="profile">
          <i class="fa-regular fa-circle-user text-white iconn"></i>
        </label>
        <ul class="dropdown-menu-custom" style="z-index: 2;">
          <li>
            <a class="dropdown-item-custom" href="profile.php" style="text-decoration:none;color: 0f0f0f;">
              <i class="fa-regular fa-circle-user"></i>&nbsp; Change Profile
            </a>
          </li>
          <li>
            <a class="dropdown-item-custom" href="../logout.php" style="text-decoration:none;color: 0f0f0f;"> 
              <i class="fa-solid fa-right-from-bracket"></i> &nbsp;Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- tutup navbar -->

  <div class="container-fluid content-custom">
    <div class="row">
      <!-- sidebar  -->
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
              $query = mysqli_query($koneksi,"SELECT * FROM playlist_name  WHERE id_user = '$id_user' ");

              while ($list = mysqli_fetch_array($query)) : ?> 
                <a class="list-item" href="#list-item-1">
                  <img src="../cover1.jpg" class="playlist" alt="...">
                </a>
              <?php endwhile; ?>
            </div> 
          </div>
        </nav>
      </div>
      <!-- tutup sidebar -->
      <div class="col-11" style="background-color:grey;">
       <div class="row vh-100" style="position: relative; display:block;">
        <div class="col-12 bg-dark" style="height: 30vh;" ></div>
        <div class="col-12" style="height: 250px; width:250px; position:absolute; top: 12%; right:42%; border-radius:50%; background-image:url('../dashboardAdmin/template/assets/images/image-user/<?=$data['image']?>'); background-size :contain">
          <i class="fa-solid fa-pen-to-square text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer; position:absolute; bottom: 5%; right:15%; font-size:20px;"></i>
        </div>
        <div class="col-12 text-white" style="position:absolute; bottom:15%;">
          <form action="aksi.php" method="POST" style="position:absolute; right:35%;bottom:25%">
            <input type="hidden" name="id" value="<?=$data['id_user']?>">
            <label for="" style="display: block;">Username</label>
            <input type="text" name="username" placeholder="Username" style="width: 450px;" value="<?=$data['username']?>" class="form-control m-2" required>
            <label for="" style="display: block;">Password</label>
            <input type="password" name="password" placeholder="Password" style="width: 450px;" value="<?=$data['password']?>" class="form-control m-2" required>
            <label for="" style="display: block;">Email</label>
            <input type="email" name="email" placeholder="Email" style="width: 450px;" value="<?=$data['email']?>" class="form-control m-2" required>
            <button name="submit" type="submit" class="btn btn-success m-2">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<form action="aksi.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Photo Profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" value="<?=$data['id_user']?>">
            <input class="form-control" type="file" name="image" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="ubahPP" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>

















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
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
</body>
</html>