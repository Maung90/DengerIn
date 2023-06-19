<?php 
require '../function.php';
$key = $_GET["key"];



?>

<div class="table-responsive" style="overflow: scroll; scrollbar-width: thin;">
 <table class="table table-hover" id="tabel">
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
   $halaman = @$_GET['page'];
   $batas = 4;

   $query2 = mysqli_query($koneksi,"SELECT * FROM music WHERE
    judul LIKE '%$key%' OR 
    penyanyi LIKE '%$key%' OR 
    genre LIKE '%$key%' ");
   $jmlData = mysqli_num_rows($query2);
   $jmlHalaman = ceil($jmlData/$batas);

   if (!empty($halaman)) {
    $posisi = ($halaman-1)* $batas;
   }else{
    $posisi =0;
    $halaman = 1;
   }
   $query = mysqli_query($koneksi,"SELECT * FROM music WHERE
    judul LIKE '%$key%' OR 
    penyanyi LIKE '%$key%' OR 
    genre LIKE '%$key%' LIMIT $posisi,$batas");
    while ($data = mysqli_fetch_array($query)) :?>
     <tr>
      <td> <?=$data['judul']  ?> </td>
      <td><?=$data['penyanyi']  ?> </td>
      <td> <?=$data['genre']  ?></td>
      <td>
       <a class="badge badge-danger" href="delete.php?id=<?=$data['id_music']?> " style="text-decoration: none;">delete</a>
       <label class="badge badge-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $data['id_music']; ?>" style="cursor: pointer;">
        update
       </label>
       <div class="modal fade" id="exampleModal-<?= $data['id_music']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Update data</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

           <form class="forms-sample" method="POST" action="updateUser.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$data['id_music']?> ">
            <div class="form-group">
             <label for="exampleInputName1">title</label>
             <input type="text" name="titleUpdate" class="form-control" id="exampleInputName1" value="<?=$data['judul']  ?>" autocomplete="off" placeholder="Username">
            </div>
            <div class="form-group">
             <label for="exampleInputEmail3">Artist</label>
             <input type="email" name="penyanyiUpdate" class="form-control" id="exampleInputEmail3" value="<?=$data['penyanyi']  ?>" autocomplete="off" placeholder="Email">
            </div>
            <div class="form-group">
             <label for="exampleInputPassword4">Genre</label>
             <input type="password" value="<?=$data['genre']  ?>" name="genreUpdate" class="form-control" id="exampleInputPassword4" autocomplete="off" placeholder="Password">
            </div>
            <div class="form-group">
             <label>Cover Lagu</label>
             <div class="input-group col-xs-12">
              <input type="file" value="<?=$data['image']  ?>" name="imageUpdate" class="form-control file-upload-info" autocomplete="off" placeholder="Upload Image">
             </div>
            </div>
            <div class="form-group">
             <label>Lirik Lagu</label>
             <textarea name="lirikUpdate" class="form-control" cols="30" rows="10"><?=$data['lirik']   ?> </textarea>
            </div>
            <div class="form-group">
             <button type="submit" name="submitUpdate" class="btn btn-primary me-2">Submit</button>
            </div>
           </form>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           </div>
          </div>
         </div>
        </div>
       </div>
      </td>
     </tr>
    <?php endwhile; ?>
   </tbody>
  </table>
 </div>
 <ul class="pagination mt-2" id="page">
  <?php if ($halaman <=1) : ?>
   <li class="page-item" >
    <a class="page-link" aria-label="Previous"  style="padding: 10px ;background-color:#000 ;">
     <span aria-hidden="true">&laquo;</span>
    </a>
   </li>
  <?php else : ?>
   <li class="page-item">
    <a class="page-link" href="?page=<?=$halaman-=1;   ?> " aria-label="Previous"  style="padding: 10px ;background-color:#000 ;">
     <span aria-hidden="true">&laquo;</span>
    </a>
   </li>
  <?php endif; ?>
  <?php 
  for ($i=1; $i <= $jmlHalaman; $i++) { ?>
   <li class="page-item"><a class="page-link"  style="padding: 10px ;background-color:#000 ;" href="?page=<?=$i  ?> "><?=$i  ?></a></li>
  <?php }?>
  <li class="page-item">
   <a class="page-link" href="?page=<?=$halaman+=1;  ?>" aria-label="Next"  style="padding: 10px ;background-color:#000 ;">
    <span aria-hidden="true">&raquo;</span>
   </a>
  </li>
 </ul>