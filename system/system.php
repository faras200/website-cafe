<?php

class koneksi{
    public $conn;
    function __construct()
    {
       $this->conn =  mysqli_connect("localhost", "root","","u6972820_cafe");
    }

function select($query){
    $result = mysqli_query( $this->conn , $query);
    return mysqli_fetch_assoc($result);
}
function selectAll($query){
    $result = mysqli_query( $this->conn , $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) )
    {
        $rows[] = $row;
    }
    return $rows;
}

}

class admin{

function login_admin(){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    $row = mysqli_num_rows($query);
    if($row > 0){
        $arr = mysqli_fetch_assoc($query);
       
                $_SESSION['id_admin'] = $arr['id_admin'];
                $_SESSION['username'] = $arr['username'];
                $_SESSION['password_admin'] = $arr['password'];
                $_SESSION['level'] = $arr['level'];
                echo "<script>alert('Selamat Datang');
                document.location='index.php'</script>";
    }else{
        echo "<script>alert('Gagal Login');</script>";
    }

}

function tambah_admin($nama,$password,$level){

    $koneksi = new koneksi;
    
    $query = mysqli_query($koneksi->conn , "INSERT INTO admin VALUES ('', '$nama', '$password','$level')");
    if($query){
        echo notifSukses('ditambah', 'administrator');
    }else{
        echo notifGagal('ditambah', 'administrator');
    }

}

function hapusadmin($id){

    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn , "DELETE FROM admin WHERE id_admin = '$id' ");
    if($query){
        echo notifSukses('dihapus', 'administrator');
    }else{
        echo notifGagal('dihapus', 'administrator');
    }   
}

function ubah_admin($nama,$password,$level,$id){
    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn, "UPDATE admin SET username = '$nama', password = '$password' , level = '$level' WHERE id_admin = '$id'");
    if($query){
        echo notifSukses('diubah', 'administrator');
    }else{
        echo notifGagal('diubah', 'administrator');
    }  
}


}

class users{

    function daftar_user($id,$nama){

        $koneksi = new koneksi;
        
        $conn = mysqli_query($koneksi->conn , "INSERT INTO user VALUES ('','$id', '$nama')");
        if ($conn){
            setcookie('nama_user', $_POST['nama'], time() +36000000,('/'));
            echo "<script>alert('Selamat Belanja');
                    document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Gagal Daftar');</script>";
        }

    }

}


class produk{
     
    function tambahProduk($produk,$kategori,$harga,$detail_produk){
      $koneksi = new koneksi();
      $upload = new upload();

      $gambar = $upload->unggah_gambar('produk');
      if( !$gambar){
          return false ;
      }  
      $query = mysqli_query($koneksi->conn, "INSERT INTO produk
         values('','$kategori','$produk','$detail_produk','$harga','$gambar')");
         if($query){
            echo notifSukses('ditambah', 'produk');
        }else{
            echo notifGagal('ditambah', 'produk');
        }   
    }

    function hapusProduk($id){

        $koneksi = new koneksi();
        $query = mysqli_query($koneksi->conn , "DELETE FROM produk WHERE id_produk = '$id' ");
        if($query){
            echo notifSukses('dihapus', 'produk');
        }else{
            echo notifGagal('dihapus', 'produk');
        }   
    }

    function ubahProduk($nama_produk,$kategori,$harga,$gambarLama,$detail_produk,$id){
        $koneksi = new koneksi();
      $upload = new upload();
    
      if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	}else{
        $gambar = $upload->unggah_gambar('produk');
	}
        $query = mysqli_query($koneksi->conn, "UPDATE produk SET  kategori_produk = '$kategori', nama_produk = '$nama_produk',detail_produk = '$detail_produk', harga_produk = '$harga' , foto_produk = '$gambar'WHERE id_produk = $id");
        if($query){
            echo notifSukses('diubah', 'produk');
        }else{
            echo notifGagal('diubah', 'produk');
        }
    }

}


class diskon{
     
