<?php

require "../system/system.php";

$user = new users();

if(isset($_POST['login'])){
  $id = randomString(50);
  setcookie('id_user',$id , time() +36000000,('/'));
    $user-> daftar_user($id,$_POST['nama']) ;
}

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>
    Selamat Datang
  </title>

  <!--     Fonts and icons     -->

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.min.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <style>
                      *support google chrome*/
.card-body .input-group .contoh1::-webkit-input-placeholder{
    color: white;
}
 
/*support mozilla*/
.input-group .contoh1:-moz-input-placeholder{
    color: white;
}
 
/*support internet explorer*/
.input-group .contoh1:-ms-input-placeholder{
    color: white;
}
                    </style>

</head>

<body class="login-page  " style="background: url('../assets/img/header.jpg'); background-size:cover;">

  <div class="wrapper wrapper-full-page ">

    <div class="full-page login-page section-image" filter-color="black" data-image="../assets/img/walpaper.jpg">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="content">
        <div class="container">
          <div class=" col-md-6 col-lg-4 ml-auto mr-auto">
            <form class="form" method="post" action="">

              <div class="card card-login card-plain">

                <div class="card-header ">
                  <div class="logo-container mt-5">
                    <img src="../assets/img/LOGO_CAFE.png" alt="">
                    
                  </div>
                  
                </div>

                <div class="card-body ">
                
                  <div class="input-group no-border form-control-lg">
                 
                    <span class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons users_circle-08" style="color: white !important;" ></i>
                      </div>
                    </span>
                    
                    <input type="text" class="form-control contoh1" required name="nama" style="color: white !important;" placeholder="Nama Customer" >
                  </div>
                </div>

                <div class="card-footer ">
                  <button type="submit" name="login" class="btn btn-primary btn-round btn-lg btn-block mb-3">Lanjut Memesan</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>


    </div>


  </div>

  <!--   Core JS Files   -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

</body>

</html>