<?php 

/////////////////////////////////////////
// Traitements des données du formulaire

// Initialisation
$message = null;

// Si le formulaire est soumis...
if (!empty($_POST)) {

    $firstname = $_POST['firstname'];

    if (!$firstname) {
        $firstname = 'tout le monde';
    }

    $message = 'Salut ' . $firstname;
}



///////////////////////////////////////////////
// Affichage : inclusion du fichier de template
include 'hello.phtml';