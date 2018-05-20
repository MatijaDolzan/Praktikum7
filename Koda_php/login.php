<?php
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}
?>
<h2>Login</h2>

<form action="login_worker.php" method="post">

E-mail:
<input type='text' name='email' /><br>
Password:
<input type='password' name='password' /><br>

<input type='submit' name='submit' value='Prijava' class='login' />
</form>

<?php if(isset($_SESSION['login_error'])){
?>
<script>alert(<?php echo $_SESSION['login_error'];?>);</script>
<?php 
}
?>