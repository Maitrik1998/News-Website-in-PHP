<?php
include('include/header.php');
?>

<div style="margin-left: 25%; margin-top: 10%; width: 50% ">
	<div class="text-right">
		<button><a href="add_news.php">Add News</a></button>
	</div>

	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>News title</th>
			<th>Description</th>
			<th>Date</th>
			<th>IMAGE</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

		<?php
		include('db/connection.php');
		$page=$_GET['page'];
		if($page==""||$page==1){
			$page1=0;
		}else{
			$page1=($page*3)-3;
		}




		$query=mysqli_query($conn,"select * from news limit $page1,3");
		while($row=mysqli_fetch_array($query)){


		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['title'];?></td>
			<td><?php echo substr($row['descriptions'],0,100); ?></td>
			<td><?php echo $row['date'];?></td>

			<td><img src="images/<?php echo $row['thumbnail'];?>" width="150" height="150"></td>
			<td><?php echo $row['category'];?></td>
			<td><a href="edit_news.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">edit</a></td>
			<td><a href="delete_news.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
			<td></td>

			

		</tr>
		<?php } ?>
	</table>
	
		<ul class="pagination">
			<li class="page-item disabled">
                 <a href="#" class="page-link" >Pervious</a>
               </li>
		

		<?php
      	$sql=mysqli_query($conn,"select * from news");
      	$count=mysqli_num_rows($sql);
      	$a=$count/3;
      	ceil($a);
      	for($b=1; $b <= $a; $b++)
      	{
      		?>
      			<li class="page-item"><a class="page-link" href="news.php?page=<?php echo $b; ?>"><?php echo $b; ?></a></li>
      		<?php
      	}

		 ?>
		 <li class="page-item disabled">
                 <a href="#" class="page-link" >Next</a>
               </li>
		 </ul>
	
</div>