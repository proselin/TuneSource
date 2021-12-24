<?php include('inc/conn.php');?>
		
<!DOCTYPE html>
<html>
<head>
	<?php include('inc/opening.php'); ?>
	<title>Search</title>
</head>
<body>
<?php include('inc/navigation.php'); 
 $search = "";
 if(!empty($_GET['search']))
  {
    $search = $_GET['search'];
    $rc = 0;
  } 
?>  <hr class="mt-4">
    <h3 class="title">Search Result: <?= $search ?></h3>
    <hr class="mt-4">
<div class="container">
	
		
    <?php 
      if(!empty($search)){
      	?> 
      	<h2 class="list-product-title">Song</h2>
		<div class="product-group">
			<div class="row mt-5">
		<?php  
        $rs = mysqli_query( $conn , "SELECT * FROM product WHERE name LIKE '%{$search}%'");
        while ( $row = mysqli_fetch_assoc( $rs)) {
        ?>
        <a href="product.php?id=<?php echo $row["id"] ?>" style="text-decoration: none;">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3">
            <img class="card-img-top" src="img/<?php echo $row['image'] ?>" alt="Card image cap" style="max-height: 280px; max-width: 280px">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name'] ?></h5>
              <p class="card-subtitle" ><?php echo $row['id_art'] ." || ". $row['id_gen']  ?></p>
              <h6 class="card-title"><?php echo "Price : ". $row['price']." VND " ?></h6>
              <a href="#" class="btn">Add to cart</a>
              <a href="#" class="btn">Listen</a>

            </div>
          </div>
        </div>
          </a>
      </div>
     </div>
    <?php
      }
    ?>
    <hr class="mt-4">
	<?php 
      	?> 
      	<h2 class="list-product-title">Artist</h2>
		<div class="product-group">
			<div class="row mt-5">

		<?php  
        $rs = mysqli_query( $conn , "SELECT * FROM artist WHERE nameartist LIKE '%{$search}%'");
        while ( $row = mysqli_fetch_assoc( $rs)) {
        ?>
        <a href="simple_artist.php?id=<?php echo $row["id_art"] ?>" style="text-decoration: none;">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3">
            <img class="card-img-top" src=" img/<?php echo $row['img'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nameartist'] ?></h5>
              <p class="card-subtitle" ><?php echo $row['description'] ?></p>
                <a href="#" class="btn btn btn-outline-info btn-block">More detail</a>
          </div>
        </div>
      </div>
  		</a>
  			
    <?php
      }
    ?>
    </div>
      </div>  
    <hr class="mt-4">

    <?php 
      	?> 
      	<h2 class="list-product-title">Genre</h2>
		<div class="product-group">
			<div class="row mt-5">
		<?php  
        $rs = mysqli_query( $conn , "SELECT * FROM genre WHERE namegenre LIKE '%{$search}%'");
        while ( $row = mysqli_fetch_assoc( $rs)) {
        ?>
        <a href="simple_artist.php?id=<?php echo $row["id_gen"] ?>" style="text-decoration: none;">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3">
            <img class="card-img-top" src=" img/<?php echo $row['img'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['namegenre'] ?></h5>
              <p class="card-subtitle" ><?php echo $row['description'] ?></p>
                <a href="#" class="btn btn btn-outline-info btn-block">More detail</a>
          </div>
        </div>
      </div>
  		</a>
    <?php
      }
    }else
      {
     ?>
     <h1>No result</h1>
     <?php 
    }
    ?>
    </div>
      </div>
  </div>
  <?php include('inc/footer.php'); ?>
</body>
</html>
