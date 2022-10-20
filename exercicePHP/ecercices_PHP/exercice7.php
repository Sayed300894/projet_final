<?php 
include 'header.php';
?>
<main class="Form ps-5">
    <h1>Selection du personnage</h1>
    <form action="#" method="POST">
    <label for="perso">Personnage :</label><br>
      <select name="perso" id="perso" onChange = "submit()">
        <option value="p1" <?php if(isset($_POST['perso']) && $_POST['perso'] === "p1") echo "selected" ?>>Iron Man</option>
        <option value="p2" <?php if(isset($_POST['perso']) && $_POST['perso'] === "p2") echo "selected"?>>Agent Roumanoff</option>
        <option value="p3" <?php if(isset($_POST['perso']) && $_POST['perso'] === "p3") echo "selected"?>>Captain America</option>
    </select>
    </form>
       
    <?php
      $perso1 = ["Iron Man",53,true,5,4];
      $perso2 = ["Agent Roumanoff",49,false,3,6];
      $perso3 = ["Captain America",93,true,5,5];
     
     
      function AffichagePreso($personnage, $linkImg){
        echo " <div class ='container'>
                   <div class ='image'> <img src='$linkImg'></div>
                   <div> <h3>Nom :$personnage[0]</h3>
                       <h3>Age :$personnage[1].</h3>";
                       if($personnage[2]){
                      echo  "<h3>Sexe : Homme</h3>";
                     }else{
                      echo "<h3>sexe : Femme </h3>";
                       }
                     echo "<h3>Force :$personnage[3]</h3>
                          <h3>Agilité :$personnage[4]</h3>
                     </div>
                </div>";
      };


       
      if(!isset($_POST['perso'])||$_POST['perso'] === "p1"){  
         echo  "<h2>Personnage</h2>";
         AffichagePreso($perso1,'iron.png');
          
      }else if($_POST['perso'] === "p2"){
        echo        "<h2>Personnage</h2>";
        AffichagePreso($perso2,'roumanof.png');
      }else if($_POST['perso'] === "p3"){
        echo        "<h2>Personnage</h2>";
        AffichagePreso($perso3,'captain.png');
                  
      }
         
    ?>

</main>

<?php
    include 'footer.php';
?>