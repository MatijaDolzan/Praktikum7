<?php
include ("header.php");
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
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
				<section id="main" class="container 75%">
					<header>
						<h2>Prijava</h2>
					</header>
					<div class="box">
					
						<form method="post" action="login_worker.php">
							
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="email" value="" placeholder="Email" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="password" name="password" value="" placeholder="Geslo" />
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="submit" value="Potrdi" /></li>
									</ul>
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="button" onclick="window.location = 'register.php';" value="REGISTRIRAJ SE" /></li>
									</ul>
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<!-- <li><input type="button" onclick="window.location = 'google_login_preset.php';" value="Log In With Google" /></li>   -->
										<hr />
										
										<h3>Prijava z Google-om:</h3>
										<li><a href="google_login_preset.php" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
									</ul>
								</div>
							</div>
						</form>
						
						<?php if(isset($_SESSION['login_error'])){
                        ?>
                        <script>alert('<?php echo $_SESSION['login_error'];?>');</script>
                        <?php 
                         unset($_SESSION['login_error']);
                        }
                        ?>

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
