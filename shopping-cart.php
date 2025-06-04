<?php
session_start();

// Dummy-Produkte
$produkte = [
    1 => ["name" => "T-Shirt", "preis" => 19.99],
    2 => ["name" => "Jeans", "preis" => 49.99],
    3 => ["name" => "Sneaker", "preis" => 89.99]
];

// Artikel zum Warenkorb hinzufügen
if (isset($_GET['add']) && isset($produkte[$_GET['add']])) {
    $id = $_GET['add'];
    $_SESSION['warenkorb'][$id] = ($_SESSION['warenkorb'][$id] ?? 0) + 1;
    header("Location: index.php");
    exit();
}

// Artikel aus dem Warenkorb entfernen
if (isset($_GET['remove']) && isset($_SESSION['warenkorb'][$_GET['remove']])) {
    unset($_SESSION['warenkorb'][$_GET['remove']]);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Warenkorb</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 50%; margin-top: 20px; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        .btn { padding: 5px 10px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; }
        .btn-remove { background-color: #dc3545; }
    </style>
</head>
<body>
    <h1>Produkte</h1>
    <ul>
        <?php foreach ($produkte as $id => $produkt): ?>
            <li>
                <?= htmlspecialchars($produkt['name']) ?> – <?= number_format($produkt['preis'], 2, ',', '.') ?> €
                <a class="btn" href="?add=<?= $id ?>">In den Warenkorb</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Warenkorb</h2>
    <?php if (!empty($_SESSION['warenkorb'])): ?>
        <table>
            <tr>
                <th>Produkt</th>
                <th>Menge</th>
                <th>Preis</th>
                <th>Aktion</th>
            </tr>
            <?php
            $gesamt = 0;
            foreach ($_SESSION['warenkorb'] as $id => $menge):
                $produkt = $produkte[$id];
                $preis = $produkt['preis'] * $menge;
                $gesamt += $preis;
            ?>
                <tr>
                    <td><?= htmlspecialchars($produkt['name']) ?></td>
                    <td><?= $menge ?></td>
                    <td><?= number_format($preis, 2, ',', '.') ?> €</td>
                    <td><a class="btn btn-remove" href="?remove=<?= $id ?>">Entfernen</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2"><strong>Gesamt</strong></td>
                <td colspan="2"><strong><?= number_format($gesamt, 2, ',', '.') ?> €</strong></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Der Warenkorb ist leer.</p>
    <?php endif; ?>
</body>
</html>



