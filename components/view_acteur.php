<?php

$lienImage = "../qui_sont_les_acteurs_les_plus_styl__s_en_activit_____3221.jpeg";
$nomActeur = "Nom de l'acteur";
$series = [
    "Chute libre",
    "Le choix",
    "Dérapage",
];

$series = array_unique($series);
?>
<link href="style/acteur.css" rel="stylesheet">
<div class="container">
    <div id="image">
        <img src="<?= $lienImage ?>">
    </div>

    <div id="poster">
        <div id="titre">
            <h1><b><?= $nomActeur ?></b></h1>
        </div>
        <br>
        <div id="information">
            <div class="serie">
                <h3>Oeuvres populaires :</h3>
                <?php foreach ($series as $serie): ?>
                    <span class="episode"><?= $serie ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>