<?php

namespace Src;
// Définition de la classe abstraite Pokémon
abstract class Pokemon{
// /!\ Abstraite car sert de modèle pour les classes qui en héritent
// /!\ Ne peut être instanciée directement

    // Initialisation des variables
    protected string $name; // Nom du Pokemon
    protected int $pv; // Valeur de points de vie
    protected int $pa; // Valeur max de points d'attaque
    protected int $pd; // Valeur max de points de défense
    protected int $niveau;// Niveau du Pokemon
    protected string $image;// Image du Pokemon

    // Fonction d'initialisation des attributs du Pokemon. Transformation des valeurs en paramètres car varient d'un Pokemon à l'autre.
    public function __construct($name, $pv, $pa, $pd, $niveau, $image)
    {
        // Définition des variables lors de l'initialisation
        $this->name = $name;
        $this->pv = $pv;
        $this->pa = $pa;
        $this->pd = $pd;
        $this->niveau = $niveau;
        $this->image = $image;

        $this->presentation();
    }

    // Début des getters setters
    public function getName():string 
    {   // Retourne le nom. Pas de setter puisque nom ne change pas.
        return $this->name;
    }
    
    public function getPv():string 
    {   // Retourne le nombre de PV.
        return $this->pv;
    }
    public function setPv(int $pv)
    {   // Modifie les PV avec la valeur en paramètre
        $this->pv = $pv;
    }
    
    public function getPa():string 
    {   // Retourne les points d'attaque
        return $this->pa;
    }
    public function setPa(int $pa)
    {   // Modifie les PA avec la valeur en paramètre
        $this->pa = $pa;
    }
    
    public function getPd():string 
    {   // Retourne les points de défense
        return $this->pd;
    }
    public function setPd(int $pd)
    {   // Modifie les PD avec la valeur en paramètre
        $this->pd = $pd;
    }

    public function getNiveau():string 
    {   // Retourne le niveau
        return $this->niveau;
    }
    public function setNiveau(int $niveau)
    {   // Modifie le niveau avec la valeur en paramètre
        $this->niveau = $niveau;
    }
    // Fin des getters setters
    
    // Méthode attaque : l'objet attaque un adversaire.
    public function attaque(Pokemon $adversaire):void
    {   // Génération d'un nombre random entre 1 et le max de PA de l'objet
        $nbPa = rand(1, $this->pa);
        // Les dégâts sont infligés : le nombre random de PA est soustrait des PV de l'adversaire
        $adversaire->setPv($adversaire->getPv() - $nbPa);
        // Message renvoyant l'attaque et ses conséquences
        echo $this->name . ' a attaqué ' . $adversaire->getName() . ', il lui a infligé ' . $nbPa . ' point(s) de degat.<br />' . $adversaire->getName() . ' a maintenant ' . $adversaire->getPv() . ' point(s) de vie.<br />';
        // L'adversaire meurt si son niveau de PV est égal ou inférieur à 0
        if($adversaire->getPV() <= 0){
            // Dans ce cas, appel de la fonction mort
            $adversaire->mort();
        }
    }

    // Méthode soigner : l'objet se soigne.
    public function soigner():void
    {   // Génération d'un nombre random entre 1 et le max de PA de l'objet
        $nbPa = rand(1, $this->pa);
        // Ajout du nombre obtenu aux PV de l'objet
        $this->setPv($this->getPv() + $nbPa);
        // Message renvoyant l'action de soin et ses conséquences
        echo $this->name . ' s\'est soigné et a repris ' . $nbPa . ' point(s) de vie.<br />';
    }

    // Méthode mort
    private function mort(){
        // Message annonçant la mort du Pokemon concerné
        echo $this->name . ' est mort';
    }

    // Méthode presentation du Pokemon
    public function presentation(){
        // Affiche un tableau présentant les informations de l'objet
        echo '<table class="table">';
        echo '<tr>';
        echo '<td>';
        echo 'Nom du Pokemon :';
        echo '</td>';
        echo '<td>';
        echo $this->name;
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo 'Type :';
        echo '</td>';
        echo '<td>';
        // Extrait le nom de la classe puis le divise (explode) en utilisant \ comme délimiteur. 
        // Renvoie la 3ème ([2]) partie du nom, représentant le type du Pokémon. 
        // Ex : nom de classe  = "Src\Pokemons\Eau" -> affiche "Eau"
        echo explode('\\', get_class($this))[2];
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo 'Point de vie :';
        echo '</td>';
        echo '<td>';
        echo $this->pv;
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo 'Point de d\'attaque :';
        echo '</td>';
        echo '<td>';
        echo $this->pa;
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo 'Point de défense :';
        echo '</td>';
        echo '<td>';
        echo $this->pd;
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo 'Generation :';
        echo '</td>';
        echo '<td>';
        echo $this->niveau;
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2">';
        echo '<img src="'.$this->image.'" />';
        echo '</td>';
        echo '</tr>';
        echo '</table>';
    }

    

}