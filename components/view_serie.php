<?php

session_start();

$bdd = new BDD();

$result = $bdd->requete("SELECT * FROM serie WHERE idSerie = $id");
$obj = $result->fetch(PDO::FETCH_OBJ);

$titre = $obj->titre;
$lienimage = $obj->affiche;
$tags = $bdd->requete("SELECT * FROM tag JOIN tagdeserie ON tag.idTag = tagdeserie.idTag WHERE tagdeserie.idSerie = $id")->fetchAll(PDO::FETCH_OBJ);
$acteurs = $bdd->requete("SELECT acteur.* FROM acteur JOIN acteurdesaison ON acteur.idActeur = acteurdesaison.idActeur JOIN saison ON acteurdesaison.idSaison = saison.idSaison WHERE saison.idSerie = $id")->fetchAll(PDO::FETCH_OBJ);
$synopsis = $obj->synopsis;


$saisons = $bdd->requete("SELECT * FROM saison WHERE idSerie = $id ORDER BY saison.numero ASC")->fetchAll(PDO::FETCH_OBJ);

?>
<link href="style/serie.css" rel="stylesheet">
<div id="movie-info">
    <div id="img-container"> <img src=<?= $lienimage ?>> </div>
    <div id="infos">
        <h1><?= $titre ?>
            <?php if(isset($_SESSION["logged_in"])): ?>
                <a href=<?= "edit.php?type=serie&id=" . $obj->idSerie ?>><?php include "html/gear.html" ?></a>
            <?php endif ?>
        </h1>
        <div id="tag-container">
            <!--Insérer tags ici-->
            <?php foreach($tags as $tag){ ?>
                <a class="tag"><?= $tag->nom ?></a>
            <?php } ?>
        </div>
        <p><b>Acteurs</b> 
            <?php for($i=0; $i < count($acteurs); $i++): ?> 
                <a href=<?= "view.php?type=acteur&id=" . $acteurs[$i]->idActeur ?>><?= $acteurs[$i]->nom ?></a> <?php if($i+1 != count($acteurs)): echo ", "; endif ?> 
            <?php endfor ?>
        </p>
        <p><b>Synopsis</b> 
            <?= $synopsis ?>
        </p>
    </div>
</div>
<div id="saisons-container">
    <?php foreach($saisons as $saison){ 
        $episodes = $episodes = $bdd->requete("SELECT * FROM episode WHERE idSaison = $saison->idSaison ORDER BY episode.numero ASC")->fetchAll(PDO::FETCH_OBJ);
        $duree = 0;
        foreach( $episodes as $episode ){ $duree += $episode->duree; }
        $heures = floor($duree/60);
        $minutes = fmod($duree, 60);
    ?>
    <div class="saison">
        <h1><?= $saison->titre ?> ( <?php if($heures !=0): echo floor($duree/60); echo "h"; endif ?><?php if($minutes != 0): echo fmod($duree, 60); if($heures ==0): echo "m"; endif ?> <?php endif ?> )</h1>
        <div class="episode-container">
            <?php 
            
            foreach($episodes as $episode){ ?>
                <a href=<?= "view.php?type=episode&id=" . $episode->idEpisode ?>> <?= $episode->numero ?> | <?= $episode->titre ?></a>
            <?php } ?>
        </div>
    </div>

    <?php } ?>
</div>