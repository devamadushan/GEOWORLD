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
<?php  require_once 'header.php'; 
//session_start ();
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
  echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['login']."(".$_SESSION['role'].")";
  echo '<br><a href="logoutGeoworld.php">Deconnexion</a></p>';
  }
?>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
<script src="..\Projet Geoworld\assets\bootstrap-5.1.3-dist\js\cookiechoices.js"></script>
<script>document.addEventListener('DOMContentLoaded', function(event){cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.', 'J’accepte', 'En savoir plus', 'mentions.php');});</script>