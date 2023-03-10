<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

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

<body>
<?php
      
global $pdo;
      $recherche = $pdo->query('SELECT * FROM country');
      if(isset($_GET['q']) AND !empty($_GET['q'])) {
        $q = htmlspecialchars($_GET['q']);
        $recherche = $pdo->query('SELECT * FROM country WHERE Name LIKE "'.$q.'%" ORDER BY id DESC');
      }
?>
<form class="BDR" method="GET">    
        <input class="RECHERCHE" type="search" name="q" placeholder="Recherche par pays..." />
        <input class="VALIDER" type="submit" value="valider" />
	  </form>
      
<table class="ta">
         <tr>
           <th>Pays</th>
           <th>Continent</th>
           <th>Region</th>
           <th>Population</th>
           <th>Life Expectancy</th>
           <th>Local Name</th>
           <th>Government Form</th>
           <th>Head Of State</th>
           </tr>
      <?php foreach($recherche as $b): ?>
            <tr>
        	<td><?php echo $b->Name ?></td>
            <td><?php echo $b->Continent ?></td>
            <td><?php echo $b->Region?></td>
            <td><?php echo $b->Population ?></td>
            <td><?php echo $b->LifeExpectancy ?></td>
            <td><?php echo $b->LocalName ?></td>
            <td><?php echo $b->GovernmentForm ?></td>
            <td><?php echo $b->HeadOfState ?></td>
      </tr>
        <?php endforeach ?>
        </table>
      


     
</body>
<?php  
      require_once 'javascripts.php';
      //require_once 'footer.php';
      ?>
</html>