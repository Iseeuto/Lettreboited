
<?php

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$bdd = new BDD();

$posters = [];


include "formIndex.php";
$statement = $bdd->requete($requete);
$posters = $statement->fetchAll(PDO::FETCH_CLASS, "Serie");


ob_start()?>

<link href="style/poster.css" rel="stylesheet">
<link href="style/index.css" rel="stylesheet">

<div id="content">

    <div id="filters">
        <div>
        <form action = "index.php" method ="post"><button type="submit">Rechercher</button>
            <div class="filter">
                <h1>Tags</h1>
                <div>
                    <?php
                        $statement = $bdd->requete("SELECT * FROM tag");
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $tag): ?>
                        <div class="checkbox-container"><input type="checkbox"  name="tags[]" value="<?= htmlspecialchars($tag->nom) ?>"><label class="btn btn-primary" for="btn-check"><?= htmlspecialchars($tag->nom) ?></label></div>
                    <?php 
                        endforeach ?>

                </div>
            </div>

            <div class="filter">
                <h1>Acteurs</h1>
                <div>
                    <?php
                        $statement = $bdd->requete("SELECT * FROM acteur");
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $acteur): ?>
                        <input id = "chek" type = "checkbox" name="acteurs[]" value="<?= htmlspecialchars($acteur->nom) ?>"> <label for = "check" class = "box" ><?= htmlspecialchars($acteur->nom) ?></label>
                    <?php 
                        endforeach ?>
                    
                </div>
                
            </div>
            </form>

        </div>
    </div>

    <div class="poster-container" >

        <?php 
            foreach ($posters as $serie):?>
            <?= $serie->get_clickable_poster() ?>
        <?php endforeach ?>

    </div>
</div>

<script src="js/index.js"></script>

<?php 

$content=ob_get_clean();

Template::render($content);

?>