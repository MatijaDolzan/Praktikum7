<?php
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['username'])) && (isset($_POST['email'])) && (isset($_POST['password']))) {
    
    session_start();
    require 'razredi/Uporabnik.php';
    
    $user_email = $_POST['email'];
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $user = new Uporabnik(null, $user_name, $user_email, $user_password);
    $current_user = new Uporabnik(null, null, null, null);
    $var = $current_user->getUporabnikViaEmail($user_email);
    
    if($var === NULL){
        
        $_SESSION['error'] = "Error [register_worker] Selection: SQL [" . $sql . "]";
        header("Location: error.php");
        exit();
        
    }else if($var === FALSE) {
       
        $current_user = $current_user->addUporabnik($user);
        
        if($current_user === FALSE){
            
            $_SESSION['error'] = "Error [register_worker] Insertion: SQL [" . $sql . "]";
            header("Location: error.php");
            exit();
            
        }else{
            
            session_destroy();
            session_start();
            $_SESSION['current_user'] = $current_user->getId();
            header("Location: index.php");
            exit();
            
        }
        
    }else{
        
        if ($var->getPassword() === null){
            
            $_SESSION['register_error'] = "This E-Mail is associated with an existing Google account.";
            header("Location: register.php");
            exit();
            
        }else{
            
            $_SESSION['register_error'] = "The given E-mail is already in use...";
            header("Location: register.php");
            exit();
            
        }
    }
    
}else{
    //Change to redirect to index - possibly with a "Whoops! What happened there?" alert
    $_SESSION['error'] = "Invalid Request Method [register_worker]";
    header("Location: error.php");
    exit();
    
}
?>