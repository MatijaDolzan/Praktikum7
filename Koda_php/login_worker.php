<?php
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['email'])) && (isset($_POST['password']))) {
    
    session_start();
    include("db_connection.php");
    
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    
    $sql = "SELECT email FROM uporabnik WHERE email = '" . $user_email . "' AND password = '" . $user_password . "'";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result === FALSE){
        $count=0;
    }else{
        $count = $result->num_rows;
    }
    
    if($count == 1) {
        
        $_SESSION['current_user'] = $user_email;
        header("Location: index.php");
        exit();
        
    }else {
        
        $_SESSION['login_error'] = "Your Login Name or Password is invalid";
        header("Location: login.php");
        exit();
        
    }
}else{
    
    $_SESSION['error'] = "Invalid Request Method [login_worker]";
    header("Location: error.php");
    exit();
    
}
?>