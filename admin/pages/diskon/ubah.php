<?php
    $id = $_GET['id']; 
    $row = $koneksi->select("SELECT * FROM diskon,produk WHERE diskon.id_produk = produk.id_produk AND diskon.id_diskon = $id")
?>

<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
  
  <div class="card-header">
        <h4 class="card-title"> Ubah Diskon</h4>
        
    </div>
    <div class="card-body">
    <form method="POST" action="">
  <div class="form-row">
    <div class="form-group col-md-6 mt-4">
      <label for="inputEmail4">Produk</label>
      <select class="form-control" name="produk" id="">
      <option selected value="<?= $row["id_produk"] ?>"><?= $row["nama_produk"] ?></option>
      <?php 
        $query = $koneksi->selectAll("SELECT id_produk, nama_produk FROM produk");
        foreach($query as $row1):
      ?>
      <option value="<?= $row1["id_produk"] ?>"><?= $row1["nama_produk"] ?></option>
      <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group col-md-6 mt-4">
      <label for="inputPassword4">Nama Diskon</label>
      <input type="text" value="<?= $row["nama_diskon"] ?>" class="form-control" id="inputPassword4" placeholder="Nama Diskon" name="diskon">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6 mt-4">
    <label for="inputAddress">Jumlah Diskon</label>
    <input type="text" class="form-control" value="<?= $row["jumlah_diskon"] ?>" id="" placeholder="Jumlah Diskon" name="jm_diskon">
  </div>
  <div class="form-group col-md-6 mt-4">
    <label for="inputAddress">Status Diskon</label>
   <select class="form-control" name="status" id="">
   <option selected value="<?= $row["status"] ?>"><?= $row["status"] ?></option>
   <option value="aktif">Aktif</option>
   <option value="non-aktif">Non-Aktif</option>
   </select>
  </div>
  <div class="form-group col-md-6 mt-4">
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
$nama_diskon = $_POST["diskon"];
$jm_diskon = $_POST["jm_diskon"];
$status = $_POST["status"];
$diskon->ubahdiskon($nama_produk,$nama_diskon,$jm_diskon,$status,$id);

}
?>
     
      
  