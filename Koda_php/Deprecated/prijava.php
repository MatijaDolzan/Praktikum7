<?php

if(isset($_POST['submit'])){
    header("Location: http://localhost/Praktikum_II/prijava.php");
    exit;
}
?>
<h2>Prijava</h2>

<form action="index.php" method="post">
Uporabnisko ime:
<input type='text' name='username' /><br>
E-mail naslov:
<input type='text' name='email' /><br>

<input type='submit' name='submit' value='Prijava' class='login' />
</form>

