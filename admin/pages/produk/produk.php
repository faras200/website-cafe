<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
 
  <div class="card-header">
        <h4 class="card-title col-md-4  float-left">Produk</h4>
        <a href="?p=tambah-produk"  class="btn btn-info text-center float-right">New  <i class="now-ui-icons ui-1_simple-add"></i></a>
    </div>

    <div class="card card-nav-tabs card-plain">
    <div class="card-header card-header-danger">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#produk" data-toggle="tab">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#paket" data-toggle="tab">Paket</a>
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
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;
      $query = $koneksi->selectAll("SELECT * FROM produk WHERE NOT kategori_produk = 'paket' ");
      foreach($query as $row):
      ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td> <img width="60px" src="img/produk/<?= $row["foto_produk"] ?>" alt=""> </td>
            <td><?= $row["nama_produk"] ?></td>
            <td><?= $row["kategori_produk"] ?></td>
            <td>Rp. <?= number_format($row["harga_produk"],0,",",".") ?></td>
            <td class="td-actions text-right">
            <a href="?p=edit-produk&id=<?= $row['id_produk'] ?>"  class="btn btn-info btn-sm btn-icon">
                    <i class="now-ui-icons users_single-02"></i>
                </a>
                <a href="?p=hapus-produk&id=<?= $row['id_produk'] ?>" onclick="return confirm('yakin dihapus?')" class="btn btn-danger btn-sm btn-icon">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
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
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Detail Paket</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $query1 = $koneksi->selectALL("SELECT * FROM produk WHERE kategori_produk = 'paket'");
                                    foreach($query1 as $row1) :
                                ?>
                                
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td> <img width="60px" src="img/produk/<?= $row1["foto_produk"] ?>" alt=""> </td>
                                    <td><?= $row1["nama_produk"] ?></td>
                                    <td><?= $row1["detail_produk"] ?></td>
                                    <td>Rp. <?= number_format($row1["harga_produk"],0,",",".") ?></td>
                                    <td class="td-actions text-right">
                                    <a href="?p=edit-produk&id=<?= $row1['id_produk'] ?>"  class="btn btn-info btn-sm btn-icon"><i class="now-ui-icons users_single-02"></i></a>
                                    <a href="?p=hapus-produk&id=<?= $row1['id_produk'] ?>" onclick="return confirm('yakin dihapus?')" class="btn btn-danger btn-sm btn-icon">
                                        <i class="now-ui-icons ui-1_simple-remove"></i></a>
                                    </td>
                                </tr>
                                    <?php $no++; endforeach;?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
  </div>
</div>    
        </div>
        