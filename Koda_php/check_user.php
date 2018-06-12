<?php
//POTREBEN session_start(); V DATOTEKI KI KLICE TO DATOTEKO!!!
if(isset($_SESSION['current_user']) === FALSE){

    header("Location: login.php");
    exit;
}else{
    //PREGLED ALI IMA UPORABNIK GOOGLE ACCOUNT - KAR SE LAHKO UPORABI ZA KODIRANJE - KOT NPR. V ACCOUNT.PHP
    if(isset($_SESSION['google_id']) === TRUE){
        $gUser = TRUE;
    }else{
        $gUser = FALSE;
    }
}
?>