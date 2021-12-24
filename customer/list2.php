<?php include('conn.php') ;
$namepage = $_GET['pagename'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $namepage ?></title>
	<?php include ('opening.php') ?>
</head>
<body>
	<?php include('navigation.php') ?>
    <!-- list product 1-->
       <!-- list Artist -->
   <div class="container">
	<div class="row lg-4 md-3 col ">
		<h2 class="list-product-title"><?php echo $namepage ?></h2>
		<div class="product-group">
			<div class="row">
				<?php 
      // ?page=2 => $_GET['page'] = 3 => 
 
        if(!empty($_GET['page']))
        {
          $page=$_GET['page']-1;
        }
        else
        {
          $page =0;
        }
      $sql = "SELECT * FROM $namepage "; 
      $rs = mysqli_query($conn, $sql);
      if( mysqli_num_rows($rs) > 0 ){
        while( $row = mysqli_fetch_assoc($rs) ){
      ?>
          <a href="product.php?id=<?php echo $row["id"] ?>" style="text-decoration: none;">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3" >
            <img class="card-img-top" src=" img/<?php echo $row['img'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nameartist'] ?></h5>
              <p class="card-subtitle" ><?php echo $row['description'] ?></p>
                <a href="#" class="btn btn btn-outline-info btn-block" style="margin-top: 20px;">More detail</a>
          </div>
        </div>
      </div>
  		</a>
      
    <?php 
        }//end while 

      }//check so hang tra ve > 0 
?>			
			</div>
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>
</body>
</html>
<!-- end list Artist  -->