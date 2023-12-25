<?php 
include("../db/connection.php");


if (isset($_POST['login']))
{

	$result = 0;
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$query = "select * from user where email = '$username' or mobile_no = '$username' and password = '$password' ";
	$run = mysqli_query($con,$query);
	$result = mysqli_num_rows($run);
	if($result == 0)
	{
		?><script>location.href="login.php?login_error=1"</script><?php
	}
	else
	{

	}
		$fetch_status = mysqli_fetch_assoc($run);
		$status_result = $fetch_status['status'];
		if($status_result == 0){
			?><script>location.href="login.php?deactivate=1"</script><?php
		}
		else
		{
			setcookie("user_id",$fetch_status['user_id'] ,time()+86400,'/');
            setcookie("email",$fetch_status['email'] ,time()+86400,'/');
			?><script>location.href="index.php?success=1"</script><?php
		}	

}
else
{
	if (isset($_COOKIE['user_id'])) {
	    header("location: index.php");
	}
	else
	{
		header("location: login.php");	
	}
}
?>