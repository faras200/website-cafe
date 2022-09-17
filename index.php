<?php
  include "system/system.php";
  $koneksi = new koneksi();
  $admin = new admin();
  $produk = new produk();
  $transaksi = new transaksi();
  $paket = new paket();
  $diskon = new diskon();
  class Item{
    var $id;
    var $name;
    var $price;
    var $quantity;
    var $foto;
   }
  session_start();
  if(!isset($_COOKIE["id_user"])){
    echo "<script>document.location='pages/regist.php'</script>";
    }
    if(!isset($_COOKIE["nama_user"])){
      echo "<script>document.location='pages/regist.php'</script>";
      }
    
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">

    
    <div class="main-panel" id="main-panel" style="width: 100% !important;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg  " style="background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%);;">
  <div class="container">
  <a href="?p=dashboard"><img src="assets/img/LOGO_CAFE.png" alt="logo" width="70px"></a> 
    <a class="navbar-brand" href="?p=dashboard" style="font-weight: 600; font-size:medium;"> Dan N Ban COFEE </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?p=makanan">Makanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?p=minuman">Minuman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?p=paket">Paket</a>
        </li>
      </ul>

      <a  href="?p=pesan-produk" style="margin-right: 30px !important;"><i class="now-ui-icons shopping_cart-simple"></i></a>
    </div>
  </div>
</nav>
      <!-- End Navbar -->
      <?php 
                if(!@$_GET['p']){
                    include "pages/dashboard/dashboard.php";
                }else{
                    include "pages/page.php";
                }
            ?> 
    <footer class="footer bg-white " >
        <div class=" container-fluid ">
          <nav>
            <ul>
              
              <li>
                Built By -
                <a href="https://www.instagram.com/bimasto_/" target="_blank">
                  Tajuddin Habimasto
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            Copyright &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>
          </div>
        </div>
      </footer>
    </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  
</body>

</html>