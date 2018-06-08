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
									
									7. Obdelava osebnih podatkov
	
                                	7.1. Točnost podatkov
                                	
                                	7.2. Vrste podatkov in nameni njihove obdelave
                                	
                                	7.3. Pravica do ugovora
                                	
                                	7.5. Spreminjanje podatkov
                                	
                                	7.6. Uporabniki osebnih podatkov
                                	
                                	7.7. Rok hrambe osebnih podatkov
                                	
                                	7.8. Informacije o pravicah v zvezi z varstvom osebnih podatkov
                                
                                    7.8.1. Imetnik SPAR plus kartice ima pravico, da pisno na sedež 
                                    družbe Spar Slovenija d.o.o., Spar plus oddelek, Letališka c. 26, 
                                    1000 Ljubljana, ali po e-pošti na naslov: spar.plus@spar.si zahteva
                                    dostop do podatkov, ki se nanašajo nanj. Na enak način lahko uveljavlja
                                    pravico do omejitve obdelave, izbrisa podatkov in prenosljivosti 
                                    podatkov.
                                   
                                    7.8.2. Pravico do ugovora lahko imetnik uveljavlja v skladu s 7.3. 
                                    točko teh Splošnih pogojev. Pravico do popravka imetnik uveljavlja
                                    v skladu s 7.5. točko teh Splošnih pogojev.
                                    
                                    7.9. Upravljalec
									
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
