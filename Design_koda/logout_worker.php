<?php

session_start();

if(isset($_SESSION['google_id'])) {
    
    session_destroy();
    header("Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/Praktikum/index.php");
    exit();
    
}else{
    
    session_destroy();
    header("Location: index.php");
    exit();
    
}

?>

