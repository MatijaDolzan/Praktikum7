<?php
session_start();

if (!empty($_POST["izberiPrivolitev"])) {
    $_SESSION["izbranaPrivolitevSes"]=$_POST["izbranaPrivolitev"];
   
}
header("Location: ../pregledVerzij.php");