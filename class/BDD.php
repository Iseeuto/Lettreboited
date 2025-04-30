<?php
    Class BDD{
        public static $db_name="lettreboited";
        public static $db_host="127.0.0.1";
        public static $db_port="3306";
        public static $db_user="root";
        public static $db_pwd="";

        public $pdo;
        public function __construct(){
            try {
                // Agrégation des informations de connexion dans une chaine DSN
                $dsn = 'mysql:dbname=' . self::$db_name . ';host='.  self::$db_host. ';port=' .  self::$db_port;
            
                // Connexion et récupération de l'objet connecté
                $this->pdo = new PDO($dsn,  self::$db_user,  self::$db_pwd);
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
        }

        public function requete($recherche): PDOStatement{
            $statement = $this->pdo->prepare($recherche);
            $statement->execute() or die(var_dump($statement->errorInfo())) ;
            return $statement;
        }

        

 
    }
?>