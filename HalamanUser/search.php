<?php require_once '../sessionUser.php'; ?>
<?php 
require '../koneksi.php';
$id = $_SESSION['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="http://localhost/DengerIn/dashboardAdmin/template/assets/images/icon-mini.png">
  <!-- <link rel="stylesheet" href="../dashboardAdmin/template/assets/css/style.css"> -->

</head>
<body>
  <nav class="navbar bg-dark shadow">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand text-white" href="../HalamanUser/index.php">
        <img src="http://localhost/DengerIn/dashboardAdmin/template/assets/images/Logo-Dengerin.png" alt="logo" width="150px"/>
      </a>
      <div class="dropdown-custom">
        <label class="profile">
         <i class="fa-regular fa-circle-user text-white iconn"></i>
       </label>
       <ul class="dropdown-menu-custom">
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
        <div class="col-1 bg-dark d-flex justify-content-center" style="height: 120vh;">
          <nav class="nav flex-column sidebar">
            <a class="nav-link" href="http://localhost/DengerIn/HalamanUser/index.php">
              <i class="fa-solid fa-house text-white iconn"></i>
            </a>
            <a class="nav-link" href="http://localhost/DengerIn/HalamanUser/search.php">
              <i class="fa-solid fa-search iconn" style="color:lightgreen;"></i>
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
        <div class="row m-4">
          <div class="col-12 d-flex justify-content-end">
            <form action="">
              <div class="input-box">
                <i class="fa-solid fa-search" style="color:black;"></i>
                <input type="text" id="search" class="search search-box" placeholder="cari playlist, judul atau penyanyi ">
              </div>
            </form>
          </div>
        </div>
        <div class="row m-3"  id="result">
          <div class="col-12" >
            <div class="genre d-flex justify-content-between text-white mb-1">
              <?php 
              $selectGenre = mysqli_query($koneksi,"SELECT genre FROM music ORDER BY RAND()"); 
              $data = mysqli_fetch_array($selectGenre);
              ?>
              <h3><?=$data['genre'];?> </h3>
              <a href="genre.php?genre=<?=$data['genre'];?>" class="button">show all</a>
            </div>
            <div class="row">
              <?php 
              $genre = $data['genre'];
              $genre = mysqli_query($koneksi,"SELECT * FROM music WHERE genre = '$genre' LIMIT 6");
              $rep = array('.mp3','-','_'); 
              while ($data2 = mysqli_fetch_array($genre)) : ?>
                <div class="list col-2">
                  <div class="card-custom">
                    <a href="detailMusic.php?id=<?=$data2['id_music']?>" class="link" style="text-decoration:none;">
                      <img src="../dashboardAdmin/template/assets/images/cover-music/<?=$data2['poster_lagu']?> " class="card-img-top" width="150px" height="150px" alt="...">
                      <p class="text">
                       <?= $data2['penyanyi']  ?> 
                     </p>
                     <p class="text-2" >
                       <?= str_replace($rep,' ',$data2['judul'])?>  
                     </p>
                   </a>
                 </div>
               </div>
             <?php endwhile; ?>
           </div>
         </div>
         <div class="col-12 mt-3">
          <div class="genre d-flex justify-content-between text-white mb-1">
            <h3>Playlist </h3>
            <a href="viewPlaylist.php" class="button">show all</a>
          </div>
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
            //ambil elemen
  var key = document.getElementById('search');
  var result = document.getElementById('result');

  key.addEventListener('keyup',function(){

    var searchValue = key.value.trim();
    if (searchValue !== '') {
            //buat object ajax
      var ajax = new XMLHttpRequest();

      ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
          result.innerHTML = ajax.responseText;
        }
      }
            //eksekusi ajax
      ajax.open('GET','aksiSearch.php?key=' + searchValue ,true);
      ajax.send();
    }
  });
</script>
</body>
</html>