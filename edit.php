<?php
error_reporting(0);

include('include/header.php');
?>

<?php
include('db/connection.php');
$id=$_GET['edit'];

$query=mysqli_query($conn,"select * from category where id='$id'");

while($row=mysqli_fetch_array($query)){
	$category=$row['category_name'];
	$des=$row['desc'];
}

?>

 <div style=" width: 70%; margin-left: 25%; margin-top: 10%">
<form action="edit.php" method="post">
	
	<h1>Update Category</h1>
	<hr>
	Category_Name:<br><input type="text" name="category" value="<?php echo $category; ?>">
	<br>
	Descriptions:<br><input type="text" name="desc" value="<?php echo $des; ?>"><br><br>
	<input type="hidden" name="id" value="<?php echo $_GET['edit'] ?>">
	<input type="submit" name="submit" value="Update Category">

</form>

 </div>

 <?php
include('db/connection.php');
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$category=$_POST['category'];
	$des=$_POST['desc'];

	$query1=mysqli_query($conn,"UPDATE `category` SET `category_name`='$category',`desc`=
	'$des' WHERE id='$id' ");

	if($query1){
		echo "<script>alert('category Updated successfully');</script>";
		echo "<script >window.location='http://localhost/news/categories.php' ;</script>";

	}else
	{
		echo "<script>alert('plz try again');</script>";
	}
}

 ?>