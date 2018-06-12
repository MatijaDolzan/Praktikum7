<?php
require 'menu.php';
require 'check_user.php';
$currentUser=$_SESSION['current_user'];

?>

<center><h2><i>Iskanje po e-mailu podpisnika: </i></h2>
    <form class="navbar-form navbar-left" action="iskanje.php" method="post">
    <div class="input-group" >
        <input type="text" class="form-control" name="inputIskanjaEmail" placeholder="Vnesi iskalni niz">
        
        <p><div class="input-group-btn">
        <button class="btn btn-default" name="GumbIskanjeEmail" type="submit">Isci
        <i class="glyphicon glyphicon-search"></i>
        </button>
        </div>
        
    </div>
    </form>
</center>
<p>

<!-- center><h2><i>Iskanje po naslovu privolitve: </i></h2>
    <form class="navbar-form navbar-left" action="iskanje.php" method="post">
    <div class="input-group" >
        <input type="text" class="form-control" name="inputIskanja" placeholder="Vnesi iskalni niz">
        
        <p><div class="input-group-btn">
        <button class="btn btn-default" name="GumbIskanje" type="submit">Isci
        <i class="glyphicon glyphicon-search"></i>
        </button>
        </div>
        
    </div>
    </form>
</center -->

<?php 
function highlight_word( $content, $word) {
    $replace = '<span style="background-color: 	#87CEFA;">' . $word . '</span>'; // create replacement
    $content = str_replace( $word, $replace, $content ); // replace content
    return $content; // return highlighted data
}
require 'db_connection.php';
$db_server = $connection;
?>
 
 
	<?php
    /*if (isset($_POST['GumbIskanjeEmail']))
    {
    	$search=$_POST['inputIskanjaEmail'];
    	$query =   "SELECT username, email, naslov 
                    FROM uporabnik, privolitve 
                    WHERE uporabnik.id=privolitve.FK_priv_upo
                    AND email LIKE'%$search%' 
                    ";
    	$result = mysqli_query($db_server,$query);
    	
    	if (!$result)
        {
        	die ("Dostop do PB ni uspel");;
        }
        else
        {
            
    	$st_vrstic = mysqli_num_rows($result);
    	if($st_vrstic > 0){ 
    		print('');}
    	else{
    		print('<h3><center><i>Ni zadetkov iskanja</i></center></h3>');
    	}
    }
	while($row = mysqli_fetch_row($result)) { */?>
	
	
	<!-- div class="jumbotron">
	<center><table cellspacing="0">
		<tr> <strong>Uporabnisko ime: </strong><?php echo highlight_word($row[0], $search); ?><br></tr>
		<tr> <strong>E-mail: </strong><?php echo highlight_word($row[1], $search); ?><br></tr>
		<tr> <strong>Naslov privolitve: </strong><?php echo highlight_word($row[2], $search);?><br></tr --><br>
	
	</table></center></div -->
	
	<?php
    if (isset($_POST['GumbIskanjeEmail']))
    {
    	$search=$_POST['inputIskanjaEmail'];
    	/*$query =   "SELECT uporabnik.username, uporabnik.email, privolitve.naslov, verzija.verzija, podpisnik.cas, podpisnik.ip_add
                    FROM uporabnik, privolitve, verzija, podpisnik
                    WHERE uporabnik.id=privolitve.FK_priv_upo
                    AND privolitve.id=FK_ver_priv
                    AND verzija.id=FK_pod_ver
                    AND uporabnik.email LIKE'%$search%' 
                    ";
    	*/
    	$query =      "SELECT podpisnik.email, privolitve.naslov, verzija.verzija, podpisnik.ip_add, podpisnik.cas, podpisnik.id 
    	               FROM privolitve, verzija, podpisnik 
    	               WHERE verzija.FK_ver_priv=privolitve.id 
    	               AND podpisnik.FK_pod_ver=verzija.id 
                       AND privolitve.FK_priv_upo='$currentUser'
    	               AND podpisnik.email LIKE '%$search%'
                    ";
    	
        
    	$result = mysqli_query($db_server,$query);
    	
    	if (!$result)
        {
        	die ("Dostop do PB ni uspel");;
        }
        else
        {
            
    	$st_vrstic = mysqli_num_rows($result);
    	if($st_vrstic > 0){ 
    		print('');}
    	else{
    		print('<h3><center><i>Ni zadetkov iskanja</i></center></h3>');
    	}
    }
	while($row = mysqli_fetch_row($result)) { ?>
	
	
	<!-- div class="jumbotron">
	<p><center><table cellspacing="0">
		<tr> <strong>Uporabnisko ime: </strong><?php echo highlight_word($row[0], $search); ?><br></tr>
		<tr> <strong>E-mail: </strong><?php echo highlight_word($row[1], $search); ?><br></tr>
		<tr> <strong>Naslov privolitve: </strong><?php echo highlight_word($row[2], $search);?><br></tr >
		<tr> <strong><i>Verzija: </i></strong><?php echo highlight_word($row[3], $search);?><br></tr>
		<tr> <strong><i>Datum podpisa: </i></strong><?php echo highlight_word($row[4], $search);?><br></tr>
		<tr> <strong><i>IP: </i></strong><?php echo highlight_word($row[5], $search);?><br></tr>
	
	</table></center></div -->

	<div class="jumbotron">
	<p><center><table cellspacing="0">
		<tr> <strong><i><a href="podrobnostiPodpisnika_worker.php?id=<?php echo $row[5];?>">E-mail: </a></i></strong><?php echo highlight_word($row[0], $search); ?><br></tr>
		<tr> <strong><i>Naslov privolitve: </i></strong><?php echo highlight_word($row[1], $search);?><br></tr >
		<tr> <strong><i>Verzija: </i></strong><?php echo highlight_word($row[2], $search);?><br></tr>			
	</table></center></div>
	
	<?php
}
	
	
	if (!mysqli_query($db_server, $query))
		print("Iskanje ni uspelo: $query<br />" . mysql_error() . "<br /><br />");
}
	
	
	?>
	


