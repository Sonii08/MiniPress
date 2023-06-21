<?php

namespace minipress\admin\services\categorie;

use minipress\admin\models\Categorie;


//gère les requetes sql sur Categorie
class CategorieService
{
    //récupère toutes les catégories
    public static function getCategorie(): ?array{
        $cat = Categorie::all();
        if ($cat!=null) return $cat->toArray();
        return null;
    }

    //récupère une catégorie avec son id
    public static function getCategorieById(int $id){
        $cat = Categorie::find($id);
        if ($cat!=null) return $cat->toArray();
        return null;
    }

    //Créer une catégorie
    public static function createCategorie(string $nom){
        $cat = new Categorie();
        $cat->nom = $nom;
        $cat->save();
    }

}