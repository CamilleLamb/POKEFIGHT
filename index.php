<?php

    //$list = file_get_contents('https://pokebuildapi.fr/api/v1/pokemon/generation/1');
    $list = file_get_contents('https://pokebuildapi.fr/api/v1/pokemon');
    $list = json_decode($list);
    
    $string = '';
    // Boucle sur le tableau JSON
    foreach($list as $row){
        // Test pour n'afficher que les pokémons 1ère génération
        if($row->apiGeneration == 1){
            // Création du HTML qui va former la grille des pokémons sur la page Index
            $string .= '<div class="col-3">';
            $string .= '<input type="checkbox" name="pokemon[]" value="'.$row->id.'">';
            $string .= '<a href="details.php?id='.$row->id.'">';
            $string .= '<img style="width:50px;" src="'.$row->image.'" /><br />' . $row->name;
            $string .= '</a>';
            $string .= '</div>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <form action="simulation.php" method="POST">
        <div class="container">
            <div class="row">
                <?php echo $string; ?>
                <input type="submit" value="Lancer le combat" class="form-control">
            </div>
        </div>
    </form>
</body>
</html>