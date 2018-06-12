<?php
require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';
require    'razredi\Checkboxi.php';
require 'menu.php';

//PREVERJANJE ALI JE PRI HRAMBI PODPISNIKA PRISLO DO NAPAKE
if(isset($_SESSION['sign_error'])){
    
    //V PRIMERU DA SE JE ZGODIL ERROR - PREVERIMO ALI IMAMO RETURN-URL
    if($_SESSION['returnurl'] === FALSE){
        
        //V PRIMERU DA NIMAMO RETURN-URL - IZPISEMO NAPAKO
        echo $_SESSION['sign_error'];
        
    }else{
        
        //V PRIMERU DA IMAMO RETURN-URL - IZPISEMO NAPAKO IN RETURN-URL Z OBVESTILOM O NEUSPESNEM POSTOPKU
        $returnurl = $_SESSION['returnurl'] . "?success=false";
        echo $_SESSION['sign_error'];
        ?>
		<form action="<?php echo $returnurl;?>" method="post">
		<input type='submit' name='submit' value='Vrni se' class='login' />
		</form>
		<?php 
		
    }
    session_destroy();
    
 //PREVERJANJE ALI JE BILA HRAMBA USPESNA
}elseif(isset($_SESSION['returnprocess'])){
    
    //V PRIMERU DA JE BILA - PREVERIMO ALI IMAMO RETURN-URL
    if($_SESSION['returnurl'] === FALSE){
        
        //V PRIMERU DA NIMAMO RETURN-URL - IZPISEMO USPEH IN MOZNOST EXPORTA V PDF
        echo "Privolitev shranjena!";
        ?>
        <form action="export.php" method="post">
		<input type="hidden" name="export_id_verz" value="<?php echo $_SESSION['verzija'];?>">
		<input type="submit" value="Izvozi v PDF">
		</form>
        <?php
        
    }else{
        
        //V PRIMERU DA IMAMO RETURN-URL - IZPISEMO USPEH, RETURN-URL Z OBVESTILOM O USPESNEM POSTOPKU IN MOZNOST EXPORTA V PDF
        $returnurl = $_SESSION['returnurl'] . "?success=true";
        echo "Privolitev shranjena!";
        ?>
    	<form action="export.php" method="post">
		<input type="hidden" name="export_id_verz" value="<?php echo $_SESSION['verzija'];?>">
		<input type="submit" value="Izvozi v PDF">
		</form>
    	<form action="<?php echo $returnurl;?>" method="post">
    	<input type='submit' name='submit' value='Vrni se' class='login' />
    	</form>
    	<?php 
    	
    }
    session_destroy();
    
//KODA ZA DINAMICNI PRIKAZ PRIVOLITVE
}else{

//PREVERJANJE ALI JE PODANA ZAHTEVA USTREZNA
if (isset($_GET['verzija']) && isset($_GET['email'])){
    
    //PREVERJANJE ZA RETURN-URL
    if(isset($_SERVER['HTTP_REFERER'])){
        
        $_SESSION['returnurl'] = $_SERVER['HTTP_REFERER'];
        
    }else{
        
        $_SESSION['returnurl'] = FALSE;
        
    }
    
    $verzija=new Verzija("","");
    $verzija=$verzija->getIzBazeV($_GET['verzija']);
    $privolitev_id = $verzija->getFK_ver_priv();
    $privolitev=new Privolitev("");
    $privolitev=$privolitev->getIzBazeId($privolitev_id);
    $upravljalec= new Upravljalec("", "", "", "");
    $upravljalec=$upravljalec->getIzBaze($privolitev_id);
    $arr=array(10);
    $ch=new Checkbox(null, "","");
    $array=$ch->getVseCheckboxe($_GET['verzija']);
    
    for($j=0;$j<10;$j++){
        
        if(isset($array[$j])){
            
            $ch=$array[$j];
            $arr[$j]=$ch;
            
        }else{
            
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

	<form method="post" action="podpisovanje_worker.php">
	<table>
	Naslov: <?php echo $privolitev->getNaslov() ?><br>
	Text: <?php echo $verzija->getText() ?><br>
	Hramba:<?php echo $verzija->getHramba() ?><br>

<?php
if ($stevec!=0){
    echo 'Oznacite checkboxe:<br>';
}

if ($chbx1->getCheckbox()!="") {
    
    echo $chbx1->getCheckbox();
    ?>
    <input type="checkbox" name="chxb1" value="<?php echo $chbx1->getCheckbox()?>"/>
    <input type="hidden" name="chxb1_id" value="<?php echo $chbx1->getId()?>"/>
    <br>
	<?php 
	
}

if ($chbx2->getCheckbox()!="") {
    
    echo $chbx2->getCheckbox();?>
    <input type="checkbox" name="chxb2" value="<?php echo $chbx2->getCheckbox()?>"/>
    <input type="hidden" name="chxb2_id" value="<?php echo $chbx2->getId()?>"/>
    <br>
	<?php 
	
}

if ($chbx3->getCheckbox()!="") {
    
    echo $chbx3->getCheckbox();?>
    <input type="checkbox" name="chxb3" value="<?php echo $chbx3->getCheckbox()?>"/>
    <input type="hidden" name="chxb3_id" value="<?php echo $chbx3->getId()?>"/>
    <br>
	<?php

}

if ($chbx4->getCheckbox()!="") {
    
    echo $chbx4->getCheckbox();?>
    <input type="checkbox" name="chxb4" value="<?php echo $chbx4->getCheckbox()?>"/>
    <input type="hidden" name="chxb4_id" value="<?php echo $chbx4->getId()?>"/>
    <br>
	<?php 

}

if ($chbx5->getCheckbox()!="") {
    
    echo $chbx5->getCheckbox();?>
    <input type="checkbox" name="chxb5" value="<?php echo $chbx5->getCheckbox()?>"/>
    <input type="hidden" name="chxb5_id" value="<?php echo $chbx5->getId()?>"/>
    <br>
	<?php 

}

if ($chbx6->getCheckbox()!="") {
    
    echo $chbx6->getCheckbox();?>
    <input type="checkbox" name="chxb6" value="<?php echo $chbx6->getCheckbox()?>"/>
    <input type="hidden" name="chxb6_id" value="<?php echo $chbx6->getId()?>"/>
    <br>
	<?php 

}

if ($chbx7->getCheckbox()!="") {
    
    echo $chbx7->getCheckbox();?>
    <input type="checkbox" name="chxb7" value="<?php echo $chbx7->getCheckbox()?>"/>
    <input type="hidden" name="chxb7_id" value="<?php echo $chbx7->getId()?>"/>
    <br>
	<?php 

}

if ($chbx8->getCheckbox()!="") {
    
    echo $chbx8->getCheckbox();?>
    <input type="checkbox" name="chxb8" value="<?php echo $chbx8->getCheckbox()?>"/>
    <input type="hidden" name="chxb8_id" value="<?php echo $chbx8->getId()?>"/>
    <br>
	<?php 

}

if ($chbx9->getCheckbox()!="") {
    
    echo $chbx9->getCheckbox();?>
    <input type="checkbox" name="chxb9" value="<?php echo $chbx9->getCheckbox()?>"/>
    <input type="hidden" name="chxb9_id" value="<?php echo $chbx9->getId()?>"/>
    <br>
	<?php 

}

if ($chbx10->getCheckbox()!="") {
    
    echo $chbx10->getCheckbox();?>
    <input type="checkbox" name="chxb10" value="<?php echo $chbx10->getCheckbox()?>"/>
    <input type="hidden" name="chxb10_id" value="<?php echo $chbx10->getId()?>"/>
    <br>
	<?php 

}

echo "Upravljalec: <br>" . $upravljalec->getName() . ' ' . $upravljalec->getSubname() . ',  ' . $upravljalec->getAddress() . "<br>";

if ($pooblascenec->getIme()!="" && $pooblascenec->getPriimek()!="" && $pooblascenec->getNaslov()!=""){
    
    echo "Pooblascenec: <br>" . $pooblascenec->getIme() . ' ' . $pooblascenec->getPriimek() . ',  ' . $pooblascenec->getNaslov() . "<br>"; 
	
}
?>
<br>
<input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
<input type="hidden" name="verzija" value="<?php echo $_GET['verzija'];?>">
<input type="submit" action="" name="" value="Podpisujem privolitev">
</table>
</form>

<!-- REDIRECT ZA PODPIS MLADOLETNIH OSEB -->
<form method="post" action ="podpisovanje_mladoletnih.php">
<input type="submit" value="Star sem manj kot 16 let">
</form>

<?php 
}
}
?>











