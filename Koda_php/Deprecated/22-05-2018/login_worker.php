<?php
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['email'])) && (isset($_POST['password']))) {
    
    session_start();
    include("db_connection.php");

    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    
    $sql = "SELECT email FROM uporabnik WHERE email = '"+$user_email+"' AND password = '"+$user_password+"'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    
    if($count == 1) {
        
        $_SESSION['current_user'] = $user_email;
        $conn->close();
        header("Location: index.php"); 
        
    }else {
        
        $_SESSION['login_error'] = "Your Login Name or Password is invalid";
        $conn->close();
        header("Location: index.php");
        
    }
}else{
    
    $_SESSION['error'] = "Invalid Request Method [login_worker]";
    header("Location: error.php");
    
}
?>