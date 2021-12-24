<?php include('inc/conn.php') ?>
<?php 
				$id = $_GET['id_art'];
			      $sql = "SELECT * FROM artist where artist.id_art = {$id}"; 
			      $rs = mysqli_query($conn, $sql);
			      $row = mysqli_fetch_assoc($rs);
			?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple-Artist-<?php echo $row['nameartist']  ?></title>
	<?php include('inc/opening.php') ?>
</head>
<body>
	<?php include('inc/navigation.php') ?>
	<?php 
				$id = $_GET['id_art'];
			      $sql = "SELECT * FROM artist where artist.id_art = {$id}"; 
			      $rs = mysqli_query($conn, $sql);
			      $row = mysqli_fetch_assoc($rs);
			?>
<div class="container">
	<div class="container">
	 <hr class="mt-4">
	<div class="row grid">
		<div class="col-md-12">
		<!-- start body  -->
			<div class="artist-infor">
				<div class="artist-header">
					<h1><?php echo $row['nameartist'] ?></h1>
				<div class="artist-body">
					<div class="row">
						<div class="col-md-8">
							<div class="artist-image"><img style="max-width: 540px; max-height: 540px; min-height: 300px; min-width: 300px; border-radius: 15px;" src="img/<?php echo $row['image']?>"  ></div>
						</div>
						<div class="col-md-4">
							<div class="artist-description"><p><?php echo $row['description'] ?></p></div>
						</div>
					</div>
					<hr class="mt-4">
					<div class="artist-music-title">
						<h3>Music</h3>
					</div>
                 <hr>
                 <div class="listmusic">
			       <!-- list product 1-->
			     <ul class="list-group">
			        <?php 
			         $sql = "SELECT product.id, product.name, artist.nameartist FROM product,artist where artist.id_art = product.id_art and artist.id_art = {$id} LIMIT 7";
			          $rs = mysqli_query($conn, $sql);
			      if( mysqli_num_rows($rs) > 0 ){
			        while( $row = mysqli_fetch_assoc($rs)){
			      ?>
			        <li class="list-group-item"> <a href="product.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] . "     |    " . $row['nameartist'] ?></a></li>
			<?php
												}
									} 
			 ?>
			    </ul>
			    	</div>			
                 </div>
					</div>
				</div>
				</div>
			</div>
</div>
<?php include('inc/footer.php'); ?>
</body>
</html>

