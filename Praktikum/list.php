<?php
include ("header.php");
include ("check_user.php");

if (isset($_SESSION['idPrivolitve'])){
    unset($_SESSION['idPrivolitve']);
}
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

			<!-- Header -->
				
				
		<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Seznam privolitev</h2>
					</header>
					
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
                            
					<div class="row">
						<div class="12u">
						<!-- Table -->
								<section class="box">

									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
                                                    <th>Privolitev - naslov</th>
                                                    <th>Podrobnosti</th>
                                                  </tr>
											</thead>
											
											<?php 
                                                for ($j = 0 ; $j < $st_vrstic ; ++$j)
                                                {
                                                	$vrsta = mysqli_fetch_row($result); 
                                                ?>
        
											<tbody>
												<tr>
                                                      	<form action="workerji/pregledVerzij_worker.php" method="post">
                                          					<div class="row uniform 50%">
                        										<div class="12u">
                        											<td hidden><input type="text"  value="<?php echo $vrsta[0];?>" name="izbranaPrivolitev"/></td>
                        										</div>
        													</div>
        													<div class="row uniform 50%">
                        										<div class="12u">
                        											<td><?php echo $vrsta[1] ?></td>
                        										</div>
        													</div>
        													<div class="row uniform 50%">
                        										<div class="12u">
                        											<td><input type="submit" name="izberiPrivolitev" value="Izberi" /></td>
                        										</div>
        													</div>
                                          				</form>
                                              	
                                              	</tr>
                                              
                                                    <?php 
                                                    }
                                                    ?>
												
											</tbody>
										</table>
										
                                    	<form action="podrobnosti_list.php" method="post">
                                  			<div class="row uniform 50%">
                								<div class="12u">
                									<input type="submit" name="podrPriv" value="Podrobnosti" class="button special fit">
                								</div>
											</div>
                                  		</form>
                                    
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