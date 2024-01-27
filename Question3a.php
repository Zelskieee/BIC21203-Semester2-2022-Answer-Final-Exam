<?php
// Using PDO
$host = "localhost";
$dbname = "db_MY";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to $dbname at $host successfully using PDO!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>


<?php
// Using MySQLi
$host = "localhost";
$dbname = "db_MY";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to $dbname at $host successfully using MySQLi!";
$conn->close();
?>
