<?php
$stmt = $conn->prepare("SELECT selection_name FROM kunden_selections ks
                        JOIN kunden k ON ks.kunde_id = k.id
                        WHERE k.name = ? AND ks.aktiv = 1");
$stmt->bind_param("s", $kunde);
$stmt->execute();
$modules = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
