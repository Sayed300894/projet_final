<?php
    // require_once 'mydb.php';

    $link = 'mysql:dbname=mydbcom;host=localhost';
  $pdo = new PDO( $link,'root',''); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

//  $sql = 'SELECT `idOrder` FROM `order`';
      $sql = " SELECT * FROM order  ";
    $req = $pdo->prepare($sql);
    $req-> execute();
    $user = $req->fetchAll();

// $req->execute();

var_dump( $user);
 session_start();

//  if(isset($_POST['submit'])){
//     if(!empty($_POST)){
//         $errors = array();
//         if(empty($_POST['numéro'])){
//             $errors['numéro'] = "Choisis un Numéro de commande";
//         }else{
//             $req = $pdo->prepare('SELECT `idOrder` FROM `order`');
//             $req->execute();
//             $datas = $req->fetchAll();
//             var_dump($datas);

//         }
//      }
//  }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Exercices SQL_PHP</title>
    </head>
    <body>
        <h1>Table De Commande</h1>
        <div class="contenair">
            <form action="index.php" method="POST">
                <label for="num">Entrer un numéro de commande</label>
                <input type="number" name="numéro">
                <input type="submit" name="submit" value="valider">
            </form>
        </div>
        <div class="Facture">
            <form action="index.php" method="POST">
                <p class="num">Facture N°</p>
                <p class="nom-client">Nom DE Client</p>
                <p class="details-commande"></p>
                <p class="prix-ht"></p>
            </form>
        </div>
    </body>
</html>
<?php header("loction: test.php"); ?>