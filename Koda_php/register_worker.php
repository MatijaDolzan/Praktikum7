<?php
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['username'])) && (isset($_POST['email'])) && (isset($_POST['password']))) {
    session_start();
    include("db_connection.php");
    
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    
    $sql = "SELECT email FROM uporabnik WHERE email = '"+$user_email+"'";
    $result = $conn->query($sql);
    $count = $result->num_rows;

    if($count == 1) {
        
        $conn->close();
        $_SESSION['register_error'] = "The given E-mail is already in use..";
        header("Location: register.php");
        
    }else if($count != 0){
        
        $conn->close();
        $_SESSION['error'] = "Database Error [register_worker] : Multiple Users with same Email?";
        header("Location: error.php");
        
    }else{
        
        $_SESSION['current_user'] = $user_email;
        $sql = "INSERT INTO uporabnik (username, email, password) VALUES ('"+$user_name+"', '"+$user_email+"', '"+$user_password+"')";
        
        if ($conn->query($sql) === TRUE) {
           
            $conn->close();
            header("Location: index.php");
            
        }else{
            
            $conn->close();
            $_SESSION['error'] = "Error [register_worker]: " . $sql . "<br>" . $conn->error;
            header("Location: error.php");
            
        }
    }
    
}else{
    
    $_SESSION['error'] = "Invalid Request Method [register_worker]";
    header("Location: error.php");
    
}
?>