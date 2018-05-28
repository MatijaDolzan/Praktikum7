<?php
session_start();
require  '..\razredi\Verzija.php';
require_once   '..\razredi\Iprivolitev.php';
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
header("Location: ../list.php");