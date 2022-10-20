<?php
session_start();
$pdo = new Pdo('mysql:host=localhost; dbname=espace_admin;', 'root', '');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $userinfo = $pdo->prepare('SELECT * FROM membres WHERE id = ?');
    $userinfo->execute(array($id));

    if($userinfo->rowCount() > 0){
       
        $banUser = $pdo->prepare('DELETE FROM membres WHERE id = ?');
        $banUser->execute(array($id));

        header('Location: membres.php');
       
    }else{
        echo "Aucun membre n'a pas été trouvé";
    }
}else{
    echo "L'identifiant n'a pas été récupéré";
}
?>