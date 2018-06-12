<?php

require 'razredi/Podpisnik.php';
require 'razredi/Checkboxi.php';
require 'razredi/Boolbox.php';
require 'razredi/Privolitev.php';
require 'razredi/Verzija.php';

session_start();

if(isset($_GET['id'])){
    $podpisnik_id = $_GET['id'];
}else{
    header("Location: index.php");
    exit();
}


$pod = new Podpisnik();
$priv = new Privolitev(null);
$verz = new Verzija(null, null);
$check = new Checkbox(null, null, null);
$boolbox = new Boolbox();


$current_pod = $pod->getPodpisnikViaId($podpisnik_id);
$verzija_id = $current_pod->getFk_ver();
$current_verz = $verz->getIzBazeV($verzija_id);
$privolitev_id = $current_verz->getFK_ver_priv();
$current_priv = $priv->getIzBazeId($privolitev_id);
$current_checkboxes = $check->getVseCheckboxe($verzija_id);
if(count($current_checkboxes) === 0){
    $current_checkboxes= FALSE;
    $current_boolboxes= FALSE;
}else{ 
    $current_boolboxes = $boolbox->getBoolboxViaFk($podpisnik_id);
}

$_SESSION['podpisnik']=$current_pod;
$_SESSION['privolitev']=$current_priv;
$_SESSION['verzija']=$current_verz;
$_SESSION['checkboxes']=$current_checkboxes;
$_SESSION['boolboxes']=$current_boolboxes;

header("Location: podrobnostiPodpisnika.php");
exit();
?>