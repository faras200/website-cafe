
 <?php
@$id_produk = $_GET["id"];
?>
<?php 
// Start the session

if(isset($_GET['id']) && !isset($_POST['update']))  { 
	$sql = "SELECT * FROM produk WHERE id_produk= $id_produk";
	$result = mysqli_query($koneksi->conn, $sql);
	$product = mysqli_fetch_object($result); 
	$item = new Item();
	$item->id = $product->id_produk;
	$item->name = $product->nama_produk;
	$item->price = $product->harga_produk;
	$item->foto = $product->foto_produk;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id == $_GET['id']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->quantity) < @$iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>

<div class="panel-header panel-header-lg" style="height:250px;">

</div>
<div class="content container " style="margin-top: -220px;">
<div class="row">
<div class="float-left col-md-8 ">
<div class="card shadow ">
 
  <div class="card-header">
        <h4 class="card-title">Checkout</h4>
        
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
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
      <?php 
     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<count($cart); $i++){
 		$s += $cart[$i]->price * $cart[$i]->quantity;
 ?>	
   <tr>
   		<td><img src="admin/img/produk/<?php echo $cart[$i]->foto; ?>" alt="" width="40px"></td>
   		<td> <?php echo $cart[$i]->name; ?> </td>
   		<td>Rp. <?php echo $cart[$i]->price; ?> </td>
        <td > <?php echo $cart[$i]->quantity; ?></td>  
        <td> Rp. <?php $total = $cart[$i]->price * $cart[$i]->quantity; echo number_format($total,0,",","."); ?> </td> 
   </tr>
 	<?php 
	 	$index++;
 	} ?>
 	<tr>
 		<td colspan="4" style="text-align:right; font-weight:bold">
         Total Harga :
 		</td>
 		<td> Rp.<?php $_SESSION['total_harga'] = $s; echo number_format($s,0,",","."); ?> </td>
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
      <label for="inputPassword4">Nomor Meja</label>
      <input type="number" class="form-control" id="inputPassword4" required placeholder="NO MEJA" name="meja">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Metode Pembayaran</label>
      <select name="metode_bayar" class="form-control" required  id="">
      <option value="" disabled selected >--PILIH--</option>
      <option value="bank">BANK</option>
      <option value="cash">CASH</option>
      <option value="ovo">OVO</option>
      <option value="dana">DANA</option>
      </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary float-right">Buat Pesanan</button>
    </form>
  </div>
  </div>
  </div>
</div> <a href="?p=pesan-produk">Kembali</a> | <a href="?p=dashboard">Continue Shopping</a>
 <?php 
    if(isset($_POST['submit'])){
        $user = $_COOKIE['id_user'];
        $meja = $_POST['meja'];
        $metode_bayar = $_POST['metode_bayar'];
        $total_harga = $_SESSION['total_harga'];
        $tgl = date('Y-m-d');
        // Save new orders
        $transaksi->tambah_transaksi($user,$meja,$metode_bayar,$total_harga,$tgl);
    }
?>    
        </div>
