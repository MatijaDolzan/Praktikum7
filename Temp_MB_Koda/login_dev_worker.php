<?php
session_start();
$_SESSION['current_user'] = $_POST['dev_login_id'];
header("Location: inde.php");
exit();
?>