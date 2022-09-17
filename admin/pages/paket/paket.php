
<div class="header bg-gradient-primary pb-8 pt-7 ">
    
    </div>
    
    <div class="container-fluid mt--9 " id="produk">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Data Paket</h3>
                    </div>
                    <a href="?p=tambah-paket" align="center"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Detail Paket</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $query = $koneksi->selectALL("SELECT * FROM paket");
                                    foreach($query as $row) :
                                ?>
                                
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $row["nama_paket"] ?></td>
                                        <td><?= $row["detail_paket"] ?></td>
                                        <td><?= $row["harga_paket"] ?></td>
                                        <td><a href="?p=hapus-paket&id=<?=$row['id_paket']?>" onclick="return confirm('yakin dihapus?')"><i class="fa fa-trash"></i></a>&nbsp;<a href="?p=ubah-paket&id=<?=$row['id_paket']?>"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                    <?php $no++; endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>