<?php
require_once __DIR__ . '/../connection.php';

// Kunde aus Session oder URL ermitteln
session_start();
$kunde = $_SESSION['username'] ?? ($_GET['kunde'] ?? 'Beispielkunde');

// Theme-ID aus der Kundentabelle abrufen
$stmt = $conn->prepare("
    SELECT t.css_datei 
    FROM kunden k
    LEFT JOIN themes t ON k.theme_id = t.id
    WHERE k.name = ?
");
$stmt->bind_param("s", $kunde);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Fallback, falls kein Theme zugeordnet ist
$themeCss = $row['css_datei'] ?? 'design/themes/beige.css';
?>
