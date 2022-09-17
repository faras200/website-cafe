<?php

  $tgl = date('Y-m-d');
  $query1 = mysqli_query($koneksi->conn,"SELECT * FROM transaksi WHERE tanggal_transaksi = '$tgl' ");
  $data1 = mysqli_num_rows($query1);
  $query2 = mysqli_query($koneksi->conn,"SELECT * FROM transaksi ");
  $data2 = mysqli_num_rows($query2);
  $query3 = mysqli_query($koneksi->conn,"SELECT * FROM produk ");
  $data3 = mysqli_num_rows($query3);


?>

<div class="panel-header panel-header-lg">
        
      </div>
      <div class="content" style="margin-top: -200px;">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Transaksi</h5>
                <h4 class="card-title">Transaksi Hari Ini</h4>
                <div class="dropdown">
                  <a href="?p=laporan" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" >
                    <i class="now-ui-icons loader_gear"></i></a>
                </div>
              </div>
              <div class="card-body mt-2">
                <h2 class="text-center"><?= $data1 ?></h2>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Transaksi</h5>
                <h4 class="card-title">All Transaksi</h4>
                <div class="dropdown">
                  <a href="?p=laporan" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" >
                    <i class="now-ui-icons loader_gear"></i></a>
                </div>
              </div>
              <div class="card-body mt-2">
                <h2 class="text-center"><?= $data2 ?></h2>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Produk</h5>
                <h4 class="card-title">All Produk</h4>
              </div>
              <div class="dropdown">
                  <a href="?p=produk" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" >
                    <i class="now-ui-icons loader_gear"></i></a>
                </div>
              
              <div class="card-body mt-2">
                <h2 class="text-center"><?= $data3 ?></h2>
              </div>
              <div class="card-footer">
              <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>