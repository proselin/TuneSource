<?php include('delete2.php'); ?>	
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<?php include('opening.php'); ?>
</head>
<body>
	<?php include('conn.php');
	include('header.php'); ?>
  <div class="list-group">
			    <a href="addgenre.php" class="list-group-item list-group-item-action list-group-item-secondary text-center"><h3>Insert</h3></a>

			  </div>
			</div>
		<div class="col-md-9">
			<h3>List of genre</h3>
			<table class="table table-bordered table-hover">
				<thead>
				<th scope="row">id</th>
				<th scope="row">name</th>
				<th scope="row">description</th>
				<th scope="row">image</th>
				</thead>
				<tbody>
					<?php 
					$sql = "SELECT * FROM genre ";
					$rs = mysqli_query($conn,$sql);
					if (mysqli_num_rows($rs)) {
						# code...
					while($row = mysqli_fetch_array($rs)){
					  ?>
					  	<tr style="max-height: 200px">
							<td scope="row"><?= $row['id_gen']; ?></td>
							<td><?= $row['namegenre']; ?></td>
							<td><?= $row['description']; ?></td>
							<td><?= $row['image']; ?>
								<img style="width: 200px; height: 200px" src="../img/<?= $row['image']; ?>">
							</td>
					  		<th><a href="?idxoa=<?= $row['id_gen'] ?>" class="btn btn-info">Delete</a></th>	
					  		<th><a href="updateartist.php?edit=<?= $row['id_gen'] ?>" class="btn btn-info">Update</a></th>	
					  	</tr>
						<?php
						 }
						}
						 ?>
				
				</tbody>
			</table>
		</div> 
	</div>
</div>
	

</body>
</html>