<!DOCTYPE html>
<html>
<head>
	<title>List</title>
  <?php include('inc/opening.php'); ?>
</head>
<body>
  <?php include('inc/navigation.php');
        include('inc/conn.php');  ?>
    <!-- list product 1-->
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

    //$page = !empty($_GET['page']) ? ($_GET['page'] - 1): 0 ; //lay page hien tai
      $product_per_page = 4; //1 trang 3 sp 
            $offset = $product_per_page * $page; //offset chinh la phan can bo qua 

      $sql = "SELECT * FROM product "; 
      $rs = mysqli_query($conn, $sql);
?>
<div class="container">
		<div class="product-group">
      <div class="row">
    				<?php 
      if( mysqli_num_rows($rs) > 0 ){
        while( $row = mysqli_fetch_assoc($rs) ){
      ?>  <div></div>
      <div class="col-md-3 col-sm-6 col-12">
          <a href="product.php?id=<?php echo $row["id"] ?>" style="text-decoration: none;">
          <div class="card card-product md-3 ">
            <img class="card-img-top" src="img/<?php echo $row['image'] ?>" alt="Card image cap" style="height: 280px; width: 280px">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name'] ?></h5>
              <h6 class="card-title"><?php echo "Price : ". $row['price']." VND " ?></h6>
              <a href="product.php?id=<?php echo $row["id"] ?>" class="btn btn-block btn-outline-primary">Listen</a>
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
  <?php include('inc/footer.php'); ?>
  </body>
</html>
