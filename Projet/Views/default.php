<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Titre</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Projet/Public/annonces">Mes Annonces</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/Projet/Public/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Projet/Public/annonces">Liste des annonces</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="/Projet/Public/users/profil/<?=$_SESSION['user']['id']?>">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Projet/Public/users/logout">Déconnexion</a>
              </li>
          <?php else: ?>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/Projet/Public/users/login">Connexion</a>
                <a class="nav-link " aria-current="page" href="/Projet/Public/users/register">S'inscrire</a>
              </li>
          <?php endif;?>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<?php if (isset($_SESSION['flash'])) : ?>
        <?php foreach ($_SESSION['flash'] as $key => $value) : ?>

          <?php if ($key == 'success') : ?>
            <div class="success">
              <i class="fas fa-check-circle"></i> <?= $value ?>
            </div>
          <?php else : ?>
            <div class="erreur">
              <i class="fas fa-exclamation-circle"></i><?= $value ?>
            </div>
          <?php endif ?>
          <?php unset($_SESSION['flash']) ?>
        <?php endforeach ?>

      <?php endif ?>
  <?= $contenu ?>
</div>

<script str = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>