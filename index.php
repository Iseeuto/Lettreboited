<?php
require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

ob_start();

$bdd = new BDD();

$statement = $bdd->requete("SELECT * FROM serie ORDER BY titre ASC");
$posters = $statement->fetchAll(PDO::FETCH_CLASS, "Serie");

$statement = $bdd->requete("SELECT * FROM acteur WHERE idActeur < 9");
$posters_acteur = $statement->fetchAll(PDO::FETCH_CLASS, "Acteur");
?>

<link href="style/index.css" rel="stylesheet">
<link href="style/poster.css" rel="stylesheet">

<div class="block1">
    <div id="titreblock1">
        <h1>Nouveauté</h1>
    </div>

    <div class="slider-container">
        <button class="scroll-btn">❮</button>

        <div id="LesOeuvres">
            <?php foreach ($posters as $serie): ?>
                <?=$serie->get_clickable_poster() ?>
            <?php endforeach; ?>
        </div>

        <button class="scroll-btn">❯</button>
    </div>

    <div class="titreblock2">
        <h1>Acteurs populaires</h1>
    </div>

    <div class="slider-container">
        <button class="scroll-btn">❮</button>

        <div id="LesOeuvres2">
        <?php foreach ($posters_acteur as $acteur): ?>
            <?=$acteur->get_clickable_poster() ?>
            <?php endforeach; ?>
        </div>

        <button class="scroll-btn">❯</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sliders = [
            { containerId: "LesOeuvres", leftBtnIndex: 0, rightBtnIndex: 1 },
            { containerId: "LesOeuvres2", leftBtnIndex: 2, rightBtnIndex: 3 }
        ];

        const buttons = document.querySelectorAll(".scroll-btn");

        sliders.forEach((slider) => {
            const container = document.getElementById(slider.containerId);

            buttons[slider.leftBtnIndex].addEventListener("click", () => {
                container.scrollBy({ left: -300, behavior: "smooth" });
            });

            buttons[slider.rightBtnIndex].addEventListener("click", () => {
                container.scrollBy({ left: 300, behavior: "smooth" });
            });
        });
    });
</script>

<?php
$content = ob_get_clean();
Template::render($content);
?>
