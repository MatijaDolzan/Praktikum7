<?php
session_start();
if (isset($_SESSION['idPrivolitve'])){
    unset($_SESSION['idPrivolitve']);
}
    
?>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #778899;
}

h1 {
    align:center;
    color:#808080;
}

li {
    float: left;
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

<center><h1><i>Podjetje d.o.o.</i></h1></center>
<ul>
  <li><a class="active" href="index.php">Domov</a></li>
  <li><a href="dodaj_privloitev.php">Dodaj privolitev</a></li> 
  <li><a href="list.php">Seznam</a></li>
  <li><a href="dodajanje_upravljalcev.php">Dodaj upravljalca</a></li>    
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
  <li><a href="login.php" class='login'>Prijava</a></li>
  <li><a href="register.php">Registracija</a></li>
  <li><a href="logout.php">Odjava</a></li>
</ul>

<center><h2>Seznam privolitev</h2></center>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum";
  
$db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );



$query = "select privolitve.id,privolitve.naslov, verzija.rok_hrambe, verzija.verzija
            from privolitve,verzija 
            where verzija.FK_ver_priv=privolitve.id 
            GROUP BY privolitve.naslov";

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
    <th>Privolitev - naslov</th>
    <th>Dolzina hrambe</th>
    <th>Verzija</th>
  </tr>

<?php 
for ($j = 0 ; $j < $st_vrstic ; ++$j)
{
	$vrsta = mysqli_fetch_row($result); 
	
?>

  <tr>
  <form method="post" action="workerji/pregledVerzij_worker.php" >
  	<td hidden><input type="text"  value="<?php echo $vrsta[0];?>" name="izbranaPrivolitev"/></td>
    <td><input type="submit" name="izberiPrivolitev" value="<?php echo $vrsta[1]; ?>" /></td>
    <td><?php echo $vrsta[2] ?></td>
    <td><?php echo $vrsta[3] ?></td>
  </form>
  </tr>
  
<?php 
}
  
 
?>
</table>
  

<center><form action="podrobnosti_list.php" method="post">
<input type="submit" name="podrPriv" value="Podrobnosti">
</form></center>