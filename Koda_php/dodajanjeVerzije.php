<?php
require   'razredi\Verzija.php';
require_once  'razredi\Iprivolitev.php';
require   'razredi\Upravljalec.php';
require   'razredi\Pooblascenec.php';

require 'menu.php';
$uporabnik=$_SESSION['current_user'];
$id=$_SESSION['idPrivolitve'];

?>




<center><h2>Dodajanje nove verzije</h2>
<form action="workerji/dodajanjeVerzije_worker.php" method="post">
    Besedilo: <br><textarea rows="25" cols="75" name="text">
	
	7. Obdelava osebnih podatkov
	
	7.1. ToÄ�nost podatkov
	
	7.2. Vrste podatkov in nameni njihove obdelave
	
	7.3. Pravica do ugovora
	
	7.5. Spreminjanje podatkov
	
	7.6. Uporabniki osebnih podatkov
	
	7.7. Rok hrambe osebnih podatkov
	
	7.8. Informacije o pravicah v zvezi z varstvom osebnih podatkov

    7.8.1. Imetnik SPAR plus kartice ima pravico, da pisno na sedeÅ¾ 
    druÅ¾be Spar Slovenija d.o.o., Spar plus oddelek, LetaliÅ¡ka c. 26, 
    1000 Ljubljana, ali po e-poÅ¡ti na naslov: spar.plus@spar.si zahteva
    dostop do podatkov, ki se nanaÅ¡ajo nanj. Na enak naÄ�in lahko uveljavlja
    pravico do omejitve obdelave, izbrisa podatkov in prenosljivosti 
    podatkov.
   
    7.8.2. Pravico do ugovora lahko imetnik uveljavlja v skladu s 7.3. 
    toÄ�ko teh SploÅ¡nih pogojev. Pravico do popravka imetnik uveljavlja
    v skladu s 7.5. toÄ�ko teh SploÅ¡nih pogojev.
    
   	7.9 Upravljalec.
    	
	
	</textarea>
    <p>Rok hrambe: <input type="text" name="hramba" value=""><br>
    <br/>


   	<h2>Dodajanje checkboxov k privolitvi:</h2>
   	
  

    <input type="text" name="chbx1" value="">
    <input type="text" name="chbx2" value="">
    <input type="text" name="chbx3" value="">
    <input type="text" name="chbx4" value="">
    <input type="text" name="chbx5" value="">
    <input type="text" name="chbx6" value="">
    <input type="text" name="chbx7" value="">
    <input type="text" name="chbx8" value="">
    <input type="text" name="chbx9" value="">
    <input type="text" name="chbx10" value="">
    
    
    
    
    
    
    
    
    
    <h2>Upravljalec GDPR pogodbe</h2>
    <p>Ime: <input type="text" name="imeUpr" value=""><br/>
    <p>Priimek: <input type="text" name="priimekUpr" value=""><br/>
    <p>Naslov: <input type="text" name="naslovUpr" value=""><br/>
    
   <p> <input type="checkbox" name="DodPoob" id="DodPoob"> Dodal bom pooblascenca:</input>

    <h3>Pooblascenec GDPR pogodbe</h3>
    <p>Ime: <input type="text" name="imePoob" id="imePoob"value="" disabled  ><br/>
    <p>Priimek: <input type="text" name="priimekPoob" id="priimekPoob" value="" disabled><br/>
    <p>Naslov: <input type="text" name="naslovPoob" id="naslovPoob" value="" disabled><br/>

	<p><input type="submit" name="dodajVerz" value="Dodaj!">
</form></center>

<script>
document.getElementById('DodPoob').onchange = function() {
    document.getElementById('imePoob').disabled = !this.checked;
    document.getElementById('priimekPoob').disabled = !this.checked;
    document.getElementById('naslovPoob').disabled = !this.checked;
};
</script>
