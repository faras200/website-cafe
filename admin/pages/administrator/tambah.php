<div class="panel-header panel-header-lg">

</div>
<div class="content container " style="margin-top: -300px;">
        
<div class="card shadow">
  
  <div class="card-header">
        <h4 class="card-title"> Tambah Administrator</h4>
        
    </div>
    <div class="card-body">
    <form method="POST" action="">
  <div class="form-row">
    <div class="form-group col-md-6 mt-4">
      <label for="inputEmail4">Username</label>
      <input type="text" required class="form-control" id="inputEmail4" placeholder="Username" name="username" > 
    </div>
    <div class="form-group col-md-6 mt-4">
      <label for="inputPassword4">Password</label>
      <input type="password" required class="form-control" id="inputPassword4" placeholder="Password" name="pass">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6 mt-4">
    <label for="inputAddress">level</label>
    <select name="level" id="" class="form-control" required>
        <option value="1">Owner</option>
        <option value="2">Kasir</option>
    </select>
  </div>
  <div class="form-group col-md-6 mt-4">
  <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
  </div>
  </div>
</form>
</div>
  </div>
</div>    
        </div>

<?php
if(isset($_POST["submit"])){
$nama = $_POST["username"];
$password = $_POST["pass"];
$level = $_POST["level"];
$admin->tambah_admin($nama,$password,$level);

}
?>
     
      
  