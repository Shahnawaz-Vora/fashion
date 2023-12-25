<?php
    if (isset($_COOKIE['user_id'])) {
        unset($_COOKIE['user_id']);
        setcookie('user_id', '', time()-86400,'/');
        setcookie('email', '', time()-86400,'/');
        header("location: login.php");
    }else{
        header("location: login.php");
    }
?>
