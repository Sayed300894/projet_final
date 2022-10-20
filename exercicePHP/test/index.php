<?php 

const FILENAME = 'subscribers.json';

/////////////////////////////////////////
// Traitements des données du formulaire

// Initialisation de la variable $error à la valeur null
$error = null;
$email = '';

// Si le formulaire est soumis...
if (!empty($_POST)) {

    ////// 1. On récupère l'email du formulaire en supprimant les espaces avant ou après
    $email = trim($_POST['email']);

    ////// 2. Validation

    // Est-ce que le champ est bien rempli ?
    if (!$email) {
        $error = 'Le champ "Email" est obligatoire';
    }

    // Est-ce que le format d'email est correct ?
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email incorrect';
    }

    // Vérifier que l'email n'existe pas déjà dans les abonnés

    // On doit avant toute chose aller chercher le contenu du fichier JSON

    // Si le fichier n'existe, pas encore de données
    if (!file_exists(FILENAME)) {

        // on crée un tableau vide
        $data = [];
    } 
    // Si le fichier existe bien...
    else {

        // ... on récupère son contenu
        $jsonData = file_get_contents(FILENAME);

        // Si le fichier est vide
        if (!$jsonData) {

            // On crée également un tableau vide
            $data = [];
        }
        else {
            $data = json_decode($jsonData);
        }
    }

    // Une fois qu'on a nos données, on peut vérifier si l'email existe à l'intérieur
    if (in_array($email, $data)) {
        $error = 'Vous êtes déjà abonné à notre newsletter';
    }

    ////// 3. Si pas d'erreurs => on fait ce qu'on doit faire
    if ($error == null) {

        // On ajoute la nouvelle adresse email
        $data[] = $email;
        
        // On réencode le  tableau en JSON
        $jsonData = json_encode($data);

        // On réécrit les données dans le fichier
        file_put_contents(FILENAME, $jsonData);

        // Faire une redirection pour perdre les donneés du formulaire
        // et éviter de les renvoyer plusieurs fois en cas de rafraichissement de page (F5)
        header('Location: index.php');
        exit;
    }
}


///////////////////////////////////////////////
// Affichage : inclusion du fichier de template
include 'index.phtml';