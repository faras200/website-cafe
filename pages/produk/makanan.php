


      <div class="container" style="margin-top: 50px;" >
      <div class="row"> 
        <h2 ">Makanan Berat</h2>
      </div>
</div>
      
      <div class="container" " >
      <div class="row"> 
      <?php 
      
$query_makanan = $koneksi->selectAll("SELECT * FROM produk WHERE kategori_produk = 'makanan_berat'  ");
        foreach($query_makanan as $row): ?>
      <div class="card col-md-4" style="box-sizing:border-box" style="margin-left:5px !important; margin-right:5px !important;">
                <img class="card-img-top" src="admin/img/produk/<?=$row['foto_produk']?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title"><?=$row['nama_produk']?></h4>
                  <p class="card-text">Rp. <?=number_format($row['harga_produk'],0,",",".")?> </p>
                  <a href="?p=pesan-produk&id=<?= $row['id_produk'] ?>" class="btn btn-primary">Order Now</a>
                </div>
              </div>
             
        <?php endforeach ?>
        </div>
      </div>

      
      <div class="container" " >
      <div class="row"> 
        <h2>Makanan Ringan</h2>
      </div>
</div>
       
      <div class="container" " >
      <div class="row">
      <?php 
      
$query_makanan = $koneksi->selectAll("SELECT * FROM produk WHERE kategori_produk  = 'makanan_ringan' ");
        foreach($query_makanan as $row): ?>
      <div class="card col-md-4" style="box-sizing:border-box" style="margin-left:5px !important; margin-right:5px !important;">
                <img class="card-img-top" src="admin/img/produk/<?=$row['foto_produk']?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title"><?=$row['nama_produk']?></h4>
                  <p class="card-text">Rp. <?=number_format($row['harga_produk'],0,",",".")?> </p>
                  <a href="?p=pesan-produk&id=<?= $row['id_produk'] ?>" class="btn btn-primary">Order Now</a>
                </div>
              </div>
             
        <?php endforeach ?>
        </div>
      </div>
        