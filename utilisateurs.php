<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />

<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?>

<div class="back"> 
<?php  

require_once 'header.php'; 
if ($_SESSION['role']=='admin') :
    ?>
    <?php include_once 'inc/manager-db.php';
    $utilisateurs= listutilisateur();
    //print_r($utilisateurs);
    ?>

<h3 class="utilisateur" >Les Utilisateurs :</h3>

<table border=2 style="position:absolute; left:80px; top:114px">
  <tr><th>id</th><th>nom</th><th>prenom</th><th>date-naissance</th>
  <th>Role</th><th>Supprimer</th><th>Editer</th></tr>
    <?php foreach ($utilisateurs as $personne): ?>
  <tr>
        <?php if ($personne->role=='admin' || $personne->role=='enseignant' || $personne->role=='eleve') : ?>
    <td><?php echo $personne -> id ?></td>
    <td><?php echo $personne -> nom ?></td>
    <td><?php echo $personne -> prenom ?></td>
    <td><?php echo $personne -> date_naissance ?></td>
    <td><?php echo $personne -> role ?></td>
    <td><a href="delete.php?id=<?php echo $personne ->id ?>">Supprimer</a></td>
    <td><a href="update.php?id=<?php echo $personne ->id ?>">Editer</a></td> 
  </tr>
        <?php endif; ?>
    <?php endforeach; ?>

  </table>
  <h3  class="utilisateur2" >Les Utilisateurs en attente :</h3>

  <table border=2 style="position:absolute; left:700px; top:115px">
  <tr><th>id</th><th>nom</th><th>prenom</th><th>date-naissance</th>
  <th>Role</th><th>Supprimer</th><th>Editer</th></tr>

    <?php foreach ($utilisateurs as $personne): ?>
  <tr>
        <?php  if ($personne->role=='visiteur') : ?>
    <td><?php echo $personne -> id ?></td>
    <td><?php echo $personne -> nom ?></td>
    <td><?php echo $personne -> prenom ?></td>
    <td><?php echo $personne -> date_naissance ?></td>
    <td><?php echo $personne -> role ?></td>
    <td><a href="delete.php?id=<?php echo $personne ->id ?>">Supprimer</a></td>
    <td><a href="update.php?id=<?php echo $personne ->id ?>">Editer</a></td> 
  </tr>
  
        <?php endif; ?>
    <?php endforeach; ?>
  </table>
    </div>

    <?php
    include_once 'javascripts.php';
endif;
?>
