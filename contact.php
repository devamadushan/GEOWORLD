<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" />
<title>Contact</title>
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
 *  Les fonctions permet de recuperer les données et de permettre 
 *  à l'utilisateur de contacter le service par mail
 */
require_once 'header.php'; ?>
<h1>Contact</h1>
<Label>Administrateur</label>
<ul>
<li>Adrien</li>
<li>AdrienGeoworld@gmail.com</li>
<li>06XXXXXXXX</li>
</ul>
<label>Professeurs</label>
<ul>
<li>Deva</li>
<li>DevaGeoworld@gmail.com</li>
<li>07XXXXXXXX</li>
</ul>
<ul>
<li>Steeven</li>
<li>SteevenGeoworld@gmail.com</li>
<li>07XXXXXXXX</li>
</ul>
<form method="post" action="mail.php">
        <label>Votre email</label><br>
        <input type="email" name="email" required><br>
        <label>Sujet</label><br>
        <input type="text" name="text" required><br>
        <label>Message</label><br>
        <!--textarea permet de saisir plusieurs ligne de texte-->
        <textarea rows="5" cols="30" name="message" required></textarea><br>
        <input type="submit" value="Envoyer">
    </form>
    <?php require_once 'javascripts.php'; require_once 'footer.php';
    ?>
</body>