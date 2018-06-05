<?php
session_start();

if (!empty($_POST["izberiVerzijo"])) {
    $_SESSION["izbranaVerzijaSes"]=$_POST["izbranaVerzija"];
    $_SESSION["textVerzijeSes"]=$_POST["textVerzije"];
    
    
}
header("Location: ../podrobnostiVerzije.php");