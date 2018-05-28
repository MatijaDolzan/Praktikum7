<?php
session_start();
include  'C:\wamp64\www\Praktikum\razredi\Verzija.php';
include_once  'C:\wamp64\www\Praktikum\razredi\Iprivolitev.php';
if(isset($_SESSION['current_user']) && isset($_POST['dodajPriv'])){
    $user=$_SESSION['current_user'];
    $text=$_POST['text'];
    $hramba=$_POST['hramba'];
    $verzija=new Verzija($text, $hramba);
    $priv=$_SESSION['idPrivolitve'];
    $verzija->setFK_ver_priv($priv);
    $verzija->addBaza($verzija);
    //$return=$verzija->getIzBaze($verzija);
    //$id=$return->getId();
    //$_SESSION['idPrivolitve']=$id;
}
header("Location: ../succes.php");