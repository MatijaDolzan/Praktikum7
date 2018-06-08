<?php
include ("menu.php");
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}
?>

<center><h2>Prijava</h2>

<form action="login_worker.php" method="post">

	<p> E-mail:
    <input type='text' name='email' /><br>
   <p> Geslo:
    <input type='password' name='password' /><br>
    
   <p> <input type='submit' name='submit' value='Potrdi' class='login' />
   <p> <input type="button" onclick="window.location = 'google_login_preset.php';" value="Log In With Google" class="btn btn-danger" />
   </form>

</center>
<?php if(isset($_SESSION['login_error'])){
?>
<script>alert('<?php echo $_SESSION['login_error'];?>');</script>
<?php 
 unset($_SESSION['login_error']);
}
?>
