<?php
include ("header.php");
include ("check_user.php");

require    'razredi\Privolitev.php';
require_once   'razredi\Iprivolitev.php';
$uporabnik=$_SESSION['current_user'];

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
