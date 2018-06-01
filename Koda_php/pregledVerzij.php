<?php
session_start();
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';

if(isset($_POST['idPrivolitve'])){
    $_SESSION['idP']=22;
  
   
    
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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum";
  
$db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );

?>

<?php 
$_SESSION['current_user']=1;
$nekaj=$_SESSION['current_user']=1;
<<<<<<< HEAD

=======
$id=$_SESSION['idP'];
>>>>>>> 2803d965d4e5e06da488e0c1b5e07dcfa1d01d70
$query = "SELECT * 
            FROM privolitve,verzija, uporabnik 
            WHERE verzija.FK_ver_priv=privolitve.id 
            AND privolitve.id='$id'";

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
    <th>Privolitev - naslov</th>
    <th>Dolzina hrambe</th>
    <th>Verzija</th>
    <th>Privolitev - naslov</th>
    <th>Dolzina hrambe</th>
    <th>Verzija</th>
    <th>Privolitev - naslov</th>
    <th>Dolzina hrambe</th>
    <th>Verzija</th>
    <th>Privolitev - naslov</th>
    
  </tr>

<?php 
for ($j = 0 ; $j < $st_vrstic ; ++$j)
{
	$vrsta = mysqli_fetch_row($result); 
	
?>

  <tr>
    <td><?php echo $vrsta[0] ?></td>
    <td><?php echo $vrsta[1] ?></td>
    <td><?php echo $vrsta[2] ?></td>
    <td><?php echo $vrsta[3] ?></td>
    <td><?php echo $vrsta[4] ?></td>
    <td><?php echo $vrsta[5] ?></td>
    <td><?php echo $vrsta[6] ?></td>
    <td><?php echo $vrsta[7] ?></td>
    <td><?php echo $vrsta[8] ?></td>
    <td><?php echo $vrsta[9] ?></td>
    <td><?php echo $vrsta[10] ?></td>
    <td><?php echo $vrsta[11] ?></td>
    <td><?php echo $vrsta[12] ?></td>
    
  </tr>

<?php 
}
echo $_SESSION['idP'];
?>

</table>
  
  
<center><form action="list.php" method="post">
<input type="submit" name="podrPriv" value="Nazaj na seznam!">
</form></center>
