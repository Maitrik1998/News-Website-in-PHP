<?php 
include('db/connection.php');
$id=$_GET['del'];
$query=mysqli_query($conn,"delete from category where id ='$id'");
if($query){
	echo "<script>alert('category Deleted!..')</script>";
	 echo "<script >window.location='http://localhost/news/categories.php' ;</script>";

}else{
	echo "<script>Plz Try again</script>";
}

?>