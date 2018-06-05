<?php
session_start();
require   'razredi\Verzija.php';
require_once  'razredi\Iprivolitev.php';
require   'razredi\Upravljalec.php';
require   'razredi\Pooblascenec.php';

    $idVerz=$_SESSION["idVerzije"];

$verzija=new Verzija("a", "b");
$NovaV=$verzija->getIzBazeV($idVerz);
echo $NovaV->getFK_ver_priv();
$idUpravljalca=$NovaV->getFK_ver_priv();
$idUpravljalca=22;
$upravljalec->getIzBaze($idUpravljalca);
$idPooblascenca=$NovaV->getPoob();
$pooblascenec=null;
if($idPooblascenca!=0){
   $pooblascenec->getIzBazePoob();
    
}
?>
<h2>Spreminjanje verzije</h2>
<form action="workerji/dodajanjeVerzije_worker.php" method="post">
Text:<input type="text" name="text" value=""><br>
Rok hrambe: <input type="text" name="hramba" value=""><br>
<br/>

<h2>Upravljalec GDPR pogodbe</h2>
Ime:<input type="text" name="imeUpr" value=""><br/>
Priimek:<input type="text" name="priimekUpr" value=""><br/>
Naslov:<input type="text" name="naslovUpr" value=""><br/>

<input type="checkbox" name="DodPoob" id="DodPoob"/> Dodal bom pooblascenca:
<h3>Pooblascenec GDPR pogodbe</h3>
Ime:<input type="text" name="imePoob" id="imePoob"value="" disabled  ><br/>
Priimek:<input type="text" name="priimekPoob" id="priimekPoob" value="" disabled><br/>
Naslov:<input type="text" name="naslovPoob" id="naslovPoob" value="" disabled><br/>

<input type="submit" name="dodajVerz" value="Dodaj!">
</form>
<script>
document.getElementById('DodPoob').onchange = function() {
    document.getElementById('imePoob').disabled = !this.checked;
    document.getElementById('priimekPoob').disabled = !this.checked;
    document.getElementById('naslovPoob').disabled = !this.checked;
};
</script>