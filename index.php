
<?php

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$bdd = new BDD();

ob_start()?>

<link href="style/poster.css" rel="stylesheet">
<link href="style/index.css" rel="stylesheet">

<div id="content">

    <div id="filters">

        <button onclick="sendForm()">Rechercher</button>

        <div id="filters-container">

            <div class="filter">
                <h1>Tags</h1>
                <div>
                    
                    <?php
                        $statement = $bdd->requete("SELECT * FROM tag");
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $tag): ?>
                        <p data-name="tags[]" data-value=<?= $tag->nom ?> class="option"><?= $tag->nom ?> <?php include "components/html/cross.html" ?></p>
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
                        <p data-name="actors[]" data-value=<?= $acteur->nom ?> class="option"><?= $acteur->nom ?> <?php include "components/html/cross.html" ?></p>
                    <?php 
                        endforeach ?>

                </div>

            </div>

        </div>
    </div>

    <div class="poster-container" >

        <?php 
            $statement =  $bdd->requete("SELECT * FROM serie");
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "Serie");
            foreach ($results as $serie):?>
            <?= $serie->get_clickable_poster() ?>
        <?php endforeach ?>

    </div>
</div>

<script src="js/index.js"></script>

<?php $content=ob_get_clean();

Template::render($content);

?>