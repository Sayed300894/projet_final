<?php
include 'test/header.php';
?>

<main class="Form">
        <h1>Calculer une moyenne</h1>
        <form action="exercice5.php" method="POST">
            <label for="">Combien de notes : </label>
            <input type="number" name="number"><br>
            <input type="submit" value="Valider" name="submit">
        </form>
        <?php

        if (isset($_POST['submit'])) {
            $num = $_POST['number'];
            if (empty($num) ||  $num <= 0) {
                echo "<p>Saisir une valeur dans le champ ci-dessus</p>";
            } else {
                $i = 1;
                echo " <h5>Moyenne :</h5>";
                echo "<form action='exercice5.php' method='GET'>";
                while ($i <= $num) {
                    echo "<label for=''>Note$i: </label>
                    <input type='number' name='nums[]' required><br>";
                    $i++;
                }
                echo " <input type='submit' value='Calculer' name='calcule'>";
                echo "</form>";
            }
        } else if (!isset($_POST['submit']) && !isset($_GET['calcule'])) {
            echo "<p>Saisir une valeur dans le champ ci-dessus</p>";
        }
        if (isset($_GET['calcule'])) {
            $key = array_keys($_GET);

            $val = array_values($_GET);
            $i = 1;
            echo " <h5>Moyenne :</h5>";
            echo "<form action='exo5.php' method='GET'>";
            while ($i <= count($val[0])) {
                echo "<label for=''>Note$i: </label>;
                    <input type='number' name='nums[]' required><br>";
                $i++;
            }
            echo " <input type='submit' value='Calculer' name='calcule'>";
            echo "</form>";

            $total = 0;
            for ($i = 0; $i < count($val[0]); $i++) {
                $total += $val[0][$i];
            }
            $moyanne = $total / count($val[0]);

            echo "<span> La moyenne est : $moyanne</span>";
        }

        ?>
</main>
<?php
include 'test/footer.php';

?>