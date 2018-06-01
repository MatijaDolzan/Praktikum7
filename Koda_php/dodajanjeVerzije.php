<?php
session_start();
$uporabnik=$_SESSION['current_user'];
//$_SESSION['current_user']=1;
$id=$_SESSION['idPrivolitve'];

require   'razredi\Verzija.php';
require_once  'razredi\Iprivolitev.php';
require   'razredi\Upravljalec.php';
require   'razredi\Pooblascenec.php';

?>
<h2>Dodajanje nove verzije</h2>
<form action="workerji/dodajanjeVerzije_worker.php" method="post">
Text:<input type="text" name="text" value=""><br>
Rok hrambe: <input type="text" name="hramba" value=""><br>
<br/>

<h2>Upravljalec GDPR pogodbe</h2>
Ime:<input type="text" name="imeUpr" value=""><br/>
Priimek:<input type="text" name="priimekUpr" value=""><br/>
Naslov:<input type="text" name="naslovUpr" value=""><br/>

<input type="checkbox" name="DodPoob" id="DodPoob"> Dodal bom pooblascenca:</input>
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