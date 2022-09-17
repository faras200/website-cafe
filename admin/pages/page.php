<?php 
    switch($_GET['p']){

        case 'dashboard'    :if(!file_exists('pages/dashboard/dashboard.php'))die("Halaman Tidak Ada");
                            include 'pages/dashboard/dashboard.php';
                            break;
                            break;


        case 'transaksi'    :if(!file_exists('pages/transaksi/transaksi.php'))die("Halaman Tidak Ada");
                            include 'pages/transaksi/transaksi.php';
                            break;
                            break;


        case 'kasir'    :if(!file_exists('pages/transaksi/kasir.php'))die("Halaman Tidak Ada");
                            include 'pages/transaksi/kasir.php';
                            break;
                            break;

        //PRODUK
        case 'produk'    :if(!file_exists('pages/produk/produk.php'))die("Halaman Tidak Ada");
                            include 'pages/produk/produk.php';
                            break;
                            break;
                            
        case 'tambah-produk'      :if(!file_exists('pages/produk/tambah.php'))die("Halaman Tidak Ada");
                            include 'pages/produk/tambah.php';
                            break;
                            break;

                        
        case 'hapus-produk'      :if(!file_exists('pages/produk/hapus.php'))die("Halaman Tidak Ada");
                            include 'pages/produk/hapus.php';
                            break;
                            break;
        case 'edit-produk'      :if(!file_exists('pages/produk/ubah.php'))die("Halaman Tidak Ada");
                            include 'pages/produk/ubah.php';
                            break;
                            break;
        
        
        
        //DISKON
        case 'diskon'    :if(!file_exists('pages/diskon/diskon.php'))die("Halaman Tidak Ada");
                            include 'pages/diskon/diskon.php';
                            break;
                            break;
                            
        case 'tambah-diskon'      :if(!file_exists('pages/diskon/tambah.php'))die("Halaman Tidak Ada");
                            include 'pages/diskon/tambah.php';
                            break;
                            break;

                        
        case 'hapus-diskon'      :if(!file_exists('pages/diskon/hapus.php'))die("Halaman Tidak Ada");
                            include 'pages/diskon/hapus.php';
                            break;
                            break;
        case 'edit-diskon'      :if(!file_exists('pages/diskon/ubah.php'))die("Halaman Tidak Ada");
                            include 'pages/diskon/ubah.php';
                            break;
                            break;

        
        //LAPORAN                    
        case 'laporan'      :if(!file_exists('pages/laporan/laporan.php'))die("Halaman Tidak Ada");
                            include 'pages/laporan/laporan.php';
                            break;
                            break;

        case 'detail-laporan'      :if(!file_exists('pages/laporan/detail_laporan.php'))die("Halaman Tidak Ada");
                            include 'pages/laporan/detail_laporan.php';
                            break;
                            break;

        case 'cetak-laporan'      :if(!file_exists('pages/laporan/cetak_laporan.php'))die("Halaman Tidak Ada");
                            include 'pages/laporan/cetak_laporan.php';
                            break;
                            break;

        case 'tambah-laporan'      :if(!file_exists('laporan/tambah_laporan.php'))die("Halaman Tidak Ada");
                            include 'laporan/tambah_laporan.php';
                            break;
                            break;
        case 'hapus-transaksi'      :if(!file_exists('pages/transaksi/hapus.php'))die("Halaman Tidak Ada");
                            include 'pages/transaksi/hapus.php';
                            break;
                            break;
        case 'edit-laporan'      :if(!file_exists('laporan/edit_laporan.php'))die("Halaman Tidak Ada");
                            include 'laporan/edit_laporan.php';
                            break;
                            break;


        //PAKET
        case 'paket'      :if(!file_exists('pages/paket/paket.php'))die("Halaman Tidak Ada");
                            include 'pages/paket/paket.php';
                            break;
                            break;
        case 'hapus-paket'      :if(!file_exists('pages/paket/hapus.php'))die("Halaman Tidak Ada");
                            include 'pages/paket/hapus.php';
                            break;
                            break;
        case 'ubah-paket'      :if(!file_exists('pages/paket/ubah.php'))die("Halaman Tidak Ada");
                            include 'pages/paket/ubah.php';
                            break;
                            break;
        case 'tambah-paket'      :if(!file_exists('pages/paket/tambah.php'))die("Halaman Tidak Ada");
                            include 'pages/paket/tambah.php';
                            break;
                            break;

        //PROMOTOR
        case 'promotor'      :if(!file_exists('paket/promotor.php'))die("Halaman Tidak Ada");
                            include 'paket/promotor.php';
                            break;
                            break;

        //ADMINISTRATOR
        case 'administrator'      :if(!file_exists('pages/administrator/administrator.php'))die("Halaman Tidak Ada");
                            include 'pages/administrator/administrator.php';
                            break;
                            break;
        case 'tambah-administrator'      :if(!file_exists('pages/administrator/tambah.php'))die("Halaman Tidak Ada");
                            include 'pages/administrator/tambah.php';
                            break;
                            break;
        case 'hapus-administrator'      :if(!file_exists('pages/administrator/hapus.php'))die("Halaman Tidak Ada");
                            include 'pages/administrator/hapus.php';
                            break;
                            break;
        case 'edit-administrator'      :if(!file_exists('pages/administrator/ubah.php'))die("Halaman Tidak Ada");
                            include 'pages/administrator/ubah.php';
                            break;
                            break;

        //TOKO
        case 'toko'      :if(!file_exists('toko/toko.php'))die("Halaman Tidak Ada");
                            include 'toko/toko.php';
                            break;
                            break;

                        
        case 'tambah-toko'      :if(!file_exists('toko/tambah_toko.php'))die("Halaman Tidak Ada");
                            include 'toko/tambah_toko.php';
                            break;
                            break;
        case 'hapus-toko'      :if(!file_exists('toko/hapus_toko.php'))die("Halaman Tidak Ada");
                            include 'toko/hapus_toko.php';
                            break;
                            break;
        case 'edit-toko'      :if(!file_exists('toko/edit_toko.php'))die("Halaman Tidak Ada");
                            include 'toko/edit_toko.php';
                            break;
                            break;

                        }
?>