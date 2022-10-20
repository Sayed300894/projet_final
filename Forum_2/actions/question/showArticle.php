<?php

require('actions/database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

    $idOquestion = $_GET['id'];
    
    $checkQ = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkQ->execute(array($idOquestion));

    if($checkQ->rowCount() > 0){

        $qInfo = $checkQ->fetch();

        $q_title = $qInfo['title'];
        $q_content = $qInfo['content'];
        $q_author = $qInfo['id_author'];
        $q_pseudo_author = $qInfo['pseudo_author'];
        $q_date = $qInfo['date_publication'];
        

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }
}else{
    $errorMsg = "Aucune question n'a été trouvée";
}