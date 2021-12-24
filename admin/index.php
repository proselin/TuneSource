<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<?php 
	include('conn.php');include('opening.php');
	
	 ?>
</head>

<body>
	<div class="container">
    <h1 class="text-center">WELLCOME!</h1>
<hr class="mt-4">
	<h2 class="text-center">MENU</h2>
  <p class="text-center">select one to manage</p>
  <div class="list-group">
<a href="listproduct.php" class="list-group-item list-group-item-action list-group-item-info text-center"><h3>Music</h3></a>
          <a href="listartist.php" class="list-group-item list-group-item-action list-group-item-warning text-center"><h3> Artist </h3></a>
          <a href="listgenre.php" class="list-group-item list-group-item-action list-group-item-danger text-center"><h3>Genre</h3></a>
            <a href="listuser.php" class="list-group-item list-group-item-action list-group-item-secoundary text-center"><h3>User</h3></a>
          <a href="logout.php" class="list-group-item list-group-item-action list-group-item-primary text-center"><h3>logout</h3></a>
  </div>
</div>
</div>

</body>
</html>