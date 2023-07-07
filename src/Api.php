<?php

namespace Src;
// Instanciation de la classe API
class Api{
    // Fonction permettant d'obtenir un Pokémon d'après son ID avec l'API
    public function getPokemonById($id){
        // Instancie l'objet de la classe Utility
        $utility = new Utility();

        // Appel de l'API
        $obj = file_get_contents('https://pokebuildapi.fr/api/v1/pokemon/'.$id);
        // Transformation en JSON de la string recuperer dans l'API
        $obj = json_decode($obj);
        // On enlève les accents éventuels avec la fonction mrPropre (cf Utility.php)
        $type = $utility->mrPropre($obj->apiTypes[0]->name);

        // Instanciation de classe avec un nom dynamique
        $className = "Src\\Pokemons\\$type";

        // return des info' de la classe une fois instaciée
        return new $className(
            $obj->name,
            $obj->stats->HP,
            $obj->stats->attack,
            $obj->stats->defense,
            $obj->apiGeneration,
            $obj->image
        );
    }

}