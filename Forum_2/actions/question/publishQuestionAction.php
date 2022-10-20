<?php 
require('actions/database.php');

if(isset($_POST['validate'])) {
   
    if(!empty($_POST['description']) && !empty($_POST['title']) && !empty($_POST['content'])){
        $question_title = htmlspecialchars($_POST['title']) ;
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('Y/m/d');
        $id_author = $_SESSION['id'];

        $insertQuestionOnTable = $bdd->prepare('INSERT INTO questions(title, `description`, content,`date_publication`, users_idusers)VALUES (?, ?, ?, ?, ?)');
        $insertQuestionOnTable->execute(array(
            $question_title,
            $question_description,
            $question_content,
            $question_date,
            $id_author
            )
        );

        $successMsg = "Votre question a bien été publiée sur le liste ";


    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}







