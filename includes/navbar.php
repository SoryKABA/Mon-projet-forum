<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span class="bg-dark rounded">Sory</span> KABA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/publish.php">Les publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/publications.php">Faire une publication</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/profilUser.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/mes_pubs.php">Mes publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/messagePrive.php">Mes messages privés</a>
        </li>
        <li>
          <a class="nav-link" href="../actions/UserAction/logoutAction.php">Déconnexion</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
            if (!empty($_SESSION['photo'])) { ?> <img src="../actions/images/<?= $_SESSION['photo']; ?>" alt="" style="width:35px; height:35px; border-radius:50%;">  Login<?php
              
            }else {
              ?>
                <i class="far fa-user" style="width:35px; height:35px;"></i> Login
              <?php
            }
          ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../views/signUp.php">S'inscrire</a></li>
            <li><a class="dropdown-item" href="../views/signIn.php">Connexion</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" method="POST">
        <input class="form-control me-1" type="search"  name="search" aria-label="Search" value="<?php if (!empty($search)) { echo $search;} ?>">
        <button type="submit" class="btn btn-secondary mr-1" name="validate"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>