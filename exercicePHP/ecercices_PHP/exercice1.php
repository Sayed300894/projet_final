<?php 
include 'header.php';
?>

<main class="Form ps-5">
    <h1>Affichage des tables de multiplication</h1>
    <form action="exercice1.php" method="GET">
        <label for="table" class="fs-3">Tables de multiplication</label>
        <input type="number" name="number" id="number">
        <input type="submit" name="submit" value="valider">
    </form>

    <?php
    if(isset($_GET['submit'])){
        $table = $_GET['number'];
        if(empty($table)){
            echo "<h2>veuillez remplir le champ ci-dessous s'il vous plaît.</h2>";
        }else{
            for($j=1; $j<=10; $j++){
                $resultat = $j *$table;
                echo "<h3> $j * $table = $resultat</h3>";
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