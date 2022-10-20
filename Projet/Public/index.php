<?php

use App\Autoloader;
use App\Core\Main;

// on difinit une constant constant le dossier racine de projet
define('ROOT', dirname(__DIR__));

require_once ROOT.'/Autoloader.php';

// on importe l'Autoloader
Autoloader::register();


// on instancie Main (notre routeur);

$app = new Main();

// on démarre l'application;
$app->start();