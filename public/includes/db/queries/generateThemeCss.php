<?php
require_once __DIR__ . '/../connection.php';
header("Content-Type: text/css; charset=UTF-8");

session_start();
$kunde = $_SESSION['username'] ?? ($_GET['kunde'] ?? 'Beispielkunde');

// 1️⃣ Kunden-Theme holen
$stmt = $conn->prepare("
    SELECT t.css_dateien
    FROM kunden k
    JOIN themes t ON k.theme_id = t.id
    WHERE k.name = ?
");
$stmt->bind_param("s", $kunde);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

$cssList = $result['css_dateien'] ?? '';
if (!$cssList) {
    die("/* Kein Theme zugewiesen */");
}

// 2️⃣ Cache-Datei vorbereiten
$cacheDir = __DIR__ . '/../../../cache/';
if (!is_dir($cacheDir)) mkdir($cacheDir, 0777, true);
$cacheFile = $cacheDir . 'kunde_' . md5($kunde) . '.css';

// 3️⃣ Prüfen, ob Cache aktualisiert werden muss
$cssFiles = explode(',', $cssList);
$rebuild = !file_exists($cacheFile);
if (!$rebuild) {
    $cacheTime = filemtime($cacheFile);
    foreach ($cssFiles as $f) {
        $path = __DIR__ . '/../../../' . trim($f);
        if (file_exists($path) && filemtime($path) > $cacheTime) {
            $rebuild = true;
            break;
        }
    }
}

// 4️⃣ CSS neu generieren
if ($rebuild) {
    $bundle = "/* Generiert für Kunde: {$kunde} am " . date('Y-m-d H:i:s') . " */\n\n";
    foreach ($cssFiles as $f) {
        $path = __DIR__ . '/../../../' . trim($f);
        if (file_exists($path)) {
            $bundle .= "/* Datei: {$f} */\n" . file_get_contents($path) . "\n";
        } else {
            $bundle .= "/* ⚠️ Datei nicht gefunden: {$f} */\n";
        }
    }
    file_put_contents($cacheFile, $bundle);
}

// 5️⃣ CSS ausgeben
readfile($cacheFile);
exit;
?>
