<?php

class Autoloader {
    public static function register() {
        spl_autoload_register([self::class, "autoload"]);
    }

    public static function autoload($class_name): void{
        // formatage du chemin vers la classe
        $class_name = str_replace('\\', '/', $class_name);

        // inclusion du fichier correspondant
        require $class_name . '.php';
    }
}
?>