<?php

require('actions/database.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {

    $idOfUser = $_GET['id'];

    $checkIfUexicte = $bdd->prepare('SELECT pseudo, lastname, firstname FROM users WHERE idusers = ?');
    $checkIfUexicte->execute(array($idOfUser));

    if($checkIfUexicte->rowCount() > 0) {

        $usersInfos = $checkIfUexicte->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['lastname'];
        $user_firstname = $usersInfos['firstname'];

        $getQuestion = $bdd->prepare('SELECT title, description, content, date_publication, users.pseudo FROM questions JOIN users ON users.idusers = users_idusers WHERE users_idusers = ?');
        $getQuestion->execute(array($idOfUser));

    }else{
        $errorMsg = "Aucun utilisateur trouvée";
    }
}else{
    $errorMsg = "Aucun utilisateur trouvée";
}