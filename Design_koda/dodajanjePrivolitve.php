<?php
session_start();

    $uporabnik=null;
    //$uporabnik=$_SESSION['current_user'];
    $_SESSION['current_user']=1;

require    'razredi\Privolitev.php';
require_once   'razredi\Iprivolitev.php';
?>

<!-- -------------------------- -->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Dodajanje nove privolitve</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Zbiranje privolitev </a> po GDPR</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Domov</a></li>
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
							<li><a href="#" class="button">Prijavi se</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Dodajanje privolitev</h2>
						<p>Dodajte novo privolitev.</p>
					</header>
					<div class="box">
						<form method="post" action="workerji/dodajanjePrivolitev_worker.php">
							
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="naslov" value="" placeholder="Naslov" />
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="dodajPriv" value="Dodaj!" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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





