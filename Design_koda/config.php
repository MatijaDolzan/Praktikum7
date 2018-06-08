<?php
session_start();
require_once "GoogleAPI/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("952829974424-opa1gcjlqkjrmj2guq65f5o789g2ihj3.apps.googleusercontent.com");
$gClient->setClientSecret("aOmQcrvKaM8DsP3m3ALidm1b");
$gClient->setApplicationName("CPI Login");
$gClient->setRedirectUri("http://localhost/Praktikum/g-callback.php");
$gClient->addScope( "https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>