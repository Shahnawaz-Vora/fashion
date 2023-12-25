<?php
include_once '../../db/connection.php';
// manage student file
if(isset($_POST['status']) && isset($_POST['userid']))
{
	$status = trim($_POST['status']);
	$userid = trim($_POST['userid']);
	$sql = mysqli_query($con , "update user set status = '$status' where user_id = '$userid'");
}
else if(isset($_POST['pincode']))
{
	$pincode = $_POST['pincode'];
	$response = json_encode(file_get_contents("http://postalpincode.in/api/pincode/".$pincode));
	echo json_decode($response);
}
// email check
elseif (isset($_POST['email'])) 
{
	$email = trim($_POST['email']);
	$sql = mysqli_query($con , "select * from user where email='$email'");
	echo mysqli_num_rows($sql);
}

//mobile check
else if(isset($_POST['mobileno']))
{
	$mobileno = trim($_POST['mobileno']);
	$sql = mysqli_query($con , "select * from user where mobile_no='$mobileno'");
	echo mysqli_num_rows($sql);
}

//UPDATE STUDENT
else if(isset($_POST['email_update']) && isset($_POST['userid']))
	{
		$email = trim($_POST['email_update']);
		$userid = trim($_POST['userid']);
		$sql = mysqli_query($con , "select * from user where user_id not like '$userid' and email='$email'");
		echo mysqli_num_rows($sql);
	}
else if(isset($_POST['mobileno_update']) && isset($_POST['userid']))
{
	$mobileno = trim($_POST['mobileno_update']);
	$userid = trim($_POST['userid']);
	$sql = mysqli_query($con , "select * from user where user_id not like '$userid' and mobile_no='$mobileno'");
	echo mysqli_num_rows($sql);
}
else
{
	?><script type="text/javascript">location.replace("index.php");</script><?php	
}
?>
