<?php
session_start();
if ($_SESSION['email']==true) {
	# code...
}else{
	header('location:admin_login.php');
	$page='categories';
}
include('include/header.php');
?>

<div style="margin-left: 25%; margin-top: 10%; width: 50% ">
	<div class="text-right">
		<button><a href="addcategory.php">Add Category</a></button>
	</div>

	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Category Name</th>
			<th>Description</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		include('db/connection.php');
		$query=mysqli_query($conn,"select * from category");
		while($row=mysqli_fetch_array($query)){


		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['category_name'];?></td>
			<td><?php echo $row['desc'];?></td>
			<td><a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">edit</a></td>
			<td><a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
			<td></td>

			

		</tr>
		<?php } ?>
	</table>
	</div>
	
	
	
</div>

