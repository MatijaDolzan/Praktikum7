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


<?php 
function highlight_word( $content, $word) {
    $replace = '<span style="background-color: 	#87CEFA;">' . $word . '</span>'; // create replacement
    $content = str_replace( $word, $replace, $content ); // replace content
    return $content; // return highlighted data
}
require 'db_connection.php';
$db_server = $connection;

    if (isset($_POST['GumbIskanjeEmail']))
    {
    	$search=$_POST['inputIskanjaEmail'];

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


	<div class="jumbotron">
	<p><center><table cellspacing="0" style="width:35%;">
		<tr> <td><center><strong><i>E-mail: </i></strong><?php echo highlight_word($row[0], $search); ?><br></center></td></tr>
		<tr> <td><center><strong><i>Naslov privolitve: </i></strong><?php echo highlight_word($row[1], $search);?><br></center></td></tr >
		<tr> <td><center><strong><i>Verzija: </i></strong><?php echo highlight_word($row[2], $search);?><br></center></td></tr>
		<tr> <td><center><strong><i><form method="post" action="podrobnostiPodpisnika_worker.php?id=<?php echo $row[5];?>"><input type="submit" value="Podrobnosti"></form></i></strong></center></td></tr>				
	</table></center></div>
	<br>
	<?php
}
	
	
	if (!mysqli_query($db_server, $query))
		print("Iskanje ni uspelo: $query<br />" . mysql_error() . "<br /><br />");
}
	
	
	?>
	


