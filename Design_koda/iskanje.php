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
			
			<!-- Header -->	
		<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Iskanje</h2>
					</header>
					
					<div class="row">
						<div class="12u">
						
						<!-- Text -->
								<section class="box">
									<h3>Iskanje po e-mailu podpisnika:</h3>
										
									<form method="post" action="iskanje.php" >
										<div class="row uniform 50%">
											<div class="9u 12u(mobilep)">
												<input type="text" name="inputIskanjaEmail" id="query" value="" placeholder="Vnesi iskalni niz" />
												
											</div>
											<div class="3u 12u(mobilep)">
												<input type="submit" value="Search" class="fit" name="GumbIskanjeEmail" />
												
											</div>
										</div>
									</form>						
										
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
                                        if (isset($_POST['GumbIskanjeEmail']))
                                        {
                                        	$search=$_POST['inputIskanjaEmail'];
                                        	$query =      "SELECT podpisnik.email, privolitve.naslov, verzija.verzija, podpisnik.ip_add, podpisnik.cas 
                                        	               FROM privolitve, verzija, podpisnik 
                                        	               WHERE verzija.FK_ver_priv=privolitve.id 
                                        	               AND podpisnik.FK_pod_ver=verzija.id 
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
									
								</section>
						</div>
					</div>
				
				<div class="row">
						<div class="12u">

							<!-- Izpis -->
								<section class="box">
									<h3>Lists</h3>
									
										<div class="jumbotron">
                                    	<table>
                                    		<tr> <strong><i>E-mail: </i></strong><?php echo highlight_word($row[0], $search); ?><br></tr>
                                    		<tr> <strong><i>Naslov privolitve: </i></strong><?php echo highlight_word($row[1], $search);?><br></tr >
                                    		<tr> <strong><i>Verzija: </i></strong><?php echo highlight_word($row[2], $search);?><br></tr>		
                                    		<tr> <strong><i>IP: </i></strong><?php echo highlight_word($row[3], $search);?><br></tr>
                                    		<tr> <strong><i>Datum podpisa: </i></strong><?php echo highlight_word($row[4], $search);?><br></tr>
                                    	
                                    	</table>
                                    	
                                    	<?php
                                        }
                                    	
                                    	if (!mysqli_query($db_server, $query))
                                    		print("Iskanje ni uspelo: $query<br />" . mysql_error() . "<br /><br />");
                                        }
                                    	
                                    	?>
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
