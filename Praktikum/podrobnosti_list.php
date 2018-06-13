<?php
include ("header.php");
include ("check_user.php");
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
                                  			<div class="row uniform 50%">
                								<div class="12u">
                									<input type="submit" name="podrPriv" value="Nazaj" class="button special fit">
                								</div>
											</div>
                                  		</form>
									</div>
								</section>
						</div>
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

