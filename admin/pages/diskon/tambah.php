<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
  
  <div class="card-header">
        <h4 class="card-title"> Tambah Diskon</h4>
        
    </div>
    <div class="card-body">
    <form method="POST" action="">
  <div class="form-row">
    <div class="form-group col-md-6 mt-4">
      <label for="inputEmail4">Produk</label>
      <select class="form-control" name="produk" required id="">
      <?php 
        $query = $koneksi->selectAll("SELECT id_produk, nama_produk FROM produk");
        foreach($query as $row):
      ?>
      <option value="<?= $row["id_produk"] ?>"><?= $row["nama_produk"] ?></option>
      <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group col-md-6 mt-4">
      <label for="inputPassword4">Nama Diskon</label>
      <input type="text" class="form-control" id="inputPassword4" required placeholder="Nama Diskon" name="diskon">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6 mt-4">
    <label for="inputAddress">Jumlah Diskon</label>
    <input type="text" class="form-control" id=" " required placeholder="Jumlah Diskon" name="jm_diskon">
  </div>
  <div class="form-group col-md-6 mt-4">
    <label for="inputAddress">Status Diskon</label>
   <select class="form-control" name="status" required id="">
   <option value="aktif">Aktif</option>
   <option value="non-aktif">Non-Aktif</option>
   </select>
  </div>
  <div class="form-group col-md-6 mt-4">
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
$nama_diskon = $_POST["diskon"];
$jm_diskon = $_POST["jm_diskon"];
$status = $_POST["status"];
$diskon->tambahdiskon($nama_produk,$nama_diskon,$jm_diskon,$status);

}
?>
     
      
  