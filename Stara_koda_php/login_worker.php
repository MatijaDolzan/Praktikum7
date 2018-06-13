<?php
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['email'])) && (isset($_POST['password']))) {
    
    session_start();
    require 'razredi/Uporabnik.php';
    
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $current_user = new Uporabnik(null, null, null, null);
    
    $check = $current_user->getUporabnikViaEmail($user_email);
    
    if($check === null){
        
        $_SESSION['error'] = "Error [login_worker] Selection: SQL [" . $sql . "] #E1";
        header("Location: error.php");
        exit();
        
    }else if($check === FALSE){
        
        $_SESSION['login_error'] = "No account with that E-Mail exists. Please register an account.";
        header("Location: login.php");
        exit();
        
    }else{
        
        if($check->getPassword() === null){
            
            $_SESSION['login_error'] = "This E-Mail is associated with a Google account.";
            header("Location: login.php");
            exit();
            
        }
    }
    
    $var = $current_user->getUporabnikLogin($user_email, $user_password);
    
    if($var === null){
        
        $_SESSION['error'] = "Error [login_worker] Selection: SQL [" . $sql . "] #E2";
        header("Location: error.php");
        exit();
        
    }else if($var === FALSE) {
        
        $_SESSION['login_error'] = "The Password you entered was incorrect. Please try again.";
        header("Location: login.php");
        exit();
        
    }else{
        
        $current_user = $var;
        $_SESSION['current_user'] = $current_user->getId();
        header("Location: index.php");
        exit();
        
    }
}else{
    //Change to redirect to index - possibly with a "Whoops! What happened there?" alert
    $_SESSION['error'] = "Invalid Request Method [login_worker]";
    header("Location: error.php");
    exit();
    
}
?>