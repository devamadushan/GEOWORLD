<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?><!doctype html>
<html lang="fr" class="h-100">
<head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application Geoworld">
    <title>Homepage : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <?php
      require_once 'inc/manager-db.php';
      $continents = getNomContinents();
      session_start();
      $test = "pooda";
    if(isset($_SESSION['role']))
    {
        $test= $_SESSION['role'];
    }
    ?>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
</head>


<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Geoworld</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
     data-bs-target="#navbarCollapse" aria-controls="navbarCollapse"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" 
          data-bs-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Continent</a>
             
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <?php foreach ($continents as $con) :?> 
            <a class="dropdown-item" href="continent.php?continent=<?php echo $con->Continent ?>">
                <?php echo $con->Continent ?></a>
          <?php endforeach; ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="requetesql.php">Requete SQL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="geomap.php">Geomap</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            Présentation
          </a>
        </li>
        <?php if($test=='admin') :?>
        <li class="nav-item">
          <a class="nav-link " href="utilisateurs.php">Utilisateurs</a>
        </li>
        <?php endif ?> 
        <?php if(isset($_SESSION['role'])!='admin'||isset ($_SESSION['role'])!='enseignant'||isset ($_SESSION['role'])!='eleve') :?>
        <li class="nav-item">
          <a class="nav-link " href="Authentif.php">
            Connexion
          </a>
          </li>
        <?php endif ?> 
        
        
        <?php if(isset($_SESSION['role'])) :?>
        <li class="nav-item">
          <a class="nav-link " href="LogoutGeoworld.php">Deconnexion</a>
        </li>
        <?php endif ?>  

        <?php if(isset($_SESSION['role'])!='admin'||isset ($_SESSION['role'])!='enseignant'||isset ($_SESSION['role'])!='eleve') :?>
        <li class="nav-item">
          <a class="nav-link " href="inscrip.php">
            Inscription
          </a>
        </li>
        <?php endif ?> 

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" 
        placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
