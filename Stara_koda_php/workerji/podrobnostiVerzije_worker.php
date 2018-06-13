<?php
session_start();

if (isset($_POST["izberiVerzijo"])) {
    $_SESSION["izbranaVerzijaSes"]=$_POST["izbranaVerzija"];
    
    
}
header("Location: ../podrobnostiVerzije.php");