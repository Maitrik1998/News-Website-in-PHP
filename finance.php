<?php
	include('include/main_header.php');
  include('include/nav.html');
?>

<?php
include('db/connection.php');
$query=mysqli_query($conn,"SELECT * FROM `news` WHERE `category`='finance'");

while($row=mysqli_fetch_array($query)){
         $category=$row['category'];
         $date=$row['date'];
         $title=$row['title'];
         $thumbnail=$row['thumbnail'];


?>
<div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
             
            <div class="card-body d-flex flex-column align-items-start">
              
              <h3 class="mb-0">
                <a class="text-dark" href="single_page.php?single=<?php echo $row['id']; ?> "><?php echo $title; ?></a>

              </h3>
              <strong class="d-inline-block mb-2 text-primary"><?php echo $category ; ?></strong>
              <div class="mb-1 text-muted"><?php echo $date; ?></div>
            
              <a href="single_page.php?single=<?php echo $row['id']; ?> ">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="images/<?php echo $thumbnail;?>" alt="Card image cap" width="400">
          </div>
          </div>


<?php } ?>

<?php
include('include/footers.php');
?>