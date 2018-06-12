<?php

include ("header.php");
include ("check_user.php");

if(!empty($_SESSION['izbranaPrivolitevSes'])){
    
    $idPriv=$_SESSION['izbranaPrivolitevSes'];
    
}else{
    
    header("Location: list.php");
    exit();
    
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
				<section id="main" class="container">
					<header>
						<h2>Podrobnosti privolitve</h2>
					</header>
					
					<div class="row">
						<div class="12u">
						
						<?php
                        require 'db_connection.php';
                          
                        $db_server = $connection;
                        
                        $query = "SELECT * FROM verzija 
                                    WHERE verzija.FK_ver_priv=$idPriv";
                        
                        $result = mysqli_query($db_server, $query);
                        
                        if (!$result){
                            
                        	die ("Dostop do PB ni uspel");
                        	
                        }else{
                            
                        	$st_vrstic = mysqli_num_rows($result);
                        	
                        	if($st_vrstic > 0){
                        	    
                        		print('');
                        		
                        	}
                        }
                        ?>	
                    
                    <!-- Table -->
								<section class="box">

									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
                                                    <th>Verzija</th>
                                                    <th>Hramba podatkov</th>
                                                    <th>Podrobnosti</th>
                                                   
                                                  </tr>
											</thead>
											
											<?php 
                                            $prenesi=null;
                                            
                                            for ($j = 0 ; $j < $st_vrstic ; ++$j){
                                                
                                            	$vrsta = mysqli_fetch_row($result); 
                                            	$prenesi=$vrsta[0];
                                            	
                                            ?>
        
											<tbody>
												<tr>
                                                   <form method="post" action="workerji/podrobnostiVerzije_worker.php" >
                                                    <td><?php echo $vrsta[1] ?></td>
                                                    <td><?php echo $vrsta[3] ?></td>
                                                    <td hidden><input type="text"  value="<?php echo $vrsta[0];?>" name="izbranaVerzija"/></td>
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