    function tambahdiskon($nama_produk,$nama_diskon,$jm_diskon,$status){
      $koneksi = new koneksi();
      $query = mysqli_query($koneksi->conn, "INSERT INTO diskon
         values('','$nama_produk','$nama_diskon','$jm_diskon','$status')");
         if($query){
            echo notifSukses('ditambah', 'diskon');
        }else{
            echo notifGagal('ditambah', 'diskon');
        }   
    }

    function hapusdiskon($id){

        $koneksi = new koneksi();
        $query = mysqli_query($koneksi->conn , "DELETE FROM diskon WHERE id_diskon = '$id' ");
        if($query){
            echo notifSukses('dihapus', 'diskon');
        }else{
            echo notifGagal('dihapus', 'diskon');
        }   
    }

    function ubahdiskon($nama_produk,$nama_diskon,$jm_diskon,$status,$id){
        $koneksi = new koneksi();
        $query = mysqli_query($koneksi->conn, "UPDATE diskon SET  id_produk = '$nama_produk', nama_diskon = '$nama_diskon', jumlah_diskon = '$jm_diskon' , status = '$status'WHERE id_diskon = $id");
        if($query){
            echo notifSukses('diubah', 'diskon');
        }else{
            echo notifGagal('diubah', 'diskon');
        }
    }

}

class paket{
    function tambah_paket($nama_paket,$harga_paket,$detail_paket){
      $koneksi = new koneksi();
      $upload = new upload();
      $gambar = $upload->unggah_gambar('paket');
      if( !$gambar){
          return false ;
      }  
      $query = mysqli_query($koneksi->conn, "INSERT INTO paket
         values('','$nama_paket','$detail_paket','$harga_paket','$gambar')");
         if($query){
            echo notifSukses('ditambah', 'paket');
        }else{
            echo notifGagal('ditambah', 'paket');
        }   
    }

    function hapus_paket($id){

        $koneksi = new koneksi();
        $query = mysqli_query($koneksi->conn , "DELETE FROM paket WHERE id_pakdet = '$id' ");
        if($query){
            echo notifSukses('dihapus', 'paket');
        }else{
            echo notifGagal('dihapus', 'paket');
        }   
    }

    function ubah_paket($nama_paket,$harga_paket,$detail_paket,$gambarLama,$id){
        $koneksi = new koneksi();
      $upload = new upload();
    
      if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	}else{
        $gambar = $upload->unggah_gambar('paket');
	}
        $query = mysqli_query($koneksi->conn, "UPDATE paket SET  nama_paket = '$nama_paket', detail_paket = '$detail_paket', harga_paket = '$harga_paket',  foto_paket = '$gambar' WHERE id_paket = $id");
        if($query){
            echo notifSukses('diubah', 'paket');
        }else{
            echo notifGagal('diubah', 'paket');
        }
    }

}

class upload 
    {
        function unggah_gambar($folder){
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];
        
            //cek apakah tidak ada gambar yang diupload
            if($error === 4){
                echo "<script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
            }
        
            // cek apakah yg di upload adalah gambar
            $ekstesiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.',$namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if(!in_array($ekstensiGambar, $ekstesiGambarValid)){
                echo "<script>
                alert('Yang anda upload bukan gambar!');
            </script>";
            return false ;
            }
        
            //cek jika ukurannya terlalu besar
            if($ukuranFile > 10000000){
                echo "<script>
                alert('gambar terlalu besar!');
            </script>";
            return false ;
            }
        
            //lolos pengecekan gambar siap diupload
            //generate nama baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
        
            move_uploaded_file($tmpName,'img/'. $folder .'/'. $namaFileBaru);
            return $namaFileBaru;
        }
    }

class transaksi{

    function tambah_transaksi($user,$meja,$metode_bayar,$total_harga,$tgl){
 $koneksi = new koneksi();
// Save new orders
$sql1 = "INSERT INTO transaksi VALUES ('','$user' ,'kosong','$metode_bayar','$meja','pembayaran','$total_harga','0','$tgl')";
$result =mysqli_query($koneksi->conn, $sql1);
$transaksi_id = mysqli_insert_id($koneksi->conn); 
// Save order details for new orders
@$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
    $total = $cart[$i]->price * $cart[$i]->quantity;
    $produk_id =$cart[$i]->id;
    $qty = $cart[$i]->quantity;
    $diskon = @$cart[$i]->diskon;
$sql2 = "INSERT INTO detail_transaksi VALUES ('','$transaksi_id','$produk_id','$diskon','$qty','$total')";
 mysqli_query($koneksi->conn, $sql2);
    }
    if($result){
        echo "<script>alert('Berhasil Membuat Pesanan');
        document.location='index.php?p=bayar'</script>";
    }else{
    echo "<script>alert('Gagal Membuat Pesanan');
    document.location='index.php?p=checkout'</script>";
    }

}

function update_transaksi($bayar,$kasir,$id){
    $koneksi = new koneksi();

    $query = mysqli_query($koneksi->conn, "UPDATE transaksi SET  id_admin = '$kasir', status_transaksi = 'dibayar', jumlah_dibayar = '$bayar' WHERE id_transaksi = $id");
    if($query){
        echo "<script>var konfirm = confirm('Berhasil, Cetak Invoice ?');
        if(konfirm){
            window.open('pages/laporan/cetak_invoice.php?id=$id', '_blank');
            document.location='index.php?p=transaksi';
   }else{
        document.location='index.php?p=transaksi'
    }</script>";
    }else{
        echo notifGagal('diubah', 'kasir');
    }
}

function hapusTransaksi($id){

    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn , "DELETE FROM transaksi WHERE id_transaksi = '$id' ");
    if($query){
        echo notifSukses('dihapus', 'laporan');
    }else{
        echo notifGagal('dihapus', 'laporan');
    }   
}
}


function notifSukses($pesan,$tujuan){
    return "<script>alert('Barhasil $pesan');
    document.location='index.php?p=$tujuan'</script>";
}

function notifGagal($pesan,$tujuan){
    echo "<script>alert('Gagal $pesan');
    document.location='index.php?p=$tujuan'</script>";
    return false;
}

function randomString($length)
{
    $str        = "";
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

?>