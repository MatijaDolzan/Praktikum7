<?php 
include 'db_connection.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_email="user_email";
$sql = "INSERT INTO uporabnik (username, email, password) VALUES ('John', 'john@gmail.com', 'hopeless')";
$result = mysqli_query ($conn, $sql);


$connection = mysqli_connect("localhost", "root", "", "praktikum");
$result = mysqli_query($connection, $sql)or die(mysqli_error($connection));
while ($row = mysqli_fetch_array ($result)) {
    echo $row["username"];
}
$conn->close();
?>