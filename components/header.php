<link href="style/header.css" rel="stylesheet">

<header>
    <!-- Gauche (titre + recherche) -->
    <div id="left">
        <span id="title">LettreBoited</span>
        <form method="get" action="recherche.php" target="_self">
            <span id="search-bar"><input id="search"><?php include "searchicon.html" ?></span>
        </form>
    </div>
    <!-- Droite (Connection) -->
     <div id="right">
        <span>Non connecté·e</span>
        <?php include "avatar.html" ?>
     </div>
</header>

