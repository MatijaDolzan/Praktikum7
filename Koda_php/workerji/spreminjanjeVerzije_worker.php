<?php
session_start();
require  '..\razredi\Verzija.php';
require_once   '..\razredi\Iprivolitev.php';
require   '..\razredi\Upravljalec.php';
require   '..\razredi\Pooblascenec.php';
if(isset($_POST['dodajVerz'])){

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
    $stVerzije=$_SESSION['verzijaVerzije']+1;
    $verzija->setVerzija($stVerzije);
    $nic=0;
    $verzija->setId($nic);
    $priv=$_SESSION['izbranaPrivolitevSes'];
    $verzija->setFK_ver_priv($priv);
    $verzija->addBazaV($verzija);
    $imeUpr=$_POST['imeUpr'];
    $priimekUpr=$_POST['priimekUpr'];
    $naslovUpr=$_POST['naslovUpr'];
    $upr=new Upravljalec($imeUpr, $priimekUpr, $naslovUpr,$priv);
    $upr->addBazaU($upr);
}
header("Location: ../list.php");