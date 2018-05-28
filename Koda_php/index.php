<?php
session_start();
?>

<h1>Naslovna stran</h1>
<div id="login_register_div">
<form action="login.php" method="post">
<input type='submit' name='submit' value='Login' class='login' />
</form>
<form action="register.php" method="post">
<input type='submit' name='submit' value='Register' class='register' />
</form>
</div>
<div id="logout_div">
<form action="logout_worker.php" method="post">
<input type='submit' name='submit' value='Logout' class='login' />
</form>
</div>

<?php
if(isset($_SESSION['current_user'])){
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'none';document.getElementById('logout_div').style.display = 'block';</script>
<?php 
}else{
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'block';document.getElementById('logout_div').style.display = 'none';</script>
<?php 
}
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

<center><h1><i>Podjetje d.o.o.</i></h1></center>
<ul>
  <li><a class="active" href="index.php">Domov</a></li>
  <li><a href="dodajanjePrivolitve.php">Dodaj privolitev</a></li>
  <li><a href="list.php">Seznam</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
  <li><a href="login.php" class='login'>Prijava</a></li>
  <li><a href="register.php">Registracija</a></li>
  <li><a href="logout.php">Odjava</a></li>
</ul>

<center><h2>Pozdravljeni na vstopni strani nasega podjetja</h2></center>



