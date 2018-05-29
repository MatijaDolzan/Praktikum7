<?php
include ("menu.php");
?>


<center><h2>Podrobnosti</h2></center>

<?php 
function highlight_word( $content, $word) {
    $replace = '<span style="background-color: 	#87CEFA;">' . $word . '</span>'; // create replacement
    $content = str_replace( $word, $replace, $content ); // replace content
    return $content; // return highlighted data
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum";

$db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );

?>

<?php 

$query_count = "SELECT pr.naslov AS NASLOV, COUNT(FK_ver_priv) AS STEVILO
                FROM privolitve pr, podpisnik po, verzija v
                WHERE pr.id=v.FK_ver_priv AND v.id=po.FK_pod_ver
                GROUP BY pr.id";
$result_count = mysqli_query($db_server, $query_count);

if (!$result_count)
{
	die ("Dostop do PB ni uspel");
}
else
{
    $st_vrst = mysqli_num_rows($result_count);
	if($st_vrst > 0) 
		print('');
}

?>

<p>	
<table>
  <tr>
    <th>Naslov</th>
    <th>Stevilo podpisanih</th>
  </tr>


<?php 
for ($k = 0 ; $k < $st_vrst ; ++$k)
{
	$vrstica = mysqli_fetch_row($result_count); 
	
?>

  <tr>
    <td><?php echo $vrstica[0] ?></td>
    <td><?php echo $vrstica[1] ?></td>
  </tr>

<?php 
}
?>


</table>
	
 
<br><p><center><form action="list.php" method="post">
<input type="submit" name="podrPriv" value="Nazaj">
</form></center>

