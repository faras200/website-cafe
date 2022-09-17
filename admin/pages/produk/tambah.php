<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
  
  <div class="card-header">
        <h4 class="card-title"> Tambah Produk</h4>
        
    </div>
    <div class="card-body">
    <form method="POST" action="" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6 mt-4">
      <label for="inputEmail4">Nama Produk</label>
      <input type="text" class="form-control" required id="inputEmail4" placeholder="Nama Produk" name="produk" > 
    </div>
    <div class="form-group col-md-6 mt-4">
    <label for="inputAddress">Kategori</label>
    <select name="kategori" id="" class="form-control" required>
        <option value="makanan_berat">Makanan Berat</option>
        <option value="makanan_ringan">Makanan Ringan</option>
        <option value="cofee">Cofee</option>
        <option value="non_cofee">Non Cofee</option>
        <option value="softdrink">Sofdrink</option>
        <option value="paket">Paket</option>
    </select>
  
  </div>
  <div class="form-row">
  </div>
    <div class="form-group col-md-6 mt-4">
      <label for="inputPassword4">Harga</label>
      <input type="text" class="form-control" id="inputPassword4" required placeholder="Harga" name="harga">
    </div>
    <div class="col-md-6 mt-4">
      <label for="foto">Foto</label>
      <input type="file" class="form-control" id="foto" required name="gambar">
    </div>
    <div class="form-group col-md-6 mt-4">
      <label for="">Detail Produk</label>
      <textarea class="form-control" name="detail_produk"  id="" placeholder="Masukan  detail produk. . ."  rows="7"></textarea>
    </div>
  <div class=" col-md-6 mt-4">
  <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
  </div>
  </div>
</form>
</div>
  </div>
</div>    
        </div>
<?php

    if(isset($_POST["submit"])){
        $nama_produk = $_POST["produk"];
        $kategori = $_POST["kategori"];
        $harga = $_POST["harga"];
        $detail_produk = $_POST["detail_produk"];
        $produk->tambahProduk($nama_produk,$kategori,$harga,$detail_produk);
    }
?>