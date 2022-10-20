<?php
include 'header.php';
?>
<main class="Form ps-5">
    <h1>Affichage d'une pyramide</h1>
    <form action="exercice2.php" method="POST">
        <label for="pyramide" class="fs-3">Hauteur de la pyramide :</label>
        <input type="number" name="pyramide">
        <input type="submit" name="submit" value="click ici">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $pyramide = $_POST['pyramide'];
            if(empty($pyramide)){
               echo  "<h2 class='text-danger'>veuillez remplir le champ ci-dessous s'il vous plaît.</h2>";
            }else{
                echo "<h3>Pyramide de Heuteur: $pyramide</h3>";
                for($i=1; $i<=$pyramide; $i++){
                    for($j=1; $j<=$i; $j++){
                        echo "YY";
                    }
                    echo "<br>";
                }
                for($i=1; $i<=$pyramide; $i++){
                    for($j=$pyramide - $i; $j>=1; $j--){
                        echo "YY";
                    }
                    echo "<br>";
                }
            }
        }else{
            echo "<h2>Saisir une valeur dans le champ ci-dessus</h2>";
        }
    
    ?>
</main>


<?php
include 'footer.php';
?>
