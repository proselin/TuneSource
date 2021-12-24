<?php
	session_start();
include('conn.php');
	if( $_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = $_POST['nameartist'];
			$description = $_POST['description'];
			$image = $_FILES['fileimage'];
      $a = basename( $_FILES["fileimage"]["name"]);
      $sql = "INSERT INTO artist(nameartist, image, description) VALUES (? ,? ,?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $name,$a ,$description);
  if (mysqli_stmt_execute($stmt))
   {
    echo "ADD successful";
  }
  else
  {
    echo "Error: ".mysqli_error($conn);
  }

      if(!empty($image)){
        $target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileimage"]["name"]);
  if (move_uploaded_file($_FILES["fileimage"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileimage"]["name"])). " has been uploaded.";
      
  } else {
    echo "Sorry, there was an error uploading your file.";
} 
      }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>INSERT</title>
	<?php include('opening.php'); ?>
</head>
</style>
<body>
	<div class="container">
	<form enctype="multipart/form-data" method="post">
	
	<form method="post">
  <div class="form-group">
    <label for="ei1">Name Artist</label>
    <input type="text" name="name" class="form-control" id="ei1" placeholder="nameartist"  required="required">
  </div> 
</div>
  <div class="form-group">
    <label for="et2">Description</label>
    <textarea class="form-control" id="et2" rows="3"  name="description" required="required"></textarea>
  </div>
  <div class="form-group">
    <label for="fileimage">Image</label>
    <input type="file" class="form-control-file" id="fileimage" name="fileimage">
  </div>
  <hr>
	<div class="row">
    <div class="col-md-4">
      <button class="btn btn-primary" name="add" type="submit" >Add</button>
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