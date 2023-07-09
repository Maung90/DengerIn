<?php require_once '../sessionUser.php'; ?>
<?php 
require '../koneksi.php';
$id = $_SESSION['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="http://localhost/DengerIn/dashboardAdmin/template/assets/images/icon-mini.png">
  <!-- <link rel="stylesheet" href="../dashboardAdmin/template/assets/css/style.css"> -->

</head>
<body>
  <nav class="navbar bg-dark shadow">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand text-white" href="index.php">
      <img src="http://localhost/DengerIn/dashboardAdmin/template/assets/images/Logo-Dengerin.png" alt="logo" width="150px"/>
      </a>
      <div class="dropdown-custom">
        <label class="profile">
         <i class="fa-regular fa-circle-user text-white iconn"></i>
       </label>
       <ul class="dropdown-menu-custom" style="z-index: 2">
        <li><a class="dropdown-item-custom" style=" text-decoration: none;color: black;" href="../profile/profile.php">
          <i class="fa-regular fa-circle-user"></i>&nbsp; Change Profile</a></li>
          <li><a class="dropdown-item-custom" style=" text-decoration: none;color: black;" href="../logout.php"> 
            <i class="fa-solid fa-right-from-bracket"></i> &nbsp;Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid content-custom">
      <div class="row">
        <div class="col-1 bg-dark d-flex justify-content-center" style="height: 90vh;">
          <nav class="nav flex-column sidebar">
            <a class="nav-link" href="http://localhost/DengerIn/HalamanUser/index.php">
                <i class="fa-solid fa-house iconn" style="color:lightgreen;"></i>
            </a>
            <a class="nav-link" href="http://localhost/DengerIn/HalamanUser/search.php">
              <i class="fa-solid fa-search text-white iconn"></i>
            </a>
            <a class="nav-link" href="http://localhost/DengerIn/Favoritee/favorite.php">
              <i class="fa-solid fa-heart text-white iconn"></i>
            </a>
            <div class="scroll" id="style-1">
              <a class="nav-link" href="http://localhost/DengerIn/HalamanUser/library.php">
                <i class="fa-solid fa-chart-simple text-white iconn"></i>
              </a>
              <div id="" class="scroll-item">
               <?php 
               $query = mysqli_query($koneksi,"SELECT * FROM playlist_name 
                WHERE id_user = '$id' ");
                while ($data = mysqli_fetch_array($query)) : ?> 
                 <a class="list-item" href="library.php?id_playlist=<?=$data['id_playlist_name']?>">
                  <img src="../dashboardAdmin/template/assets/images/cover-playlist/<?=$data['imagePlaylist']?>" class="playlist" alt="...">
                </a>
              <?php endwhile; ?>
            </div> 
          </div>
        </nav>
      </div>

      <div class="col-11" style="background-color: #0c0c0c;">
        <div class="row m-3">
        <div class="col-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="width: 100%; height: 100%;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 300px;">
            <img src="caro1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" style="height: 300px;">
            <img src="caro22.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" style="height: 300px;">
            <img src="caro333.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      </div>
      <div class="col-12">
        <div class="row m-3 d-flex justify-content-center mt-4" style="height: 200px;">
        <div class="col-3">
          <div class="card w-100 h-100">
           <a class="w-100 h-100" href="#">
            <img src="p_local.png" class="h-100 w-100 rounded"> 
           </a>
          </div>
        </div>
        <div class="col-6">
          <div class="card h-100" style="width: 100%">
           <a class="w-100 h-100" href="#">
            <img src="p_dengerin1.png" class="h-100 w-100 rounded"> 
           </a>
          </div>
        </div>
        <div class="col-3">
          <div class="card w-100 h-100">
           <a class="w-100 h-100" href="#">
            <img src="p_tiktok.png" class="h-100 w-100 rounded"> 
           </a>
          </div>
        </div>
        </div>
      </div>  
      </div>
</div>

  <script>
  // Inisialisasi carousel
    var myCarousel = document.querySelector('#carouselExampleIndicators');
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 3000, // Waktu per ganti slide dalam milidetik (misal: 3000 = 3 detik)
      wrap: true // Berganti ke slide pertama setelah mencapai slide terakhir
  });
  </script>

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
  </script>
</body>
</html>