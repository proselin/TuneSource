<!-- The data encoding type, enctype, MUST be specified as below -->
<!DOCTYPE html>
<html>
<body>
	<?php  
include('conn.php');
	if(!empty($_GET['edit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = $_GET['edit'];
			$music= $_FILES['filemusic'];
      $image = $_FILES['fileimage'];
      
      if(!empty($music)){
        $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileimage"]["name"]);


  if (move_uploaded_file($_FILES["fileimage"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileimage"]["name"])). " has been uploaded.";
      $i = basename( $_FILES["filemusic"]["name"]) ;
       mysql_query($conn, "UPDATE product SET music = '$i' where id = {$id}");
  } else {
    echo "Sorry, there was an error uploading your file.";
}	
      }
    



if(!empty($image)){
$dir = "music/";
$locafile = $dir . basename($_FILES["filemusic"]["name"]);
$uploadOk = 1;
$mstype = strtolower(pathinfo($locafile,PATHINFO_EXTENSION));

print_r('basename( $_FILES["fileimage"]["name"]))')
// Check if $uploadOk is set to 0 by an error

  if (move_uploaded_file($_FILES["fileimage"]["tmp_name"], $locafile)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["filemusic"]["name"])). " has been uploaded.";
    $a = basename( $_FILES["filemusic"]["name"]);
    mysql_query($conn, "UPDATE product SET image = '$a' where id = {$id}");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}	
}



	
?>

<form method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileimage" id="fileimage">
  <input type="file" name="filemusic" id="filemusic">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
