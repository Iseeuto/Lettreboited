<?php

session_start();

$bdd = new BDD();

$result = $bdd->requete("SELECT * FROM episode WHERE idEpisode = $id");
$obj = $result->fetch(PDO::FETCH_OBJ);

$titre = $obj->titre;
$numero = $obj->numero;
$serie = $bdd->requete("SELECT * FROM episode JOIN saison ON episode.idSaison = saison.idSaison JOIN serie ON saison.idSerie = serie.idSerie WHERE episode.idEpisode = $id")->fetch(PDO::FETCH_OBJ);
$duree = $obj->duree;
$saison = $bdd->requete("SELECT * FROM saison WHERE idSaison = $obj->idSaison")->fetch(PDO::FETCH_OBJ);
$lienimage = $serie->affiche;
$realisateur = $bdd->requete("SELECT * FROM realisateur WHERE idRealisateur = $obj->idRealisateur")->fetch(PDO::FETCH_OBJ);
$synopsis = $obj->synopsis;


$saisons = $bdd->requete("SELECT * FROM saison WHERE idSerie = $id")->fetchAll(PDO::FETCH_OBJ);

?>
<link href="style/episode.css" rel="stylesheet">
<div id="movie-info">
    <div id="img-container"> <img src=<?= $lienimage ?>> </div>
    <div id="infos">
        <h1><a href=<?= "view.php?type=serie&id=" . $serie->idSerie ?>> <?= $serie->titre ?> </a> - S<?= $saison->numero ?>É<?= $obj->numero ?>: <?= $titre ?>
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
        <div id="prec-suiv">
            <?php 
            
            $suivant = $bdd->requete("(SELECT e2.* FROM episode e1 JOIN episode e2 ON e1.idSaison = e2.idSaison AND e2.numero = e1.numero + 1 WHERE e1.idEpisode = $id LIMIT 1) UNION (SELECT e2.* FROM episode e1 JOIN saison s1 ON e1.idSaison = s1.idSaison JOIN saison s2 ON s2.idSerie = s1.idSerie AND s2.numero = s1.numero + 1 JOIN episode e2 ON e2.idSaison = s2.idSaison AND e2.numero = 1 WHERE e1.idEpisode = $id LIMIT 1) LIMIT 1")->fetch(PDO::FETCH_OBJ);

            $precedent = $bdd->requete("(SELECT e2.* FROM episode e1 JOIN episode e2 ON e1.idSaison = e2.idSaison AND e2.numero = e1.numero - 1 WHERE e1.idEpisode = $id LIMIT 1) UNION (SELECT e2.* FROM episode e1 JOIN saison s1 ON e1.idSaison = s1.idSaison JOIN saison s2 ON s2.idSerie = s1.idSerie AND s2.numero = s1.numero - 1 JOIN episode e2 ON e2.idSaison = s2.idSaison WHERE e1.idEpisode = $id ORDER BY e2.numero DESC LIMIT 1) LIMIT 1")->fetch(PDO::FETCH_OBJ);
            ?>
            <?php if($precedent != null): ?> <a href=<?= "view.php?type=episode&id=" . $precedent->idEpisode ?>>Précédent</a> <?php endif ?>
            <?php if($suivant != null): ?> <a href=<?= "view.php?type=episode&id=" . $suivant->idEpisode ?>>Suivant</a> <?php endif ?>
        </div>
    </div>
</div>