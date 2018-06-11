<?php
session_start();
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['email']))) {
    require 'razredi/Podpisnik.php';
    require 'razredi/Boolbox.php';
    
    $email = $_POST['email'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $fk_ver = $_POST['verzija'];
    
    
    $pod = new Podpisnik(null, $email, $ip, null, $fk_ver);
    $current_pod = new Podpisnik();
    $check = $current_pod->addPodpisnik($pod);
    if($check === FALSE){
        $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E0";
        header("Location: podpisovanje.php");
        exit();
    }else{
        $id_pod = $check->getId();
        $box_console = new Boolbox();
        if(isset($_POST['chxb1'])){
            $box = new Boolbox(null, true, $_POST['chxb1_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E1";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb2'])){
            $box = new Boolbox(null, true, $_POST['chxb2_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E2";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb3'])){
            $box = new Boolbox(null, true, $_POST['chxb3_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E3";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb4'])){
            $box = new Boolbox(null, true, $_POST['chxb4_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E4";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb5'])){
            $box = new Boolbox(null, true, $_POST['chxb5_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E5";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb6'])){
            $box = new Boolbox(null, true, $_POST['chxb6_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E6";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb7'])){
            $box = new Boolbox(null, true, $_POST['chxb7_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E7";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb8'])){
            $box = new Boolbox(null, true, $_POST['chxb8_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E8";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb9'])){
            $box = new Boolbox(null, true, $_POST['chxb9_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E9";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        if(isset($_POST['chxb10'])){
            $box = new Boolbox(null, true, $_POST['chxb10_id'], $id_pod);
            $check_box = $box_console->addBoolbox($box);
            if($check_box === FALSE) {
                $_SESSION['sign_error'] = "An unexpected error has occured. Please try again later. E10";
                header("Location: podpisovanje.php");
                exit();
            }
        }
        $returnurl = $_SESSION['returnurl'] . "?success=true";
        session_destroy();
        header("Location: " . $returnUrl);
        exit();
    }
}else{
    $_SESSION['sign_error'] = "Invalid request.";
    header("Location: podpisovanje.php");
    exit();
}
?>