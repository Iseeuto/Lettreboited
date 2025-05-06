<?php 
session_start();

if (!isset($_SESSION["logged_in"])) header("Location: index.php");

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$bdd = new BDD();

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';
$columns = [];

// Liste blanche des tables autorisées (à adapter)
$valid = ["serie", "acteur", "realisateur", "tag", "episode", "saison"];
if (!in_array($type, $valid)) header("Location: index.php");

// Récupérer les champs de la table (hors auto_increment)
$query = $bdd->pdo->query("DESCRIBE `$type`");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    if ($row['Extra'] !== 'auto_increment') {
        $columns[] = $row['Field'];
    } else {
        $primaryKey = $row['Field']; // On récupère aussi la clé primaire
    }
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

ob_start();
?>

<link href="style/new.css" rel="stylesheet">

<form method="POST">
    <h1><?= ucfirst(htmlspecialchars($type)) ?></h1>

    <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">

    <?php 
    // Charger les données actuelles
    $stmt = $bdd->pdo->prepare("SELECT * FROM `$type` WHERE `$primaryKey` = :id");
    $stmt->execute(['id' => $id]);
    $donnees = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

    if (!$donnees) {
        echo "<p style='color:red;'>❌ Donnée non trouvée.</p>";
    } else {
        foreach($columns as $col) { ?>
            <input class="field" autocomplete="off" name="<?= htmlspecialchars($col) ?>" 
                   type="text" placeholder="<?= htmlspecialchars($col) ?>"
                   value="<?= htmlspecialchars($donnees[$col]) ?>">
        <?php } ?>

        <button type="submit">Mettre à jour</button>
    <?php } ?>
</form>

<?php 
$content = ob_get_clean();
Template::render($content);
?>
