<?php
  session_start();
include('conn.php');
  if( $_SERVER['REQUEST_METHOD'] == 'POST'){
      $name = $_POST['username'];
      $pass = $_POST['password'];
      $role = $_POST['role'];
      $sql = "INSERT INTO user VALUES (?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ssd", $name, $pass, $role);
  if (mysqli_stmt_execute($stmt))
   {
    echo "insert success <br>";
  }
  else
  {
    echo "Error: ".mysqli_error($conn);
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
    <?php include('header.php'); ?>
  <div class="list-group">
          <a href="adduser.php" class="list-group-item list-group-item-action list-group-item-secondary text-center"><h3>Insert</h3></a>

        </div>
      </div>
  <div class="container">
  <form enctype="multipart/form-data" method="post">
    <div class="form-row">
  <div class="form-group col-md-6">
    <label for="ei1">Username</label>
    <input type="text" name="username" class="form-control" id="ei1" placeholder="Name" required="required">
  </div>
   <div class="form-group col-md-6">
    <label for="ei2">Password </label>
    <input type="text" name="password" class="form-control" id="ei2" placeholder="description"  required="required">
  </div>
</div>
<div>
    <label for="es2">Role</label>
    <select class="form-control" id="es2" name="genre">
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
      <button class="btn btn-primary" name="insert" type="submit">Insert</button>
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