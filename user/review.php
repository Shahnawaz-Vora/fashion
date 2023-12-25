<?php 
include_once("../db/connection.php");
if(isset($_POST['submit']))
{
	$product_id = mysqli_real_escape_string($con,$_POST['pid']);
	$rating = mysqli_real_escape_string($con,$_POST['rating']);
	$comment = mysqli_real_escape_string($con,$_POST['comment']);
	$user_id = $_COOKIE['user_id'];
	$modify_date = date("Y-m-d");
	$sql = "insert into review (user_id,product_id,review,rating,modify_date) values ('$user_id','$product_id','$comment','$rating','$modify_date')";
	$run = mysqli_query($con,$sql);
	if($run == true)
	{
		 ?><script type="text/javascript">location.replace("product.php?product_no=<?php echo $product_id; ?>&success=1");</script><?php
	}
	else
	{
	?><script type="text/javascript">location.replace("product.php?product_no=<?php echo $product_id; ?>&error=1");</script><?php
	}
}
else
{
	if (isset($_COOKIE['user_id'])) {
        ?><script type="text/javascript">location.replace("index.php");</script><?php
    }
    else
    {
        ?><script type="text/javascript">location.replace("../index.php");</script><?php
    }
}
?>