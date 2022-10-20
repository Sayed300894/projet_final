<?php 

/////////////////////////////////////////
// Inclusion des dépendances
require 'functions.php';

/////////////////////////////////////////
// Traitements des données du formulaire

// Initialisation de la variable $error à la valeur null
$email = '';
$firstname = '';
$lastname = '';

// Si le formulaire est soumis...
if (!empty($_POST)) {

    ////// 1. On récupère l'email du formulaire en supprimant les espaces avant ou après
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    ////// 2. Validation
    $errors = validate($firstname, $lastname, $email);    

    ////// 3. Si pas d'erreurs => on fait ce qu'on doit faire
    if (empty($errors)) {

        // On stocke les données du nouvel utilisateur dans un tableau associatif
        addSubscriber($firstname, $lastname, $email);

        // Faire une redirection pour perdre les données du formulaire
        // et éviter de les renvoyer plusieurs fois en cas de rafraichissement de page (F5)
        header('Location: index.php');
        exit;
    }
}

///////////////////////////////////////////////
// Affichage : inclusion du fichier de template
include 'index.phtml';