<?php
session_start();
//echo $_SESSION["izbranaVerzijaSes"];
?>

<?php
//echo $_SESSION["textVerzijeSes"];
?>

<?php
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';

$idVerz=0;
if(!empty($_SESSION['izbranaVerzijaSes'])){
   $idVerz=$_SESSION['izbranaVerzijaSes'];
  
}

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
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
				<section id="main" class="container">
					<header>
						<h2>Podrobnosti verzije</h2>
					</header>
					
					<div class="row">
						<div class="12u">
						<?php

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "praktikum";
                          
                        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
                        
                        ?>
                        
                        <?php 
                        $_SESSION['current_user']=1;
                        $nekaj=$_SESSION['current_user']=1;
                        $query = "SELECT privolitve.naslov, verzija.verzija, verzija.text, 
                                        upravljalec.ime, upravljalec.priimek, upravljalec.naslov, 
                                        pooblascenec.ime, pooblascenec.priimek, pooblascenec.naslov
                                    FROM privolitve, verzija, upravljalec, pooblascenec
                                    WHERE verzija.FK_ver_priv=privolitve.id 
                                    AND upravljalec.FK_upr_priv=privolitve.id
                                    AND verzija.FK_ver_poob=pooblascenec.id
                                    AND verzija.id='$idVerz'";
                        
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
                        
                    <!-- Text -->
						<section class="box">
						
						<p>	
                        
                        <?php 
                        
                        
                        for ($j = 0 ; $j < $st_vrstic ; ++$j)
                        {
                        	$vrsta = mysqli_fetch_row($result); 
                        	
                        	echo "<b>Naslov privolitve: </b>".$vrsta[0];
                        	
                        ?>
                        <p>	
                        <?php 
                        
                        	echo "<b>Verzija: </b>".$vrsta[1];
                        	
                        ?>
                        <p>
                        <?php 
                        
                        	echo "<b>Besedilo: </b>".$vrsta[2];
                        
                        ?>
                        <p>	
                        <?php 
                        
                        	echo "<b>Ime uporavljalca: </b>".$vrsta[3];
                        	
                        ?>
                        
                        <p>	
                        <?php 
                        
                        	echo "<b>Priimek uporavljalca: </b>".$vrsta[4];
                        	
                        ?>
                        
                        <p>	
                        <?php 
                        
                        	echo "<b>Naslov uporavljalca: </b>".$vrsta[5];
                        	
                        ?>
                        
                        <p>	
                        <?php 
                        
                        	echo "<b>Ime pooblascenca: </b>".$vrsta[6];
                        	
                        ?>
                        
                        <p>	
                        <?php 
                        
                        	echo "<b>Priimek pooblascenca: </b>".$vrsta[7];
                        	
                        ?>
                        
                        <p>	
                        <?php 
                        
                        	echo "<b>Naslov pooblascenca: </b>".$vrsta[8];
                        	
                        
                        }
                        
                        
                        ?>
                        </p>
                        
                        <form action="list.php" method="post">
                        <input type="submit" name="podrPriv" value="Nazaj na seznam!" class="button special fit">
                        </form>
                        							
						</section>   
				
				</div>
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
                        

