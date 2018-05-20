<?php
if(isset($_SESSION['current_user'])){
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'none';<script type="text/javascript">document.getElementById('logout_div').style.display = 'block';</script>
<?php 
}else{
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'block';<script type="text/javascript">document.getElementById('logout_div').style.display = 'none';</script>
<?php 
}
?>

<h1>Naslovna stran</h1>
<div id="login_register_div">
<form action="login.php" method="post">
<input type='submit' name='submit' value='Login' class='login' />
</form>
<form action="register.php" method="post">
<input type='submit' name='submit' value='Register' class='register' />
</form>
</div>
<div id="logout_div">
<form action="logout.php" method="post">
<input type='submit' name='submit' value='Logout' class='login' />
</form>
</div>