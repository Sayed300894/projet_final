<?php

session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}
require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQ = $_GET['id'];

    $checkIfQexicte = $bdd->prepare('SELECT users.idusers FROM questions JOIN users ON users.idusers = questions.users_idusers WHERE users_idusers = ?');
    $checkIfQexicte->execute(array($idOfQ));
    if($checkIfQexicte->rowCount() > 0){

        $row = $checkIfQexicte->fetch();
        if($row['id_author'] == $_SESSION['id']){

            $delete = $bdd->prepare('DELETE FROM questions WHERE idquestions = ?');
            $delete->execute(array($idOfQ));

            header('Location: ../../my-question.php');
        }else{
            echo " Vous n'avez pas le droit de supprimer";
        }
    }else{
        echo "On trouve pas la question";
    }

}else{
    echo "Aucune question n'a été trouvée";
}


