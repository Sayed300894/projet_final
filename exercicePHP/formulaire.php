<?php
require 'function.php';
const FILENAME = 'user.json';

$error = null;
$email = '';
$firstname = '';
$lastname = '';

if(!empty($_POST)) {
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    $errors = [];

    if(!$firstname) {
        $errors['firstname'] = 'Le champ "Prénom" est obligatoire';
    }
    if(!$lastname) {
        $errors['lastname'] = 'Le champ "Nom" est oblgatoire';
    }
    if(!$email) {
        $errors['email'] = 'Le champ "Email" est obligatoire';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'format email incorrect';
    }


    if(!file_exists(FILENAME)) {
        $data = [];
    }
    else {
        $jsonData = file_get_contents(FILENAME);
    
        if(!$jsonData){
            $data = [];
        }else{
            $data = json_decode($jsonData, true);
        }
    }


    $found = false; 
    foreach($data as $user) {
        if ($email == $user['email']) {
            $found = true;
            break;
        }
    }
    if($found){
        $errors['email'] = 'Vous étes déja abonné à notre formulaire';
    }

    if(empty($errors)){
        $newUser = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname
        ];
        $data[] = $newUser;
        $jsonData = json_encode($data);
        file_put_contents(FILENAME, $jsonData);

        header('Location: formulaire.php');
        exit;
    }
}

include 'formulaire.phtml';
?>
