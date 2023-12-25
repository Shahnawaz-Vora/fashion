<?php
include_once '../../db/connection.php';
//manage order
if(isset($_POST['status']) && isset($_POST['payment_id']))
{
	echo $_POST['payment_id'];
	$status = trim($_POST['status']);
	$payment_id = trim($_POST['payment_id']);
	$sql = mysqli_query($con , "update orders set status = '$status' where payment_id = '$payment_id'");
	echo 1;
}
else
{
	if(!isset($_COOKIE['admin_id']))
	{
	    ?><script type="text/javascript">location.replace("login.php?login_first=1");</script><?php
	}
	else
	{
		?><script type="text/javascript">location.replace("index.php");</script><?php	
	}
}
?>