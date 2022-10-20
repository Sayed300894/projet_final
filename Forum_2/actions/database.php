<?php
try {
  
    $user = 'root';
    $pass = '';
    $bdd = new PDO('mysql:dbname=forum_2;host=localhost', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !:" . $e->getMessage() . "<br/>";
    die();
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
