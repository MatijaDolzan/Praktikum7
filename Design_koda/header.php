<?php
session_start();
?>

<?php ini_set('default_charset', 'UTF-8');
header('Content-type', 'text/html; charset=UTF-8');
?>

<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Zbiranje privolitev </a> po GDPR</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Domov</a></li>
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
							
							<?php
                        	if(isset($_SESSION['current_user'])){
                        	?>
    							<li><a href="account.php" class="button">Uredi podatke</a></li>
    							<li><a href="logout_worker.php" class="button">Odjavi se</a></li>
    						<?php 
                        	} else{
                        	?>  
                        	  
                        		<li><a href="login.php" class="button" >Prijavi se</a></li>
								<li><a href="register.php" class="button">Registriraj se</a></li>
                        		<?php 
                        	} 
                        	?> 		
    					
						</ul>
					</nav>
				</header>

