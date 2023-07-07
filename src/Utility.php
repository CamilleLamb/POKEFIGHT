<?php

namespace Src;
// Définition de la classe Utility
class Utility {
    // Fonction de "nettoyage" du word : remplace É PAR E, pour ne pas avoir d'erreur dans mon programme
    public function mrPropre($word){
        $search = ['É'];
        $replace = ['E'];
        // Utilisation d'str_replace pour retourner la string modifiée
        return str_replace($search, $replace, $word);
    }

}