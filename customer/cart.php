<?php 
include("inc/conn.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>cart</title>
	<?php include('inc/opening.php') ?>
</head>
<body>
<?php include('inc/navigation.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
	
	$id = $_POST['id'];

	if(empty($_SESSION['cart'][$id]))
	{
		$q = mysqli_query( $conn, "SELECT * FROM product WHERE id= {$id}");
		$product = mysqli_fetch_assoc($q);

		$_SESSION['cart'][$id] = $product;
		$_SESSION['cart'][$id]['sl'] = 1;
	}
	else
	{
		$slmoi = $_SESSION['cart'][$id]['sl'] + $_POST['sl'];
		$_SESSION['cart'][$id]['sl'] = $slmoi;
	}
}
 ?>
 <div class="container">
 	<h3 style="text-align: center;" class="title">Cart</h3>
  <div class="row ">
  	  
	<?php
 		if (!empty($_SESSION['cart']))
 		foreach ($_SESSION['cart'] as $item) :
 		 ?>
      <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" style="max-width: 280px; max-height: 280px;" src="img/<?php echo $item['image'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $item['name'] ?></h5>
              <h6 class="card-title"><?php echo "Price : ". $item['price']." VND " ?></h6>
              <a href="product.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-info">Detail</a>
              <a href="product.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-danger">Delete</a>
            </div>
          </div>
        </div>
 		 <?php
 		 endforeach;
 		 else{
 		 echo "Cart is empty!" ;}
 		 ?>
	</div>
 		 <?php 
 		  	$tong = 0;
 		  	foreach( $_SESSION['cart'] as $item ){
 		  		$tong += $item['sl'] * $item['price'];
 		  	} 
 		  	 ?>
 		  	 <div class="card card-body" style="margin-top: 20px;">
 		  	 	<h3 class="cart-header text-center red">Total: <?php echo number_format($tong)?> VND</h3>
 		  	 	<?php if(!$tong == 0){
 		  	 	 ?>
 		  	 	 <a href="destroy.php" class="btn btn-primary btn_block">Pay<a>
 		  	 	 	<?php 
					}
	  	 	 	 ?>		  	 	
 		  	 </div>
 	</div>
 	<?php include('inc/footer.php'); ?> 	

</body>
</html>