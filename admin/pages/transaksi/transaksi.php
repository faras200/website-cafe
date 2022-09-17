<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
 
  <div class="card-header">
        <h4 class="card-title col-md-4  float-left">Transaksi</h4>
    </div>

    <div class="card card-nav-tabs card-plain">
    <div class="card-header card-header-danger">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#produk" data-toggle="tab">Hari Ini</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#paket" data-toggle="tab">All Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-body ">
        <div class="tab-content text-center">
            <div class="tab-pane active" id="produk">
            <div class="table-responsive">
    <table class="table align-items-center table-flush">
    <thead class="thead-light">
        <tr>
            <th class="text-center">No</th>
            <th>Nama User</th>
            <th>Status</th>
            <th>Total Harga</th>
            <th>Tanggal</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;
      $tgl = date('Y-m-d');
      $query = $koneksi->selectAll("SELECT * FROM transaksi , user WHERE tanggal_transaksi = '$tgl' AND transaksi.status_transaksi = 'pembayaran' AND transaksi.id_user = user.id_user ");
      foreach($query as $row):
      ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $row["nama_user"] ?></td>
            <td>Belum Dibayar</td>
            <td>Rp. <?= number_format($row["jumlah_transaksi"],0,",",".");  ?></td>
            <td><?= $row["tanggal_transaksi"] ?></td>
            <td class="td-actions text-right">
            <a href="?p=kasir&id=<?= $row['id_transaksi'] ?>"  class="btn btn-primary">
                  Bayar
                </a>
            </td>
        </tr>
        <?php $no++; endforeach; ?>
  
    </tbody>
</table>
</div>
            </div>
            <div class="tab-pane" id="paket">
            <div class="table-responsive">
                        <table class="table align-items-center table-flush">
    <thead class="thead-light">
        <tr>
            <th class="text-center">No</th>
            <th>Nama User</th>
            <th>Status</th>
            <th>Total Harga</th>
            <th>Tanggal</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;

      $query1 = $koneksi->selectAll("SELECT * FROM transaksi,user WHERE transaksi.id_user = user.id_user AND transaksi.status_transaksi = 'pembayaran' ");
      foreach($query1 as $row1):
      ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $row1["nama_user"] ?></td>
            <td>Belum Dibayar</td>
            <td>Rp. <?= number_format($row1["jumlah_transaksi"],0,",",".");  ?></td>
            <td><?= $row1["tanggal_transaksi"] ?></td>
            <td class="td-actions text-right">
            <a href="?p=kasir&id=<?= $row1['id_transaksi'] ?>"  class="btn btn-primary">
                    Bayar
                </a>
            </td>
        </tr>
        <?php $no++; endforeach; ?>
  
    </tbody>
</table>
                    </div>
            </div>
        </div>
    </div>
  </div>
</div>    
        </div>
        