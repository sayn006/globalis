<?php
/**
 * Saisie utilisateurs 
 */
$largeurContinent = readline("Entrer la largeur du continant : ");

/**
 * Vérifie si la largeur du continent corresspond au nombre d'altitudes saisie
 */



if (!preg_match("/^\s*[-+]*\s*[0-9]+\s*$/", $largeurContinent))
{
    echo "La largeur du terrain n'est pas un eniter";
    exit;
}

$altitudesTerrain = readline("Entrer les altitudes du terrain séparés par des espaces : ");

/**
 * Mise en tableau des valeurs de l'altitudes
 */
$arrayAltitudes = explode(" ", $altitudesTerrain);

/**
 * Détermination du nombre d'altitudes 
 */
$nbAltitudes = count($arrayAltitudes);


/**
 * Vérifie si la largeur du continent corresspond au nombre d'altitudes saisie
 */
if($largeurContinent != $nbAltitudes){
    echo "\nLa largeur du terrain ne correspond pas aux nombre d'altitude attendu";
    exit;
}

/**
 * Vérification des contraintes et mise en tableau de l'altitudes
 */
$altitude = [];

/**
 * Contraintes (1 ≤n≤ 100 000)
 */
if((1 <= $largeurContinent) and ($largeurContinent <= 100000)){

    /**
     * Contraintes (0 ≤h≤ 100 000)
     */
    foreach ($arrayAltitudes as $value){
        if((0 <= $value) and ($value <= 100000)){
            $altitude[] = $value;
        }else{
            echo "Contraintes (0 ≤h≤ 100 000) non respecter\n";
            exit;
        }
    }
}else{
    echo "Contraintes (1 ≤n≤ 100 000) non respecter\n";
    exit;
}

/**
 * Affichage des informations pour l'utilisateur
 */
echo "\nEntrée :";
echo "\nLa largeur du continant : ".$largeurContinent."\n";
echo "Les altitudes du terrain : ".$altitudesTerrain."\n";


/**
 * Fonction pour determiner les terrains bases pour chaque valeur de l'altitude 
 *
 * @param [type] $value valeur d'altitude a comparé
 * @param array $array tableau d'altitudes
 * @return $value inférieurs à celle-ci
 */
function arrayVerif($value, array $array){
    foreach($array as $hauteur){
        /**
         * Exclusion de la 1ère valeur
         */
        if($hauteur == $value) 
            break;

        /**
         * Vérification si hauteurs inférieures à celle-ci
         */
        if($hauteur < $value){
            // oui
        }else{
            // non
            return $value;
        }
    }
}

 
/**
 * Affectation du résultat dans le tableau $terraninBase
 */
$terrainBase = [];
foreach($altitude as $h1){
    $terrainBase[] = arrayVerif($h1, $altitude);
}

/**
 * Supprression des valeurs vide
 */
$terrainBase = array_filter($terrainBase);

echo "\nSortie : ";
echo "\nSurface d'abrit disponible : ".count($terrainBase)."\n";