<?php
session_start();

$uporabnik=null;
//$uporabnik=$_SESSION['current_user'];
$_SESSION['current_user']=1;

include   'C:\wamp64\www\Praktikum\razredi\Verzija.php';
include_once   'C:\wamp64\www\Praktikum\razredi\Iprivolitev.php';
?>
<h2>Dodajanje nove verzije</h2>
<form action="workerji/dodajanjeVerzije_worker.php" method="post">
Text:<input type="text" name="text" value=""><br>
Rok hrambe: <input type="text" name="hramba" value=""><br>
<input type="submit" name="dodajPriv" value="Dodaj!">
</form>






