<?php

if (isset($_POST['submit'])) {

    include_once '../db/connection.php';
    $resultCheck=0;

    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));
    
    $sql="SELECT * FROM admin WHERE password='$password' AND email='$username'";
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        setcookie("admin_id",$row['admin_id'] ,time()+86400,'/');
        setcookie("email",$row['email'] ,time()+86400,'/');
        header("location: index.php?login=1");    
    }else{
        ?>
        <script>
            window.location = "login.php?wrong=1"; 
        </script>
        <?php
    }
}
else
{
    if(isset($_COOKIE['admin_id']))
    {
        ?><script type="text/javascript">location.replace("index.php");</script><?php
    }
    else
    {
        ?><script type="text/javascript">location.replace("login.php");</script><?php
    }
}
?>