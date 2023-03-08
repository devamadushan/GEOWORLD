<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.csS" />
    <title>Document</title>
</head>
<body>
<?php  
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2023 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Fonction qui permet dafficher une map via Google
 * */
require_once 'header.php'; 
require_once 'inc/connect-db.php';
require_once 'inc/manager-db.php';
?>


<?php
      
global $pdo;
      $recherche = $pdo->query('SELECT * FROM country');
      if(isset($_GET['q']) AND !empty($_GET['q'])) {
        $q = htmlspecialchars($_GET['q']);
        $recherche = $pdo->query('SELECT * FROM country WHERE Name LIKE "'.$q.'%" ORDER BY id DESC');
      }
?>

      <form method="GET">    
        <input type="search" name="q" placeholder="Recherche par capital" />
        <input type="submit" value="valider" />
	  </form>

	<table class="table">
         <tr>
           <th>Name</th>
           <th>Code</th>
           <th>Continent</th>
           <th>Region</th>
           <th>Name</th>
           <th>Surface Area</th>
           <th>Independance Year</th>
           <th>Population</th>
           <th>Life Expectancy</th>
           <th>GPN</th>
           <th>GPN Old</th>
           <th>Local Name</th>
           <th>Government Form</th>
           <th>Head Of State</th>
           <th>Capital</th>
           <th>Code2</th>
           </tr>

      <?php foreach($recherche as $b): ?>
        <table class="table">
            <tr>
        	<th><?php echo $b->Name ?></th>
            <th><?php echo $b->Code ?></th>
            <th><?php echo $b->Continent ?></th>
            <th><?php echo $b->Region?></th>
            <th><?php echo $b->SurfaceArea ?></th>
            <th><?php echo $b->IndepYear?></th>
            <th><?php echo $b->Population ?></th>
            <th><?php echo $b->LifeExpectancy ?></th>
            <th><?php echo $b->GNP ?></th>
            <th><?php echo $b->GNPOld?></th>
            <th><?php echo $b->LocalName ?></th>
            <th><?php echo $b->GovernmentForm ?></th>
            <th><?php echo $b->HeadOfState ?></th>
            <th><?php echo $b->Capital ?></th>
            <th><?php echo $b->Code2 ?></th>
      </tr>
      </table>
        <?php endforeach ?>
      


      <?php  
      require_once 'javascripts.php';
      require_once 'footer.php';
      ?>
</body>
</html>