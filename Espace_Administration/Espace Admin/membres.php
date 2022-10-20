<?php
session_start();
try {
    $user = 'root';
    $pass = '';
    $pdo = new PDO('mysql:dbname=espace_admin;host=localhost', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !:" . $e->getMessage() . "<br/>";
    die();
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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
    <title>Afficher les membres</title>
</head>
<body>
    <?php 
        $recupUsers = $pdo->prepare('SELECT * FROM membres');
        $recupUsers->execute();
        while($user = $recupUsers->fetch()){ ?>
           <p><?= $user['pseudo'];?> <a href="bannir.php?id=<?= $user['id']; ?>" style="color:red;" >Bannir le membre</a></p>
     <?php   }
    ?>
</body>
</html>