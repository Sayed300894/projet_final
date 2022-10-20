<?php
session_start();
require('actions/question/showArticle.php');
require('actions/question/postAnswer.php');
require('actions/question/showAofQ.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>
<br><br>
    <div class="container">
    
       <?php 
       if(isset($errorMsg)){
        echo $errorMsg;
       }
       if(isset($q_date)){ ?>
       <section class="show-content">
            <h3><?= $q_title; ?></h3>
            <hr>
            <p><?= $q_content;?></p>
            <hr>
            <small><?= '<a href="profile.php?id='.$q_author.'">'.$q_pseudo_author .'</a> '. $q_date;?></small>
        </section>
        <br>
       <section class="show-answer">
            <form class="form-group" method="POST">
            <div class="mb-3">
                <label  class="form-label">Réponse:</label>
                <textarea name="answer" class="form-control"></textarea>
                <br>
                <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
            </div>
            </form>

            <?php 
                while($answer = $getAllanswers->fetch()){ ?>
                    <div class="card">
                        <div class="card-header">
                          <a href="profile.php?id=<?= $answer['id_author'];?>">  <?= $answer['pseudo_author']; ?></a>
                        </div>
                        <div class="card-body">
                            <?= $answer['content']; ?>
                        </div>
                    </div>  
                    <br>      
            <?php }
            ?>
       </section>

      <?php } ?>
    </div>

</body>
</html>