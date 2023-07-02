<?php
require_once '../sessionUser.php';
require '../koneksi.php';

$output = '';
if(isset($_GET['key'])){
    $search = $_GET['key'];
    if ($search === '') {
        echo $output;
    }else{  
        $result = mysqli_query($koneksi,"SELECT * FROM music WHERE judul LIKE '%$search%'");
        $result2 = mysqli_query($koneksi,"SELECT * FROM playlist_name WHERE id_user = 1 AND playlist_name LIKE '%$search%'");
        $rep = array('.mp3','-','_'); 
        if(mysqli_num_rows($result) > 0){ ?>
            <div class="row" id="result">
                <?php 
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
       <?php endwhile; 
   }else{
     echo $output .= '<p class="text-white">Music yang dicari tidak ditemukan</p>';
 }?>
</div>
<div class="row" id="result">
    <?php 
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
<?php endwhile; ?>
</div>
<?php 
}
}
?>
