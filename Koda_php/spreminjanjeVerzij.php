<?php
session_start();
require   'razredi\Verzija.php';
require_once  'razredi\Iprivolitev.php';
require   'razredi\Upravljalec.php';
require   'razredi\Pooblascenec.php';
require   'razredi\Checkboxi.php';

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
$arr=array(10);
$ch=new Checkbox("","");
$id=$NovaV->getId();
$array=$ch->getVseCheckboxe($id);
$count=count($array);
for ($j=0;$j<10;$j++){
    if (isset($array[$j])){
        $ch=$array[$j];
        $arr[$j]=$ch;
    }
    else{
        $arr[$j]=new Checkbox("", "");
    }
   
    
}

$chbx1=$arr[0];
$chbx2=$arr[1];
$chbx3=$arr[2];
$chbx4=$arr[3];
$chbx5=$arr[4];
$chbx6=$arr[5];
$chbx7=$arr[6];
$chbx8=$arr[7];
$chbx9=$arr[8];
$chbx10=$arr[9];

?>
<h2>Spreminjanje verzije</h2>
<form action="workerji/spreminjanjeVerzije_worker.php" method="post">
Text:<input type="text" name="text" value="<?php echo $NovaV->getText()?>"/><br>
Rok hrambe: <input type="text" name="hramba" value="<?php echo $NovaV->getHramba()?>"/><br>
<br/>


   	<h2>Spreminjanje  checkboxov privolitve:</h2>

    <input type="text" name="chbx1" value="<?php echo $chbx1->getCheckbox() ?>">
    <input type="text" name="chbx2" value="<?php echo $chbx2->getCheckbox() ?>">
    <input type="text" name="chbx3" value="<?php echo $chbx3->getCheckbox() ?>">
    <input type="text" name="chbx4" value="<?php echo $chbx4->getCheckbox() ?>">
    <input type="text" name="chbx5" value="<?php echo $chbx5->getCheckbox() ?>">
    <input type="text" name="chbx6" value="<?php echo $chbx6->getCheckbox() ?>">
    <input type="text" name="chbx7" value="<?php echo $chbx7->getCheckbox() ?>">
    <input type="text" name="chbx8" value="<?php echo $chbx8->getCheckbox() ?>">
    <input type="text" name="chbx9" value="<?php echo $chbx9->getCheckbox() ?>">
    <input type="text" name="chbx10" value="<?php echo $chbx10->getCheckbox()?>">
    

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