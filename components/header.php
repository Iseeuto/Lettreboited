
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
