<?php
	session_start();
include('conn.php');
	if( $_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = $_POST['name'];
			$price = $_POST['price'];
			$id_art= $_POST['artist'];
			$music= $_FILES['filemusic'];
      $image = $_FILES['fileimage'];
  			$id_gen=$_POST['genre'];
			$Lyric = $_POST['lyric'];
      $i = basename( $_FILES["filemusic"]["name"]);
      $a = basename( $_FILES["fileimage"]["name"]);
      $sql = "INSERT INTO product(name, price,Lyric, id_art, id_gen, music, image) VALUES (? ,? ,? ,? ,? ,? ,?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sdsddss", $name, $price,$Lyric, $id_art, $id_gen,$i,$a);
  if (mysqli_stmt_execute($stmt))
   {
    echo "Update successful";
  }
  else
  {
    echo "Error: ".mysqli_error($conn);
  }

      if(!empty($image))
      {
        $target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileimage"]["name"]);
  if (move_uploaded_file($_FILES["fileimage"]["tmp_name"], $target_file))
  {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileimage"]["name"])). " has been uploaded.";
      }
       else {
    echo "Sorry, there was an error uploading your file.";
              } 
      }
    if(!empty($music)){
    $dir = "../music/";
     $locafile = $dir . basename($_FILES["filemusic"]["name"]);
  if (move_uploaded_file($_FILES['filemusic']['tmp_name'], $locafile)) {
  echo "The file ". htmlspecialchars( basename( $_FILES["filemusic"]["name"])). " has been uploaded.";
  }
     else {
    echo "Sorry, there was an error uploading your file.";
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
		<div class="form-row">
  <div class="form-group col-md-6">
    <label for="ei1">Name</label>
    <input type="text" name="name" class="form-control" id="ei1" placeholder="Name"  required="required">
  </div>
   <div class="form-group col-md-6">
    <label for="ei2">Price (VND) </label>
    <input type="text" name="price" class="form-control" id="ei2" placeholder="Price" required="required">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="es1">Artist</label>
    <select class="form-control" id="es1" name="artist" >
     <?php
     $sql = "SELECT * from artist";
     $rs = mysqli_query($conn,$sql);
     while ($row= mysqli_fetch_assoc($rs)) {?>
         <option><?php echo $row['id_art']; ?></option>
         <?php 
       }  
      ?>
    </select>
  </div>

    <div class="form-group col-md-6">
    <label for="es2">Genre</label>
    <select class="form-control" id="es2" name="genre">
        <?php
     $sql = "SELECT * from genre";
     $rs = mysqli_query($conn,$sql);
     while ($row= mysqli_fetch_assoc($rs)) {
      ?>
         <option><?php echo $row['id_gen']; ?></option>
      <?php }  
      ?>
    </select>
  </div>
  
</div>
  <div class="form-group">
    <label for="et2">Lyric</label>
    <textarea class="form-control" id="et2" rows="3"  name="lyric"></textarea>
  </div>
  <div class="form-group">
    <label for="filemusic">music</label>
    <input type="file" class="form-control-file" id="filemusic" name="filemusic" >
  </div>
  <div class="form-group">
    <label for="fileimage">Image</label>
    <input type="file" class="form-control-file" id="fileimage" name="fileimage">
  </div>
  <hr>
	<div class="row">
    <div class="col-md-4">
      <button class="btn btn-primary" name="update" type="submit" >Add</button>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <a href="listproduct.php" class="btn btn-danger">Cancel</a>
    </div>
												
	</div>	
	</form>
</div>
</body>
</html>