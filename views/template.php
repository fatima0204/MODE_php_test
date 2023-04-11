<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Books & Co.</title>
</head>
<body>
<div class="navbar1">
       <nav class="navbar navbar-expand-lg bg-white">
  <div class="container-fluid">
    <img id="logo" src="public/images/nvxlogo.png" alt="logo"/>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=accueil">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=conseils">Conseils</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Informations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Contact</a>
        </li>
      
      
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="buttvue" class="btn btn-outline-success" type="submit">Recherche</button>
      </form>
    </div>
  </div>
</nav>
    </div>
<div class="container">
    <h1 class="titre"><?php echo $titre?></h1>
    <?php echo $content ?> 
</div>   

    
    <div id="footer">
       <p>Books & Co. est une entreprise fondée en 2022</p>
              <br>
              <p>Copyright&copy;</p>
              <p>Mentions légales</p>
              <img class="icone" src="public/images/iconefacebook.png">
              <img class="icone" src="public/images/iconeinsta.webp">
              <img class="icone" src="public/images/iconetwitter.png">
      </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="./Bootstrap-vue/js/bootstrap.js"></script>
</body>
</html>