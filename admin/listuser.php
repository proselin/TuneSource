<?php include('deleteuser.php'); ?>	
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
			    <a href="adduser.php" class="list-group-item list-group-item-action list-group-item-secondary text-center"><h3>Insert</h3></a>

			  </div>
			</div>
		<div class="col-md-9">
			<h3>List of genre</h3>
			<table class="table table-bordered table-hover">
				<thead>
				<th scope="row">username</th>
				<th scope="row">password</th>
				<th scope="row">role</th>
				</thead>
				<tbody>
					<?php 
					$sql = "SELECT * FROM user ";
					$rs = mysqli_query($conn,$sql);
					if (mysqli_num_rows($rs)) {
						# code...
					while($row = mysqli_fetch_array($rs)){
					  ?>
					  	<tr style="max-height: 200px">
							<td><?= $row['username']; ?></td>
							<td><?= $row['password']; ?></td>
							<td><?= $row['role']; ?></td>
					  		<th><a href="?idxoa=<?= $row['username'] ?>" class="btn btn-info">Delete</a></th>	
					  		<th><a href="updateuser.php?edit=<?= $row['username'] ?>" class="btn btn-info">Update</a></th>	
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