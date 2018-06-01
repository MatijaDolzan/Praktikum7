<?php
session_start();

    $uporabnik=null;
    //$uporabnik=$_SESSION['current_user'];
    $_SESSION['current_user']=1;

require    'razredi\Privolitev.php';
require_once   'razredi\Iprivolitev.php';
?>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #778899;
    float:center;
}

h1 {
    align:center;
    color:#808080;
}

li {
    display: inline-block;
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

<center><h1><i><a class="active" href="index.php">Podjetje d.o.o.</a></i></h1></center>

<p><div><ul>
 <center>
  <li><a href="dodajanjePrivolitve.php">Dodaj privolitev</a></li>
  <li><a href="list.php">Seznam privolitev</a></li>
  <li><a href="iskanje.php">Iskanje privolitev</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
  
</ul></div></p>

<center><h2>Dodajanje nove privolitve</h2>

<form action="workerji/dodajanjePrivolitev_worker.php" method="post">
    Naslov: <input type="text" name="naslov" value=""><br>
    
    <input type="submit" name="dodajPriv" value="Dodaj!">
</form></center>






