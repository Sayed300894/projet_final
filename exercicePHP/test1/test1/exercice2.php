<?php
include 'test/header.php';
?>



<main class="Form">
        <p>Affichage d'une pyramide </p>
        <form action="exercice2.php" method="POST">
            <label for="">Hauteur de la pyramide :</label>
            <input type="number" name="number">
            <button type="submit" name="submit">Envoyer</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {

            $num = $_POST['number'];
            if (empty($num)) {
                echo " <p>Saisir une valeur dans le champ ci-dessus</p>";
            } else {
                echo "<p>Pyramide de hauteur: $num</p>";
                for ($i = 1; $i <= $num; $i++) {

                    for ($j = 1; $j <= $i; $j++) {

                        echo "yy";
                    }
                    echo "<br/>";
                }
                for ($i = 1; $i <= $num; $i++) {
                    for ($j = $num - $i; $j >= 1; $j--) {
                        echo "yy";
                    }
                    echo "<br>";
                }
            }
        }
        ?>
</main>

<?php
include 'test/footer.php';

?>