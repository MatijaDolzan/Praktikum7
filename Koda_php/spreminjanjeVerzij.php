<?php
session_start();
require   'razredi\Verzija.php';
require_once  'razredi\Iprivolitev.php';
require   'razredi\Upravljalec.php';
require   'razredi\Pooblascenec.php';

$idVerz=$_SESSION["idVerzije"];

$verzija=new Verzija("","");
$NovaV=$verzija->getIzBazeV($idVerz);
$idUpravljalca=$_SESSION["izbranaPrivolitevSes"];
$upr=new Upravljalec('', "", "", "");
$upravljalec=$upr->getIzBaze($idUpravljalca);
$idPooblascenca=0;
$idPooblascenca=$NovaV->getPoob();
$_SESSION['verzijaVerzije']=$NovaV->getVerzija();
$poob=new Pooblascenec("", "", "");
$pooblascenec=new Pooblascenec("", "", "");
if($idPooblascenca!=0){
   $pooblascenec=$poob->getIzBazePoob($idPooblascenca);
    
}
?>
<h2>Spreminjanje verzije</h2>
<form action="workerji/spreminjanjeVerzije_worker.php" method="post">
Text:<input type="text" name="text" value="<?php echo $NovaV->getText()?>"/><br>
Rok hrambe: <input type="text" name="hramba" value="<?php echo $NovaV->getHramba()?>"/><br>
<br/>

<h2>Upravljalec GDPR pogodbe</h2>
Ime:<input type="text" name="imeUpr" value="<?php echo $upravljalec->getName()?>"><br/>
Priimek:<input type="text" name="priimekUpr" value="<?php echo $upravljalec->getSubname()?>"><br/>
Naslov:<input type="text" name="naslovUpr" value="<?php echo $upravljalec->getAddress()?>"><br/>

<input type="checkbox" name="DodPoob" id="DodPoob"/> Spremenil bom pooblascenca:
<h3>Pooblascenec GDPR pogodbe</h3>
Ime:<input type="text" name="imePoob" id="imePoob"value="<?php echo $pooblascenec->getIme()?>" disabled  ><br/>
Priimek:<input type="text" name="priimekPoob" id="priimekPoob" value="<?php echo $pooblascenec->getPriimek()?>" disabled><br/>
Naslov:<input type="text" name="naslovPoob" id="naslovPoob" value="<?php echo $pooblascenec->getNaslov()?>" disabled><br/>

<input type="submit" name="dodajVerz" value="Dodaj!">
</form>
<script>
document.getElementById('DodPoob').onchange = function() {
    document.getElementById('imePoob').disabled = !this.checked;
    document.getElementById('priimekPoob').disabled = !this.checked;
    document.getElementById('naslovPoob').disabled = !this.checked;
};
</script>