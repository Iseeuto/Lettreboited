<?php

class Template
{
    public static function render(string $content) : void{?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LettreBoited</title>
        <link href="style/template.css" rel ="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">

    </head>

    <?php include "components/header.php" ?>

    <body>
        
    </body>
    </html>


    <?php
    }
    
}

?>