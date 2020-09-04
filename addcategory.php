<?php
include('include/header.php');
?>

<?php
if(isset($_POST['insert']))
{
	$hostname="localhost";
	$username="root";
	$password="";
	$databaseName="newsproject";

	$category_name=$_POST['category_name'];
	$desc=$_POST['desc'];

	$connect=mysqli_connect($hostname,$username,$password,$databaseName);
	 $cheak = mysqli_query($connect,"select * from category where category_name='$category_name' ");

	  if (mysqli_num_rows($cheak)>0) {
	  	 echo "<script> alert('Category Name Already Be taken !!')</script>";
	  	 return false;
	  	 header('location:categories.php');
	  
   }

	

	
	$query="INSERT INTO `category`(`category_name`, `desc`) VALUES ('$category_name','$desc')";
	$result=mysqli_query($connect,$query);
	if($result){
		echo "<script>alert('category Add successfully')</script>";
	}
	else{
		echo "<script>alert('Please try again')</script>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Insert Categories</title>
	<script type="text/javascript">
		function validateform(){
			var x=document.forms['CategoryForm']['category_name'].value;
			if(x=="")
			{
				alert("Category Must be Filled out!...");
				return false;
			}
		}
		

	</script>

</head>
<body>
	<div style="margin-left: 25%; margin-top: 10%; width: 50% ">
	<form action="addcategory.php" method="post"  name="CategoryForm" onsubmit="return validateform()">
		<h1>Add Category</h1><hr>
		Category Name:<br><input type="text" name="category_name" required placeholder="Enter Category Name" class="form-control"><br><br>
		Description:<br><input type="text" name="desc"  required placeholder="Enter Description" class="form-control"><br><br>
		
		<input type="submit" name="insert" value="insert Data"><br><br>
	</form>
	
</body>
</html>