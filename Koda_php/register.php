<?php
include ("menu.php");
if(isset($_SESSION['current_user'])){
    header("Location: index.php");
    exit;
}
?>
<center><h2>Registracija</h2>

    <form action="register_worker_check.php" method="post">
    
        <p>Uporabnisko ime:
        <input type='text' name='username' /><br>
        <p>Geslo:
        <input type='password' name='password' /><br>
        <p>E-mail:
        <input type='text' name='email' /><br>
    
   <p> <input type='submit' name='submit' value='Registriraj' class='login' />
    </form></center>

<?php if(isset($_SESSION['register_error'])){
?>
<script>alert('<?php echo $_SESSION['register_error'];?>');</script>
<?php 
}
?>