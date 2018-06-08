<?php
session_start();

if(isset($_SESSION['current_user']) ){
    
    header("Location: index.php");
    exit;
    
}else if(isset($_SESSION['google_id'] )){
    
    require 'razredi/Uporabnik.php';
    
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['familyName'] . $_SESSION['givenName'];
    $user = new Uporabnik(null, $user_name, $user_email, null);
    $current_user = new Uporabnik(null, null, null, null);
    $var = $current_user->getUporabnikViaEmail($user_email);
    
    if($var === null){
        
        $_SESSION['error'] = "Error [google_login_worker] Selection: SQL [" . $sql . "]";
        header("Location: error.php");
        exit();
        
    }else if($var === FALSE) {
        
        $current_user = $current_user->addUporabnik($user);
        
        if($current_user === FALSE){
            
            $_SESSION['error'] = "Error [google_login_worker] Insertion: SQL [" . $sql . "]";
            header("Location: error.php");
            exit();
            
        }else{
            
            $google_id = $_SESSION['google_id'];
            session_destroy();
            session_start();
            $_SESSION['google_id'] = $google_id;
            $_SESSION['current_user'] = $current_user->getId();
            header("Location: index.php");
            exit();
            
        }
        
    }else if($var->getPassword() !== null){
        
        $_SESSION['login_error'] ="This E-Mail is associated with a standard account. Please use our on-site login system to access your account.";
        header("Location: login.php");
        exit();
        
    }else{
        
        $current_user = $var;
        $_SESSION['current_user'] = $current_user->getId();
        header("Location: index.php");
        exit();
        
    }
    
}else{
    
    $_SESSION['error'] = "Invalid Request Method [google_login_worker]";
    header("Location: error.php");
    exit();
    
}
?>