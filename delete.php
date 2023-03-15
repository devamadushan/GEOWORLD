<doctype html>
<header>
<meta charset="utf-8">
<title>Supprimer</title>
</header>
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
 *  Fonction qui permet de supprimer un utilisateur
 */
require_once 'header.php'; 
require_once 'inc/manager-db.php';;

$id = $_GET['id'];
$query = "DELETE FROM utilisateur WHERE id = :id";
$toto =$pdo->prepare($query);
$toto->bindParam(':id', $id, PDO::PARAM_INT);
$toto->execute();
?>

<p>L'utilisateur a bien été supprimer<p> <a href="utilisateurs.php"> Cliquez ici pour voir les autres utilisateurs</a>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
</body>
