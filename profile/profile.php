<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Awal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
  width: 95%;
  background-color: #202020;
  height: 100%;
  padding: 6px;
  border-radius: 3px;
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
    <div class="container-fluid">
      <a class="navbar-brand text-white" style="font-family: 'Roboto Slab', serif;font-size: 25px;">DengerIn</a>
      <a class="profile" href="#" style="position:absolute;right: 27px;">
        <i class="fa-regular fa-circle-user text-white iconn"></i>
      </a>
    </div>
  </nav>
  <div class="container-fluid content-custom">
    <div class="row">
      <div class="col-1 bg-dark d-flex justify-content-center" style="height: 100vh;">
        <nav class="nav flex-column sidebar">
          <a class="nav-link active" href="#">
            <center>
              <i class="fa-solid fa-house text-white iconn"></i>
              <!-- <p>home</p> -->
            </center>
          </a>
          <a class="nav-link" href="#">
            <i class="fa-solid fa-search text-white iconn"></i>
          </a>
          <a class="nav-link" href="#">
            <i class="fa-solid fa-heart text-white iconn"></i>
          </a>

          <!--  -->
          <div class="scroll" id="style-1">
            <a class="nav-link" href="#">
              <i class="fa-solid fa-chart-simple text-white iconn"></i>
            </a>
            <div id="" class="scroll-item">
              <a class="list-item" href="#list-item-1">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-2">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-3">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-4">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-1">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-2">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-3">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-4">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-1">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-2">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-3">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-4">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-1">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-2">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-3">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>
              <a class="list-item" href="#list-item-4">
                <img src="../cover1.jpg" class="playlist" alt="...">
              </a>  
            </div>

          </div>

        </nav>
      </div>

      <div class="col-11" style="background-color:grey;">
         <div class="row vh-100" style="position: relative; display:block;">
            <div class="col-12 bg-dark" style="height: 30vh;" ></div>
            <div class="col-12" style="height: 250px; width:250px; position:absolute; top: 12%; right:42%; border-radius:50%; background-image:url('sho.jpg'); background-size :contain"><i class="fa-solid fa-pen-to-square text-white" style="position:absolute; bottom: 5%; right:15%; font-size:20px;"></i></div>
            <div class="col-12 text-white"style="position:absolute; bottom:15%; ">
                <form action="" style="position:absolute; right:35%;bottom:25%">
                    <label for="" style="display: block;">Username</label>
                    <input type="text" placeholder="Username" style="width: 450px;" class="form-control m-2">
                    <label for="" style="display: block;">Password</label>
                    <input type="text" placeholder="Password" style="width: 450px;" class="form-control m-2">
                    <label for="" style="display: block;">Email</label>
                    <input type="email" placeholder="Password" style="width: 450px;" class="form-control m-2">
                    <button class="btn btn-success m-2">Update</button>
                </form>
            </div>
         </div>
      </div>
    </div>
  </div>

















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>