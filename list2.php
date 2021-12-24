<?php include('inc/conn.php') ;
$namepage = $_GET['pagename'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $namepage ?></title>
	<?php include ('inc/opening.php') ?>
</head>
<body>
	<?php include('inc/navigation.php') ?>
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
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product mb-3" >
            <img class="card-img-top" src=" img/<?php echo $row['image'] ?>" alt="Card image cap">
            <div class="card-body">
              <?php if(strcmp($namepage, 'artist') == 0 ){?>
                  <h5 class="card-title"><?php echo $row['nameartist'] ?></h5>
                  <?php  
              }else{?>
                <h5 class="card-title"><?php echo $row['namegenre'] ?></h5>
                <?php 
              } ?>
              <p class="card-subtitle" ><?php echo $row['description'] ?></p>
              <?php if(strcmp($namepage, 'artist') == 0 ){?>
                  <a href="simple_artist.php?id_art=<?= $row['id_art'] ?>" class="btn btn btn-outline-info btn-block" style="margin-top: 20px;">More detail</a>
                  <?php  
              }else{?>
                <a href="simple_genre.php?id_gen=<?= $row['id_gen']?>" class="btn btn btn-outline-info btn-block" style="margin-top: 20px;">More detail</a>
                <?php 
              } ?>
                
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