<?php

require 'razredi/Podpisnik.php';
require 'razredi/Checkboxi.php';
require 'razredi/Boolbox.php';
require 'razredi/Privolitev.php';
require 'razredi/Verzija.php';

require 'menu.php';
require 'check_user.php';

$podpisnik = $_SESSION['podpisnik'];
$privolitev = $_SESSION['privolitev'];
$verzija = $_SESSION['verzija'];
$checkboxes = $_SESSION['checkboxes'];
$boolboxes = $_SESSION['boolboxes'];

echo "EMAIL PODPISNIKA <br>";
echo $podpisnik->getEmail() . "<br>";
echo "IP NASLOV PODPISNIKA <br>";
echo $podpisnik->getIp() . "<br>";
echo "CAS PODPISA PODPISNIKA <br>";
echo $podpisnik->getCas() . "<br>";
echo "<br>";
echo "NASLOV PODPISANE PRIVOLITVE<br>";
echo $privolitev->getNaslov() . "<br>";
echo "<br>";
echo "VERZIJA PODPISANE VERZIJE<br>";
echo $verzija->getVerzija() . "<br>";
if($checkboxes === FALSE){
    
}else{
    echo "OPCIJSKE PRIVOLITVE:<br>";
    foreach ($checkboxes as $cb){
        echo $cb->getCheckbox() . "<br>";
        foreach ($boolboxes as $bb){
            if (($bb->getFk_checkbox()) === ($cb->getId())){
                echo "PRIVOLIL";
            }
        }
        echo "<br>";
    }
}

?>
<a href="podrobnostiVerzije_worker.php?id=<?php $verzija->getId();?>">Pregled verzije</a>
