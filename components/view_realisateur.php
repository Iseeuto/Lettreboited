<?php

session_start();

$bdd = new BDD();

$result = $bdd->requete("SELECT * FROM realisateur WHERE idRealisateur = $id");
$obj = $result->fetch(PDO::FETCH_OBJ);

$nom = $obj->nom;
$lienimage = $obj->photo;

$series = $bdd->requete("SELECT DISTINCT serie.* FROM episode JOIN saison on episode.idSaison = saison.idSaison JOIN serie ON saison.idSerie = serie.idSerie WHERE episode.idRealisateur = $id")->fetchAll(PDO::FETCH_CLASS, "Serie");
?>
<link href="style/acteur.css" rel="stylesheet">
<div id="acteur-info">
    <div id="img-container"> <img src=<?= $lienimage ?>> </div>
    <div id="infos">
        <h1><?= $nom ?>
            <?php if(isset($_SESSION["logged_in"])): ?>
                <a href=<?= "edit.php?type=realisateur&id=" . $obj->idRealisateur ?>><?php include "html/gear.html" ?></a>
            <?php endif ?>
        </h1>
        <div id="series">
            <h1>Série<?php if(count($series) > 1): echo 's'; endif ?></h1>
            <div id="series-container">
                <?php foreach($series as $serie): ?>
                    <a class="poster" href=<?= "view.php?type=serie&id=" . $serie->idSerie ?>> 
                        <img src=<?= $serie->affiche ?>>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>