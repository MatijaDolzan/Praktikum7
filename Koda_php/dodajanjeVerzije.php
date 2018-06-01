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

<center><h1><i><a class="active" href="index.php">Podjetje d.o.o.</a></i></h1></center>

<p><div><ul>
 <center>
  <li><a href="dodajanjePrivolitve.php">Dodaj privolitev</a></li>
  <li><a href="list.php">Seznam privolitev</a></li>
  <li><a href="iskanje.php">Iskanje privolitev</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
   
</ul></div></p>


<center><h2>Dodajanje nove verzije</h2>
<form action="workerji/dodajanjeVerzije_worker.php" method="post">
    Besedilo: <br><textarea rows="25" cols="75" name="text">
	
	7. Obdelava osebnih podatkov
	
	7.1. Točnost podatkov
	
	7.2. Vrste podatkov in nameni njihove obdelave
	
	7.3. Pravica do ugovora
	
	7.5. Spreminjanje podatkov
	
	7.6. Uporabniki osebnih podatkov
	
	7.7. Rok hrambe osebnih podatkov
	
	7.8. Informacije o pravicah v zvezi z varstvom osebnih podatkov

    7.8.1. Imetnik SPAR plus kartice ima pravico, da pisno na sedež 
    družbe Spar Slovenija d.o.o., Spar plus oddelek, Letališka c. 26, 
    1000 Ljubljana, ali po e-pošti na naslov: spar.plus@spar.si zahteva
    dostop do podatkov, ki se nanašajo nanj. Na enak način lahko uveljavlja
    pravico do omejitve obdelave, izbrisa podatkov in prenosljivosti 
    podatkov.
   
    7.8.2. Pravico do ugovora lahko imetnik uveljavlja v skladu s 7.3. 
    točko teh Splošnih pogojev. Pravico do popravka imetnik uveljavlja
    v skladu s 7.5. točko teh Splošnih pogojev.
    
    7.9. Pooblaščena oseba za varstvo osebnih podatkov
    Pooblaščena oseba za varstvo osebnih podatkov v družbi Spar 
    Slovenija d.o.o.je vodja pravne službe, Boštjan Grom; 
    e-mail: pooblascenec@spar.si.
    	
	
	</textarea>
    <p>Rok hrambe: <input type="text" name="hramba" value=""><br>
    <br/>

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