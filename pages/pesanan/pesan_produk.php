<?php
@$id_produk = $_GET["id"];

?>
<?php 
// Start the session
if(isset($_GET['id']) && isset($_GET['diskon']))  { 
	$sql = "SELECT * FROM produk WHERE id_produk= $id_produk";
	$result = mysqli_query($koneksi->conn, $sql);
	$product = mysqli_fetch_object($result);
	$diskon = $_GET['diskon']; 
	$id_diskon = $_GET['id_diskon']; 
	$item = new Item();
	$item->id = $product->id_produk;
	$item->name = $product->nama_produk;
	$item->price = $diskon;
	$item->diskon = $id_diskon;
	$item->foto = $product->foto_produk;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	@$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<@count($cart);$i++)
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
	@$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<@count($cart);$i++)
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
        
<div class="card shadow">
 
  <div class="card-header">
        <h4 class="card-title">Keranjang</h4>
        
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <form method="POST">
    <table class="table align-items-center table-flush">
    <thead>
        <tr>
            <th>Action</th>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
      <?php 
     @$cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<@count($cart); $i++){
 		$s += $cart[$i]->price * $cart[$i]->quantity;
 ?>	
   <tr>
    	<td><a href="?p=pesan-produk&index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
   		<td><img src="admin/img/produk/<?php echo $cart[$i]->foto; ?>" alt="" width="40px"></td>
   		<td> <?php echo $cart[$i]->name; ?> </td>
   		<td>Rp. <?=number_format($cart[$i]->price,0,",",".")?> </td>
        <td> <input width="20px" type="number" min="1" maxlength="20" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> </td>  
        <td> Rp. <?php $total = $cart[$i]->price * $cart[$i]->quantity; echo number_format($total,0,",",".");  ?> </td> 
   </tr>
 	<?php 
	 	$index++;
 	} ?>
 	<tr>
 		<td colspan="5" style="text-align:right; font-weight:bold">
         <button type="submit" name="update" class="btn btn-primary">Total Harga </button>
         <input type="hidden" name="update">
 		</td>
 		<td> Rp. <?php $_SESSION['total_harga'] = $s; echo number_format($s,0,",","."); ?> </td>
 	</tr>  
    </tbody>
</table>
    </form>
</div>
  </div>
</div> <a href="?p=dashboard">Continue Shopping</a> | <a href="?p=checkout">Checkout</a>

        </div>
        