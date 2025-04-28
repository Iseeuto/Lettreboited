
<?php

require_once __DIR__ . "/class/Autoloader.php"; Autoloader::register();

$db_name="lettreboited"; $db_host="127.0.0.1"; $db_port="3306";

$db_user="root"; $db_pwd="";

try {
    // Agrégation des informations de connexion dans une chaine DSN
    $dsn = 'mysql:dbname=' . $db_name . ';host='. $db_host. ';port=' . $db_port;

    // Connexion et récupération de l'objet connecté
    $pdo = new PDO($dsn, $db_user, $db_pwd);
} catch (PDOException $ex) { ?>
    <!-- Affichage des informations liées à l'erreur-->
    <div style="color: red">
        <b>!!! ERREUR DE CONNEXION !!!</b><br>
        Code : <?= $ex->getCode() ?><br>
        Message : <?= $ex->getMessage() ?>
    </div><?php
    // Arrêt de l'exécution du script PHP
    die("-> Exécution stoppée <-") ;
}
// Poursuite de l'exécution du script ?>
<div style="color: green">Connecté à <b><?= $dsn ?></b></div>

<?php

$requete = "SELECT * FROM serie";

$statement = $pdo->prepare($requete);
$statement->execute() or die(var_dump($statement->errorInfo())) ;
$results = $statement->fetchAll(PDO::FETCH_CLASS, "Serie") ;

?>

<h1>Liste des séries</h1>
<ul>
    <?php foreach ($results as $serie):?>
        <li><?= $serie->test() ?></li>
    <?php endforeach ?>
</ul>