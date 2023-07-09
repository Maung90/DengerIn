<?php 
require_once "../sessionUser.php";
require "../koneksi.php";
$id=$_SESSION["id"];
?>
<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Favorite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../HalamanUser/style.css">
    <link rel="shortcut icon" href="http://localhost/DengerIn/dashboardAdmin/template/assets/images/icon-mini.png">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Karla:wght@300&family=Roboto+Slab&family=Poppins:wght@300&display=swap');
/*      @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');*/
*{
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}
html{
  scrollbar-width: none;
}
.nav-link{
  margin: 10px 0;
  height: 70px;
  width: 70px;
}
/*.nav-link p{
  display: none;
  transition-delay: 1s;

  color: white;
}
.nav-link .iconn:hover ~ p{ 
transition-delay: 5s;
 display: block;

}*/
.iconn{
  font-size: 25px;
}
.card-custom{
  width: 100%;
  background-color: #202020;
  height: 100%;
  padding: 6px;
  border-radius: 0px;
}
.text{
  margin: 5px;
  font-size: 15px;
  font-weight: bold;
  font-family: 'Karla', sans-serif;
  color: white;
}
.text-2{
  margin: 5px;
  color: #c9c9;
}
.button{
  text-decoration: none;
  color: white;
  font-weight: bold;
}
.scroll{
  width: 70px;
}
.scroll-item{
  height: 180px;
  overflow-y: scroll;
  overflow-x: hidden;
  /* scroll-padding: 10px; 
  scrollbar-width: thin; */

}
.scroll-item  ::-webkit-scrollbar {
  width: 10px;
}
.list-item{
  width: 50px;
}
.playlist{
  width: 50px;
  margin: 5px;
  border-radius: 5px;
}

</style>
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
                <i class="fa-solid fa-house text-white iconn"></i>
            </a>
            <a class="nav-link" href="http://localhost/DengerIn/HalamanUser/search.php">
              <i class="fa-solid fa-search text-white iconn"></i>
            </a>
            <a class="nav-link" href="http://localhost/DengerIn/Favoritee/favorite.php">
              <i class="fa-solid fa-heart iconn" style="color:red;"></i>
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
                 <a class="list-item" href="../HalamanUser/library.php?id_playlist=<?=$data['id_playlist_name']?>">
                  <img src="../dashboardAdmin/template/assets/images/cover-playlist/<?=$data['imagePlaylist']?>" class="playlist" alt="...">
                </a>
              <?php endwhile; ?>
            </div> 
          </div>
        </nav>
      </div>

      <div class="col-11" style="background-color: #0c0c0c;">
        <div class="row m-4" style="background-color: #808080;">
        <h2 style="position: relative; top:100px; left:180px">FAVORITE</h2>
        <div class="col-2" style="margin-bottom:20px; border:1px;">
            <div class="card-custom" style="position: relative;">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/800px-Heart_coraz%C3%B3n.svg.png" class="card-img-top" alt="...">
              
            </div>
     </div>
     
</div>
<div class="table-responsive d-flex justify-content-center">
									<table class="table table-hover" id="tabel-data" style="width:96%">
										<thead>
											<tr>
												<th>Title</th>
												<th>Artist</th>
												<th>Genre</th>
                        <th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 

											$query = mysqli_query($koneksi,"SELECT * FROM music INNER JOIN favorit ON favorit.id_music = music.id_music WHERE favorit.id_user = '$id'");
											while ($data = mysqli_fetch_array($query)) : ?>
												<tr>
													<td> <?=  str_replace( '.mp3',' ', $data['judul']);?> </td>
													<td><?=$data['penyanyi']  ?> </td>
													<td> <?=$data['genre']  ?></td>
													<td><a href="../HalamanUser/detailMusic.php?id=<?=$data['id_music']?>"><i class="fa-regular fa-circle-play"></i></a></td>
													</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
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
</body>
</html>