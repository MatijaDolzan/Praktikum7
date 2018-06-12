<?php
include ("header.php");
include ("check_user.php");
?>

<?php

if(isset($_SESSION['sign_error'])){
    if($_SESSION['returnurl'] === FALSE){
    }else{
        $returnurl = $_SESSION['returnurl'] . "?success=false";
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
    						
    							<form action="<?php echo $returnurl;?>" method="post">
                               		<input type='submit' name='submit' value='Vrni se' class='login' />
                                </form>
                                
                                
                                  <?php 
                                    }
                                    ?>
                                    
                                    
                                <script>alert('<?php echo $_SESSION['sign_error'];?>');</script>
								
								<?php 
                                 unset($_SESSION['sign_error']);
                                }else{
                                
                                require    'razredi\Privolitev.php';
                                require    'razredi\Verzija.php';
                                require    'razredi\Pooblascenec.php';
                                require    'razredi\Upravljalec.php';
                                require    'razredi\Checkboxi.php';
                                if (isset($_GET['privolitev']) && isset($_GET['verzija']) && isset($_GET['email'])){
                                    if(isset($_SERVER['HTTP_REFERER'])){
                                        $_SESSION['returnurl'] = $_SERVER['HTTP_REFERER'];
                                    }else{
                                        $_SESSION['returnurl'] = FALSE;
                                    }
                                    $privolitev=new Privolitev("");
                                    $privolitev=$privolitev->getIzBazeId($_GET['privolitev']);
                                    $verzija=new Verzija("","");
                                    $verzija=$verzija->getIzBazeV($_GET['verzija']);
                                    $upravljalec= new Upravljalec("", "", "", "");
                                    $upravljalec=$upravljalec->getIzBaze($_GET['privolitev']);
                                    $arr=array(10);
                                    $ch=new Checkbox(null, "","");
                                    $array=$ch->getVseCheckboxe($_GET['verzija']);
                                    for ($j=0;$j<10;$j++){
                                        if (isset($array[$j])){
                                            $ch=$array[$j];
                                            $arr[$j]=$ch;
                                        }
                                        else{
                                            $arr[$j]=new Checkbox(null, "", "");
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
                                    $pooblascenec=new Pooblascenec("", "", "");
                                    if ($verzija->getPoob()!=0){
                                    $pooblascenec=$pooblascenec->getIzBazePoob($verzija->getPoob());
                                    }
                                
                                $stevec=0;
                                for ($i = 0; $i < 10; $i++) {
                                    if ($arr[$i]->getCheckbox()!=""){
                                        $stevec++;
                                        
                                    }
                                    
                                }
                                ?>
                                
                                
                                <!-- -------predloga --
                               <div class="table-wrapper">
										<table>
											<thead>
												<tr>
                                                    <th>Privolitev - naslov</th>
                                                    <th>Dolzina hrambe</th>
                                                    <th>Verzija</th>
                                                  </tr>
											</thead>
											
											<?php 
                                                for ($j = 0 ; $j < $st_vrstic ; ++$j)
                                                {
                                                	$vrsta = mysqli_fetch_row($result); 
                                                ?>
        
											<tbody>
												<tr>
                                                      	<form action="workerji/pregledVerzij_worker.php" method="post">
                                          					<div class="row uniform 50%">
                        										<div class="12u">
                        											<td hidden><input type="text"  value="<?php echo $vrsta[0];?>" name="izbranaPrivolitev"/></td>
                        										</div>
        													</div>
        													<div class="row uniform 50%">
                        										<div class="12u">
                        											<td><input class="button fit small" type="submit" name="izberiPrivolitev" value="<?php echo $vrsta[1]; ?>" /></td>
                        										</div>
        													</div>
        													<div class="row uniform 50%">
                        										<div class="12u">
                        											<td><?php echo $vrsta[2] ?></td>
                        										</div>
        													</div>
        													<div class="row uniform 50%">
                        										<div class="12u">
                        											<td><?php echo $vrsta[3] ?></td>
                        										</div>
        													</div>
                                          				</form>
                                              	
                                              	</tr>
                                              
                                                    <?php 
                                                    }
                                                    ?>
												
											</tbody>
										</table>
										
                                    	<form action="podrobnosti_list.php" method="post">
                                  			<div class="row uniform 50%">
                								<div class="12u">
                									<input type="submit" name="podrPriv" value="Podrobnosti" class="button special fit">
                								</div>
											</div>
                                  		</form>
                                    
									</div>
                                          				
                                 -- ----------predloga -->
                                <form method="post" action="podpisovanje_worker.php">
                                    <table>
                                    
                                            naslov:<?php echo $privolitev->getNaslov() ?> <br>
                                            text: <?php echo $verzija->getText() ?> <br>
                                            hramba:<?php echo $verzija->getHramba() ?><br>
                                            <?php 
                                            if ($stevec!=0){
                                            echo 'Oznacite checkboxe: <br>';
                                            }
                                            
                                            if ($chbx1->getCheckbox()!="") {
                                             echo $chbx1->getCheckbox();?>
                                                <input type="checkbox" name="chxb1" value="<?php echo $chbx1->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb1_id" value="<?php echo $chbx1->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx2->getCheckbox()!="") {
                                             echo $chbx2->getCheckbox();?>
                                                <input type="checkbox" name="chxb2" value="<?php echo $chbx2->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb2_id" value="<?php echo $chbx2->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx3->getCheckbox()!="") {
                                            echo $chbx3->getCheckbox();?>
                                                <input type="checkbox" name="chxb3" value="<?php echo $chbx3->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb3_id" value="<?php echo $chbx3->getId()?>"/>
                                            <?php
                                            }
                                            
                                            if ($chbx4->getCheckbox()!="") {
                                            echo $chbx4->getCheckbox();?>
                                                <input type="checkbox" name="chxb4" value="<?php echo $chbx4->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb4_id" value="<?php echo $chbx4->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx5->getCheckbox()!="") {
                                            echo $chbx5->getCheckbox();?>
                                                <input type="checkbox" name="chxb5" value="<?php echo $chbx5->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb5_id" value="<?php echo $chbx5->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx6->getCheckbox()!="") {
                                            echo $chbx6->getCheckbox();?>
                                                <input type="checkbox" name="chxb6" value="<?php echo $chbx6->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb6_id" value="<?php echo $chbx6->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx7->getCheckbox()!="") {
                                            echo $chbx7->getCheckbox();?>
                                                <input type="checkbox" name="chxb7" value="<?php echo $chbx7->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb7_id" value="<?php echo $chbx7->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx8->getCheckbox()!="") {
                                            echo $chbx8->getCheckbox();?>
                                                <input type="checkbox" name="chxb8" value="<?php echo $chbx8->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb8_id" value="<?php echo $chbx8->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx9->getCheckbox()!="") {
                                            echo $chbx9->getCheckbox();?>
                                                <input type="checkbox" name="chxb9" value="<?php echo $chbx9->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb9_id" value="<?php echo $chbx9->getId()?>"/>
                                            <?php 
                                            }
                                            
                                            if ($chbx10->getCheckbox()!="") {
                                            echo $chbx10->getCheckbox();?>
                                                <input type="checkbox" name="chxb10" value="<?php echo $chbx10->getCheckbox()?>"/>
                                                <input type="hidden" name="chxb10_id" value="<?php echo $chbx10->getId()?>"/>
                                            <?php 
                                            }
                                            ?>
                                            
                                            <br>upravljalec:<?php echo $upravljalec->getName() +', '+$upravljalec->getSubname()+', '+$upravljalec->getAddress()?>
                                            <?php if ($pooblascenec->getIme()!="" && $pooblascenec->getPriimek()!="" && $pooblascenec->getNaslov()!=""){?>
                                            <br>Pooblascenec:<?php echo $pooblascenec->getIme() +', '+$pooblascenec->getPriimek()+', '+$pooblascenec->getNaslov()?>
                                            <?php 
                                            }
                                            ?>
                                           <br> <input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
                                           <br> <input type="hidden" name="verzija" value="<?php echo $_GET['verzija'];?>">
                                          <br>  <input type="submit" action="" name="" value="Podpisujem privolitev">
                                    </table>
                                </form>
                                
                                <?php 
                                }
                                }
                                ?>
								
    							
                            							
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
 