<?php
require('actions/database.php');

$getAllanswers = $bdd->prepare('SELECT id_author, pseudo_author, id_question, content FROM answers WHERE id_question = ? ORDER By id DESC');
$getAllanswers->execute(array($idOquestion));