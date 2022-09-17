<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
 
  <div class="card-header">
      <h4 class="card-title col-md-4  float-left">Laporan Transaksi</h4>
      <a href="pages/laporan/cetak_laporan_all.php"  class="btn btn-info text-center float-right">Cetak Semua  <i class="now-ui-icons education_paper"></i></a>
        <a href="pages/laporan/cetak_laporan.php"  class="btn btn-info text-center float-right">Cetak Hari Ini  <i class="now-ui-icons education_paper"></i></a>
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
                        <a class="nav-link" href="#paket" data-toggle="tab">Semua Transaksi</a>
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
            <th>Nama Kasir</th>
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
      $query = $koneksi->selectAll("SELECT * FROM transaksi,user,admin WHERE transaksi.tanggal_transaksi = '$tgl' AND transaksi.id_user = user.id_user AND transaksi.status_transaksi = 'dibayar' AND transaksi.id_admin = admin.id_admin ");
      foreach($query as $row):
      ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $row["username"] ?></td>
            <td><?= $row["nama_user"] ?></td>
            <td>Sudah Dibayar</td>
            <td>Rp. <?= number_format($row["jumlah_transaksi"],0,",",".");  ?></td>
            <td><?= $row["tanggal_transaksi"] ?></td>
            <td class="td-actions text-right">
            <a href="?p=detail-laporan&id=<?= $row['id_transaksi'] ?>"  class="btn btn-success">
                   Detail
                </a>
                <a href="?p=hapus-transaksi&id=<?= $row['id_transaksi'] ?>" onclick="return confirm('yakin dihapus?')" class="btn btn-danger">
                <i class="now-ui-icons ui-1_simple-remove"></i></a>
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
            <th>Nama Kasir</th>
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
      $query = $koneksi->selectAll("SELECT * FROM transaksi,user,admin WHERE transaksi.id_user = user.id_user AND transaksi.status_transaksi = 'dibayar' AND transaksi.id_admin = admin.id_admin ");
      foreach($query as $row):
      ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $row["username"] ?></td>
            <td><?= $row["nama_user"] ?></td>
            <td>Sudah Dibayar</td>
            <td>Rp. <?= number_format($row["jumlah_transaksi"],0,",",".");  ?></td>
            <td><?= $row["tanggal_transaksi"] ?></td>
            <td class="td-actions text-right">
            <a href="?p=detail-laporan&id=<?= $row['id_transaksi'] ?>"  class="btn btn-success">
                    Detail
                </a>
                <a href="?p=hapus-transaksi&id=<?= $row['id_transaksi'] ?>" onclick="return confirm('yakin dihapus?')" class="btn btn-danger">
                <i class="now-ui-icons ui-1_simple-remove"></i></a>
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
        