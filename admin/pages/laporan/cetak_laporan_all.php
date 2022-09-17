<?php

require_once __DIR__ . '\vendor\autoload.php';
require '../../../system/system.php';
$koneksi = new koneksi;
$query = $koneksi->selectAll("SELECT * FROM transaksi,user,admin WHERE transaksi.id_user = user.id_user AND transaksi.status_transaksi = 'dibayar' AND transaksi.id_admin = admin.id_admin ");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar mahasiswa</title>
    <style>
    .table1 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #f2f5f7;
    }
     
    .table1 tr th{
        background: #35A9DB;
        color: #fff;
        font-weight: normal;
    }
     
    .table1, th, td {
        padding: 8px 20px;
        text-align: center;
    }
     
    .table1 tr:hover {
        background-color: #f5f5f5;
    }
     
    .table1 tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    h1{
        text-align:center;
    }
    </style>
</head>
<body>
<img src="../../../assets/img/logo_hitam.jpeg" width="100px" style="float:left; margin-top:-40px;margin-left:20px;">
    <h1 style="color:black; font-size:40px; margin-left:-125px; margin-bottom:-5px;  ">DAN N BAM</h1>
    <p style="margin-top:-150px; margin-bottom:-1px; text-align:center;">Jl. Ruko Pemda Tigaraksa, Blok AN 36 No 41 Kel. Kaduagung <br>Kec. Tigaraksa Kabupaten Tangerang</p>
    <p style="margin-top:-150px; text-align:center;">+62 812-8711-0105</p>
    <hr style="margin-top:-10px; border:2px solid black">
    <h1 style="margin-top:-10px; text-align:center;">Laporan Transaksi</h1>
    <table class="table1">
    <tr>
    <th class="text-center">No</th>
    <th>Nama Kasir</th>
    <th>Nama User</th>
    <th>Status</th>
    <th>Total Harga</th>
    <th>Tanggal</th>
</tr>';
    $i = 1;
    foreach($query as $row){
        $html .= '<tr>
            <td>'. $i++ .'</td>
        <td>'. $row["username"] .'</td>
        <td>'. $row["nama_user"] .'</td>
        <td>'. $row["status_transaksi"] .'</td>
        <td> Rp.'. number_format($row["jumlah_transaksi"],0,",",".") .'</td>
        <td>'. $row["tanggal_transaksi"] .'</td>
        </tr>';
    }


$html .= '</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output('Laporan Transaksi Semua.pdf', \Mpdf\Output\Destination::INLINE);

?>
