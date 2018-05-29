<?php
session_start();
?>

<?php ini_set('default_charset', 'UTF-8');
header('Content-type', 'text/html; charset=UTF-8');
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
  <div id="logout_div"><li><a href="dodajanjePrivolitve.php">Dodaj privolitev</a></li>
  <li><a href="list.php">Seznam privolitev</a></li>
  <li><a href="iskanje.php">Iskanje privolitev</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
  <li><a href="logout_worker.php">Odjava</a></li></div>
  <div id="login_register_div"><li><a href="login.php" class='login'>Prijava</a></li>
  <li><a href="register.php">Registracija</a></li></div></center>  
</ul></div></p>




<?php
if(isset($_SESSION['current_user'])){
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'none'; document.getElementById('login_register_div').style.maxHeight = "0px" ; document.getElementById('logout_div').style.display = 'block';</script>
<?php 
}else{
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'block'; document.getElementById('logout_div').style.display = 'none'; document.getElementById('logout_div').style.maxHeight = "0px"</script>
<?php 
}
?>
