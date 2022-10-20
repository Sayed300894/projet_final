<?php
include 'test/header.php';
?>

<main class="Form">
        <h1>Trouver le nombre choisi par l'ordinateur</h1>
        <form action="#" method="POST">
        <input type="hidden" name="reinit" value="yes">
        <input type="submit" value="Reinitialiser" name="reset">
        </form>
        <form action="#" method="POST">
        <label for="chiffre">Quel est le chiffre : </label>
        <input type="number" name="chiffre" id="chiffre"><br/>
        <input type="submit" value="Valider" name="submit">
        </form>
<?php
  
  if (isset($_POST['reset'])) {
        if (isset($_SESSION['guess'])) {
            unset($_SESSION['guess']);
        }
    }
    if (isset($_POST['submit'])) {

        $num = $_POST['chiffre'];
        if (empty($num) || $num <= 0) {
            echo "<p>Saisir une valeur dans le champ ci-dessus</p>";
        } else {
            $_SESSION['guess'] = rand(1, 10);
            $guess =  $_SESSION['guess'];
            if ($num > $guess) {
                echo "<p>Le chiffre est plus grand</p>";
            } else if ($num < $guess) {
                echo "<p>Le chiffre est plus petit</p>";
            } else if ($num == $guess) {
                echo "<p>Le chiffre est true</p>";
            }
        }
    }
?>
</main>

<?php
include 'test/footer.php';

?>