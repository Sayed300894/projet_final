<?php 
include 'header.php';
?>
<main class="Form ps-5">
    <h1>Selection du personnage</h1>
    <form action="#" method="POST">
        <label class="fs-4" for="perso">Personnage :</label>
        <select name="perso" id="perso" onChange ="submit()">
            <option value="p1" <?php if(isset($_POST['perso']) && $_POST['perso'] === "p1") echo "selected"; ?>>Iron Man</option>
            <option value="p2" <?php if(isset($_POST['perso']) && $_POST['perso'] === "p2") echo "selected"; ?>>Agent Roumanoff</option>
            <option value="p3" <?php if(isset($_POST['perso']) && $_POST['perso'] === "p3") echo "selected"; ?>>Captain America</option>
        </select>
    </form>
    <?php
        $p1 = [
            "Nom" => "IronMan",
            "Age" => 53,
            "Sexe" => "Homme",
            "Force" => 5,
            "Agilite" =>4
        ];
        $p2 = [
            "Nom" => "Agent Roumanoff",
            "Age" => 49,
            "Sexe" => "Femme",
            "Force" => 3,
            "Agilite" =>6
        ];
        $p3 = [
            "Nom" => "Captain America",
            "Age" => 93,
            "Sexe" => "Homme",
            "Force" => 5,
            "Agilite" =>5
        ];
        function Affichage($perso){
            foreach( $perso as $index => $value){
                echo $index . ":  " . $value . "<br/>";
            }
        }

        if(!isset($_POST['perso'])|| $_POST['perso'] === 'p1'){
            echo "<h1>Personnage</h1>";
             Affichage($p1);
             echo "<img src='iron.png'>";
        } else if($_POST['perso'] === 'p2'){
            echo "<h1>Personnage</h1>";
            Affichage($p2);
            echo "<img src='roumanof.png'>";
        }else if($_POST['perso'] === 'p3'){
            echo "<h1>Personnage</h1>";
             Affichage($p3);
             echo "<img src='captain.png'>";
        }
    
    
    
    ?>
</main>

<?php
    include 'footer.php';
?>