<?php
session_start();
$_SESSION['izbranaVerzijaSes'] = $_POST['id'];

header("Location: podrobnostiVerzije.php");
exit();
?>