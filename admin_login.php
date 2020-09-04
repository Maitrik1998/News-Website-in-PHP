<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/admin.css">
</head>

<body>
	<div class="container">
		<form action="admin_login.php" method="POST">
			<h2>Admin Login</h2>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
	</div>

</body>
</html>

<?php
include('db/connection.php');

if(isset($_POST['submit']))
{
	$emails=$_POST['email'];
	$passwords=$_POST['password'];

	$query="select * from admin_login where email='$emails' AND password='$passwords'";
	$run=mysqli_query($conn,$query);

	if($run){
		if(mysqli_num_rows($run)>0){
			$_SESSION['email']=$emails;
			header('location:home.php');

		}
		else{
			echo "<script>alert('Invalid credentails,please try again')</script>";
		}
	}

}

?>