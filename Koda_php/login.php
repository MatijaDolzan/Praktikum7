<?php
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}
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
  <li><a href="dodaj_privloitev.php">Dodaj privolitev</a></li>
  <li><a href="list.php">Seznam</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
  <li><a href="login.php" class='login'>Prijava</a></li>
  <li><a href="register.php">Registracija</a></li>
  <li><a href="logout.php">Odjava</a></li>
</ul>


<center><h2>Prijava</h2>

<form action="login_worker.php" method="post">
  	<p> E-mail:
    <input type='text' name='email' /><br>
   <p> Geslo:
    <input type='password' name='password' /><br>
    
   <p> <input type='submit' name='submit' value='Potrdi' class='login' />
</form>

</center>

<?php if(isset($_SESSION['login_error'])){
?>
<script>alert(<?php echo $_SESSION['login_error'];?>);</script>
<?php 
}
?>

