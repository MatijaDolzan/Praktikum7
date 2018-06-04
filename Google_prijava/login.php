<?php
require_once "config.php"; //to dodala jaz

//include ("menu.php");
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}

$loginURL = $gClient->createAuthUrl(); //to dodala jaz
?>


<?php //menu.php
ini_set('default_charset', 'UTF-8');
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

<center><h1><i><a class="active" href="index.php">Podjetje d.o.o.</a></i></h1></center>

<div><ul>
 <center>
  <div id="logout_div"><li><a href="dodajanjePrivolitve.php">Dodaj privolitev</a></li>
  <li><a href="list.php">Seznam</a></li>
  <li><a href="seznam_upravljavcev.php">Upravljalci</a></li>  
  <li><a href="splosni_pogoji.php">Splosni pogoji</a></li>
  <li><a href="logout_worker.php">Odjava</a></li></div>
  <div id="login_register_div"><li><a href="login.php" class='login'>Prijava</a></li>
  <li><a href="register.php">Registracija</a></li></div></center>  
</ul></div>


<?php
if(isset($_SESSION['current_user'])){
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'none';document.getElementById('logout_div').style.display = 'block';</script>
<?php 
}else{
?>
<script type="text/javascript">document.getElementById('login_register_div').style.display = 'block';document.getElementById('logout_div').style.display = 'none';</script>
<?php 
} //menu.php
?>

<center><h2>Prijava</h2>

<form action="login_worker.php" method="post">

	<p> E-mail:
    <input type='text' name='email' /><br>
   <p> Geslo:
    <input type='password' name='password' /><br>
    
   <p> <input type='submit' name='submit' value='Potrdi' class='login' />
   <p> <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger" /> <!-- to dodala jaz -->
</form>

</center>

<?php if(isset($_SESSION['login_error'])){
?>
<script>alert('<?php echo $_SESSION['login_error'];?>');</script>
<?php 
}
?>


<?php
/*
require_once "config.php";

if (isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}

$loginURL = $gClient->createAuthUrl();*/
?>
<!-- 
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login With Google</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">
			
				<h1>PRIJAVA</h1>
				
                <form >
                    <input placeholder="Email..." name="email" class="form-control"><br>
                    <input type="password" placeholder="Geslo..." name="password" class="form-control"><br>
                    <input type="submit" value="Log In" class="btn btn-primary">
                    <input type="button" onclick="window.location = '<?php //echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger">
                </form>

            </div>
        </div>
    </div>
</body>
</html>-->