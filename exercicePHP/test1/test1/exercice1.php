<?php
include 'test/header.php';
?>

<main class="Form">
        <h1>Affichage des tables de multiplication</h1>
        <form action="exercice1.php" method="GET">
            <label for="table">Table de Multiplication</label><br>
            <input type="number" name="number"><br>
            <button type="submit" name="submit">Envoyer</button>
        </form>

<?php
    if(isset($_GET['submit'])){
        $number = $_GET['number'];
        if(empty($number)){
            echo "<p> Saisir une valeur dans le champ ci-dessus</p>";
        } else{
            for($i=1; $i<11; $i++){
                 $result = $i * $number;
                echo "<div>$i * $number = $result";
            }
        }
    }
    
?>
</main>

<?php
include 'test/footer.php';

?>