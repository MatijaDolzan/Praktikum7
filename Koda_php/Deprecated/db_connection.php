 <?php
$servername = "localhost:3306/praktikum";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo '<br>$conn->close(); is necessary when including this file!!!';
$conn->close();
?> 