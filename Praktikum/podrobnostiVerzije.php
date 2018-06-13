<?php
include ("header.php");
include ("check_user.php");
?>

<?php
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';
require    'razredi\Checkboxi.php';

$idVerz=0;
if(!empty($_SESSION['izbranaVerzijaSes'])){
    $idVerz=$_SESSION['izbranaVerzijaSes'];
    
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
						<h2>Podrobnosti verzije</h2>
					</header>
					
					<div class="row">
						<div class="12u">
						<!-- Text -->
    						<section class="box">
    						
    						<?php
                            $verzija_id = $idVerz;
                            
                            $privolitve =new Privolitev(null);
                            $version = new Verzija(null, null);
                            $poob = new Pooblascenec(null, null, null);
                            $upra = new Upravljalec(null, null, null, null);
                            $check = new Checkbox(null, null, null);
                            $current_version = $version->getIzBazeV($verzija_id);
                            $poob_id = $current_version->getPoob();
                            $privolitev_id = $current_version->getFK_ver_priv();
                            $current_upra = $upra->getIzBaze($privolitev_id);
                            $current_privolitve= $privolitve->getIzBazeId($privolitev_id);
                            $current_checkboxes = $check->getVseCheckboxe($verzija_id);
                            if(count($current_checkboxes) === 0){
                                $current_checkboxes= FALSE;
                            }
                            
                            echo "<br><b> Naslov privolitve: </b>";
                            echo $current_privolitve->getNaslov();
                            
                            echo "<p><b> Verzija: </b>";
                            echo $current_version->getVerzija();
                            echo "<p><b> Trajanje hrambe podatkov: </b>";
                            echo $current_version->getHramba();
                            echo "<p><b> Besedilo: </b>";
                            echo $current_version->getText();
                            
                            echo "<p><b> Ime upravljalca: </b>";
                            echo $current_upra->getName();
                            echo "<p><b> Priimek upravljalca: </b>";
                            echo $current_upra->getSubname();
                            echo "<p><b> Naslov upravljalca: </b>";
                            echo $current_upra->getAddress();
                            
                            if($poob_id!=0){
                                $current_poob = $poob->getIzBazePoob($poob_id);
                                echo "<p><b> Ime pooblascenca: </b>";
                                echo $current_poob->getIme();
                                echo "<p><b> Priimek pooblascenca: </b>";
                                echo $current_poob->getPriimek();
                                echo "<p><b> Naslov pooblascenca: </b>";
                                echo $current_poob->getNaslov();
                            }
                            
                            if($current_checkboxes === FALSE){
                                //DO NOTHING
                            }else{
                                echo "<p><b> Opcijske privolitve: </b><br>";
                                foreach ($current_checkboxes as $cb){
                                    echo $cb->getCheckbox() . "<br>";
                                }
                            }
                            ?>
                            
                   
                                   <!--  <form action="pdf_file.php" method="post">
                                    	<input type="submit" name="pdfPrivVerz" value="Izvozi v PDF" class="button special fit">
                                    </form>  -->
                                    
                                    <form action="pregledVerzij.php" method="post">
                                    	<input type="submit" name="podrPriv" value="Nazaj na seznam verzij" class="button special fit">
                                    </form>
                                    
                                    <!-- <form action="podpisovanje.php" method="get" name="podpisovanje">
                                        <input type="text"  name="privolitev" value="<?php echo $privolitev_id?>">
                                        <input type="text"  name="verzija" value="<?php echo $current_version->getId() ?>">
                                        <input type="submit"  value="Pridobi povezavo za podpis privolitve" class="button special fit">
                                    </form>  -->
                            			
                                    <p><b>Link for this version:</b><br>
                                    <?php echo "podpisovanje.php?verzija=$verzija_id&email=customer.email@example.com"?>
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
                        


