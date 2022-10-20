<?php
require('actions/database.php');

$getMyQuestions = $bdd->prepare('SELECT idquestions, title, `description` FROM questions WHERE users_idusers = ? order by idquestions desc');
$getMyQuestions->execute(array($_SESSION['id']));