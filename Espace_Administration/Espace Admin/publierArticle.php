<?php
session_start();
$pdo = new Pdo('mysql:host=localhost; dbname=espace_admin;', 'root', '');
if(!$_SESSION['password']){
    header("Location: connexion.php");
}

if(isset($_POST['submit'])){
    if(!empty($_POST['title']) && !empty($_POST['description'])){
        $title = htmlspecialchars($_POST['title']);
        $description = nl2br(htmlspecialchars($_POST['description']));

        $insertArticle = $pdo->prepare('INSERT INTO articles (title, description) VALUES ( ?, ?)');
        $insertArticle->execute(array($title, $description));

        echo "Article inserted successfully";

    }else{
        echo "Veuillez compléter tous les champs...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un article</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="title">
        <br>
        <textarea name="description"></textarea>
        <br>
        <input type="submit" name="submit" value="valider">
    </form>
</body>
</html>