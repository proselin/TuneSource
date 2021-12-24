<!DOCTYPE html>
<html>
<head>
	<title>full</title>  
	<?php include('inc/opening.php'); ?>
</head>
<style type="text/css">
  .card-product{
  width: 100%;
  margin-left: 5px;
  margin-right: 5px;
  overflow: hidden; 
}
</style>
<?php include("inc/conn.php") ?>
<body>
	<!-- carousel-->
			<div id="myCarousel" class="carousel slide mt-1" data-ride="carousel">
		
		 		 <!-- Indicators -->
		 		 <ul class="carousel-indicators">
		 		   <li data-target="#myCarousel" data-slide-to="0" ></li>
		 		   <li data-target="#myCarousel" data-slide-to="1"></li>
		 		 </ul>
		 		 
		 		 <!-- The slideshow -->
		 		 <div class="carousel-inner">
		 		   <div class="carousel-item active">
		 		     <img src="img/cal.png" class="d-block w-100">
		 		   </div>
		 		   <div class="carousel-item ">
		 		     <img src="img/0.jpg"  class="d-block w-100" >
		 		   </div>
		 		 </div>
		 		 
		 		 <!-- Left and right controls -->
		 		 <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
		 		   <span class="carousel-control-prev-icon"></span>
		 		 </a>
		 		 <a class="carousel-control-next" href="#myCarousel" data-slide="next">
		 		   <span class="carousel-control-next-icon"></span>
		 		 </a>
			</div>
	<!--carousel-->

     	<!-- Navigation bar-->
     		<hr class="mt-4">
	<?php include ("inc/navigation.php") ?>
		<!-- end navigation -->
 
  <div class="container">
  <div class="row mt-5">
    <div class="product-group">
    <h2 class="list-product-title">Artist</h2>
      <div class="row">
        <?php 
      $sql = "SELECT product.name,product.id,product.image,product.price, artist.nameartist, genre.namegenre  FROM product,artist,genre where product.id_art = artist.id_art and product.id_gen = genre.id_gen  LIMIT 4"; 
      $rs = mysqli_query($conn, $sql);
      if( mysqli_num_rows($rs) > 0 ){
        while( $row = mysqli_fetch_assoc($rs) ){
      ?>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3">
            <img style="width: 280px; height: 280px;" class="card-img-top"src="img/<?php echo $row['image'] ?>" alt="Card images cap"> 
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name'] ?></h5>
                <p class="card-text" ><?php echo $row['nameartist'].   "    ||    ". $row['namegenre'] ?></p>
                  <p class="card-text"><?php echo "Price : ". $row['price']." VND " ?></p>
                 <a href="product.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-info btn-block ">Listen</a>
              </div>
            </div>
          </div>   
    <?php 
        }//end while 

      }//check so hang tra ve > 0 
?>      
      </div>
    </div>
  </div>
</div>
 <!-- list Artist -->
   <div class="container">
  <div class="row mt-5">
    <h2 class="list-product-title">Artist</h2>
    <div class="product-group">
      <div class="row">
        <?php 
      $product_per_page = 4;
      $sql = "SELECT * FROM artist LIMIT $product_per_page"; 
      $rs = mysqli_query($conn, $sql);
      if( mysqli_num_rows($rs) > 0 ){
        while( $row = mysqli_fetch_assoc($rs) ){
      ?>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3">
            <img style="width: 280px; height: 280px;" class="card-img-top" src=" img/<?php echo $row['image'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nameartist'] ?></h5>
              <p class="card-subtitle" ><?php echo $row['description'] ?></p>
                <a href="simple_artist.php?id_art=<?php echo $row['id_art'] ?>" class="btn btn btn-outline-info btn-block">More detail</a>
          </div>
        </div>
      </div>
      
    <?php 
        }//end while 

      }//check so hang tra ve > 0 
?>      
      </div>
    </div>
  </div>
</div>
<!-- end list Artist  -->
    <!-- list genre-->
   <div class="container">
  <div class="row mt-5">
    <h2 class="list-product-title">Artist</h2>
    <div class="product-group">
      <div class="row">  

				<?php 

      $sql = "SELECT * from genre  LIMIT 4"; 
      $rs = mysqli_query($conn, $sql);
      if( mysqli_num_rows($rs) > 0 ){
        while( $row = mysqli_fetch_assoc($rs) ){
      ?>
          <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3">
            <img style="width: 280px; height: 280px;" class="card-img-top" src=" img/<?php echo $row['image'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['namegenre'] ?></h5>
              <p class="card-subtitle" ><?php echo $row['description'] ?></p>
                <a href="simple_genre.php?id_gen=<?php echo $row['id_gen'] ?>" class="btn btn btn-outline-info btn-block">More detail</a>
          </div>
        </div>
      </div>
        
    <?php 
        }//end while 

      }//check so hang tra ve > 0 
?>			
			</div>
		</div>
	</div>
</div>
<!-- end list product 1 -->


 
   
<!-- footer -- >
<?php include('inc/footer.php'); ?>
</html>