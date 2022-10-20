<?php
session_start();
$pdo = new Pdo('mysql:host=localhost; dbname=espace_admin;', 'root', '');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM `articles` WHERE `id`= ?");
    $sql->execute(array($id));
    if($sql->rowCount() > 0) {
    $deleteA = $pdo->prepare('DELETE FROM articles WHERE id=?');
    $deleteA->execute(array($id));

    header('Location: article.php');
    }else{
        echo "Aucun idintifiant not found";
    }
}else{
    echo "Aucun Article not found";
}
?>