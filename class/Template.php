<?php

class Template
{
    public static function render(string $content) : void{?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LettreBoited</title>
        <?php include_once "components/html/polices.html" ?>
        <link href="style/template.css" rel ="stylesheet">
    </head>

    <body>
        <?php include "components/header.php" ?>
        
        <?= $content ?>


    </body>
    </html>


    <?php
    }
    
}

?>