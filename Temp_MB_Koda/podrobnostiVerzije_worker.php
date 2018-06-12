<?php
session_start();
$_SESSION['izbranaVerzijaSes'] = $_GET['id'];

header("Location: podrobnostiVerzije.php");
exit();
?>