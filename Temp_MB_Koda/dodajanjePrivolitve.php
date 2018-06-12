<?php
require    'razredi\Privolitev.php';
require_once   'razredi\Iprivolitev.php';
require 'menu.php';
$uporabnik=$_SESSION['current_user'];


?>

<center><h2>Dodajanje nove privolitve</h2>

<form action="workerji/dodajanjePrivolitev_worker.php" method="post">
    Naslov: <input type="text" name="naslov" value=""><br>
    
    <input type="submit" name="dodajPriv" value="Dodaj!">
</form></center>






