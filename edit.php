<?php 
session_start();

if (!isset($_SESSION["logged_in"])) header("Location: index.php");

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$bdd = new BDD();

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';
$columns = [];

// Liste blanche des tables autorisées
$valid = ["serie", "acteur", "realisateur", "tag", "episode", "saison"];
if (!in_array($type, $valid)) header("Location: index.php");

// Récupération des champs de la table
$query = $bdd->pdo->query("DESCRIBE `$type`");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    if ($row['Extra'] !== 'auto_increment') {
        $columns[] = $row['Field'];
    } else {
        $primaryKey = $row['Field'];
    }
}

// Suppression de l'élément
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $stmt = $bdd->pdo->prepare("DELETE FROM `$type` WHERE `$primaryKey` = :id");
    $stmt->execute(['id' => $id]) or die("Erreur lors de la suppression");
    header("Location: index.php?type=$type");
    exit;
}

// Mise à jour de l'élément
if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($_POST['action']) || $_POST['action'] === 'update')) {
    $set = [];
    $params = [];

    foreach ($columns as $col) {
        $set[] = "`$col` = :$col";
        $params[$col] = $_POST[$col] ?? null;
    }

    $params['id'] = $id;

    $sql = "UPDATE `$type` SET " . implode(', ', $set) . " WHERE `$primaryKey` = :id";
    $stmt = $bdd->pdo->prepare($sql);
    $stmt->execute($params) or die("Oups");

    header("Location: view.php?type=$type&id=$id");
    exit;
}

ob_start();
?>

<link href="style/new.css" rel="stylesheet">

<form method="POST">
    <h1><?= ucfirst(htmlspecialchars($type)) ?></h1>

    <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">
    <input type="hidden" name="action" value="update">

    <?php 
    $stmt = $bdd->pdo->prepare("SELECT * FROM `$type` WHERE `$primaryKey` = :id");
    $stmt->execute(['id' => $id]);
    $donnees = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

    if (!$donnees) {
        die("Pas de données trouvées");
    } else {
        ?>
        
        <input class="field" autocomplete="off" name="<?= htmlspecialchars($primaryKey) ?>" 
            type="text" placeholder="<?= htmlspecialchars($primaryKey) ?>"
            value="<?= htmlspecialchars($donnees[$primaryKey]) ?>">

        <?php
        foreach($columns as $col) { ?>
            <input class="field" autocomplete="off" name="<?= htmlspecialchars($col) ?>" 
                   type="text" placeholder="<?= htmlspecialchars($col) ?>"
                   value="<?= htmlspecialchars($donnees[$col]) ?>">
        <?php } ?>

        <button type="submit">Mettre à jour</button>
    <?php } ?>
</form>

<!-- Formulaire de suppression -->
<form method="POST" style="margin-top: 1em;" onsubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?');">
    <input type="hidden" name="action" value="delete">
    <button type="submit" style="background-color: red; color: white; margin-top: 1em;">
        Supprimer
    </button>
</form>

<?php 
$content = ob_get_clean();
Template::render($content);
?>
