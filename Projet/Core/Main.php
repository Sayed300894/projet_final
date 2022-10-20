<?php
namespace App\Core;

use App\Controllers\MainController;

/**
 * Routeur principal
 */
class Main 
{
    public function start()
    {
        // On démarre la session 
        session_start();
        
        // on retire le (trailing slash) eventuel de l'URL
        // on récupère L'URL
        $uri = $_SERVER['REQUEST_URI'];

      // On vérifie que uri n'est pas vide est que ce termin par un /
        // if(!empty($uri) && $uri !== "/" && $uri[-1] === '/')
        // {
        //     // On enlève le /
        //     $uri = substr($uri, 0, -1);
                    
        //     // On renvoie un code de rederction permenant
        //     http_response_code(301);

        //     // On redirige ver URL sans le /
        //     header($uri);
        // }
       
          // On gère les parameters d'URL
          $params = [];
            $params = explode('/', $_GET['p']);

        if($params[0] != '')
        {
           $controller = '\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';
            // on istancie le controller
           $controller = new $controller;
            // on récupère le 2ème paramètres
           $action = (isset($params[0])) ? array_shift($params) : 'index';

           if(method_exists($controller, $action)){
            (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
           }else{
            http_response_code(404);
            echo "la page recherchée n'existe pas";
           }
        }else{

            $controller = new MainController;

            $controller->index();
        }
    }
}