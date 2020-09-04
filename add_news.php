<?php
include('include/header.php');
?>

<div style="margin-left: 25%; margin-top: 10%; width: 50% ">
	<form action="add_news.php" enctype="multipart/form-data" method="post"  name="NewsForm" onsubmit="return validateform()">

	<h1>Add News</h1><hr>
	
	<div class="form-group">
    	<label for="l_title">Title:</label>
    	<input type="text" name="title" class="form-control" placeholder="Enter Title" id="title">
	</div>

    <div class="form-group">
    	<label for="l_description">Descriptions:</label>
    	<textarea name="desc" class="form-control" placeholder="Enter Description" id="desc" rows="10"></textarea> 
	</div>
    
    <div class="form-group">
    	<label for="l_date">Date:</label>
    	<input type="Date" name="date" class="form-control" placeholder="select Date" id="date">
  	</div>

  	<div class="form-group">
    	<label for="l_date">Thumbnail:</label>
    	<input type="file" name="thumbnail" class="form-control" placeholder="select Thumbnail" id="Thumbnail">
  	</div>

  	<div class="form-group">
    	<label for="l_title">Category:</label>
    	<select class="form-control" name="category">
   </div>

   <?php
   	include('db/connection.php');
   	$query=mysqli_query($conn,"select * from category");

   	while($row=mysqli_fetch_array($query))
   	{
   		?>
   		<option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
   


   	<?php } ?>

	</select><br><br>
	</div>
		<input type="submit" name="submit">
	</form>

<script>
	function validateform()
	{
		var x=document.forms['NewsForm']['title'].value;
		var y=document.forms['NewsForm']['desc'].value;
		var z=document.forms['NewsForm']['date'].value;
		
		var a=document.forms['NewsForm']['category'].value;
	

	if(x=="")
	{
		alert("Title must be filled");
		return false;
	}
	if(y=="")
	{
		alert("Descriptions must be filled");
		return false;
	}
	if(z=="")
	{
		alert("Date must be filled");
		return false;
	}
	if(a=="")
	{
		alert("category must be filled");
		return false;
	}
}

</script>
</div>

<?php
include('db/connection.php');
if(isset($_POST['submit'])){
$title=$_POST['title'];
$des=$_POST['desc'];
$date=$_POST['date'];
$thumbnail=$_FILES['thumbnail']['name'];
$tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
$category=$_POST['category'];
move_uploaded_file($tmp_thumbnail,"images/$thumbnail");

$query1=mysqli_query($conn,"INSERT INTO `news`(`title`, `descriptions`, `date`, `category`, `thumbnail`) VALUES ('$title','$des','$date','$category','$thumbnail')");

if($query1){
	echo "<script>alert('News upload successfully')</script>";
}else{
	echo "<script>alert('plz try again')</script>" ;
}

}
?>
