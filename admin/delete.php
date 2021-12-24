<?php
include('conn.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET' && (!empty($_GET['idxoa'])))
{
	$idxoa = $_GET['idxoa'];
	$sql = "DELETE from product WHERE id= {$idxoa} limit 1";
	if ( mysqli_query($conn, $sql)){
		?>
		<div class="alert alert-info" role="alert">
      <p class="text-center">Delete successfull</p>
      </div>
		<?php 

	}else {?>
		<div class="alert alert-danger" role="alert">
      <p class="text-center">Fail</p>
      </div>
      <?php 

	}
} 
?>

 