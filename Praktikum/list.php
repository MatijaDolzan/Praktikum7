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
					
					<div class="row">
						<div class="12u">

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
							<!-- Table -->
								<section class="box">

									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
                                                    <th>Privolitev - naslov</th>
                                                    <th>Dolzina hrambe</th>
                                                    <th>Verzija</th>
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
                        											<td><input class="button fit small" type="submit" name="izberiPrivolitev" value="<?php echo $vrsta[1]; ?>" /></td>
                        										</div>
        													</div>
        													<div class="row uniform 50%">
                        										<div class="12u">
                        											<td><?php echo $vrsta[2] ?></td>
                        										</div>
        													</div>
        													<div class="row uniform 50%">
                        										<div class="12u">
                        											<td><?php echo $vrsta[3] ?></td>
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
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li>
					</ul>
				</footer>

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