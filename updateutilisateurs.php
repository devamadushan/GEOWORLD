<?php 
//require_once 'update.php';
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_GET['id']) && !empty($_GET['id'])){
$id = $_GET['id'] ;
}
require_once 'header.php'; 
require_once 'inc/manager-db.php';
// à faire sur chaque donnée reçue
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


