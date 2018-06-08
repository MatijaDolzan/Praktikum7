<?php
include ("header.php");
// include 'check_user.php';
require 'razredi/Uporabnik.php';

if(isset($_POST['edit'])){
    
    if($_POST['edit'] === 'email'){
        
        $_SESSION['current_edit'] = "email";

    }else if ($_POST['edit'] === 'username'){

        $_SESSION['current_edit'] = "username";

    }else if ($_POST['edit'] === 'password'){

        $_SESSION['current_edit'] = "password";
        
    }else{
        
        $_SESSION['error'] = "Error [account/edit] #E1";
        header("Location: error.php");
        exit();
        
    }
}

$current_user= new Uporabnik(null, null, null, null);
$current_user = $current_user->getUporabnikViaId($_SESSION['current_user']);
?>




<!DOCTYPE HTML>
<html>
	<head>
		<title>Urejanje podatkov racuna</title>
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
						<h2>Urejanje podatkov racuna</h2>
					</header>
					<div class="box">
						
						<h3>Trenutni email:</h3>
						<?php
                        //VREDNOST UPORABNIKOVEGA EMAILA
                        echo $current_user->getEmail() . "<br>";
                        ?>
                        
                        
                        <?php //FORMA ZA SPREMINJANJE EMAIL-A ?>

                        <?php
                        if((isset($_SESSION['current_edit'])) && ($_SESSION['current_edit'] === "email")){
                        ?>

						<form method="post" action="account_worker.php">
							
							<div class="row uniform 50%">
								<div class="12u">
									<input hidden="true" type="text" value="email" name="edit">
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="edited_email">
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="submit" value="Uredi" /></li>
									</ul>
								</div>
							</div>
							
						</form>
						
						
						        
                        <?php
                        }
                        ?>
                        
                        <?php //GUMB ZA PRIKAZ FORME ZA SPREMINJANJE EMAIL-A ?>
                        
                        
                        <form method="post" action="account.php">
							<div class="row uniform 50%">
								<div class="12u">
									<input hidden="true" type="text" value="email" name="edit">
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="submit" value="Uredi" /></li>
									</ul>
								</div>
							</div>
						</form>
						
						
						<h3>Trenutno uporabniško ime:</h3>
						<?php
                        //VREDNOST UPORABNIKOVEGA USERNAME-A
                        echo $current_user->getUsername() . "<br>";
                        ?>
                        
                        <?php //FORMA ZA SPREMINJANJE USERNAME-A ?>
                        
                        <?php
                        if((isset($_SESSION['current_edit'])) && ($_SESSION['current_edit'] === "username")){
                        ?>
                        
                        <form method="post" action="account_worker.php">
							<div class="row uniform 50%">
								<div class="12u">
									<input hidden="true" type="text" value="username" name="edit">
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="edited_username">
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="submit" value="Uredi" /></li>
									</ul>
								</div>
							</div>
						</form>
						
						<?php 
                        }
                        ?>
                        
                        <?php //GUMB ZA PRIKAZ FORME ZA SPREMINJANJE USERNAME-A ?>
                        
                        <form method="post" action="account.php">
							<div class="row uniform 50%">
								<div class="12u">
									<input hidden="true" type="text" value="username" name="edit">
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="submit" value="Uredi" /></li>
									</ul>
								</div>
							</div>
						</form>						
						
						<h3>Geslo</h3>
						<?php
                        //VREDNOST UPORABNIKOVEGA PASSWORD-A NAMENOMA NI PRIKAZANO - MORDA PRIKAZEMO ********* NAMESTO TEGA?
                        ?>
                        
                        <?php //FORMA ZA SPREMINJANJE PASSWORD-A ?>
                        
                        <?php
                        if((isset($_SESSION['current_edit'])) && ($_SESSION['current_edit'] === "username")){
                        ?>
                        
                        <form method="post" action="account_worker.php">
							<div class="row uniform 50%">
								<div class="12u">
									<input hidden="true" type="text" value="password" name="edit">
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="edited_password">
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="submit" value="Uredi" /></li>
									</ul>
								</div>
							</div>
						</form>
						
						<?php 
                        }
                        ?>
                        
                        <?php //GUMB ZA PRIKAZ FORME ZA SPREMINJANJE PASSWORD-A ?>
                        
                        <form method="post" action="account.php">
							<div class="row uniform 50%">
								<div class="12u">
									<input hidden="true" type="text" value="password" name="edit">
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="submit" value="Uredi" /></li>
									</ul>
								</div>
							</div>
						</form>
						
						<?php if(isset($_SESSION['account_error'])){
                        ?>
    						
    						<script>alert('<?php echo $_SESSION['account_error'];?>');</script>
                        <?php 
                                unset($_SESSION['account_error']);
                        }
                        ?>
                        						

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
