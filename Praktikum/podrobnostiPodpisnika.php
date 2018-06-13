<?php

require 'razredi/Podpisnik.php';
require 'razredi/Checkboxi.php';
require 'razredi/Boolbox.php';
require 'razredi/Privolitev.php';
require 'razredi/Verzija.php';

require 'header.php';
require 'check_user.php';
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
						<h2>Podrobnosti podpisnika</h2>
					</header>
					
					<div class="row">
						<div class="12u">
						
						<!-- Text -->
							<section class="box">
        						<?php 
        						$podpisnik = $_SESSION['podpisnik'];
        						$privolitev = $_SESSION['privolitev'];
        						$verzija = $_SESSION['verzija'];
        						$checkboxes = $_SESSION['checkboxes'];
        						$boolboxes = $_SESSION['boolboxes'];
        						
        						echo "<h4><b><i>EMAIL PODPISNIKA </i></b></h4>";
        						echo $podpisnik->getEmail() . "<br>";
        						echo "<h4><b><i>IP NASLOV PODPISNIKA </i></b></h4>";
        						echo $podpisnik->getIp() . "<br>";
        						echo "<h4><b><i>CAS PODPISA PODPISNIKA </i></b></h4>";
        						echo $podpisnik->getCas() . "<br>";
        						echo "<br>";
        						echo "<h4><b><i>NASLOV PODPISANE PRIVOLITVE</i></b></h4>";
        						echo $privolitev->getNaslov() . "<br>";
        						echo "<br>";
        						echo "<h4><b><i>VERZIJA PODPISANE VERZIJE</i></b></h4>";
        						echo $verzija->getVerzija() . "<br>";
        						if($checkboxes === FALSE){
        						    //DO NOTHING
        						}else{
        						    echo "<h4><b><i>OPCIJSKE PRIVOLITVE:</i></b></h4>";
        						    foreach ($checkboxes as $cb){
        						        echo $cb->getCheckbox() . "<br>";
        						        if($boolboxes === FALSE){
        						            //DO NOTHING
        						        }else{
        						            foreach ($boolboxes as $bb){
        						                if (($bb->getFk_checkbox()) === ($cb->getId())){
        						                    echo "PRIVOLIL";
        						                }
        						            }
        						            echo "<br>";
        						        }
        						    }
        						}
        						
        						?>
        						
        						<form action="podrobnostiVerzije_worker.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $verzija->getId();?>" />
                                <input class="button special fit" type="submit" value="Pregled verzije" />
                                </form>
                                
                                <form action="export.php" method="post">
                                <input type="hidden" name="export_id_podp" value="<?php echo $podpisnik->getId();?>" />
                                <input class="button special fit" type="submit" value="Izvozi v PDF" />
                                </form>

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
                        



<a href="podrobnostiVerzije_worker.php?id=<?php $verzija->getId();?>">Pregled verzije</a>
