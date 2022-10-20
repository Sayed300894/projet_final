<?php

// On stocke le nom du fichier JSON dans une constante
const FILENAME = 'subscribers.json';

/**
 * Récupère des données depuis un fichier JSON
 * @param string $filepath Le chemin vers le fichier dont on veut charger le contenu
 * @return mixed Les données récupérées du fichier
 */
function loadDataFromJsonFile(string $filepath)
{
    // On récupère le contenu du fichier, ce sont des données au format JSON
    $jsonData = file_get_contents($filepath);

    // On transforme ces données JSON en données PHP
    $data = json_decode($jsonData, true);

    // On retourne ces données
    return $data;
}

/**
 * Enregistre des données dans un fichier au format JSON
 * @param string $filepath Le chemin vers le fichier dans lequel on souhaite écrire des données
 * @param mixed $data Les données qu'on souhaite écrire dans le fichier 
 */
function saveDataToJsonFile(string $filepath, $data)
{
    // On transforme les données transmises en paramètre en JSON
    $jsonData = json_encode($data);

    // On écrit les données JSON dans le fichier
    file_put_contents($filepath, $jsonData);
}

/**
 * Charge les abonnés du fichier JSON
 * Si le fichier n'existe pas ou est vide, on retourne un tableau vide
 * @return array Le tableau d'utilisateurs provenant du fichier JSON
 */
function loadSubscribers()
{
    // Si le fichier n'existe pas, on retourne un tableau vide
    if (!file_exists(FILENAME)){
        return [];
    }

    // Pas besoin de else car on a un return dans le if, le return sort de la fonction

    // On récupère le contenu du fichier
    $subscribers = loadDataFromJsonFile(FILENAME);

    // Si le fichier est vide, on retourne également un tableau vide
    if (!$subscribers) {
        return [];
    }

    // Pas besoin de else car on a un return dans le if, le return sort de la fonction

    // Ici le fichier existe bien et n'est pas vide, on retourne simplement son contenu
    return $subscribers;
}

/**
 * Vérifie si un email existe dans le fichier JSON
 * @param string $email L'email recherché
 * @return bool true si l'email existe dans le fichier, false sinon
 */
function emailExists(string $email)
{
    // On commence par charger les abonnés
    $subscribers = loadSubscribers();

    // On parcours le tableau d'abonnés 
    $found = false; // Au départ on considère qu'on l'a pas trouvé
    foreach ($subscribers as $subscriber) { // On parcours tous les emails du tableau
        if ($email == $subscriber['email']) { // Si l'email qu'on cherche est le même que l'email courant
            $found = true; // On l'a trouvé !
            break; // On sort de la boucle, inutile de continuer puisqu'on l'a trouvé
        }
    }

    return $found;
}

/**
 * Enregistre un nouvel abonné dans le fichier JSON
 * @param string $firstname Le prénom
 * @param string $lastname Le nom
 * @param string $email L'email
 */
function addSubscriber(string $firstname, string $lastname, string $email)
{
    $newSubscriber = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email
    ];

    // On récupère le tableau d'utilisateurs
    $subscribers = loadSubscribers();

    // On ajoute le nouveau dans le tableau
    $subscribers[] = $newSubscriber;

    // On réécrit le contenu du fichier 
    saveDataToJsonFile(FILENAME, $subscribers);
}

/**
 * Valide les données du formulaire et retourne un tableau d'erreurs
 * @param string $firstname Le prénom à valider
 * @param string $lastname Le nom à valider
 * @param string $email L'email à valider
 */
function validate(string $firstname, string $lastname, string $email)
{
    // On prépare un tableau pour stocker les erreurs
    $errors = [];

    // Est-ce que le champ est bien rempli ?
    if (!$firstname) {
        $errors['firstname'] = 'Le champ "Prénom" est obligatoire';
    }

    // Est-ce que le champ est bien rempli ?
    if (!$lastname) {
        $errors['lastname'] = 'Le champ "Nom" est obligatoire';
    }

    // Est-ce que le champ est bien rempli ?
    if (!$email) {
        $errors['email'] = 'Le champ "Email" est obligatoire';
    }

    // Est-ce que le format d'email est correct ?
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email incorrect';
    }

    // Vérifier que l'email n'existe pas déjà dans les abonnés
    elseif (emailExists($email)) {
        $errors['email'] = 'Vous êtes déjà abonné à notre newsletter';
    }

    // On retourne le tableau d'erreurs
    return $errors;
}