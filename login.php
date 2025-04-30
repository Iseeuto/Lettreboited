
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$LOGIN = "admin"; $PASSWORD = "admin";

if (isset($_POST["login"]) && isset($_POST["password"])){
    $login = $_POST["login"];
    $password = $_POST["password"];

    if($login == $LOGIN && $password == $PASSWORD){
        $_SESSION["logged_in"] = true;
        header("Location: index.php");
        exit();
    }
}


ob_start() ?>

<link href="style/login.css" rel="stylesheet">
<div id="content">
    <form method="POST" action=<?php if(isset($_SESSION["logged_in"])){ echo "disconnect.php"; } else {echo "login.php"; } ?>>

        <?php if(isset($_SESSION["logged_in"])) : ?> 
            <h1>Vous êtes connectés !</h1>
        <?php else: ?> 
            <h1>Se Connecter</h1>
        <?php endif ?>

        <?php if(!isset($_SESSION["logged_in"])) : ?>

        <div id="fields">
            <div class="field">
                <p>Identifiant</p>
                <input type="text" placeholder="login" name="login">
            </div>

            <div class="field">
                <p>Mot de passe</p>
                <input type="password" placeholder="password" name="password">
            </div>
        </div>

        <?php endif ?>

        <button type="submit"> <?php if(!isset($_SESSION["logged_in"])): ?> M'identifier <?php else: ?> Se déconnecter <?php endif ?></button>

    </form>
</div>


<?php $content = ob_get_clean();

Template::render($content);

?>