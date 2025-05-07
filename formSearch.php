<?php 

$requeteDebut = "SELECT * FROM Serie ";
$condition = " WHERE ";
$having = "GROUP BY serie.idSerie HAVING ";


if(isset($_POST['tags'])){
    $tags = $_POST['tags'];
    $requeteDebut .= " JOIN tagdeserie ON tagdeserie.idSerie = serie.idSerie 
    JOIN tag ON tag.idTag = tagdeserie.idTag ";
    $condition .= "tag.nom IN (" ;
    for ($i = 0;$i < count($tags) ;$i++){
        if($i == count($tags)-1){
            $condition .= "\"$tags[$i]\" ) " ;
            $having .= "COUNT(DISTINCT tag.nom) = ". count($tags);
        }
        else{
            $condition .= "\"$tags[$i]\" ,";
        }  
    }
}

if(isset($_POST['acteurs']) || isset($_POST["realisateurs"])){
    
    $requeteDebut .= " JOIN saison ON serie.idSerie = saison.idSerie ";

    if(isset($_POST['acteurs'])){
        $acteurs = $_POST['acteurs'];
        $requeteDebut .= "JOIN acteurdesaison a ON a.idSaison = saison.idSaison JOIN acteur ON a.idActeur = acteur.idActeur";
        if(isset($_POST['tags'])){$condition .= " AND ";$having .= " AND ";}
        $condition .= "acteur.nom IN (" ;

        for ($i = 0;$i < count($acteurs) ;$i++){
            if($i == count($acteurs)-1){
                $condition.= "\"$acteurs[$i]\") ";
                $having .= "COUNT(DISTINCT acteur.nom) = " . count($acteurs);
            }
            else{
                $condition .= "\"$acteurs[$i]\" ,";
            }
    }}
    if(isset($_POST['realisateurs'])){
        $reals = $_POST['realisateurs'];
        $requeteDebut .= " JOIN episode ON episode.idSaison = saison.idSaison JOIN realisateur ON episode.idRealisateur = realisateur.idRealisateur ";
        if(isset($_POST['tags']) || isset($_POST['acteurs'])){$condition .= " AND ";$having .= " AND ";}
        $condition .= "realisateur.nom IN (" ;
        
        for ($i = 0;$i < count($reals) ;$i++){
            if($i == count($reals)-1){
                $condition.= "\"$reals[$i]\") ";
                $having .= "COUNT(DISTINCT realisateur.nom) = " . count($reals);
            }
            else{
                $condition .= "\"$acteurs[$i]\" ,";
            }
        }
    }
    
}

if(isset($_POST['acteurs']) || isset($_POST['tags']) || isset($_POST['realisateurs'])){
    $requete = $requeteDebut . $condition . $having;
}
else{
    $requete = $requeteDebut;
}
?>