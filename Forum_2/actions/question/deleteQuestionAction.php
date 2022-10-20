<?php

session_start();
if(!isset($_SESSION['auth'])){
    header('location: ../../login.php');
}
require('../database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $checkQexicte = $bdd->prepare("SELECT id_author FROM `questions` WHERE `id`= ?");
    $checkQexicte->execute(array($id));

    if($checkQexicte->rowCount() > 0){
        $userInfo = $checkQexicte->fetch();

        if($userInfo['id_author'] == $_GET['id']) {
            $deleteThisQ = $bdd->prepare("DELETE FROM `questions` WHERE `id`= ?");
            $deleteThisQ->execute(array($id));

            header('Location: ../../my-question.php');
        }else{
            echo "Vous n'avez pas le droit de supprimer";
        }
    }else{
        echo "Aucune question n'a été trouvée";
    }

}else{
    echo "Aucune question n'a été trouvée";
}