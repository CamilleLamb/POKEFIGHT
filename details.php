<?php

use Src\Utility;

    include_once './vendor/autoload.php';

    // Récuperation de L'ID dans URL
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header('Location:index.php');
    }

    // Appel de l'API (exemple : https://pokebuildapi.fr/api/v1/pokemon/366)
    $obj = file_get_contents('https://pokebuildapi.fr/api/v1/pokemon/'.$id);

    // Transformation de la string en JSON
    $obj = json_decode($obj);

    // Récuperation du type de Pokemon dans l'objet
    $utility = new Utility();
    $type = $utility->mrPropre($obj->apiTypes[0]->name);

    // Instanciation de la classe 
    // De maniere dynamique on fait un $nom_de_la_classe()
    // Et dans l'instanciation, on passe les paramètres qui viennent de l'API.
    $className = "Src\\Pokemons\\$type";
    $var = new $className(
        $obj->name,
        $obj->stats->HP,
        $obj->stats->attack,
        $obj->stats->defense,
        $obj->apiGeneration,
        $obj->image
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>