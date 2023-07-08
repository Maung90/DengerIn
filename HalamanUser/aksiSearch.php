<?php
require_once '../sessionUser.php';
require '../koneksi.php';

if(isset($_GET['key'])){
  $search = $_GET['key'];
  if (!empty(trim($search))) { 
    $result = mysqli_query($koneksi,"SELECT * FROM music WHERE judul LIKE '%$search%' OR penyanyi LIKE '%$search%' ");
    $result2 = mysqli_query($koneksi,"SELECT * FROM `playlist_name` WHERE id_user = 1 AND playlist_name LIKE '%$search%%'");
    $rep = array('.mp3','-','_'); ?>
    <div class="row m-3"  id="result">
      <div class="col-12" >
        <div class="genre d-flex justify-content-between text-white mb-1">
          <h3> Music </h3>
        </div>
        <div class="row">
          <?php 
          if(mysqli_num_rows($result) > 0){ 
            while ($data2 = mysqli_fetch_array($result)) : ?>
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
             <?php 
           endwhile; 
         }else {
          echo "<p class='text-white'>lagu tidak di temukan ... </p>";
        } ?>
      </div>
    </div>
    <div class="col-12">
      <div class="genre d-flex justify-content-between text-white mb-1" >
        <h3>Playlist</h3>
      </div>
      <div class="row">
       <?php 
       if (mysqli_num_rows($result2)) { 
         while ($data2 = mysqli_fetch_array($result2)) : ?>
          <div class="list col-2">
            <div class="card-custom">
              <a href="detailMusic.php?id=<?=$data2['id_playlist_name']?>" class="link" style="text-decoration:none;">
                <img src="../dashboardAdmin/template/assets/images/cover-music/<?=$data2['playlist_name']?> " class="card-img-top" width="150px" height="150px" alt="...">
                <p class="text">
                 <?= $data2['playlist_name']  ?> 
               </p>
               <p class="text-2" >
                 <?= str_replace($rep,' ',$data2['playlist_name'])?>  
               </p>
             </a>
           </div>
         </div>
         <?php 
       endwhile; 
     }else{
      echo "<p class='text-white'> playlist tidak ditemukan ... </p>";
    }?>
  </div>
</div> 
</div> 
<?php }else{ 
  $selectGenre = mysqli_query($koneksi,"SELECT genre FROM music ORDER BY RAND()"); 
  $data = mysqli_fetch_array($selectGenre);
  ?>
  <div class="row m-3"  id="result">
    <div class="col-12" >
      <div class="genre d-flex justify-content-between text-white mb-1">
        <h3><?=$data['genre'];?> </h3>
        <a href="#" class="button">show all</a>
      </div>
      <div class="row">

        <?php 
        $genre = $data['genre'];
        $genre = mysqli_query($koneksi,"SELECT * FROM music WHERE genre = '$genre' ");
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
   <div class="col-12">
    <div class="genre d-flex justify-content-between text-white mb-1" >
      <h3>Mood</h3>
      <a href="#" class="button">show all</a>
    </div>
    <div class="row">
      <div class="col-2">
        <div class="card-custom">
          <a href="#" style="text-decoration:none">
            <img src="../cover1.jpg" class="card-img-top" alt="...">
            <p class="text">
              Slamet Anjay
            </p>
            <p class="text-2">
              Lorem ipsum dolor sit 
            </p>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
}
}
?>


