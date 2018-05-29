<?php
include ("menu.php");

?>

<center><h2>Podrobnosti privolitve</h2></center>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum";
  
$db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );

?>

<?php 

$query = "SELECT * 
            FROM privolitve,verzija 
            WHERE verzija.FK_ver_priv=privolitve.id";
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
    <th>Privolitev</th>
    <th>Besedilo</th>
    <th>Dolzina hrambe</th>
    <th>Verzija</th>
  </tr>

<?php 
for ($j = 0 ; $j < $st_vrstic ; ++$j)
{
	$vrsta = mysqli_fetch_row($result); 
	
?>

  <tr>
    <td><?php echo $vrsta[1] ?></td>
    <td><?php echo $vrsta[5] ?></td>
    <td><?php echo $vrsta[6] ?></td>
    <td><?php echo $vrsta[4] ?></td>
  </tr>

<?php 
}
?>

</table>
  
  
<center><form action="list.php" method="post">
<input type="submit" name="podrPriv" value="Nazaj na seznam!">
</form></center>
