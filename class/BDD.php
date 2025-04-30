<?php
    Class BDD{
        public static $db_name="lettreboited";
        public static $db_host="127.0.0.1";
        public static $db_port="3306";
        public static $db_user="root";
        public static $db_pwd="";

        public $pdo;
        public function constructPDO(): void{
            try {
                // Agrégation des informations de connexion dans une chaine DSN
                $dsn = 'mysql:dbname=' . $this->db_name . ';host='. $this->db_host. ';port=' . $this->db_port;
            
                // Connexion et récupération de l'objet connecté
                $this->pdo = new PDO($dsn, username: $this->db_user, $this->db_pwd);
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

        public function requete($recherche): void{
            $requete = "SELECT * FROM serie WHERE titre = $recherche" ;

            $statement = $this->pdo->prepare($requete);
            $statement->execute() or die(var_dump($statement->errorInfo())) ;
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "Serie") ;
        }

        

 
    }
?>