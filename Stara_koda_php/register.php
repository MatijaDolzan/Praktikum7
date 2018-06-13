<?php
require 'menu.php';
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}
?>
<h2>Register</h2>

<form action="register_worker.php" method="post">

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
unset($_SESSION['register_error']);
}
?>