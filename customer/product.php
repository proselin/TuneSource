<!DOCTYPE html>
<html>
<head>
	<title>Product</title>  

  <?php include ("inc/opening.php") ?>

</head>
<style type="text/css">

	.container{
		background-color: white;
		background-image: none;
		border-radius: 15px;
		box-shadow: 5px;

	}
	.container-audio{
		margin-top: 40px;
		width: 100%;
	}
	.btn {
	}
	li a {
		text-decoration: none;

	}
</style>
<?php include("inc/conn.php") ?>
<body>

<!-- navigation -- >
	<?php include ("inc/navigation.php") ?>

<div class="container">
	 <hr class="mt-4">
	<div class="row grid">
		<div class="col-md-8">
<!-- start music player -->
  <?php  
            $id = $_GET['id'];
            $sql = "SELECT  product.name, artist.nameartist, product.music, product.image, product.lyric FROM product, artist where product.id = {$id} and product.id_art = artist.id_art"; 
            $rs = mysqli_query($conn, $sql);
			 $row = mysqli_fetch_assoc($rs); 
      ?>

      <div class="musicplay">
         <div class="container">
            <div class="musicline">
              <div class="musicline-header"><h1><?php echo $row['name']; ?></h1></div>
              <div class="musicline-body">
                <div class="music-header">
                  <h3><?php echo "Artist : ". $row['nameartist']?></h3>
                </div>
                <hr class="mt-4">
                <div class="music-img mx-auto d-block"><img style="max-height: 350px; max-width: 350px; border-radius: 15px" src="img/<?php echo $row['image'] ?>">
            	</div>
            	   <hr class="mt-4">
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-center max-width" style=" margin:auto;">
              <audio controls  autoplay  controlsList="nodownload" >
                         <source src="music/<?php echo  $row['music'] ?>" type="audio/ogg" nodownload>
                         Your browser dose not Support the audio Tag
                     </audio>
                 </div>
             
         
<!-- end music player -->
<hr class="mt-4">
<!-- button -->
<div>
	<form method="POST" action="cart.php">
	<input  type="hidden" name="id" value="<?= $id ?>" >	
	<button class="btn btn-outline-primary btn-block" type="submit">Add to cart</button>
	</form>

</div>
<!-- end button -->
<hr class="mt-4">
<!-- description -->

			<div class="lyrics">
					<p class="subtitle"><?php echo "lyrics :     ". $row['lyric'] ?></p>
		</div>
	</div>
			<div class="col-md-4" >
			   <div class="abc shadow p-3 mb-5 bg-white rounded" style="position: sticky;">
			    <div class="title">
			       <h2>Hot Song</h2>
			    </div>
			       <!-- list product 1-->
			<?php 
			      $sql = "SELECT product.id, product.name, artist.nameartist FROM product,artist where artist.id_art = product.id_art LIMIT 7"; 
			      $rs = mysqli_query($conn, $sql);
			?>
			
			     <ul class="list-group">
			        <?php 
			      if( mysqli_num_rows($rs) > 0 ){
			        while( $row = mysqli_fetch_assoc($rs) ){
			      ?>
			        <li class="list-group-item" > <a  href="product.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] . "     |    " . $row['nameartist'] ?></a></li>			
			<?php
			}
			} 
			 ?>
			 <li class="list-group-item text-center"><a class="" href="list.php">More</a></li>
			       
			    </ul>
			 </div>


			  <div class="abc shadow p-3 mb-5 bg-white rounded" style="position: sticky;">
			    <div class="title">
			       <h2>Artist</h2>
			    </div>
			       <!-- list product 1-->
			<?php 
			      $sql = "SELECT * FROM artist LIMIT 7"; 
			      $rs = mysqli_query($conn, $sql);
			?>
			
			     <ul class="list-group">
			        <?php 
			      if( mysqli_num_rows($rs) > 0 ){
			        while( $row = mysqli_fetch_assoc($rs) ){
			      ?>
			        <li class="list-group-item"> <a href="simple_artist.php?id_art=<?php echo $row['id_art'] ?>"><?php echo $row['nameartist'] ?></a></li>
			
			
			<?php
			}
			} 
			 ?>
			       
			    </ul>
			 </div>


			  <div class="abc shadow p-3 mb-5 bg-white rounded" style="position: sticky;">
			    <div class="title">
			       <h2>Genre</h2>
			    </div>
			       <!-- list product 1-->
			<?php 
			      $sql = "SELECT * FROM genre LIMIT 7"; 
			      $rs = mysqli_query($conn, $sql);
			?>
			
			     <ul class="list-group">
			        <?php 
			      if( mysqli_num_rows($rs) > 0 ){
			        while( $row = mysqli_fetch_assoc($rs) ){
			      ?>
			        <li class="list-group-item"><?php echo $row['namegenre'] ?></li>
			
			
			<?php
			}
			} 
			 ?>
			       
			    </ul>
			 </div>
		</div>
	</div>		
</div><!-- container -->
<?php include('inc/footer.php'); ?>
</body>
</html>

