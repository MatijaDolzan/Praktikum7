<?php
session_start();

if(isset($_SESSION['current_user']) ){
    header("Location: index.php");
    exit;
} else if(isset($_SESSION['google_id'] )){
   
    include("db_connection.php");
    
    $user_name = $_SESSION['familyName'] . $_SESSION['givenName'];
    $user_email = $_SESSION['email'] ;
  
    $sql = "SELECT email FROM uporabnik WHERE email = '" . $user_email . "'";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if ($result === FALSE){
        $count=0;
    }else{
        $count = $result->num_rows;
    }
    if($count == 1) {
        
        $spremenljivka=false; //kar nekaj
        if ($spremenljivka){ //za password
            $_SESSION['login_error'] ="Imate ze nas racun, ne morete se se z googlom prijaviti...";
            header("Location: login.php");
            exit();
            
        }else {
            $_SESSION['current_user'] = $user_email; //to se je treba spremeniti
            header("Location: index.php");  
            exit();
        }
      
    }else if($count != 0){
        
        $_SESSION['error'] = "Database Error [register_worker]";
        header("Location: error.php");
        exit();
        
    }else{
        $sql = "INSERT INTO uporabnik (username, email) VALUES ('" . $user_name . "', '" . $user_email . "')";
        $_SESSION['register'] = $sql;
        $_SESSION['current_user'] = $user_email;
        header("Location: googlelogin_worker.php");
        exit();
        
    }
    
}else{
    
    $_SESSION['error'] = "Invalid Request Method [googlelogin_check]";
    header("Location: error.php");
    exit();
    
}
?>