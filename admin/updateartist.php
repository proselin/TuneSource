<?php
	session_start();
include('conn.php');
	if(!empty($_GET['edit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = $_GET['edit'];
			$name = $_POST['nameartist'];
      $description = $_POST['description'];
      $image = $_FILES['fileimage'];
      $a = basename( $_FILES["fileimage"]["name"]);
      $sql = "UPDATE artist SET nameartist= ?, description= ? where id_art = {$id}";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $name, $description);
    if (mysqli_stmt_execute($stmt))
   {?>
      <div class="alert alert-info" role="alert">
      <p class="text-center">Update success</p>
      </div>
  <?php  }
  else
  {?>
      <div class="alert alert-info" role="alert">
      <p class="text-center">Fail</p>
      </div>
      <?php  
  }

      if (!empty($image)){
      $target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileimage"]["name"]);
  if (move_uploaded_file($_FILES["fileimage"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileimage"]["name"])). " has been uploaded.<br>";
       $ab = mysqli_query($conn, "UPDATE artist SET image = '$a ' where id_art = {$id}");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
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
		$id = $_GET['edit'];
		$sql = "SELECT * FROM artist where id_art = {$id}";
		$query = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($query);
		
 	?>
	
	<form method="post">
		<div class="form-row">
  <div class="form-group col-md-6">
    <label for="ei1">Name</label>
    <input type="text" name="nameartist" class="form-control" id="ei1" placeholder="Name" value="<?= $row['nameartist'] ?>" required="required">
  </div>
   <div class="form-group col-md-6">
    <label for="ei2">Description </label>
    <input type="text" name="price" class="form-control" id="ei2" placeholder="description" value="<?= $row['description'] ?>" required="required">
  </div>
</div>
  <div class="form-group">
    <label for="fileimage">Image</label>
    <input type="file" class="form-control-file" id="fileimage" name="fileimage" value="<?= $row['image'] ?>">
  </div>
	<div class="form-row">
<div class="col-md-4">
      <button class="btn btn-primary" name="update" type="submit" value="Update">Update</button>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <a href="listartist.php" class="btn btn-danger">Cancel</a>
    </div>										
	</div>	
	</form>
</div>
</body>
</html>