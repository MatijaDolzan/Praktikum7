<?php
require 'menu.php';

if(!empty($_SESSION['izbranaPrivolitevSes'])){
    
    $idPriv=$_SESSION['izbranaPrivolitevSes'];
  
}else{
    
    header("Location: list.php");
    exit();
    
}

?>

<center><h2>Podrobnosti privolitve</h2></center>

<?php
require 'db_connection.php';
  
$db_server = $connection;

$query = "SELECT * FROM verzija 
            WHERE verzija.FK_ver_priv=$idPriv";

$result = mysqli_query($db_server, $query);

if (!$result){
    
	die ("Dostop do PB ni uspel");
	
}else{
    
	$st_vrstic = mysqli_num_rows($result);
	
	if($st_vrstic > 0){
	    
		print('');
		
	}
}
?>

<p>	
<table>
  <tr>
    <th>Verzija</th>
    <th>Hramba podatkov</th>
    <th>Podrobnosti</th>
  </tr>

<?php 
$prenesi=null;

for ($j = 0 ; $j < $st_vrstic ; ++$j){
    
	$vrsta = mysqli_fetch_row($result); 
	$prenesi=$vrsta[0];
	
?>

  <tr>
   <form method="post" action="workerji/podrobnostiVerzije_worker.php" >
 
  	<td><?php echo $vrsta[1] ?></td>
    <td><?php echo $vrsta[3]; ?></td>
    <td hidden><input type="text"  value="<?php echo $vrsta[0];?>" name="izbranaVerzija"/></td>
    <td><input type="submit" name="izberiVerzijo" value="Prikazi" /></td>
    
    </form>
  </tr>
  
<?php 
}
$_SESSION["idVerzije"]=$prenesi;

?>

</table>

<center>
	<form action="list.php" method="post">
		<input type="submit" name="podrPriv" value="Nazaj na seznam privolitev">
	</form>
</center>

<p>
<center>
	<form action="spreminjanjeVerzij.php" method="post">
		<input hidden="hidden" name="idVerz" value="<?php echo $prenesi ?>"/>
		<input type="submit" name="potrdiVerz" value="Spremeni verzijo!">
	</form>
</center>