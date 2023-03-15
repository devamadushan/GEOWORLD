<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
    <title>Formulaire Geoworld</title>
</head>
<body>
    
<?php
/**
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
 *  Les fonctions permet de recuperer les données via un formulaire et de permettre 
 *  à de renvoyer les données sur la page GeoworldTraitement
 */
require_once 'inc/connect-db.php';
require_once 'inc/manager-db.php';
require_once 'header.php'; 
?>
<form action="GeoworldTraitement.php" class="traite" method="post">
<h1>Inscription</h1>

<label for="utilisateur">Utilisateur : </label>
<input type="text" id="utilisateur" name="login" required>

<label for="pwd">Mot de passe : </label> 
<input type="password" id="password" name="pwd" required>

<label for="Nom">Nom : </label>
<input type="text" id="nom" name="nom" required>

<label for="prenom">Prenom : </label>
<input type="text" id="prenom" name="prenom" required></p>

<label for="calendrier">Date de naissance : </label>
      <input type="date" name="calendrier" required></p>

<input type="submit" id="sub" value="S'inscrire">
   
</form>
</body>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
</html>