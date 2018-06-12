<?php
require 'menu.php';
require 'check_user.php';
if (isset($_SESSION['idPrivolitve'])){
    unset($_SESSION['idPrivolitve']);
}

?>



<center><h2>Seznam privolitev</h2></center>

<?php

require 'db_connection.php';
  
$db_server = $connection;
$currentUser = $_SESSION['current_user'];
    
$query = "SELECT privolitve.id,privolitve.naslov
            FROM privolitve WHERE privolitve.FK_priv_upo = $currentUser
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
    <th>Podrobnosti</th>
  </tr>

<?php 
for ($j = 0 ; $j < $st_vrstic ; ++$j)
{
	$vrsta = mysqli_fetch_row($result); 
	
?>

  <tr>
  <form method="post" action="workerji/pregledVerzij_worker.php" >
  	<td hidden><input type="text"  value="<?php echo $vrsta[0];?>" name="izbranaPrivolitev"/></td>
    <td><?php echo $vrsta[1] ?></td>
    <td><input type="submit" name="izberiPrivolitev" value="Izberi" /></td>
  </form>
  </tr>
  
<?php 
}
  
 
?>
</table>
  

<center><form action="podrobnosti_list.php" method="post">
<input type="submit" name="podrPriv" value="Podrobnosti">
</form></center>