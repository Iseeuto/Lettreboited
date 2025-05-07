
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<link href="style/header.css" rel="stylesheet">

<header>
    <!-- Gauche (titre + recherche) -->
    <div id="left">
        <a id="title" href="index.php">LettreBoited</a>
        <a id="search" href="search.php"> <?php include "html/searchicon.html" ?> </a>
        <?php if(isset($_SESSION["logged_in"])){ ?>
            <a id="add" href="new.php?type=acteur"> <?php include "html/add.html" ?> </a>
        <?php }
         ?>
    </div>
    <!-- Droite (Connection) -->
     <div id="right">
        <a href="login.php">
            <?php if (isset($_SESSION["logged_in"])): ?>
                <span>Connecté</span>
            <?php else: ?>
                <span>Se Connecter</span>
            <?php endif; ?>
        <?php include "html/avatar.html" ?>
        </a>
     </div>
</header>
