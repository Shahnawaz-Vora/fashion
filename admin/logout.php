<?php
    if (isset($_COOKIE['admin_id'])) {
        unset($_COOKIE['admin_id']);
        setcookie('admin_id', '', time()-86400,'/');
        setcookie('email', '', time()-86400,'/');
        header("location: login.php");
    }else{
        header("location: login.php");
    }
?>
