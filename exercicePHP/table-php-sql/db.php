<?php
//  $pdo = new PDO('mysql:dbname=mydbcom;host:localhost','root','');
/*  try{
    $pdo = new PDO('mysql:host=localhost;dbname=mydbcom','root',''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
   }catch (PDOException $e) {
                die($e->getMessage());
            }
  

//  $sql = 'SELECT `idOrder` FROM `order`';
// $id = $_POST['numéro'];

die(); */
$pdo = new PDO('mysql:host=mysql-admin-sayed.alwaysdata.net;dbname=admin-sayed_membre','274957','123654Sayed!!'); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);