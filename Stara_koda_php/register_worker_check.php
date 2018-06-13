<?php
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['username'])) && (isset($_POST['email'])) && (isset($_POST['password']))) {
    session_start();
    include("db_connection.php");
    
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    
    $_SESSION['error'] = "name " . $user_name . "email " . $user_email . "pass " . $user_password;
    
    $sql = "SELECT email FROM uporabnik WHERE email = '" . $user_email . "'";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if ($result === FALSE){
        $count=0;
    }else{
        $count = $result->num_rows;
    }
        if($count == 1) {
            
            $_SESSION['register_error'] = "The given E-mail is already in use..";
            header("Location: register.php");
            exit();
        
        }else if($count != 0){
            
            $_SESSION['error'] = "Database Error [register_worker]";
            header("Location: error.php");
            exit();
        
        }else{
            $sql = "INSERT INTO uporabnik (username, email, password) VALUES ('" . $user_name . "', '" . $user_email . "', '" . $user_password . "')";
            $_SESSION['register'] = $sql;
            $_SESSION['current_user'] = $user_email;
            header("Location: register_worker_insert.php");
            exit();

        }

}else{
    
    $_SESSION['error'] = "Invalid Request Method [register_worker]";
    header("Location: error.php");
    exit();
    
}
?>