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
//on récupère et on vérifie les données reçues par le formulaire
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'] ;
}
    require_once 'header.php'; 
    require_once 'inc/manager-db.php';
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $naissance = $_GET['naissance'];
    $role = $_GET['role'];
echo $id;
//echo $role;
// on rédige la requête SQL
global $pdo;
$sql = "update utilisateur set
nom=:nom,prenom=:prenom,date_naissance=:naissance,role=:role
where id=:id";
try {
        //on prépare la requête avec les données reçues
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindParam(':naissance', $naissance, PDO::PARAM_STR);
        $statement->bindParam(':role', $role, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        //On renvoie vers la liste des salaries
        header("Location:utilisateurs.php");
}
catch(PDOException $e){
    echo 'Erreur : '.$e->getMessage();
}
?>
<p>les informations ont bien été modifié<p> <a href="utilisateurs.php"> Cliquez ici pour voir les autres utilisateurs</a>


