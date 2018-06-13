<?php
$connection = mysqli_connect("localhost", "root", "");
$database_name = "praktikum";
$sql = "CREATE DATABASE $database_name;";
$result = mysqli_query($connection, $sql);
mysqli_close($connection);

if($result){
    echo "Database '$database_name' successfully created.<br>";
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE Uporabnik(
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255)    
    );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Uporabnik' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE IF NOT EXISTS `boolbox` (
        id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        agreed tinyint(1) NOT NULL,
        FK_bol_che int(11) NOT NULL,
        FK_bol_pod int(11) NOT NULL
        );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Boolbox' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE Privolitve(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        naslov varchar(255) NOT NULL,
        FK_priv_upo int NOT NULL
        
        );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Privolitve' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE Upravljalec(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        ime varchar(255) NOT NULL,
        priimek varchar(255) NOT NULL,
        naslov varchar(255) NOT NULL,
        FK_upr_priv int
        );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Upravljalec' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE Verzija(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT ,
        verzija int NOT NULL,
        text text(65535) NOT NULL,
        rok_hrambe varchar(255) NOT NULL,
        FK_ver_priv int NOT NULL,
        FK_ver_poob int
        );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Verzija' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE Podpisnik(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        ip_add varchar(255) NOT NULL,
        cas DATETIME NOT NULL,
        FK_pod_ver int NOT NULL
        );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Podpisnik' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE Pooblascenec(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        ime varchar(255) NOT NULL,
        priimek varchar(255) NOT NULL,
        naslov varchar(255) NOT NULL
        );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Pooblascenec' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    $connection = mysqli_connect("localhost", "root", "", $database_name);
    $sql= "
    CREATE TABLE Checkbox(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        checkbox varchar(255) NOT NULL,
        FK_che_ver int NOT NULL
        );";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    
    if($result){
        echo "Table 'Checkbox' successfully created.<br>";
    }else{
        echo "Table creation failed!<br>";
    }
    
    
    
    echo "If there are any lines above, which denote that a Table failed to be created, then an error has occured and the database is not properly prepared.<br> Otherwise, database initialization was successful!";
}else{
    echo "Failed to create database '$database_name'.";
}
?>