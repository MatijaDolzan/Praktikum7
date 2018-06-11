<?php

session_start();
if(isset($_SESSION['sign_error'])){
    if($_SESSION['returnurl'] === FALSE){   
    }else{
        $returnurl = $_SESSION['returnurl'] . "?success=false";
?>
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
<form method="post" action="podpisovanje_worker.php">
<table>
naslov:<?php echo $privolitev->getNaslov() ?>
text: <?php echo $verzija->getText() ?>
hramba:<?php echo $verzija->getHramba() ?>
<?php 
if ($stevec!=0){
echo 'Oznacite checkboxe:';
}

if ($chbx1->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb1" value="<?php echo $chbx1->getCheckbox()?>"/>
    <input type="hidden" name="chxb1_id" value="<?php echo $chbx1->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx2->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb2" value="<?php echo $chbx2->getCheckbox()?>"/>
    <input type="hidden" name="chxb2_id" value="<?php echo $chbx2->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx3->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb3" value="<?php echo $chbx3->getCheckbox()?>"/>
    <input type="hidden" name="chxb3_id" value="<?php echo $chbx3->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx4->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb4" value="<?php echo $chbx4->getCheckbox()?>"/>
    <input type="hidden" name="chxb4_id" value="<?php echo $chbx4->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx5->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb5" value="<?php echo $chbx5->getCheckbox()?>"/>
    <input type="hidden" name="chxb5_id" value="<?php echo $chbx5->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx6->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb6" value="<?php echo $chbx6->getCheckbox()?>"/>
    <input type="hidden" name="chxb6_id" value="<?php echo $chbx6->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx7->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb7" value="<?php echo $chbx7->getCheckbox()?>"/>
    <input type="hidden" name="chxb7_id" value="<?php echo $chbx7->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx8->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb8" value="<?php echo $chbx8->getCheckbox()?>"/>
    <input type="hidden" name="chxb8_id" value="<?php echo $chbx8->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx9->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb9" value="<?php echo $chbx9->getCheckbox()?>"/>
    <input type="hidden" name="chxb9_id" value="<?php echo $chbx9->getId()?>"/>
    <?php 
}
?>
<?php
if ($chbx10->getCheckbox()!="") {
    ?>
    <input type="checkbox" name="chxb10" value="<?php echo $chbx10->getCheckbox()?>"/>
    <input type="hidden" name="chxb10_id" value="<?php echo $chbx10->getId()?>"/>
    <?php 
}
?>
upravljalec:<?php echo $upravljalec->getName() +', '+$upravljalec->getSubname()+', '+$upravljalec->getAddress()?>
<?php if ($pooblascenec->getIme()!="" && $pooblascenec->getPriimek()!="" && $pooblascenec->getNaslov()!=""){?>
Pooblascenec:<?php echo $pooblascenec->getIme() +', '+$pooblascenec->getPriimek()+', '+$pooblascenec->getNaslov()?>
<?php 
}
?>
<input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
<input type="hidden" name="verzija" value="<?php echo $_GET['verzija'];?>">
<input type="submit" action="" name="" value="Podpisujem privolitev">
</table>
</form>

<?php 
}
}
?>











