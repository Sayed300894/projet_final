<?php
    session_start();
    if(isset($_POST['valider'])){
        if(!empty($_POST['pseudo']) && !empty(['password'])){
            $pseudo_par_defaut = "admin";
            $password_par_defaut = "admin1234";

            $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
            $password_saisi = htmlspecialchars($_POST['password']);

            if($pseudo_saisi == $pseudo_par_defaut AND $password_saisi == $password_par_defaut) {
                $_SESSION['password'] = $password_saisi;
                header("Location: index.php");
            }else{
                echo "Votre password ou pseudo est incorrect...";
            }
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
    <title>Espace de connexion Admin</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="pseudo">
        <br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>