<?php
session_start();
if(!$_SESSION['password']){
    header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="membres.php">Afficher tous les membres</a>
    <a href="publierArticle.php">Publier un Article</a>
    <a href="article.php">Afficher tous les Articles</a>
</body>
</html>