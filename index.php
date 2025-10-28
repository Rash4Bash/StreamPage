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
