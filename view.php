<?php

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

$valid = array("acteur", "episode", "saison", "serie");
$type = $_GET["type"] ?? null;
$id = $_GET["id"] ?? null;
if ($type === null || $id === null || !in_array($type, $valid)) { header("Location: index.php"); }

ob_start();

?>

<?php include "components/view_$type.php" ?>

<?php $content = ob_get_clean();

Template::render($content);
?>