<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_db";
$port = "3306";  // Ensure this is the correct port

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
