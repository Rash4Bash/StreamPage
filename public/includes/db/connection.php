<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "stream_project";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
