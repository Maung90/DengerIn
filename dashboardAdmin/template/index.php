<?php 
require_once 'partials/session.php';
$koneksi = mysqli_connect('localhost','root','','dengerin');

$queryMusic  = mysqli_query($koneksi,"SELECT * FROM music");
$queryPlaylist  = mysqli_query($koneksi,"SELECT * FROM playlist_name");
$queryUser  = mysqli_query($koneksi,"SELECT * FROM user");


$jumlahMusic = mysqli_num_rows($queryMusic);
$jumlahPlaylist = mysqli_num_rows($queryPlaylist);
$jumlahUser = mysqli_num_rows($queryUser);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="http://localhost/DengerIn/dashboardAdmin/template/assets/images/icon-mini.png">
  <style>
    input:focus,select:focus,option:focus{
      color: white;
    }
    input,select,option{
      color: white;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <?php require_once 'partials/_sidebar.html'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php require_once 'partials/_navbar.html'; ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> User </h3>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="card bg-danger p-5" style="font-size: 24px; height:160px;">
                <i class="fa-solid fa-users mb-3" style="font-size: 20px;">
                  Jumlah User
                  </i> <?=$jumlahUser; ?>
                </div>
              </div>
              <div class="col-4">
                <div class="card bg-success p-5" style="font-size: 24px; height:160px;">
                  <i class="fa-solid fa-music mb-3" style="font-size: 20px;">
                    Jumlah Music
                    </i> <?=$jumlahMusic; ?>
                  </div>
                </div>
                <div class="col-4">
                  <div class="card bg-warning p-5" style="font-size: 24px; height:160px;">
                    <i class="fa-solid fa-chart-simple mb-3" style="font-size: 20px;">
                      Jumlah Playlist
                      </i> <?=$jumlahPlaylist; ?>
                    </div>
                  </div>
                </div>
                <div>
                  <table  class="table table-hover">
                    <tr>
                      <th>Banner</th>
                      <th>Playlist</th>
                      <th>Posisi Banner</th>
                      <th>Action</th>
                    </tr>
                    <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM banner INNER JOIN playlist_name ON playlist_name.id_playlist_name = banner.id_playlist_name ");
                    while ($data = mysqli_fetch_array($query)) :
                     ?>
                     <tr>
                      <td><img src="assets/images/cover-playlist/<?=$data['imagePlaylist'];  ?> " alt=""></td>
                      <td><?= $data['playlist_name'] ?></td>
                      <td><?=$data['posisi_banner'];?></td>
                      <td><label class="badge badge-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $data['id_banner']; ?>" style="cursor: pointer;">ubah</label></td>
                    </tr>
                    <div class="modal fade" id="exampleModal-<?= $data['id_banner']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Ubah Banner</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">

                            <form class="forms-sample" method="POST">
                              <input  style="color: grey" type="hidden" name="id_banner" value="<?=$data['id_banner']?> ">
                              
                              <div class="form-group">
                                <label>Pilih Playlist</label>
                                <div class="input-group col-xs-12">
                                  <select name="playlist" id="" class="form-control">
                                    <option disabled>Pilih Playlist</option>
                                    <?php 
                                    $query2 = mysqli_query($koneksi,"SELECT * FROM playlist_name WHERE id_user = '1' "); 
                                    while ($data2 = mysqli_fetch_array($query2)) {
                                      if ($data2['id_playlist_name'] == $data['id_playlist_name']) {
                                        echo "<option value=".$data2['id_playlist_name']." selected>".$data2['playlist_name']."</option>";
                                      }elseif ($data2['id_playlist_name'] != $data['id_playlist_name']) {
                                        echo "<option value=".$data2['id_playlist_name'].">".$data2['playlist_name']."</option>";
                                      }
                                    }
                                    ?>
                                  </select>
                                </div>
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
                      <!-- container-scroller -->
                      <!-- plugins:js -->
                      <script src="assets/vendors/js/vendor.bundle.base.js"></script>
                      <!-- endinject -->
                      <!-- Plugin js for this page -->
                      <!-- End plugin js for this page -->
                      <!-- inject:js -->
                      <script src="assets/js/off-canvas.js"></script>
                      <script src="assets/js/hoverable-collapse.js"></script>
                      <script src="assets/js/misc.js"></script>
                      <script src="assets/js/settings.js"></script>
                      <script src="assets/js/todolist.js"></script>
                      <!-- endinject -->
                      <!-- Custom js for this page -->
                      <!-- End custom js for this page -->
                    <?php endwhile; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </body>
        </html>

        <?php 
        if (isset($_POST['submitUpdate'])) {
          $id_playlist = $_POST['playlist'];
          $id_banner = $_POST['id_banner'];
          $query = mysqli_query($koneksi,"UPDATE banner SET id_playlist_name = '$id_playlist' WHERE id_banner = '$id_banner' ");
          if (!$query) {
            echo "<script>
            alert('update gagal');
            document.location = 'index.php';
            </script>"; 
          }else{
            echo "<script>
            document.location = 'index.php';
            </script>"; 
          }
        }
      ?>