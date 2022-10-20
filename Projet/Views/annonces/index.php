<h1>Liste Des Annonces</h1>


<!-- <?=var_dump($annonces)?> -->
<?php foreach($annonces as $annonce) : ?>

    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h2 class="card-title"><a href ="annonces/lire/<?= $annonce->id ?>"><?=$annonce ['titre']?></a></h2>
    <p class="card-text"><?=$annonce ['description']?></p>
    <h3> <?=$annonce ['created_at']?></h3>

  </div>
</div>



   

<?php endforeach; ?>