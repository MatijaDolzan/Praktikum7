<?php
require_once "config.php"; //to dodala jaz

//include ("menu.php");
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}

$loginURL = $gClient->createAuthUrl(); //to dodala jaz
?>

<center><h2>Prijava</h2>

<form action="login_worker.php" method="post">

	<p> E-mail:
    <input type='text' name='email' /><br>
   <p> Geslo:
    <input type='password' name='password' /><br>
    
   <p> <input type='submit' name='submit' value='Potrdi' class='login' />
   <p> <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger" /> <!-- to dodala jaz -->
</form>

</center>

<?php if(isset($_SESSION['login_error'])){
?>
<script>alert('<?php echo $_SESSION['login_error'];?>');</script>
<?php 
}
?>