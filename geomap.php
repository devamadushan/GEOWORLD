<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" />
<title>Geoworld map</title>
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
require_once 'header.php'; ?>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39580568.04352189!2d-46.20627410405639!3d40.21943060496097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5fa5c2ec84e09%3A0x72e3aa8ae6ba4a03!2sLyc%C3%A9e%20L%C3%A9onard%20de%20Vinci!5e1!3m2!1sfr!2sfr!4v1677256009424!5m2!1sfr!2sfr" width="1518" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                              
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>