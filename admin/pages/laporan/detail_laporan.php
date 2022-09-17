
 <?php
@$id_transaksi = $_GET["id"];

$trs = $koneksi->select("SELECT * FROM transaksi,user WHERE transaksi.id_user = user.id_user AND id_transaksi = $id_transaksi ");

?>

<div class="panel-header panel-header-lg" style="height:250px;">

</div>
<div class="content container " style="margin-top: -130px;">
<div class="row">
<div class="float-left col-md-8 ">
<div class="card shadow ">
 
  <div class="card-header">
        <h4 class="card-title">Detail Laporan</h4>
        
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <form method="POST">
    <table class="table align-items-center table-flush" >
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
      <?php 
     $query = $koneksi->selectAll("SELECT * FROM detail_transaksi WHERE id_transaksi = '$id_transaksi' ");
 	foreach($query as $row):
    $id_pdk = $row['id_produk'];
    $row1 = $koneksi->select("SELECT * FROM produk WHERE id_produk = '$id_pdk' ");
 ?>	
   <tr>
   		<td><img src="img/produk/<?php echo $row1['foto_produk'];  ?>" alt="" width="40px"></td>
   		<td> <?php echo $row1['nama_produk']; ?> </td>
       <?php if($row['id_diskon'] != 0) { 
         $id_dk = $row['id_diskon'];
          $query_diskon = $koneksi->select("SELECT * FROM diskon WHERE id_diskon = $id_dk");
          $total_diskon = ($query_diskon['jumlah_diskon'] / 100) * $row1['harga_produk'] ;
          $harga_pdk = $row1['harga_produk'] - $total_diskon;
        ?>
   		<td>Rp. <?php echo number_format($harga_pdk,0,",",".");  ?> </td>
   		<td> <?php echo $query_diskon['jumlah_diskon']  ?>%</td>
       <?php }else{ 
         $harga_pdk = $row1['harga_produk'];
         ?>
       <td>Rp. <?php echo number_format($harga_pdk,0,",",".");  ?> </td>
       <td>0% </td>
       <?php } ?>
        <td > <?php echo $row['jumlah']; ?></td>  
        <td> Rp. <?php $total = $harga_pdk * $row['jumlah']; echo number_format($total,0,",",".");  ?> </td> 
   </tr>
 	<?php 
	 	endforeach;
 	 ?>
 	<tr>
 		<td colspan="5" style="text-align:right; font-weight:bold">
         Total Harga :
 		</td>
 		<td> Rp.<?= $trs['jumlah_transaksi'] ?> </td>
 	</tr>  
    </tbody>
</table>
    </form>
</div>
  </div>
</div>
</div>
<div class="float-right col-md-4 ">
<div class="card shadow ">
 
  <div class="card-header">
        <h4 class="card-title">Detail Pesanan</h4>
        
    </div>
    <div class="card-body">
    <form action="" method="POST">
    <div class="form-group">
      <label for="">Nama Customer</label>
      <input type="text" disabled class="form-control" value="<?= $trs['nama_user'] ?>" name="user">
    </div>
    <div class="form-group">
    <ul>
    <li>Metode Pembayaran : <?= $trs['metode_bayar'] ?></li>
    <li>Nomor Meja        : <?= $trs['no_meja'] ?></li>
    <li>Total Harga       : Rp. <?= number_format($trs['jumlah_transaksi'] ,0,",",".");?></li>
    <li>Jumlah Bayar       : Rp. <?= number_format($trs['jumlah_dibayar'] ,0,",",".");  ?></li>
    <li>Kembalian        : Rp. <?php $kmbl = $trs['jumlah_dibayar'] - $trs['jumlah_transaksi']; echo number_format($kmbl,0,",",".");  ?></li>
    </ul>
    </div>
    
    </form>
    <a href="pages/laporan/cetak_invoice.php?id=<?= $id_transaksi ?>" target="blank" class="btn btn-primary ">Cetak Bill</a>
  </div>
  </div>
  </div>
  
        </div>
        </div>