<?php
session_start();
include 'check_user.php';
require 'razredi/Uporabnik.php';

if(isset($_POST['edit'])){
    
    if($_POST['edit'] === 'email'){
        
        $_SESSION['current_edit'] = "email";

    }else if ($_POST['edit'] === 'username'){

        $_SESSION['current_edit'] = "username";

    }else if ($_POST['edit'] === 'password'){

        $_SESSION['current_edit'] = "password";
        
    }else{
        
        $_SESSION['error'] = "Error [account/edit] #E1";
        header("Location: error.php");
        exit();
        
    }
}

$current_user= new Uporabnik(null, null, null, null);
$current_user = $current_user->getUporabnikViaId($_SESSION['current_user']);
?>

<?php
//SAMO ZA PREGLEDNOST
echo "Current Email: <br>";

//VREDNOST UPORABNIKOVEGA EMAILA
echo $current_user->getEmail() . "<br>";
?>

<?php //FORMA ZA SPREMINJANJE EMAIL-A ?>
<div id="edit_email_div">
<form action="account_worker.php" method="post">
<input hidden="true" type="text" value="email" name="edit">
<input type="text" name="edited_email">
<input type='submit' name='submit' value='Edit'/>
</form>
</div>

<?php //GUMB ZA PRIKAZ FORME ZA SPREMINJANJE EMAIL-A ?>
<div id="button_email_div">
<form action="account.php" method="post">
<input hidden="true" type="text" value="email" name="edit">
<input type='submit' name='submit' value='Edit'/>
</form>
</div>


<?php
//SAMO ZA PREGLEDNOST
echo "Current Username: <br>";

//VREDNOST UPORABNIKOVEGA USERNAME-A
echo $current_user->getUsername() . "<br>";
?>

<?php //FORMA ZA SPREMINJANJE USERNAME-A ?>
<div id="edit_username_div">
<form action="account_worker.php" method="post">
<input hidden="true" type="text" value="username" name="edit">
<input type="text" name="edited_username">
<input type='submit' name='submit' value='Edit'/>
</form>
</div>

<?php //GUMB ZA PRIKAZ FORME ZA SPREMINJANJE USERNAME-A ?>
<div id="button_username_div">
<form action="account.php" method="post">
<input hidden="true" type="text" value="username" name="edit">
<input type='submit' name='submit' value='Edit'/>
</form>
</div>


<?php
//SAMO ZA PREGLEDNOST
echo "Password <br>";

//VREDNOST UPORABNIKOVEGA PASSWORD-A NAMENOMA NI PRIKAZANO - MORDA PRIKAZEMO ********* NAMESTO TEGA?
?>

<?php //FORMA ZA SPREMINJANJE PASSWORD-A ?>
<div id="edit_password_div">
<form action="account_worker.php" method="post">
<input hidden="true" type="text" value="password" name="edit">
<input type="text" name="edited_password">
<input type='submit' name='submit' value='Edit'/>
</form>
</div>

<?php //GUMB ZA PRIKAZ FORME ZA SPREMINJANJE PASSWORD-A ?>
<div id="button_password_div">
<form action="account.php" method="post">
<input hidden="true" type="text" value="password" name="edit">
<input type='submit' name='submit' value='Edit'/>
</form>
</div>


<?php if(isset($_SESSION['account_error'])){
?>
<script>alert('<?php echo $_SESSION['account_error'];?>');</script>
<?php 
        unset($_SESSION['account_error']);
}
?>

<?php

if(isset($_SESSION['current_edit'])){
    
    if ($_SESSION['current_edit'] === "password"){
        //JAVASCRIPT PRIKAZE FORMO ZA SPREMINJANJE PASSWORDA - IN SKRIJE OSTALE CE SO PRISOTNI - SKRIJE TUDI GUMB IZBRANE FORME
?>

<script type="text/javascript">
document.getElementById('edit_email_div').style.display = 'none'; 
document.getElementById('edit_email_div').style.maxHeight = "0px" ;
document.getElementById('button_email_div').style.display = 'block';

document.getElementById('edit_username_div').style.display = 'none'; 
document.getElementById('edit_username_div').style.maxHeight = "0px" ;
document.getElementById('button_username_div').style.display = 'block';

document.getElementById('edit_password_div').style.display = 'block';
document.getElementById('button_password_div').style.display = 'none';
document.getElementById('button_password_div').style.maxHeight = "0px" ; 

</script>

<?php 
    }else if($_SESSION['current_edit'] === "username"){
        //JAVASCRIPT PRIKAZE FORMO ZA SPREMINJANJE USERNAME-A - IN SKRIJE OSTALE CE SO PRISOTNI - SKRIJE TUDI GUMB IZBRANE FORME
?>

<script type="text/javascript">
document.getElementById('edit_email_div').style.display = 'none'; 
document.getElementById('edit_email_div').style.maxHeight = "0px" ;
document.getElementById('button_email_div').style.display = 'block';

document.getElementById('edit_username_div').style.display = 'block';
document.getElementById('button_username_div').style.display = 'none';
document.getElementById('button_username_div').style.maxHeight = "0px" ; 

document.getElementById('edit_password_div').style.display = 'none'; 
document.getElementById('edit_password_div').style.maxHeight = "0px" ;
document.getElementById('button_password_div').style.display = 'block';

</script>

<?php 
    }else if($_SESSION['current_edit'] === "email"){
        //JAVASCRIPT PRIKAZE FORMO ZA SPREMINJANJE EMAIL-A - IN SKRIJE OSTALE CE SO PRISOTNI - SKRIJE TUDI GUMB IZBRANE FORME
?>

<script type="text/javascript">
document.getElementById('edit_email_div').style.display = 'block'; 
document.getElementById('button_email_div').style.display = 'none';
document.getElementById('button_email_div').style.maxHeight = "0px" ; 

document.getElementById('edit_username_div').style.display = 'none';
document.getElementById('edit_username_div').style.maxHeight = "0px" ;
document.getElementById('button_username_div').style.display = 'block';

document.getElementById('edit_password_div').style.display = 'none'; 
document.getElementById('edit_password_div').style.maxHeight = "0px" ;
document.getElementById('button_password_div').style.display = 'block';
</script>

<?php 

    }else{
        
        $_SESSION['error'] = "Error [account/edit] #E2";
        header("Location: error.php");
        exit();
        
    }
    
}else{
    //JAVASCRIPT SKRIJE VSE FORME ZA SPREMINJANJE
?>

<script type="text/javascript">
document.getElementById('edit_email_div').style.display = 'none';
document.getElementById('edit_email_div').style.maxHeight = "0px" ;
    
document.getElementById('edit_username_div').style.display = 'none';
document.getElementById('edit_username_div').style.maxHeight = "0px" ;
   
document.getElementById('edit_password_div').style.display = 'none';
document.getElementById('edit_password_div').style.maxHeight = "0px" ;
</script>
    
<?php } ?>