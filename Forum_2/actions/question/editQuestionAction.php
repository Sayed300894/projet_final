<?php require('actions/database.php');

if(isset($_POST['validate'])){
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])){

        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars( $_POST['content']));

        $editQuestionInfos = $bdd->prepare('UPDATE questions SET title = ?, description = ?, content = ? WHERE idquestions = ?');
        $editQuestionInfos->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));

       header('Location: my-question.php');
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}