<?php
session_start();
require  '..\razredi\Privolitev.php';
require_once  '..\razredi\Iprivolitev.php';
if(isset($_SESSION['current_user']) && isset($_POST['dodajPriv'])){
    $user=$_SESSION['current_user'];
    $naslov=$_POST['naslov'];
    $privolitev=new Privolitev($naslov);
    $privolitev->setUpor($user);
    $privolitev->addBaza($privolitev);
    $return=$privolitev->getIzBaze($privolitev);
    $id=$return->getId();
    $_SESSION['idPrivolitve']=$id;
}
header("Location: ../dodajanjeVerzije.php");