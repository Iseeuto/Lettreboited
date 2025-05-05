<?php

$titre = "Breaking Bad";
$lienimage = "../testerimage.webp";
$numero = "1";
$acteur = "Bryan Cranston, Aaron Paul, Anna Gunn, Dean Norris";
$episodesParSaison = [
    "Saison 1" => ["Chute libre", "Le choix", "Dérapage", "Vivre ou survivre", "Bluff", "Vivre ou survivre", "Bluff", "Vivre ou survivre", "Bluff"],
];

?>
<link href="style/saison.css" rel="stylesheet">
<div class="container">
    <div id="image">
        <img src="<?= $lienimage ?>" alt="photo">
    </div>

    <div id="poster">
        <div id="titre">
            <h1><b><?= $titre ?></b></h1>
        </div>
        <br>

        <div id="information">
            <p><b>Saisson </b>&nbsp;&nbsp;&nbsp;&nbsp; <?= $numero ?></p>
            <br>
            <p><b>Acteurs</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $acteur ?></p>
        </div>
    </div>
</div>

<div class="container2">
    <?php foreach ($episodesParSaison as $saison => $episodes): ?>
        <div class="episodes">
            <?php foreach ($episodes as $episode): ?>
                <span class="episode"><?= $episode ?></span>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
</div>