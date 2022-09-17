<?php

$id = $_GET['id'];
$row = $koneksi->select("SELECT *  FROM paket WHERE id_paket = $id")

?>


<div class="header bg-gradient-primary pb-8 pt-7 ">
    
</div>

<div class="container-fluid mt--9">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Ubah Paket</h3>
                </div>
                <div class="mt-3">
                <form method="POST" target="" enctype="multipart/form-data">
                <input type="hidden" name="gambarlama" value="<?= $row["foto_paket"] ?>">
                <div class="row mr-2 ml-2" >
                <div class="form-group col-md-6">
                    <label for="nama">Nama Paket</label>
                    <input type="text" class="form-control" id="nama" name="paket" value="<?= $row['nama_paket']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $row['harga_paket']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="stok">Foto</label>
                    <img src="img/paket/<?= $row['foto_paket']; ?>" alt="" width="150px">
                    <input type="file" class="form-control" id="foto" name="gambar">
                </div>
                <div class="form-group col-md-6">
                    <label for="detail">Detail paket</label>
                    <textarea name="detail" id="detail" cols="50" rows="10"><?= $row['detail_paket']; ?></textarea>
                </div>
                <div class="form-group col-md-6 ">
                    <button type="submit" name="submit" class="btn btn-success" style="margin-top: 30px;"><i class="fa fa-plus"></i> Ubah Paket</button>
                </div>
                
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["submit"])){
        $nama_paket = $_POST["paket"];
        $harga_paket = $_POST["harga"];
        $detail_paket = $_POST["detail"];
        $gambarLama = $_POST["gambarlama"];
        $paket->ubah_paket($nama_paket,$harga_paket,$detail_paket,$gambarLama,$id);
    }
?>