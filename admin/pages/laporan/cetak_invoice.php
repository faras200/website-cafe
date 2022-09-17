<?php

require_once __DIR__ . '\vendor\autoload.php';
require '../../../system/system.php';
$id = $_GET['id'];
$koneksi = new koneksi;
$tgl = date('Y-m-d');
$query = $koneksi->select("SELECT * FROM transaksi,user,admin WHERE transaksi.id_user = user.id_user AND transaksi.id_transaksi = '$id' AND transaksi.id_admin = admin.id_admin ");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en" >
 
<head>
 
  <meta charset="UTF-8">
  <title>Template Faktur Untuk Kasir HTML</title>
 
  <style>
@media print {
    .page-break { display: block; page-break-before: always; }
}
      #invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: .9em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 100px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 40px;
  width: 150px;
  background: url(../../../assets/img/logo_hitam.jpeg) no-repeat;
  background-size: 110px 100px;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(../../../assets/img/logo_hitam.jpeg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .5em;
  background: #EEE;
}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 24mm;
}
#invoice-POS .itemtext {
  font-size: .5em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
}
 
    </style>
 
  <script>
  window.console = window.console || function(t) {};
</script>
 
 
 
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
 
 
</head>
 
<body translate="no" >
<div id="invoice-POS">
 
<center id="top">
  <div class="logo"></div>
  <div class="info"> 
    <h2>DAN N BAN COFEE</h2>
  </div><!--End Info-->
</center><!--End InvoiceTop-->

<div id="mid">
  <div class="info">
    <h2>Informasi</h2>
    <p> 
       Customer : '. $query['nama_user'] .' <br>
       No Meja  : '. $query['no_meja'].'<br>
       Tanggal  : '. $query['tanggal_transaksi'].'<br>
    </p>
  </div>
</div><!--End Invoice Mid-->

<div id="bot">

                <div id="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item"><h2>Item</h2></td>
                            <td class="Hours"><h2>Qty</h2></td>
                            <td class="Rate"><h2>Sub Total</h2></td>
                        </tr>';
                        $query1 = $koneksi->selectAll("SELECT * FROM detail_transaksi WHERE id_transaksi = '$id' ");
                        foreach($query1 as $row):
                         $id_pdk = $row['id_produk'];

                         $row1 = $koneksi->select("SELECT * FROM produk WHERE id_produk = '$id_pdk' ");
                         if($row['id_diskon'] != 0) { 
                          $id_dk = $row['id_diskon'];
                           $query_diskon = $koneksi->select("SELECT * FROM diskon WHERE id_diskon = $id_dk");
                           $total_diskon = ($query_diskon['jumlah_diskon'] / 100) * $row1['harga_produk'] ;
                           $harga_pdk = $row1['harga_produk'] - $total_diskon;
                          }else{ 
                          $harga_pdk = $row1['harga_produk'];
                          
                         } 

                       $html .=' <tr class="service">
                            <td class="tableitem"><p class="itemtext">'.$row1['nama_produk'].'</p></td>
                            <td class="tableitem"><p class="itemtext">'.$row['jumlah'].'</p></td>
                            <td class="tableitem"><p class="itemtext">Rp. '.number_format($harga_pdk,0,",",".").'</p></td>
                        </tr>';
                        endforeach;
                        $total= number_format($query['jumlah_transaksi'],0,",",".");
                        $kembalian = $query['jumlah_dibayar'] - $query['jumlah_transaksi'] ;
                        $html .='
                        <tr class="tabletitle">
                            
                            <td colspan="2" class="Rate"><h3>Total </h3></td>
                            <td class="payment"><h3>Rp.'. $total .',-</h3></td>
                        </tr>
                        <tr class="tabletitle">
                            
                            <td colspan="2" class="Rate"><h3>Bayar : </h3></td>
                            <td class="payment"><h3>Rp.'. number_format($query['jumlah_dibayar'],0,",",".") .',-</h3 ></td>
                        </tr>
                        <tr class="tabletitle">
                          
                            <td colspan="2" class="Rate"><h3>Kembalian : </h3></td>
                            <td class="payment"><h3>Rp.'. $kembalian .',-</h3></td>
                        </tr>

                    </table>
                </div><!--End Table-->

                <div id="legalcopy">
                    <p class="legal"><strong>Terimakasih Telah Berbelanja!</strong>  Barang yang sudah dibeli tidak dapat dikembalikan. Jangan lupa berkunjung kembali
                    </p>
                </div>

            </div><!--End InvoiceBot-->
</div><!--End Invoice-->

</body>

</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Invoice.pdf','I');

?>
