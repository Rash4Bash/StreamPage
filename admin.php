
<?php include __DIR__ . '/includes/header.php'; ?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin-Bereich</title>

<?php
require_once __DIR__ . '/includes/db/queries/loadTheme.php';
require_once __DIR__ . '/includes/db/queries/loadSelections.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StreamPage | <?php echo htmlspecialchars($kunde); ?></title>
  <link rel="stylesheet" href="includes/db/queries/generateThemeCss.php?kunde=<?php echo urlencode($kunde); ?>">

</head>
<body>
  <?php include 'includes/header.php'; ?>

  <main class="page-layout">
    <section class="content-grid">
      <?php foreach ($modules as $modul): ?>
        <div class="content-box <?php echo $modul['selection_name']; ?>">
          <?php include "includes/selections/" . $modul['selection_name'] . ".php"; ?>
        </div>
      <?php endforeach; ?>
    </section>
  </main>

  <?php include 'includes/footer.php'; ?>
</body>
</html>

</head>
<body>
  <main class="container">
    <h2>Admin-Bereich</h2>
    <p>Hier kannst du deine Startseiten-Nachricht und Streamingzeiten verwalten.</p>

    <!-- Nachrichten-Anfang -->
    <section id="message-section" class="admin-section">
      <details>
        <summary><strong>💬 Nachricht für die Startseite</strong></summary>
        <div class="message-box">
          <form id="message-form">
            <label for="message">Nachricht:</label>
            <textarea id="message" rows="4" placeholder="Hier deine Nachricht für die Startseite eingeben..."></textarea>
            <div class="admin-actions">
              <button type="submit" id="save-message" class="btn-save">💾 Speichern</button>
              <button type="button" id="clear-message" class="btn-delete">🗑️ Löschen</button>
            </div>
          </form>
        </div>
      </details>
    </section>

    <!-- Wochenplan-Anfang -->
    <section id="plan-section" class="admin-section">
      <details>
        <summary><strong>🕒 Streamingzeiten bearbeiten</strong></summary>
        <table class="plan-admin-table">
          <thead>
            <tr>
              <th>Wochentag</th>
              <th>Uhrzeit</th>
              <th>Aktionen</th>
            </tr>
          </thead>
          <tbody>
            <tr data-day="Montag"><td>Montag</td><td><input type="time" class="time-input"></td><td><button class="rest-day-btn">Ruhetag</button></td></tr>
            <tr data-day="Dienstag"><td>Dienstag</td><td><input type="time" class="time-input"></td><td><button class="rest-day-btn">Ruhetag</button></td></tr>
            <tr data-day="Mittwoch"><td>Mittwoch</td><td><input type="time" class="time-input"></td><td><button class="rest-day-btn">Ruhetag</button></td></tr>
            <tr data-day="Donnerstag"><td>Donnerstag</td><td><input type="time" class="time-input"></td><td><button class="rest-day-btn">Ruhetag</button></td></tr>
            <tr data-day="Freitag"><td>Freitag</td><td><input type="time" class="time-input"></td><td><button class="rest-day-btn">Ruhetag</button></td></tr>
            <tr data-day="Samstag"><td>Samstag</td><td><input type="time" class="time-input"></td><td><button class="rest-day-btn">Ruhetag</button></td></tr>
            <tr data-day="Sonntag"><td>Sonntag</td><td><input type="time" class="time-input"></td><td><button class="rest-day-btn">Ruhetag</button></td></tr>
          </tbody>
        </table>

        <div class="admin-actions">
          <button id="save-plan" class="btn-save">💾 Speichern</button>
          <button id="clear-plan" class="btn-delete">🗑️ Alles löschen</button>
        </div>
      </details>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
