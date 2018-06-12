<?php

include ("header.php");
include ("check_user.php");

$uporabnik=$_SESSION['current_user'];
$id=$_SESSION['idPrivolitve'];

require   'razredi\Verzija.php';
require_once  'razredi\Iprivolitev.php';
require   'razredi\Upravljalec.php';
require   'razredi\Pooblascenec.php';

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
				<section id="main" class="container 75%">
					<header>
						<h2>Dodajanje nove verzije</h2>
					</header>
					<div class="box">
					
					
						<form method="post" action="workerji/dodajanjeVerzije_worker.php">
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Besedilo:</h2>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									
									<textarea name="text" id="message" placeholder="Besedilo" rows="20">
									
									1. Obdelava osebnih podatkov
	
                                	1.1. Točnost podatkov
                                	
                                	1.2. Vrste podatkov in nameni njihove obdelave
                                	
                                	1.3. Pravica do ugovora
                                	
                                	1.5. Spreminjanje podatkov
                                	
                                	1.6. Uporabniki osebnih podatkov
                                	
                                	1.7. Rok hrambe osebnih podatkov
                                	
                                	1.8. Informacije o pravicah v zvezi z varstvom osebnih podatkov
                                
                                    1.9. Upravljalec
                                    
                                    2. Pooblaščenec
									
									</textarea>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="hramba" value="" placeholder="Rok hrambe" />
								</div>
							</div>
							
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Dodajanje checkboxov k privolitvi:</h2>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="chbx1" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx2" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx3" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx4" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx5" value="" />
                                </div>
                                <div class="12u">   
                                    <input type="text" name="chbx6" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx7" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx8" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx9" value="" />
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx10" value="" />
								</div>
							</div>
							
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Upravljalec GDPR pogodbe</h2>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
								
									<input type="text" name="imeUpr" value="" placeholder="Ime" />
								</div>
								<div class="6u 12u(mobilep)">
									<input type="text" name="priimekUpr" value="" placeholder="Priimek" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="naslovUpr" value="" placeholder="Naslov" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="6u 12u(narrower)">
									<input type="checkbox" id="DodPoob" name="DodPoob" >
									<label for="DodPoob">Dodal bom pooblascenca:</label>
								</div>
							</div>
							
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Pooblascenec GDPR pogodbe</h2>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
								
									<input type="text" name="imePoob" id="imePoob" value="" placeholder="Ime" disabled />
								</div>
								<div class="6u 12u(mobilep)">
									<input type="text" name="priimekPoob" id="priimekPoob" value="" placeholder="Priimek" disabled />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="naslovPoob" id="naslovPoob" value="" placeholder="Naslov" disabled />
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="dodajVerz" value="Dodaj!" /></li>
									</ul>
								</div>
							</div>
						</form>
						
						<script>
                        	document.getElementById('DodPoob').onchange = function() {
                            document.getElementById('imePoob').disabled = !this.checked;
                            document.getElementById('priimekPoob').disabled = !this.checked;
                            document.getElementById('naslovPoob').disabled = !this.checked;
                        };
                        </script>

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
