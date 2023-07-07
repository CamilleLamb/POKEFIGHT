<?php

    use Src\Api;
    use Src\Utility;

    // Inclusion de l'autoloading du composer
    include_once './vendor/autoload.php';
    // Instanciation de l'objet Utility
    $utility = new Utility();

    // Vérification de l'arrivée des données du formulaire
    if(isset($_POST['pokemon'])){
        // Récupération des données du formulaire dans le tableau $pokemons (méthode $_POST)
        $pokemons = $_POST['pokemon'];
    }else{
        // Sinon, redirection vers index 
        header('Location:index.php');
    }

    // Dissociation des ID des combattants qui sont arrivés tous les deux dans un tableau
    $combattant1 = $pokemons[0];
    $combattant2 = $pokemons[1];

    // Instanciation de l'objet Api
    $api = new Api();

    // Appel de la methode qui va recuperer les informations de chaque pokémon dans l'API
    $combattant1 = $api->getPokemonById($combattant1);
    $combattant2 = $api->getPokemonById($combattant2);

    // Le 1er combattant attaque le 2ème combattant, et inversement
    $combattant1->attaque($combattant2);
    $combattant2->attaque($combattant1);


