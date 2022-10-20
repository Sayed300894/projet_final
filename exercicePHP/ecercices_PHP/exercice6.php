<?php 
include 'header.php';
?>
<main class="Form ps-5">
    <h1>Tableaux</h1>
    <h2>Etape 1</h2>
    <p>Réaliser un tableau contenant les valeurs : 2,6,12,5,26,34,40,60</p>
    <h2>Etape 2</h2>
    <p>Réaliser une fonction qui vérifie si un tableau ne contient que des valeurs paires ou non</p>
    <h2>Etape 3</h2>
    <p>Afficher un message pour l'indiquer à l'utilisateur</p>
    <h2>Résultat :</h2>
    <p>Le tableau contient des valeurs impaires</p>
   
    <?php
        $tableau = [2,6,12,5,26,34,40,60];

        function table($table){
            for($i=0 ; $i< count($table)-1; $i++){
               if($table[$i]% 2 !== 0){
                 return false;
               };
                
            } 
            return true;
        };
         echo "<h1>Résultat :</h1>";
           if(table($tableau)){
          echo  "Le tableau contient des valeurs paires";
         }else{
            echo "Le tableau contient des valeurs impaires";
         }
    ?>

</main>


<?php
    include 'footer.php';
?>