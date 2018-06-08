<?php
session_start();
if((isset($_SESSION['error']))){
?>
<h1>ERROR PAGE</h1>
<p><?php echo $_SESSION['error'];?></p>
<?php 
}else{
    header("Location: index.php");
    exit;
}
?>
