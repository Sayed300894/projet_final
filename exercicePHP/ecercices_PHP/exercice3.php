<?php
    include 'header.php';
?>
<main class="Form ps-5 pb-5">
    <h1>Cercle - Périmètre et Aire</h1>
    <form action="exercice3.php" method="POST">
        <label for="Cercle">Rayon :</label>
        <input type="number" name="rayon"><br>

        <label for="perimetre">Perimetre :</label>
        <input type="hidden" name="perimetre">
        <input type="checkbox" name="check1" value="checkbox" checked><br>

        <label for="aire">Aire :</label>
        <input type="hidden" name="aire">
        <input type="checkbox" name="check2" value="checkbox" checked><br>

        <input class="bg-info text-light" type="submit" name="submit" value="valider">
    </form>


    <?php
        if(isset($_POST["submit"])){
            $rayon = intval($_POST['rayon']);
            var_dump($rayon);
            if(empty($rayon)){
                echo "<h2>veuillez remplir le champ ci-dessous s'il vous plaît.</h2>";
            }elseif(!isset($_POST['check1']) && !isset($_POST['check2'])){
                echo "<h3>Saisir select checkbox</h3>";
            }elseif($rayon==0 && !isset($_POST['check1']) && !isset($_POST['check2'])){
                echo "<h2>Saisir une valeur dans le champ ci-dessus et saisir select un chois</h2>";
            }else{
                $perimetre = $rayon * 2 * pi();
                $aire = $rayon * $rayon * pi();

                echo "<h4>Resultats</h4>";

                if(isset($_POST['check1'])){
                  echo  "<h3 class='text-danger'>Le périmetre d'un cercle de rayon : $rayon est $perimetre </h3>" . "<br>";
                }
                if(isset($_POST['check2'])){
                  echo  "<h3 class='text-danger'>L'Aire d'un cercle de rayon : $rayon est $aire </h3>" . "<br>";
                }
            }
        }

    
    ?>

</main>

<?php
    include 'footer.php';
?>