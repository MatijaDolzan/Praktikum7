<?php
session_start();

    $uporabnik=null;
    //$uporabnik=$_SESSION['current_user'];
    $_SESSION['current_user']=1;

require    'razredi\Privolitev.php';
require_once   'razredi\Iprivolitev.php';
?>
<h2>Dodajanje nove privolitve</h2>
<form action="workerji/dodajanjePrivolitev_worker.php" method="post">
Name: <input type="text" name="naslov" value=""><br>
<input type="submit" name="dodajPriv" value="Dodaj!">
</form>






