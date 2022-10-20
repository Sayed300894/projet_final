<?php
session_start();
$pdo = new Pdo('mysql:host=localhost; dbname=espace_admin;', 'root', '');

if(isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id'];
    $getArticle = $pdo->prepare('SELECT * FROM `articles` WHERE `id` = ?');
    $getArticle->execute(array($id));
    if($getArticle->rowCount() > 0) {
        $articleAnfo = $getArticle->fetch();
        $title = $articleAnfo['title'];
        $description = $articleAnfo['description'];
        $description = str_replace('<br />','',$articleAnfo['description']);
        if(isset($_POST['submit'])){
        $title_saisi = htmlspecialchars($_POST['title']);
        $description_saisi = nl2br(htmlspecialchars($_POST['description']));
        $updateArticle = $pdo->prepare('UPDATE `articles` SET `title` = ?, `description` = ? WHERE `id` = ?');
        $updateArticle->execute(array($title_saisi, $description_saisi, $id));
        header('Location: article.php');
        }
    }else{
        echo "Aucun Article not found";
    }

}else{
    echo "Aucun idintifiant not found";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="title" value="<?= $title;?>">
        <br>
        <textarea name="description"><?= $description;?></textarea>
        <br><br>
        <input type="submit" name="submit" value="Modifier">
    </form>
</body>
</html>