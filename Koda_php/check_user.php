<?php
session_start();
if(isset($_SESSION['current_user']) === FALSE){
    header("Location: index.php");
    exit;
}
?>