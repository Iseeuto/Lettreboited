<?php

session_start();

if (!isset($_SESSION["logged_in"])) header("Location: index.php");

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$bdd = new BDD();

$valid = array("acteur", "episode", "realisateur", "saison", "serie", "tag", "acteurdesaison", "tagdeserie");
$type = $_GET["type"] ?? $_POST["type"] ?? null;
$columns = [];
$primaryKey = "";

if($type == null) header("Location: index.php");

// Récupérer le nom des champs
$query = $bdd->pdo->query("DESCRIBE $type");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $columns[] = $row['Field'];
    if($row['Extra'] == 'auto_increment') { $primaryKey = $row["Field"]; }
}



// Ajouter le champ si le formulaire a été reçu
if ($_SERVER["REQUEST_METHOD"] == "POST" && $type != null) {
    $values = [];
    $placeholders = [];
    $params = [];

    foreach ($columns as $col) {
        $values[] = "`$col`";
        $placeholders[] = "?";
        $params[] = $_POST[$col] ?? null;
    }

    $sql = "INSERT INTO `$type` (" . implode(",", $values) . ") VALUES (" . implode(",", $placeholders) . ")";
    $command = $bdd->pdo->prepare($sql);
    $command->execute($params);
    header("Location: new.php?type=$type");
}

ob_start();


// Créer le formulaire si le type est valide
if(in_array($type, $valid) && $type != null){
?>

<link href="style/new.css" rel="stylesheet">

<div id="container">

    <div id="categories">

        <?php
        
            foreach($valid as $category){ ?>

                <a href=<?= "new.php?type=" . $category ?> <?php if($category==$type): ?> style="border: solid;" <?php endif ?> > <?= ucfirst($category) ?></a>

            <?php }
        ?>

    </div>

    <form method="POST">
        
        <h1><?= ucfirst($type) ?></h1>

        <input type="hidden" name="type" value=<?= $type ?>>

        <?php 

            foreach($columns as $col){ 
                if($col == $primaryKey) continue;
                if(str_contains($col, "id")){ 
                    $name = strtolower(substr($col, 2));
                    $vals = $bdd->requete("SELECT * FROM $name")->fetchAll(PDO::FETCH_OBJ);
                    ?>

                <select name=<?= $col ?>>
                    <?php foreach($vals as $val){ ?>
                        <option value=<?= get_object_vars($val)["id".ucfirst($name)] ?>>
                        <?php if($col == "idSaison"){ ?><?= $bdd->requete("SELECT titre FROM serie WHERE idSerie = $val->idSerie")->fetch()[0]; echo " - "; ?><?php } ?><?= $val->titre ?? $val->nom; ?>
                    </option>
                    <?php } ?>
                </select>

               <?php } else {
            ?>

                <input class="field" autocomplete="off" name=<?= htmlspecialchars($col) ?> type="text" placeholder=<?= $col ?>>

            <?php }} ?>

        <button type="submit">Ajouter</button>

    </form>
</div>

<?php } 


$content = ob_get_clean();

Template::render($content);

?>