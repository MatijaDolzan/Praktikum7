<?php
session_start();
require  '..\razredi\Verzija.php';
require_once   '..\razredi\Iprivolitev.php';
require   '..\razredi\Upravljalec.php';
require   '..\razredi\Pooblascenec.php';
if(isset($_SESSION['current_user']) && isset($_POST['dodajVerz'])){
    $user=$_SESSION['current_user'];
    $text=$_POST['text'];
    $hramba=$_POST['hramba'];
    $verzija=new Verzija($text, $hramba);
    $idPoob=0;
    if(isset($_POST['DodPoob'])){
        $ime=$_POST['imePoob'];
        $priimek=$_POST['priimekPoob'];
        $naslov=$_POST['naslovPoob'];
        $pooblascenec=new Pooblascenec($ime, $priimek, $naslov);
        $pooblascenec->addBaza($pooblascenec);
        $novPoob=$pooblascenec->getIzBaze($pooblascenec);
        $idPoob=$novPoob->getId();
    }
    $verzija->setPoob($idPoob);
    $priv=$_SESSION['idPrivolitve'];
    $verzija->setFK_ver_priv($priv);
    $verzija->addBazaV($verzija);
    //$return=$verzija->getIzBaze($verzija);
    //$id=$return->getId();
    //$_SESSION['idPrivolitve']=$id;
    $imeUpr=$_POST['imeUpr'];
    $priimekUpr=$_POST['priimekUpr'];
    $naslovUpr=$_POST['naslovUpr'];
    $upr=new Upravljalec($imeUpr, $priimekUpr, $naslovUpr,$priv);
    $upr->addBazaU($upr);
}
header("Location: ../list.php");