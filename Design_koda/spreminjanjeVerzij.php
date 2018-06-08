<?php
include ("header.php");
include ("check_user.php");
?>

<?php
require   'razredi\Verzija.php';
require_once  'razredi\Iprivolitev.php';
require   'razredi\Upravljalec.php';
require   'razredi\Pooblascenec.php';
require   'razredi\Checkboxi.php';

$idVerz=$_SESSION["idVerzije"];

$verzija=new Verzija("","");
$NovaV=$verzija->getIzBazeV($idVerz);
$idUpravljalca=$_SESSION["izbranaPrivolitevSes"];
$upr=new Upravljalec('', "", "", "");
$upravljalec=$upr->getIzBaze($idUpravljalca);
$idPooblascenca=0;
$idPooblascenca=$NovaV->getPoob();
$_SESSION['verzijaVerzije']=$NovaV->getVerzija();
$poob=new Pooblascenec("", "", "");
$pooblascenec=new Pooblascenec("", "", "");
if($idPooblascenca!=0){
   $pooblascenec=$poob->getIzBazePoob($idPooblascenca);
    
}
$arr=array(10);
$ch=new Checkbox("","");
$id=$NovaV->getId();
$array=$ch->getVseCheckboxe($id);
$count=count($array);
for ($j=0;$j<10;$j++){
    if (isset($array[$j])){
        $ch=$array[$j];
        $arr[$j]=$ch;
    }
    else{
        $arr[$j]=new Checkbox("", "");
    }
    
}

$chbx1=$arr[0];
$chbx2=$arr[1];
$chbx3=$arr[2];
$chbx4=$arr[3];
$chbx5=$arr[4];
$chbx6=$arr[5];
$chbx7=$arr[6];
$chbx8=$arr[7];
$chbx9=$arr[8];
$chbx10=$arr[9];

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
						<h2>Spreminjanje verzij</h2>
					</header>
					<div class="box">
					
					
						<form method="post" action="workerji/spreminjanjeVerzije_worker.php">
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Besedilo:</h2>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="text" value="<?php echo $NovaV->getText()?>" placeholder="Text: " />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="hramba" value="<?php echo $NovaV->getHramba()?>"  placeholder="Rok hrambe: " /><br>
								</div>
							</div>
							
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Spreminjanje  checkboxov privolitve:</h2>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="chbx1" value="<?php echo $chbx1->getCheckbox() ?>">
								</div>
								<div class="12u">
                                    <input type="text" name="chbx2" value="<?php echo $chbx2->getCheckbox() ?>">
                                </div>
                                <div class="12u">
                                    <input type="text" name="chbx3" value="<?php echo $chbx3->getCheckbox() ?>">
                                </div>
                                <div class="12u">    
                                    <input type="text" name="chbx4" value="<?php echo $chbx4->getCheckbox() ?>">
                                 </div>
                                 <div class="12u">   
                                    <input type="text" name="chbx5" value="<?php echo $chbx5->getCheckbox() ?>">
                                 </div>
                                 <div class="12u">   
                                    <input type="text" name="chbx6" value="<?php echo $chbx6->getCheckbox() ?>">
                                 </div>
                                 <div class="12u">   
                                    <input type="text" name="chbx7" value="<?php echo $chbx7->getCheckbox() ?>">
                                 </div>
                                 <div class="12u">   
                                    <input type="text" name="chbx8" value="<?php echo $chbx8->getCheckbox() ?>">
                                 </div>
                                 <div class="12u">   
                                    <input type="text" name="chbx9" value="<?php echo $chbx9->getCheckbox() ?>">
                                 </div>
                                 <div class="12u">   
                                    <input type="text" name="chbx10" value="<?php echo $chbx10->getCheckbox()?>">
								</div>
							</div>
							
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Upravljalec GDPR pogodbe</h2>
								</div>
							</div>
							
							
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
								
									<input type="text" name="imeUpr" value="<?php echo $upravljalec->getName()?>" placeholder="Ime" />
								</div>
								<div class="6u 12u(mobilep)">
									<input type="text" name="priimekUpr" value="<?php echo $upravljalec->getSubname()?>" placeholder="Priimek" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="naslovUpr" value="<?php echo $upravljalec->getAddress()?>" placeholder="Naslov" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="6u 12u(narrower)">
									<input type="checkbox" id="DodPoob" name="DodPoob" >
									<label for="DodPoob">Spremenil bom pooblascenca:</label>
								</div>
							</div>
							
							<div class="row uniform 50%">
								<div class="12u">
									<h2>Pooblascenec GDPR pogodbe</h2>
								</div>
							</div>
							
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
								
									<input type="text" name="imePoob" id="imePoob" value="<?php echo $pooblascenec->getIme()?>" placeholder="Ime" disabled />
								</div>
								<div class="6u 12u(mobilep)">
									<input type="text" name="priimekPoob" id="priimekPoob" value="<?php echo $pooblascenec->getPriimek()?>" placeholder="Priimek" disabled />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="naslovPoob" id="naslovPoob" value="<?php echo $pooblascenec->getNaslov()?>" placeholder="Naslov" disabled />
								</div>
							</div>
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" name="dodajVerz" value="Dodaj!" /></li>
									</ul>
								</div>
							</div>
						</form>
						
						<script>
                        	document.getElementById('DodPoob').onchange = function() {
                            document.getElementById('imePoob').disabled = !this.checked;
                            document.getElementById('priimekPoob').disabled = !this.checked;
                            document.getElementById('naslovPoob').disabled = !this.checked;
                        };
                        </script>

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
