
      <div class="content mt-4">
      <?php
        $paket = mysqli_query($koneksi->conn,"SELECT * FROM diskon WHERE status = 'aktif'");
        $data= mysqli_num_rows($paket);

        if($data > 0):
          ?>
          <div class="container"  >
            <div class="row">
          <?php
          $query = $koneksi->selectAll("SELECT * FROM diskon,produk WHERE diskon.id_produk = produk.id_produk AND diskon.status = 'aktif'");
          foreach($query as $row): 
          $total_diskon = ($row['jumlah_diskon'] / 100) * $row['harga_produk'] ;
          $total = $row['harga_produk'] - $total_diskon;
          ?>
            <div class="card col-md-4" style="box-sizing:border-box">
                      <img class="card-img-top" src="admin/img/produk/<?=$row['foto_produk']?>" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">DISKON <?=$row['jumlah_diskon']?>% </h4>
                        <p class="card-text" ><?=$row['nama_produk']?></p>
                        <p class="card-text float-left" style="text-decoration: line-through; color:red;">Rp. <?=number_format($row['harga_produk'],0,",",".")?></p>
                        <p class="card-text float-right">MENJADI -> Rp. <?=number_format($total,0,",",".")?></p>
                        <div class="clear"></div>
                        <a href="?p=pesan-produk&id=<?= $row['id_produk'] ?>&id_diskon=<?= $row['id_diskon'] ?>&action=add&diskon=<?= $total ?>" class="btn btn-primary mt-3">Order Now</a>
                      </div>
                    </div>
                   
              <?php endforeach; endif; ?>
            </div>
          </div>
      <div class="container">
        <div class="row ">
        <h2 class="bold" >Makanan</h2>
        </div>
      </div>
      <div class="container"  >
      <div class="row">
      <?php $query = $koneksi->selectAll("SELECT * FROM produk WHERE kategori_produk = 'makanan_berat' OR kategori_produk  = 'makanan_ringan' 
      ");
        foreach($query as $row): ?>
      <div class="card col-md-4" style="box-sizing:border-box">
                <img class="card-img-top" src="admin/img/produk/<?=$row['foto_produk']?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title"><?=$row['nama_produk']?></h4>
                  <p class="card-text">Rp. <?=number_format($row['harga_produk'],0,",",".")?> </p>
                  <a href="?p=pesan-produk&id=<?= $row['id_produk'] ?>&action=add" class="btn btn-primary">Order Now</a>
                </div>
              </div>
             
        <?php endforeach ?>
        </div>
      </div>
      
        <div class="container mt-4">
        <div class="row ">
        <h2 class="bold" >Minuman</h2>
        </div>
      </div>
      <div class="container"  >
      <div class="row">
      <?php $query = $koneksi->selectAll("SELECT * FROM produk WHERE  kategori_produk = 'cofee' OR kategori_produk  = 'softdrink' OR kategori_produk  = 'non_coffe' ");
        foreach($query as $row): ?>
      <div class="card col-md-4" style="box-sizing:border-box">
                <img class="card-img-top" src="admin/img/produk/<?=$row['foto_produk']?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title"><?=$row['nama_produk']?></h4>
                  <p class="card-text">Rp. <?=number_format($row['harga_produk'],0,",",".")?></p>
                  <a href="?p=pesan-produk&id=<?= $row['id_produk'] ?>&action=add" class="btn btn-primary">Order Now</a>
                </div>
              </div>
             
        <?php endforeach ?>
        </div>
      </div>
      <div class="container mt-4">
        <div class="row ">
        <h2 class="bold" >Paket</h2>
        </div>
      </div>
      <div class="container"  >
      <div class="row">
      <?php $query = $koneksi->selectAll("SELECT * FROM produk WHERE kategori_produk = 'paket' ");
        foreach($query as $row): ?>
      <div class="card col-md-4" style="box-sizing:border-box">
                <img class="card-img-top" src="admin/img/produk/<?=$row['foto_produk']?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title"><?=$row['nama_produk']?></h4>
                  <p class="card-text">Rp. <?=number_format($row['harga_produk'],0,",",".")?> </p>
                  <a href="?p=pesan-produk&id=<?= $row['id_produk'] ?>&action=add" class="btn btn-primary">Order Now</a>
                </div>
              </div>
             
        <?php endforeach ?>
        </div>
      </div>
    </div>