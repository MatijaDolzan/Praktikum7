<?php
//POTREBEN session_start(); V DATOTEKI KI KLICE TO DATOTEKO!!!
if(isset($_SESSION['current_user']) === FALSE){
    header("Location: index.php");
    exit;
}
?>