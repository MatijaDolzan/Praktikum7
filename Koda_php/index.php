<?php

if(isset($_POST['submit'])){
header("Location: http://localhost/Praktikum_II/index.php");
exit;
}
?>

<h1>Naslovna stran</h1>

<form action="prijava.php" method="post">
Prijava<br>
<input type='submit' name='submit' value='Pojdi' class='login' />
</form>

<form action="registracija.php" method="post">
Registracija<br>
<input type='submit' name='submit' value='Pojdi' class='register' />
</form>