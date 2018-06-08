<?php
session_start();
require  '..\razredi\Verzija.php';
require_once   '..\razredi\Iprivolitev.php';
require   '..\razredi\Upravljalec.php';
require   '..\razredi\Pooblascenec.php';
require   '..\razredi\Checkboxi.php';
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
    $idVe=0;
    $idVe=$verzija->addBazaV($verzija);
    if(!empty($_POST['chbx1'])){
        $ch=new Checkbox($_POST['chbx1'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx2'])){
        $ch=new Checkbox($_POST['chbx2'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx3'])){
        $ch=new Checkbox($_POST['chbx3'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx4'])){
        $ch=new Checkbox($_POST['chbx4'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx5'])){
        $ch=new Checkbox($_POST['chbx5'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx6'])){
        $ch=new Checkbox($_POST['chbx6'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx7'])){
        $ch=new Checkbox($_POST['chbx7'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx8'])){
        $ch=new Checkbox($_POST['chbx8'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx9'])){
        $ch=new Checkbox($_POST['chbx9'], $idVe);
        $ch->addCheckbox($ch);
    }
    if(!empty($_POST['chbx10'])){
        $ch=new Checkbox($_POST['chbx10'], $idVe);
        $ch->addCheckbox($ch);
    }
    $imeUpr=$_POST['imeUpr'];
    $priimekUpr=$_POST['priimekUpr'];
    $naslovUpr=$_POST['naslovUpr'];
    $upr=new Upravljalec($imeUpr, $priimekUpr, $naslovUpr,$priv);
    $upr->addBazaU($upr);
}
header("Location: ../pregledVerzij.php");