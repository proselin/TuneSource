<?php include('delete.php'); ?>	
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
			    <a href="addproduct.php" class="list-group-item list-group-item-action list-group-item-secondary text-center"><h3>Insert</h3></a>

			  </div>
			</div>
		<div class="col-md-9">
			<table class="table table-bordered table-hover">
				<thead>
				<th scope="row">id</th>
				<th scope="row">name</th>
				<th scope="row">price(VND)</th>
				<th scope="row">id_gen</th>
				<th scope="row">namegenre</th>
				<th scope="row">id_art</th>
				<th scope="row">nameartist</th>
				<th scope="row">music</th>
				<th scope="row">image</th>
				<th scope="row">Lyric</th>
				</thead>
				<tbody>
					<?php 
					$sql = "SELECT product.id,product.name,product.price,product.id_gen,genre.namegenre,product.id_art,artist.id_art,artist.nameartist,product.music,product.image,product.Lyric FROM genre,product,artist WHERE product.id_gen=genre.id_gen and product.id_art = artist.id_art";
					$rs = mysqli_query($conn,$sql);
					if (mysqli_num_rows($rs)) {
						# code...
					while($row = mysqli_fetch_array($rs)){
					  ?>
					  	<tr style="max-height: 200px">
							<td scope="row"><?= $row['id']; ?></td>
							<td><?= $row['name']; ?></td>
							<td><?= $row['price']; ?></td>
							<td><?= $row['id_gen']; ?></td>
							<td><?= $row['namegenre']; ?></td>
							<td><?= $row['id_art']; ?></td>
							<td><?= $row['nameartist']; ?></td>
							<td><?= $row['music']; ?>
								<audio controls controlsList="nodownload">
									   <source src="../music/<?php echo  $row['music'] ?>" type="audio/ogg" >
								</audio>
							</td>
							<td><?= $row['image']; ?>
								<img style="width: 200px; height: 200px" src="../img/<?= $row['image']; ?>">
							</td>
							<td style="overflow: auto;"><?= $row['Lyric']; ?></td>
					  		<th><a href="?idxoa=<?= $row['id'] ?>" class="btn btn-info">Delete</a></th>	
					  		<th><a href="updateproduct.php?edit=<?= $row['id'] ?>" class="btn btn-info">update</a></th>	
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