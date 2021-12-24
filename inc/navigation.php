<?php session_start(); ?>

      <!-- Navigation bar-->

 <div class="container" >
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius: 15px ; margin-top: 20px; margin-bottom: 20px; ">
  		<a class="navbar-brand" href="index.php">TuneSource</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   				 <span class="navbar-toggler-icon"></span>
  			</button>
 				 <div class="collapse navbar-collapse" id="navbarNavDropdown">
 				   <ul class="navbar-nav">
 				     <li class="nav-item active">
 				       <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
 				     </li>
 				     <li class="nav-item">
 				       <a class="nav-link" href="list.php">#100</a>
 				     </li>
 				     <li class="nav-item">
 				       <a class="nav-link" href="#">music</a>
 				     </li>
 				     <li class="nav-item dropdown">
 				       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 				         Artist
 				       </a>
 				       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
 				       		<?php
 				       		$sql = "SELECT * FROM artist LIMIT 4";
 				       		$rs = mysqli_query($conn,$sql);
	
    						 if( mysqli_num_rows($rs) > 0 ){
    						   while( $row = mysqli_fetch_assoc($rs) ){
 
 				       		?>
 				       		<a href="simple_artist.php?id=<?php echo $row['id'] ?>" class="dropdown-item"><?php echo $row['nameartist'] ?></a>
 				       		<?php
 				       		 }
 				       		}
 				       		 ?>
 				       		 <hr class="mt-4">
                   <a href="list2.php?pagename=artist" class="dropdown-item">More</a>
 				       </div>
 				     </li>
 				      <li class="nav-item dropdown">
 				       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 				         Genre
 				       </a>
 				       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
 				         	<?php
 				       		$sql = "SELECT * FROM genre LIMIT 4";
 				       		$rs = mysqli_query($conn,$sql);
	
    						 if( mysqli_num_rows($rs) > 0 ){
    						   while( $row = mysqli_fetch_assoc($rs) ){
 
 				       		?>
 				       		<a href="simple_artist.php?id_gen=<?= $row['id_gen']  ?>" class="dropdown-item"><?php echo $row['namegenre'] ?></a>
 				       		<?php
 				       		 }
 				       		}
 				       		 ?>
                   <hr>
 				       		 <a href="list2.php?pagename=genre" class="dropdown-item">More</a>
 				       </div>

 				     </li>
 				      <li class="nav-item dropdown">
 				       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 				         Account
 				       </a>
               <?php
                if (empty($_SESSION['username'])){

                ?>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item" href="register.php">Register</a>
                 <a class="dropdown-item" href="login.php">Login</a>
               </div>

               <?php  
               }else{?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item" href="#">User : <?php echo $_SESSION['username']; ?></a>
                 <a class="dropdown-item" href="destroy.php">Logout</a>
               </div>
          <?php  
             } ?>
 				      
 				     </li>
 				   </ul>
           <div class="search">
         <form class="form-inline my-2 my-lg-0" method="GET" action="search.php">
                     <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" >
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
                 </form >
          </div>
 
 			</div>
	</nav>
</div>