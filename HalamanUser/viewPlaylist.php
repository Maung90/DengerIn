<?php require_once '../sessionUser.php'; ?>
<?php 
require '../koneksi.php';
$id = $_SESSION['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Awal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="http://localhost/DengerIn/dashboardAdmin/template/assets/images/icon-mini.png">
  <link rel="stylesheet" href="../dashboardAdmin/template/assets/DataTables/dataTables/css/dataTables.bootstrap5.css">
  <!-- <link rel="stylesheet" href="../dashboardAdmin/template/assets/css/style.css"> -->
  <style>
    *{
      color: white;
    }
  </style>
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
              <i class="fa-solid fa-house text-white iconn "></i>
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
            <h2 class="text-white mb-5">
             Playlist
           </h2>
           <div class="row">
            <?php 
            $playlist = mysqli_query($koneksi,"SELECT * FROM playlist_name WHERE id_user = '1' LIMIT 6");
            $rep = array('.mp3','-','_'); 
            while ($data2 = mysqli_fetch_array($playlist)) : ?>
              <div class="list col-2">
                <div class="card-custom">
                  <a href="viewLaguPlaylist.php?id=<?=$data2['id_playlist_name']?>" class="link" style="text-decoration:none;">
                    <img src="../dashboardAdmin/template/assets/images/cover-playlist/<?=$data2['imagePlaylist']?> " class="card-img-top" width="150px" height="150px" alt="...">
                    <p class="text">
                     <?= $data2['playlist_name']  ?> 
                   </p>
                   <p class="text-2">
                     <br><br> 
                   </p>
                 </a>
               </div>
             </div>
           <?php endwhile; ?>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="../dashboardAdmin/template/assets/DataTables/dataTables/js/jquery.dataTables.js"></script>
<script src="../dashboardAdmin/template/assets/DataTables/dataTables/js/dataTables.bootstrap5.min.js"></script>
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

<script>
  $(document).ready(function(){
    $('#tabel-data').DataTable();
  });
</script>
</body>
</html>