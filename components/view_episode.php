
$titre = "Episode name";
$lienimage = "../testerimage.webp";
$types = ["Drama", "Action",];
$realisateur = "Vince Gilligan";
$synopsis = "Walter White, professeur de chimie dans une école secondaire, 50 ans, vit avec son fils handicapé Walter Jr. et sa femme enceinte Skyler à Albuquerque, au Nouveau-Mexique. Lorsqu'on lui diagnostique un cancer du poumon en phase terminale, sa vie s'effondre. Il décide alors de mettre en place un laboratoire et de fabriquer de la méthamphétamine pour pouvoir subvenir aux besoins de sa famille en s'associant avec l'un de ses anciens élèves devenu petit trafiquant, Jesse Pinkman.";
$duree="12";

?>
<link href="style/episode.css" rel="stylesheet">
<div class="container">
    <div id="image">
        <img src="<?= $lienimage ?>" alt="photo">
    </div>

    <div id="poster">
        <div id="titre">
            <h1><b><?= $titre ?></b></h1>
        </div>

        <div id="categorie">
            <table>
                <tr>
                    <?php foreach ($types as $type): ?>
                        <td><?= $type ?></td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
        <br>

        <div id="information">
            <p><b>Réalisateur</b>&nbsp;&nbsp;&nbsp;&nbsp; <?= $realisateur ?></p>
            <br>
            <p><b>La duree</b>&nbsp;&nbsp;&nbsp;&nbsp;<?= $duree ?>min </p><br>
            <p><b>Synopsis </b><br><br> "<?= $synopsis ?>"</p>
        </div>
    </div>
</div>