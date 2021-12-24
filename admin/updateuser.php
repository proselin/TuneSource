<?php
  session_start();
include('conn.php');
  if(!empty($_GET['edit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
      $id = $_GET['edit'];
      $name = $_POST['username'];
      $pass = $_POST['password'];
      $role = $_POST['role'];
      $sql = "UPDATE user SET username= ?, password= ?, role = ? where username = {$id}";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ssd", $name, $pass, $role);
  if (mysqli_stmt_execute($stmt))
   {?>
      <div class="alert alert-info" role="alert">
      <p class="text-center">Update success</p>
      </div>
  <?php   }
  else
  {?>
      <div class="alert alert-info" role="alert">
      <p class="text-center">Fail</p>
      </div>
      <?php  
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>UPDATE</title>
  <?php include('opening.php'); ?>
</head>
</style>
<body>
  <div class="container">
  <form enctype="multipart/form-data" method="post">
  <?php  
    $user = $_GET['edit'];
    $sql = "SELECT * FROM user where username = '{$user}'";
    $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($query);
    
  ?>
  
  <form method="post">
    <div class="form-row">
  <div class="form-group col-md-6">
    <label for="ei1">Username</label>
    <input type="text" name="username" class="form-control" id="ei1" placeholder="Name" value="<?= $row['username'] ?>" required="required">
  </div>
   <div class="form-group col-md-6">
    <label for="ei2">Password </label>
    <input type="text" name="password" class="form-control" id="ei2" placeholder="description" value="<?= $row['password'] ?>" required="required">
  </div>
</div>
<div>
    <label for="es2">Role</label>
    <select class="form-control" id="es2" name="genre">
      <option></option>
        <?php
     $sql = "SELECT * from role";
     $rs = mysqli_query($conn,$sql);
     while ($rowa= mysqli_fetch_assoc($rs)) {
      ?>
         <option><?php echo $rowa['id_role']; ?></option>
      <?php }  
      ?>
    </select>
  </div>
  <hr>
  <div class="form-row">
<div class="col-md-4">
      <button class="btn btn-primary" name="update" type="submit" value="Update">Update</button>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <a href="listuser.php" class="btn btn-danger">Cancel</a>
    </div>                    
  </div>  
  </form>
</div>
</body>
</html>