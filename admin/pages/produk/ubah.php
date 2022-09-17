<?php

$id = $_GET['id'];
$row = $koneksi->select("SELECT *  FROM produk WHERE id_produk = $id");

?>

<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
  
  <div class="card-header">
        <h4 class="card-title"> Ubah Produk</h4>
        
    </div>
    <div class="card-body">
    <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="gambarlama" value="<?= $row["foto_produk"] ?>">
  <div class="form-row">
    <div class="form-group col-md-6 mt-4">
      <label for="inputEmail4">Nama Produk</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?= $row['nama_produk']; ?>" placeholder="Nama Produk" name="produk" > 
    </div>
    <div class="form-group col-md-6 mt-4">
    <label for="inputAddress">Kategori</label>
    <select name="kategori" id="" class="form-control">
        <option value="<?= $row['kategori_produk']; ?>"><?= $row['kategori_produk']; ?></option>
        <option value="makanan_berat">Makanan Berat</option>
        <option value="makanan_ringan">Makanan Ringan</option>
        <option value="cofee">Coffe</option>
        <option value="non_coffe">Non Coffe</option>
        <option value="softdrink">Sofdrink</option>
    </select>
  
  </div>
  <div class="form-row">
  </div>
    <div class="form-group col-md-6 mt-4">
      <label for="inputPassword4">Harga</label>
      <input type="text" class="form-control" value="<?= $row['harga_produk']; ?>" id="inputPassword4" placeholder="Harga" name="harga">
    </div>
    <div class="col-md-6 mt-4">
      <label for="foto">Foto</label>
      <img src="img/produk/<?= $row['foto_produk']; ?>" width="100px" alt="">
      <input type="file" class="form-control" id="foto" name="gambar">
    </div>
    <div class="form-group col-md-6 mt-4">
      <label for="">Detail Produk</label>
      <textarea class="form-control" name="detail_produk" id=""  rows="7"><?= $row['detail_produk'] ?></textarea>
    </div>
  <div class=" col-md-6 mt-4">
  <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
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
        $gambarLama = $_POST["gambarlama"];
        $detail_produk = $_POST["detail_produk"];
        $produk->ubahProduk($nama_produk,$kategori,$harga,$gambarLama,$detail_produk,$id);
    }
?>