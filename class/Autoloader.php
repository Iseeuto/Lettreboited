<?php

function register($class_name) : void{
    // formatage du chemin vers la classe
    $class_name = str_replace('\\', '/', $class_name);

    // inclusion du fichier correspondant
    require $class_name . '.php';
}
spl_autoload_register('register');

?>