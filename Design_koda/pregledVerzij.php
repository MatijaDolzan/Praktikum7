<?php
session_start();
require_once 'razredi\Iprivolitev.php';
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';
$idPriv=0;
if(!empty($_SESSION['izbranaPrivolitevSes'])){
   $idPriv=$_SESSION['izbranaPrivolitevSes'];
}

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Podrobnosti privolitve</title>
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
					<h1><a href="index.html">Alpha</a> by HTML5 UP</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Layouts</a>
								<ul>
									<li><a href="generic.html">Generic</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>
				
		<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Podrobnosti privolitve</h2>
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
                    $query = "SELECT privolitve.naslov, verzija.rok_hrambe, verzija.verzija, verzija.id, verzija.text
                                FROM privolitve,verzija, uporabnik 
                                WHERE verzija.FK_ver_priv=privolitve.id 
                                AND privolitve.id='$idPriv'";
                    
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
                                                    <th>Naslov privolitve</th>
                                                    <th>Dolzina hrambe</th>
                                                    <th>Verzija</th>
                                                    <th>Podrobnosti</th>
                                                   
                                                  </tr>
											</thead>
											
											<?php 
                                            $prenesi=null;
                                            for ($j = 0 ; $j < $st_vrstic ; ++$j)
                                            {
                                            	$vrsta = mysqli_fetch_row($result); 
                                            	$prenesi=$vrsta[3];
                                            	
                                            ?>
        
											<tbody>
												<tr>
                                                   <form method="post" action="workerji/podrobnostiVerzije_worker.php" >
                                                  	<td hidden><input type="text"  value="<?php echo $vrsta[3];?>" name="izbranaVerzija"/></td>
                                                    <td><?php echo $vrsta[0]; ?></td>
                                                    <td><?php echo $vrsta[1] ?></td>
                                                    <td><?php echo $vrsta[2] ?></td>
                                                    <td hidden><input type="text"  value="<?php echo $vrsta[4];?>" name="textVerzije"/></td>
                                                    <td><input type="submit" name="izberiVerzijo" value="Prikazi" /></td>
                                                    </form>
                                                  </tr>
                                              
                                                  <?php 
                                                    }
                                                    $_SESSION["idVerzije"]=$prenesi;
                                                    
                                                    ?>
												
											</tbody>
										</table>
										
                                    	<form action="list.php" method="post">
                                        <input class="button special fit" type="submit" name="podrPriv" value="Nazaj na seznam!">
                                        </form>
                                        
                                       
                                        <form action="spreminjanjeVerzij.php" method="post">
                                        <input hidden="hidden" name="idVerz" value="<?php echo $prenesi ?>"/>
                                        		<input class="button fit" type="submit" name="potrdiVerz" value="Spremeni verzijo!">
                                        	</form>
                                        
                                    	
                                    
									</div>
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


