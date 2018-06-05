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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum";
  
$db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );

?>

<?php 
$_SESSION['current_user']=1;
$nekaj=$_SESSION['current_user']=1;
$query = "SELECT privolitve.naslov, verzija.verzija, verzija.text, 
                upravljalec.ime, upravljalec.priimek, upravljalec.naslov, 
                pooblascenec.ime, pooblascenec.priimek, pooblascenec.naslov
            FROM privolitve, verzija, upravljalec, pooblascenec
            WHERE verzija.FK_ver_priv=privolitve.id 
            AND upravljalec.FK_upr_priv=privolitve.id
            AND verzija.FK_ver_poob=pooblascenec.id
            AND verzija.id='$idVerz'";

$result = mysqli_query($db_server, $query);

if (!$result)
{
	die ("Dostop do PB ni uspel");
}
else
{
	$st_vrstic = mysqli_num_rows($result);
	if($st_vrstic > 0) 
		print('');
}



?>

<p>	

<?php 


for ($j = 0 ; $j < $st_vrstic ; ++$j)
{
	$vrsta = mysqli_fetch_row($result); 
	
	echo "<b>Naslov privolitve: </b>".$vrsta[0];
	
?>
<p>	
<?php 

	echo "<b>Verzija: </b>".$vrsta[1];
	
?>
<p>
<?php 

	echo "<b>Besedilo: </b>".$vrsta[2];

?>
<p>	
<?php 

	echo "<b>Ime uporavljalca: </b>".$vrsta[3];
	
?>

<p>	
<?php 

	echo "<b>Priimek uporavljalca: </b>".$vrsta[4];
	
?>

<p>	
<?php 

	echo "<b>Naslov uporavljalca: </b>".$vrsta[5];
	
?>

<p>	
<?php 

	echo "<b>Ime pooblascenca: </b>".$vrsta[6];
	
?>

<p>	
<?php 

	echo "<b>Priimek pooblascenca: </b>".$vrsta[7];
	
?>

<p>	
<?php 

	echo "<b>Naslov pooblascenca: </b>".$vrsta[8];
	

}


?>
</p>

<center><form action="list.php" method="post">
<input type="submit" name="podrPriv" value="Nazaj na seznam!">
</form></center>


