<?php

namespace App\Controllers;
use App\Controllers\AnnoncesController;

abstract class Controller
{
    public function render(string $fichier, array $donnees =[], string $template ='default')
    {
    
        // On extrait le Contenu de $donnees
        extract($donnees);
        
                // on démarre le buffer de sortie
                ob_start();
                // A partir de ce point toute sortie esr conservée en mémoire
        
                // on crée le chemin vers la vue 
                require_once ROOT.'/Views/'.$fichier.'.php';
                // transfère le buffer dans $contenu
                $contenu = ob_get_clean();

                
                // template de page
                require_once ROOT.'/Views/'.$template.'.php';

    }
}

























// public function render(string $fichier, array $donnees = [])
//     {
//         // on extrait le contenu de donnees
//         extract($donnees);


    
//     }