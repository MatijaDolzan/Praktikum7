<?php
include ("header.php");
include ("check_user.php");
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Zbiranje privolitev po GDPR</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

				
		<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Seznam upravljavcev</h2>
					</header>
					
					<div class="row">
						<div class="12u">
						
						<?php

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "praktikum";
                        $currentUser = $_SESSION['current_user'];  
                        
                        
                        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
                        
                        ?>
                        	
                        <?php
                        
                        $query = "SELECT DISTINCT upravljalec.ime, upravljalec.priimek, upravljalec.naslov, privolitve.naslov 
                                    from upravljalec, privolitve, uporabnik 
                                    WHERE upravljalec.fk_upr_priv=privolitve.id 
                                    and privolitve.fk_priv_upo=$currentUser";
                        
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
                        
            <!-- Table -->
    				<section class="box">
    					
    						<div class="table-wrapper">
    								<table>
    									<thead>
    										<tr>
                                                  <th>Ime upravljalca</th>
                                                  <th>Priimek</th>
                                                  <th>Verzija</th>
                                                  <th>Naslov privolitve</th>
                                                  
                                                    	
                                             </tr>
    									</thead>
    									<?php                         
                        for ($j = 0 ; $j < $st_vrstic ; ++$j)
                        {
                        	$vrstica = mysqli_fetch_row($result); 

                         ?>
    									<tbody>
    										 <tr>
                                                <td><?php echo $vrstica[0] ?></td>
                                                <td><?php echo $vrstica[1] ?></td>
                                                <td><?php echo $vrstica[2] ?></td>
                                                <td><?php echo $vrstica[3] ?></td>
                                              </tr>
    												
    									</tbody>
    									<?php                         } ?>
    								</table>
    						</div>
    					</section>
    				</div>
    			</div>
    		</section>

		<!-- Footer -->
				<?php require 'footer.php';?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
