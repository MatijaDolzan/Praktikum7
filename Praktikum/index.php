<?php
session_start();
?>

<?php ini_set('default_charset', 'UTF-8');
header('Content-type', 'text/html; charset=UTF-8');
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
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Zbiranje privolitev </a> po GDPR</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Domov</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Menu</a>
								<ul>
									<li>
										<a href="dodajanjePrivolitve.php">Privolitve - podmeni</a>
										<ul>
											<li><a href="dodajanjePrivolitve.php">Dodaj privolitev</a></li>
											<li><a href="list.php">Seznam privolitev</a></li>
											<li><a href="iskanje.php">Iskanje privolitev</a></li>
										</ul>
									</li>
									<li><a href="seznam_upravljavcev.php">Upravljalci</a></li>
									<li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
								</ul>
							</li>
							<?php
                        	if(isset($_SESSION['current_user'])){
                        	?>
    							<li><a href="account.php" class="button">Uredi podatke</a></li>
    							<li><a href="logout_worker.php" class="button">Odjavi se</a></li>
    						<?php 
                        	} else{
                        	?>  
                        	  
                        		<li><a href="login.php" class="button" >Prijavi se</a></li>
								<li><a href="register.php" class="button">Registriraj se</a></li>
                        		<?php 
                        	} 
                        	?>
						</ul>
					</nav>
				</header>
				

			<!-- Banner -->
				<?php
                    if(isset($_SESSION['current_user'])){
                ?>
    				<section id="banner">
    					<h2>Dobrodosli!</h2>
    					<p>Vasa prijava je bila uspesna ...</p>
    				</section>
				
				<?php 
                    } else{
                ?>
                    <section id="banner">
    					<h2>Zbiranje privolitev po GDPR</h2>
    					<p>Pozdravljeni na vstopni strani nasega podjetja</p>
    					<ul class="actions">
    						<li><a href="login.php" class="button special">Prijava</a></li>
    						<li><a href="register.php" class="button">Registracija</a></li>
    					</ul>
    				</section>
				<?php 
                    } 
                ?>
                        	
                        	
                        	

			<!-- Main -->
				<section id="main" class="container">


				<?php
                    if(isset($_SESSION['current_user'])){
                ?>
                <section class="box special features">
						<div class="features-row">
							<section>
								<span class="icon major fa-bolt accent2"></span>
								<h3>Dodajanje privolitev</h3>
								<p></p>
								<ul class="actions">
									<li><a href="dodajanjePrivolitve.php" class="button alt">Poglej</a></li>
								</ul>
							</section>
							<section>
								<span class="icon major fa-area-chart accent3"></span>
								<h3>Seznam privolitev</h3>
								<p></p>
								<ul class="actions">
									<li><a href="list.php" class="button alt">Poglej</a></li>
								</ul>
							</section>
						</div>
						<div class="features-row">
							<section>
								<span class="icon major fa-cloud accent4"></span>
								<h3>Iskanje privolitev</h3>
								<p></p>
								<ul class="actions">
									<li><a href="iskanje.php" class="button alt">Poglej</a></li>
								</ul>
							</section>
							<section>
								<span class="icon major fa-lock accent5"></span>
								<h3>Upravljavci</h3>
								<p></p>
								<ul class="actions">
									<li><a href="seznam_upravljavcev.php" class="button alt">Poglej</a></li>
								</ul>
							</section>
						</div>
						<!-- --dodaj se za podpisnike?? --
						<div class="features-row">
							<section>
								<span class="icon major fa-cloud accent4"></span>
								<h3>Podpisniki</h3>
								<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
								<ul class="actions">
									<li><a href="iskanje.php" class="button alt">Poglej</a></li>
								</ul>
							</section>
							<section>
								<span class="icon major fa-lock accent5"></span>
								<h3>Upravljavci</h3>
								<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
								<ul class="actions">
									<li><a href="seznam_upravljavcev.php" class="button alt">Poglej</a></li>
								</ul>
							</section>
						</div>-->
						
					</section>
                <!-- ------ -->
                <?php 
                    } else{
                ?>
					<section class="box special">
						<span class="image featured"><img src="images/Blog-2.jpg" alt="" /></span>
						<header class="major">
							<h2>Clani ekipe: </h2>
							<hr/>
							<ul>
								<li>Dolzan Matija</li>
								<li>Ekart Laura</li>
								<li>Bencek Petra</li>
								<li>Brod Matic</li>
							</ul>
										
						</header>
					</section>
				<?php 
                    } 
                ?>
					

				</section>


			<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; All rights reserved.</li><li>Praktikum 2</li>
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