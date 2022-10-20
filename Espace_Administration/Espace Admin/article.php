<?php
session_start();
$pdo = new Pdo('mysql:host=localhost; dbname=espace_admin;', 'root', '');
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
    <title>Afficher les Articles</title>
</head>
<body>
    <?php
    $roq = $pdo->query("select * from articles");
    while ($article = $roq->fetch()) { ?>
        <div class="article">
            <h1>
                <?= $article['title']; ?>
            </h1>
            <p><?= $article['description']; ?></p>
            <a href="supprimerA.php?id=<?=$article['id']; ?>"><button>Supprimer l'article</button></a>
            <a href="modifierA.php?id=<?=$article['id']; ?>"><button>Modifier l'article</button></a>
        </div>
        <hr>
   <?php }
    ?>
</body>
</html>