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
  </body>
  </html>