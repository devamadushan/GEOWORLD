<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />  
    <title>Document</title>
    
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
<?php  
require_once 'header.php'; 
//session_start (); 

if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    echo "<p style=text-align:right;>Vous êtes : ".$_SESSION['login']."(".$_SESSION['role'].")";
}
?>

<div class="wrapper">
  <div class="content" style="background-color: #D0E3FA,;">
    <h1>꧁•⊹٭𝙱𝚒𝚎𝚗𝚟𝚎𝚗𝚞𝚎 𝚜𝚞𝚛 𝚗𝚘𝚝𝚛𝚎 𝚜𝚒𝚝𝚎٭⊹•꧂</h1>
    <p></p>
    <img class="image" src="images/LOGO-home.png" alt="Votre image" />
    
  </div>
</div>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>

<script src="..\Geoworld\assets\bootstrap-5.1.3-dist\js\cookiechoices.js"></script>
<script>document.addEventListener('DOMContentLoaded', function(event){cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.', 'J’accepte', 'En savoir plus', 'mentions.php');});</script>