<?php
session_start();
$sql= $_SESSION['register'];
$connection = mysqli_connect("localhost", "root", "", "praktikum");
$result = mysqli_query($connection, $sql);
mysqli_close($connection);
if ($result) {
    $user = $_SESSION['current_user'];
    session_destroy();
    session_start();
    $_SESSION['current_user'] = $user;
    header("Location: index.php");
    exit();
    
}else{

    $_SESSION['error'] = "Error [register_worker_insert]: SQL [" . $sql . "]";
    header("Location: error.php");
    exit();
    
}?>