<?php
// JSON-Datei laden
$json = file_get_contents('datenbank.json');

// In ein Array dekodieren
$data = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Produkte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <?php foreach ($data as $item): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($item['beschreibung']) ?></p>
                <p class="card-text"><strong><?= htmlspecialchars($item['preis']) ?></strong></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>







<!-- Einbinden in html -->

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>online shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Irgendein HTML-Inhalt -->

<!-- Hier sollen die Produkte am Ende erscheinen -->
<div class="container mt-4">
  <?php include 'produkte.php'; ?>
</div>

</body>
</html>
