<?php
  include "../system/system.php";
  $koneksi = new koneksi();
  $admin = new admin();
  $produk = new produk();
  $transaksi = new transaksi();
  $paket = new paket();
  $diskon = new diskon();
  ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../assets/js/script.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <img src="../assets/img/LOGO_CAFE.png" alt="">
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          DAN N BAN COFEE
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <?php
              if( $_SESSION['level'] == 1):
          ?>
          <li class=" ">
            <a href="?p=dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="?p=administrator">
            <i class="now-ui-icons users_circle-08"></i>
              <p>Administrator</p>
            </a>
          </li>
          <li>
            <a href="?p=produk">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Produk</p>
            </a>
          </li>
          <li>
            <a href="?p=diskon">
              <i class="now-ui-icons users_single-02"></i>
              <p>Diskon</p>
            </a>
          </li>
          <li>
            <a href="?p=laporan">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Laporan</p>
            </a>
          </li>
          <?php
          endif;
              if($_SESSION['level'] == 2 OR $_SESSION['level'] == 1):
          ?>
          <li>
            <a href="?p=transaksi">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Transaksi</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="pages/dashboard/logout.php">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Logout</p>
            </a>
          </li>
          <?php
            endif
          ?>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                  <?= $_SESSION['username'] ?>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php 
                if(!@$_GET['p']){
                  if($_SESSION['level'] == 2){
                    include "transaksi/transaksi.php";
                  }else{
                    include "dashboard/dashboard.php";
                  }
                }else{
                    include "page.php";
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
  </div>
  <!--   Core JS Files   -->
  <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>