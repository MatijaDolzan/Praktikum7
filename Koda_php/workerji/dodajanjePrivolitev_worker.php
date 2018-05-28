<?php
session_start();
include  'C:\wamp64\www\Praktikum\razredi\Privolitev.php';
include_once  'C:\wamp64\www\Praktikum\razredi\Iprivolitev.php';
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