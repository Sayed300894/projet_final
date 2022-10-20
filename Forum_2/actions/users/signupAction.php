<?php
session_start();
require('actions/database.php');

// validation de formulaire
if(isset($_POST['validate'])){

    // vérifier si l'user a bien compléter tous les champs
    if(!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])){

        // les données de l'user 
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname   = htmlspecialchars($_POST['firstname']);
        $user_password   = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // vérifier si l'utilisateur existe déja sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            // Insérer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, lastname, firstname, `password`, `role`)VALUES(?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password, 0));
            // Récupérer les informations de l'utilisateur
            $getInfoUsers = $bdd->prepare('SELECT idusers, pseudo, lastname, firstname FROM users WHERE firstname = ? AND lastname = ? AND pseudo = ?');
            $getInfoUsers->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $usersInfos = $getInfoUsers->fetch();
            
                // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['lastname'];
            $_SESSION['firstname'] = $usersInfos['firstname'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];


            // Rediriger l'utilisateur vers la page d'accueil
           header('Location: index.php');


        }else{
            $errorMsg = "L'utilisateur existe déja sur le liste";
        }
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}