<?php

if(isset($_POST['submit'])){
    header("Location: http://localhost/Praktikum_II/registracija.php");
    exit;
}
?>
<h2>Registracija</h2>

<form action="index.php" method="post">
Ime:
<input type='text' name='username' /><br>
Priimek:
<input type='text' name='email' /><br>
Uporabnisko ime:
<input type='text' name='username' /><br>
E-mail naslov:
<input type='text' name='email' /><br>

<input type='submit' name='submit' value='Registriraj' class='login' />
</form>

