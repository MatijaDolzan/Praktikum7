<?php
session_start();

//echo $_SESSION["izbranaVerzijaSes"];
?>

<p>

<?php

//echo $_SESSION["textVerzijeSes"];

?>

<?php
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';

$idVerz=0;
if(!empty($_SESSION['izbranaVerzijaSes'])){
   $idVerz=$_SESSION['izbranaVerzijaSes'];
  
}

?>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #778899;
    float:center;
}

h1 {
    align:center;
    color:#808080;
}

li {
    display: inline-block;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #708090;
}

</style>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>

<!-- ZA BUTTON PDF -->
<!-- link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" -->


<center><h1><i><a class="active" href="index.php">Podjetje d.o.o.</a></i></h1></center>

<p><div><ul>
 <center>
  <li><a href="dodajanjePrivolitve.php">Dodaj privolitev</a></li>
  <li><a href="list.php">Seznam privolitev</a></li>
  <li><a href="iskanje.php">Iskanje privolitev</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
   
</ul></div></p>

<center><h2><i>Podrobnosti verzije</i></h2></center>

<?php
$verzija_id = $idVerz;

$privolitve =new Privolitev(null);
$version = new Verzija(null, null);
$poob = new Pooblascenec(null, null, null);
$upra = new Upravljalec(null, null, null, null);
//$checkbox= new Checkbox(null, null);

$current_version = $version->getIzBazeV($verzija_id);
$poob_id = $current_version->getPoob();
$privolitev_id = $current_version->getFK_ver_priv();
$current_upra = $upra->getIzBaze($privolitev_id);
$current_privolitve= $privolitve->getIzBazeId($privolitev_id);
//$checkbox_id= $current_version->  MISLIM DA ŠE NI METODE
//$current_checkbox= $checkbox->getVseCheckboxe($fk);

echo "<br><b> Naslov privolitve: </b>";
echo $current_privolitve->getNaslov();

echo "<p><b> Verzija: </b>";
echo $current_version->getVerzija();
echo "<p><b> Besedilo: </b>";
echo $current_version->getText();

echo "<p><b> Ime upravljalca: </b>";
echo $current_upra->getName();
echo "<p><b> Priimek upravljalca: </b>";
echo $current_upra->getSubname();
echo "<p><b> Naslov upravljalca: </b>";
echo $current_upra->getAddress();

if($poob_id !== NULL){
    $current_poob = $poob->getIzBazePoob($poob_id);
    echo "<p><b> Ime pooblascenca: </b>";
    echo $current_poob->getIme();
    echo "<p><b> Priimek pooblascenca: </b>";
    echo $current_poob->getPriimek();
    echo "<p><b> Naslov pooblascenca: </b>";
    echo $current_poob->getNaslov();
}

//if($checkbox_id !== NULL){
//    $current_checkbox = $checkbox->getVseCheckboxe($fk);
//    echo "<p><b> Checkbox: </b>";
    //echo $current_checkbox->;
   
//}

?>
</p>

<center><form action="pdf_file.php" method="post">
<input type="submit" name="pdfPrivVerz" value="Izvozi v PDF" class="w3-btn w3-white w3-border w3-border-red w3-round-large">
</form></center>

<p><center><form action="pregledVerzij.php" method="post">
<input type="submit" name="podrPriv" value="Nazaj na seznam verzij">
</form></center>
<center>
<form action="podpisovanje.php" method="get" name="podpisovanje">
<input type="text"  name="privolitev" value="<?php echo $privolitev_id?>">
<input type="text"  name="verzija" value="<?php echo $current_version ?>">
<input type="submit"  value="Pridobi povezavo za podpis privolitve">
</form>
</center>


