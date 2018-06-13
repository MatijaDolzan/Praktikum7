<?php
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';
require    'razredi\Checkboxi.php';

require 'menu.php';

$idVerz=0;
if(!empty($_SESSION['izbranaVerzijaSes'])){
   $idVerz=$_SESSION['izbranaVerzijaSes'];
  
}

?>

<center><h2><i>Podrobnosti verzije</i></h2></center>

<?php
$verzija_id = $idVerz;

$privolitve =new Privolitev(null);
$version = new Verzija(null, null);
$poob = new Pooblascenec(null, null, null);
$upra = new Upravljalec(null, null, null, null);
$check = new Checkbox(null, null, null);
$current_version = $version->getIzBazeV($verzija_id);
$poob_id = $current_version->getPoob();
$privolitev_id = $current_version->getFK_ver_priv();
$current_upra = $upra->getIzBaze($privolitev_id);
$current_privolitve= $privolitve->getIzBazeId($privolitev_id);
$current_checkboxes = $check->getVseCheckboxe($verzija_id);
if(count($current_checkboxes) === 0){
    $current_checkboxes= FALSE;
}

echo "<br><b> Naslov privolitve: </b>";
echo $current_privolitve->getNaslov();

echo "<p><b> Verzija: </b>";
echo $current_version->getVerzija();
echo "<p><b> Trajanje hrambe podatkov: </b>";
echo $current_version->getHramba();
echo "<p><b> Besedilo: </b>";
echo $current_version->getText();

echo "<p><b> Ime upravljalca: </b>";
echo $current_upra->getName();
echo "<p><b> Priimek upravljalca: </b>";
echo $current_upra->getSubname();
echo "<p><b> Naslov upravljalca: </b>";
echo $current_upra->getAddress();

if($poob_id!=0){
    $current_poob = $poob->getIzBazePoob($poob_id);
    echo "<p><b> Ime pooblascenca: </b>";
    echo $current_poob->getIme();
    echo "<p><b> Priimek pooblascenca: </b>";
    echo $current_poob->getPriimek();
    echo "<p><b> Naslov pooblascenca: </b>";
    echo $current_poob->getNaslov();
}

if($current_checkboxes === FALSE){
    //DO NOTHING
}else{
    echo "<p><b> Opcijske privolitve: </b><br>";
    foreach ($current_checkboxes as $cb){
        echo $cb->getCheckbox() . "<br>";
    }
}
?>
</p>

<p><center><form action="pregledVerzij.php" method="post">
<input type="submit" name="podrPriv" value="Nazaj na seznam verzij">
</form></center>
<center>

<p><b>Link for this version:</b><br>
<?php echo "podpisovanje.php?verzija=$verzija_id&email=customer.email@example.com"?>
</center>


