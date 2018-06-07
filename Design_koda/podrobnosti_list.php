<!-- DODAJ PREVERJANJE ZA PRIJAVO-CE JE ZE PRIJAVLJEN ALI NE... -->
<?php
session_start();
?>

<?php ini_set('default_charset', 'UTF-8');
header('Content-type', 'text/html; charset=UTF-8');
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
						<h2>Podrobnosti</h2>
					</header>
					
					<div class="row">
						<div class="12u">
						
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
                        
                        $query_count = "SELECT pr.naslov AS NASLOV, COUNT(FK_ver_priv) AS STEVILO
                                        FROM privolitve pr, podpisnik po, verzija v
                                        WHERE pr.id=v.FK_ver_priv AND v.id=po.FK_pod_ver
                                        GROUP BY pr.id";
                        $result_count = mysqli_query($db_server, $query_count);
                        
                        if (!$result_count)
                        {
                        	die ("Dostop do PB ni uspel");
                        }
                        else
                        {
                            $st_vrst = mysqli_num_rows($result_count);
                        	if($st_vrst > 0) 
                        		print('');
                        }
                        
                        ?>
                        
                        
                        <!-- Table -->
								<section class="box">

									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
                                                    <th>Naslov</th>
                                                    <th>Stevilo podpisanih</th>
                                                </tr>
											</thead>
											
											<?php 
                                                for ($k = 0 ; $k < $st_vrst ; ++$k)
                                                {
                                                	$vrstica = mysqli_fetch_row($result_count); 
                                                	
                                            ?>
        
											<tbody>
												<tr>
                                                    <td><?php echo $vrstica[0] ?></td>
                                                    <td><?php echo $vrstica[1] ?></td>
                                                 </tr>
                                              
                                                    <?php 
                                                    }
                                                    ?>
												
											</tbody>
										</table>
										
                                    	<form action="list.php" method="post">
                                 			  <li><input type="submit" name="podrPriv" value="Nazaj" class="button special fit"></li>
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

