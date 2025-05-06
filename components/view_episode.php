<?php

session_start();

$bdd = new BDD();

$result = $bdd->requete("SELECT * FROM episode WHERE idEpisode = $id");
$obj = $result->fetch(PDO::FETCH_OBJ);

$titre = $obj->titre;
$numero = $obj->numero;
$serie = $bdd->requete("SELECT * FROM episode JOIN saison ON episode.idSaison = saison.idSaison JOIN serie ON saison.idSerie = serie.idSerie WHERE episode.idEpisode = $id")->fetch(PDO::FETCH_OBJ);
$duree = $obj->duree;
$lienimage = $serie->affiche;
$realisateur = $bdd->requete("SELECT * FROM realisateur WHERE idRealisateur = $obj->idRealisateur")->fetch(PDO::FETCH_OBJ);
$synopsis = $obj->synopsis;


$saisons = $bdd->requete("SELECT * FROM saison WHERE idSerie = $id")->fetchAll(PDO::FETCH_OBJ);

?>
<link href="style/episode.css" rel="stylesheet">
<div id="movie-info">
    <div id="img-container"> <img src=<?= $lienimage ?>> </div>
    <div id="infos">
        <h1><a href=<?= "view.php?type=serie&id=" . $serie->idSerie ?>> <?= $serie->titre ?> </a> -  <?= $titre ?>
            <?php if(isset($_SESSION["logged_in"])): ?>
                <a href=<?= "edit.php?type=episode&id=" . $obj->idEpisode ?>><?php include "html/gear.html" ?></a>
            <?php endif ?>
        </h1>
        <p><b>Réalisateur</b> <a href=<?= "view.php?type=realisateur&id=" . $realisateur->idRealisateur ?>><?= $realisateur->nom ?></a> </p>
        <p><b>Synopsis</b> <?= $synopsis ?> </p>
        <?php 
            $heures = floor($duree/60);
            $minutes = fmod($duree, 60);
        ?>
        <p><b>Durée</b> <?php if($heures !=0): echo floor($duree/60); echo "h"; endif ?><?php if($minutes != 0): echo fmod($duree, 60); if($heures ==0): echo "m"; endif ?> <?php endif ?></p>
    </div>
</div>