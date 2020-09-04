<?php
include('include/header.php');
?>


<?php
include('db/connection.php');
$id=$_GET['edit'];

$query=mysqli_query($conn,"select * from news where id='$id'");


while($row=mysqli_fetch_array($query)){
	$id=$row['id'];
	$title=$row['title'];
	$des=$row['descriptions'];
	$date=$row['date'];
	$category=$row['category'];
	$thumbnail=$row['thumbnail'];


}


?>
<div style="margin-left: 25%; margin-top: 10%; width: 50% ">
	<form action="add_news.php" enctype="multipart/form-data" method="post"  name="NewsForm" onsubmit="return validateform()">
<div class="form-group">

	<h1>Update News</h1><hr>
    	<label for="l_title">Title:</label>
    	<input type="text" name="title" class="form-control" placeholder="Enter Title" id="title" value="<?php echo $title; ?>">
</div>


<div class="form-group">
    	<label for="l_description">Descriptions:</label>
    	<textarea name="desc" class="form-control" placeholder="Enter Description" id="desc" rows="10"><?php echo $des; ?></textarea> 
	</div>
    
    <div class="form-group">
    	<label for="l_date">Date:</label>
    	<input type="Date" name="date" class="form-control" placeholder="select Date" id="date" value="<?php echo $date; ?>">
  	</div>

  	<div class="form-group">
    	<label for="l_date">Thumbnail:</label>
    	<input type="file" name="thumbnail" class="form-control" placeholder="select Thumbnail" id="Thumbnail" value="<?php echo $thumbnail; ?>">
    	<img class="img img-thumbnail" src="images/<?php echo $thumbnail; ?>" alt=""  width="300">
  	</div>

  	<div class="form-group">
    	<label for="l_title">Category:</label>
    	<select class="form-control" name="category" >
   </div>
   
   <?php
   include('db/connection.php');
   $query=mysqli_query($conn,"select * from category");

   while($row=mysqli_fetch_array($query)){
   	?>
   	<option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
   <?php } ?>

</select>
   	<input type="hidden" name="id" value="<?php echo $_GET['edit'] ?>">

   

</div>
   <input type="submit" name="submit" class="btn btn-primary">
</form>


<?php
include('db/connection.php');
if(isset($_POST['submit'])){
	
	$id=$_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$date=$_POST['date'];
	$thumbnail=$_FILES['thumbnail']['name'];
	$tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
	$category=$_POST['category'];

	move_uploaded_file($tmp_thumbnail,"images/$thumbnail");



$query1=mysqli_query($conn,"UPDATE `news` SET `title`='$title',`descriptions`='$des',`date`='$date',`category`='$category',`thumbnail`='$thumbnail' WHERE id='$id' ");

if($query1){
	echo "<script>alert('News Updated Successfully');</script>";
	echo "<script>window.location='http://localhost/news/news.php';</script>";
}else{
	echo "<script>alert('Plz try again');</script>";

}
}
?>