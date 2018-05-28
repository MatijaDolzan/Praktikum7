<?php

?>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #778899;
}

h1 {
    align:center;
    color:#808080;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #708090;
}

</style>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<center><h1><i>Podjetje d.o.o.</i></h1></center>
<ul>
  <li><a class="active" href="index.php">Domov</a></li>
  <li><a href="dodaj_privloitev.php">Dodaj privolitev</a></li> 
  <li><a href="list.php">Seznam</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
  <li><a href="login.php" class='login'>Prijava</a></li>
  <li><a href="register.php">Registracija</a></li>
  <li><a href="logout.php">Odjava</a></li>
</ul>

<center><h2>Dodaj privolitev</h2></center>


<?php
session_start();

    $uporabnik=null;
    //$uporabnik=$_SESSION['current_user'];
    $_SESSION['current_user']=1;
   
include   'C:\wamp\www\Praktikum_II\razredi\Privolitev.php';
include_once   'C:\wamp\www\Praktikum_II\razredi\Iprivolitev.php';
?>
<h2>Dodajanje nove privolitve</h2>
<form action="workerji/dodajanjePrivolitev_worker.php" method="post">
Name: <input type="text" name="naslov" value=""><br>
<input type="submit" name="dodajPriv" value="Dodaj!">
</form>

