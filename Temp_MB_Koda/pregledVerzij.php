<?php
session_start();
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';
$idPriv=0;
if(!empty($_SESSION['izbranaPrivolitevSes'])){
    $idPriv=$_SESSION['izbranaPrivolitevSes'];
    
    
    
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

<center><h2>Podrobnosti privolitve</h2></center>

<?php
 require 'db_connection.php';
  
$db_server = $connection;

$query = "SELECT * FROM verzija 
            WHERE verzija.FK_ver_priv=$idPriv";

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
<table>
  <tr>
    <th>Dolzina hrambe</th>
    <th>Verzija</th>
    <th>Podrobnosti</th>
   
  </tr>

<?php 
$prenesi=null;
for ($j = 0 ; $j < $st_vrstic ; ++$j)
{
	$vrsta = mysqli_fetch_row($result); 
	$prenesi=$vrsta[0];
	
?>

  <tr>
   <form method="post" action="workerji/podrobnostiVerzije_worker.php" >
  	
    <td><?php echo $vrsta[3]; ?></td>
    <td><?php echo $vrsta[1] ?></td>
    <td hidden><input type="text"  value="<?php echo $vrsta[0];?>" name="izbranaVerzija"/></td>
    <td><input type="submit" name="izberiVerzijo" value="Prikazi" /></td>
    </form>
  </tr>
  
	
 
<?php 
}
$_SESSION["idVerzije"]=$prenesi;

?>

</table> 
<center><form action="list.php" method="post">
<input type="submit" name="podrPriv" value="Nazaj na seznam privolitev">
</form></center>

<p><center>
<form action="spreminjanjeVerzij.php" method="post">
<input hidden="hidden" name="idVerz" value="<?php echo $prenesi ?>"/>
		<input type="submit" name="potrdiVerz" value="Spremeni verzijo!">
	</form>
</center>