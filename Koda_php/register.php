<?php
session_start();
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}
?>
<h2>Register</h2>

<form action="register_worker_check.php" method="post">

Username:
<input type='text' name='username' /><br>
E-mail:
<input type='text' name='email' /><br>
Password:
<input type='password' name='password' /><br>

<input type='submit' name='submit' value='Registriraj' class='login' />
</form>

<?php if(isset($_SESSION['register_error'])){
?>
<script>alert('<?php echo $_SESSION['register_error'];?>');</script>
<?php 
}
?>