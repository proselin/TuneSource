<?php
	session_start();
include('conn.php');
	if(!empty($_GET['edit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = $_GET['edit'];
			$name = $_POST['name'];
      $price = $_POST['price'];
      $id_art= $_POST['artist'];
      $music= $_FILES['filemusic'];
      $image = $_FILES['fileimage'];
        $id_gen=$_POST['genre'];
      $Lyric = $_POST['lyric'];
      $i = basename( $_FILES["filemusic"]["name"]);
      $a = basename( $_FILES["fileimage"]["name"]);
      $sql = "UPDATE product SET name= ?, price= ?,Lyric= ?, id_art= ?, id_gen= ? where id = {$id}";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sdsdd", $name, $price,$Lyric, $id_art, $id_gen);
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
       $ab = mysqli_query($conn, "UPDATE product SET image = '$a ' where id = {$id}");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
print_r($a);
print_r($i);

if(!empty($music)){
$dir = "../music/";
$locafile = $dir . basename($_FILES["filemusic"]["name"]);

  if (move_uploaded_file($_FILES["filemusic"]["tmp_name"], $locafile)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["filemusic"]["name"])). " has been uploaded.<br>";
    $c = mysqli_query($conn, "UPDATE product SET music = '$i ' where id = {$id}");
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
		$sql = "SELECT * FROM product where id = {$id}";
		$query = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($query);
		// if(isset($_GET['update'])){
		// 	$query = mysqli_query($conn,$sql);
		// 	$row = mysqli_fetch_assoc($query);
		// }
		
 	?>
	
	<form method="post">
		<div class="form-row">
  <div class="form-group col-md-6">
    <label for="ei1">Name</label>
    <input type="text" name="name" class="form-control" id="ei1" placeholder="Name" value="<?= $row['name'] ?>" required="required">
  </div>
   <div class="form-group col-md-6">
    <label for="ei2">Price (VND) </label>
    <input type="text" name="price" class="form-control" id="ei2" placeholder="Price" value="<?= $row['price'] ?>" required="required">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="es1">Artist</label>
    <select class="form-control" id="es1" name="artist" >
     <?php
     $sql = "SELECT * from artist";
     $rs = mysqli_query($conn,$sql);
     while ($rowa= mysqli_fetch_assoc($rs)) {?>
         <option><?php echo $rowa['id_art']; ?></option>
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
     while ($rowa= mysqli_fetch_assoc($rs)) {
      ?>
         <option><?php echo $rowa['id_gen']; ?></option>
      <?php }  
      ?>
    </select>
  </div>
  </div>
  <div class="form-group">
    <label for="et2">Lyric</label>
    <input class="form-control" id="et2" rows="3" value="<?= $row['Lyric'] ?>" name="lyric"></input>
  </div>
  <div class="form-group">
    <label for="filemusic">music</label>
    <input type="file" class="form-control-file" id="filemusic" name="filemusic" value="<?= $row['music'] ?>">
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
      <a href="listproduct.php" class="btn btn-danger">Cancel</a>
    </div>										
	</div>	
	</form>
</div>
</body>
</html>