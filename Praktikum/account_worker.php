<?php
session_start();
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_SESSION['current_edit']))) {
    
    require 'razredi/Uporabnik.php';
    
    $edited_var = null;
    $edited_var_value = null;
    
    if((isset($_POST['edited_email'])) && ($_SESSION['current_edit'] === "email")){
        
        $edited_var = "email";
        $edited_var_string = "E-Mail";
        $edited_var_value = $_POST['edited_email'];
        
    }else if((isset($_POST['edited_username'])) && ($_SESSION['current_edit'] === "username")){
        
        $edited_var = "username";
        $edited_var_string = "Username";
        $edited_var_value = $_POST['edited_username'];
        
    }else if((isset($_POST['edited_password'])) && ($_SESSION['current_edit'] === "password")){
        
        $edited_var = "password";
        $edited_var_string = "Password";
        $edited_var_value = $_POST['edited_password'];
        
    }else{
        //Change to redirect to index/account? - possibly with a "Whoops! What happened there?" alert
        $_SESSION['error'] = "Invalid Request Parameters [account_worker]";
        header("Location: error.php");
        exit();
        
    }
    
    $current_user = new Uporabnik(null, null, null, null);
    $var = $current_user->updateUporabnik($_SESSION['current_user'], $edited_var, $edited_var_value);
    
    if($var){
        
        unset($_SESSION['current_edit']);
        header("Location: account.php");
        exit();
        
    }else{
        
        $_SESSION['account_error'] = "We seem to have run into some problems when trying to update your $edited_var_string... <br> If the problem persists, please contact our <a href='support.php'>Support Department</a>.";
        header("Location: account.php");
        exit();
        
    }
    
}else{
    //Change to redirect to index/account? - possibly with a "Whoops! What happened there?" alert
    $_SESSION['error'] = "Invalid Request Method [account_worker]";
    header("Location: error.php");
    exit();
    
}
?>