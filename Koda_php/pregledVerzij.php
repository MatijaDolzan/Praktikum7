<?php
session_start();
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
if(isset($_POST['izberiId']) && isset($_POST['idPriv'])){
    $id=$_POST['idPriv'];
    echo "$id";
    
}

