<?php

	include('db/connection.php');
	$id=$_GET['del'];
	$query=mysqli_query($conn,"delete from news where id='$id'");
	if($query){
		echo "<script>alert('News deleted Successfully');</script>";
		echo "<script>window.location='http://localhost/news/News.php';</script>";
	}	
	else{
		echo "<script>alert('plz try again');</script>";
	}



?>