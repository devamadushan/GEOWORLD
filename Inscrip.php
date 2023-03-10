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
 *  Les fonctions permet de recuperer les données via un formulaire et de permettre 
 *  à de renvoyer les données sur la page GeoworldTraitement
 */
require_once 'inc/connect-db.php';
require_once 'inc/manager-db.php';
require_once 'header.php'; 
?>
<form action="GeoworldTraitement.php" method="post">
<h1>Inscription</h1>

<p>Utilisateur <input type="text" name="login"></p>

<p>Mot de passe <input type="password" name="pwd"></p>

<p>Nom <input type="text"  name="nom" required></p>

<p>Prenom <input type="text" name="prenom" required></p>

<p>Date de naissance
      <input type="date" name="calendrier" required></p>

<input type="submit" value="S'inscrire">
   
</form>
</body>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
</html>