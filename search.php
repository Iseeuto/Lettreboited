
<?php

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$bdd = new BDD();

$posters = [];


include "formSearch.php";
$statement = $bdd->requete($requete);
$posters = $statement->fetchAll(PDO::FETCH_CLASS, "Serie");


ob_start()?>

<link href="style/poster.css" rel="stylesheet">
<link href="style/search.css" rel="stylesheet">

<div id="content">

    <div id="filters">
        <form action = "search.php" method ="post"><button type="submit">Rechercher</button>
            <div class="filter">
                <h1>Tags</h1>
                <div>
                    <?php
                        $statement = $bdd->requete("SELECT DISTINCT * FROM tag ORDER BY nom ASC");
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        $taille = count($result);
                        for ($i = 0; $i< $taille ; $i++): 
                            $tag = $result[$i];
                            $nom = htmlspecialchars($tag->nom);
                            echo "<input id = 'checkbox-$i'  type='checkbox'  name='tags[]' value= '$nom'><label for = 'checkbox-$i'>$nom</label><br>";
                    
                        endfor ?>

                </div>
            </div>

            <div class="filter">
                <h1>Acteurs</h1>
                <div>
                    <?php
                        $statement = $bdd->requete("SELECT * FROM acteur ORDER BY nom ASC ");
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        for ($i = 0; $i< count($result); $i++): 
                            $acteur = $result[$i];
                            $nom = htmlspecialchars($acteur->nom);
                            echo "<input id = 'checkbox-a-$i'  type='checkbox'  name='acteurs[]' value= '$nom'><label for = 'checkbox-a-$i'>$nom</label><br>";
                        endfor ?>
                    
                </div>
            </div>

            <div class="filter">
                <h1>Réalisateur</h1>
                <div>
                    <?php
                        $statement = $bdd->requete("SELECT * FROM realisateur ORDER BY nom ASC ");
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        for ($i = 0; $i< count($result); $i++): 
                            $real = $result[$i];
                            $nom = htmlspecialchars($real->nom);
                            echo "<input id = 'checkbox-r-$i'  type='checkbox'  name='realisateurs[]' value= '$nom'><label for = 'checkbox-r-$i'>$nom</label><br>";
                        endfor ?>
                </div>
            </div>
        </form>
    </div>

    <div class="poster-container" >

        <?php 
            foreach ($posters as $serie):?>
            <?= $serie->get_clickable_poster() ?>
        <?php endforeach ?>

    </div>
</div>

<script src="js/search.js"></script>

<?php 

$content=ob_get_clean();

Template::render($content);

?>