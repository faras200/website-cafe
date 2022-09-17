<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
 
  <div class="card-header">
        <h4 class="card-title">Administrator</h4>
        
    </div>
    <div class="card-body">
    <a href="?p=tambah-administrator"  class="btn btn-info  justify-content-end ">New  <i class="now-ui-icons ui-1_simple-add"></i></a>
    <div class="table-responsive">
    <table class="table align-items-center table-flush">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;
      $query = $koneksi->selectAll("SELECT * FROM admin");
      foreach($query as $row):
      ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $row["username"] ?></td>
            <?php if($row["level"] == 1){
              $lv = "Owner";
            }else if($row["level"] == 2)
            {
              $lv = "Kasir";
            }
            ?>
            <td><?= $lv ?></td>
            <td class="td-actions text-right">
                <a href="?p=edit-administrator&id=<?= $row['id_admin'] ?>" class="btn btn-info btn-sm btn-icon">
                    <i class="now-ui-icons users_single-02"></i>
                </a>
                <a href="?p=hapus-administrator&id=<?= $row['id_admin'] ?>" class="btn btn-danger btn-sm btn-icon">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </a>
            </td>
        </tr>
        <?php $no++; endforeach; ?>
  
    </tbody>
</table>
</div>
  </div>
</div>    
        </div>
        
     
      
  