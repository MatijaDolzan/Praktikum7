<?php 
session_start();
require_once "config.php";

if(isset($_SESSION['gLogout'])){
    
    $url = $gClient->createAuthUrl();
    unset($_SESSION['gLogout']);
    header("Location: $url");
    exit();
    
}else{
    
    $_SESSION['gLogout'] = "something";
    header("Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/Praktikum/google_login_preset.php");
    exit();
    
}?>