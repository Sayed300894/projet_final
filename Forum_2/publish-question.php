<?php
 require('actions/users/securityAction.php');
 require('actions/question/publishQuestionAction.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
    <body>
    <?php include 'includes/navbar.php'; ?>
            <br> <br>
            <form class="container" method="POST">
                <?php 
                if(isset($errorMsg)){ 
                    echo "<p>".$errorMsg."</p>";
                }elseif(isset($successMsg)){
                    echo "<p>".$successMsg."</p>";
                }
                 ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description de la question</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu de la question</label>
                    <textarea type="text" class="form-control" name="content"></textarea>
                </div>
                    <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
                    <br/> <br/>
            </form>
    </body>
</html>