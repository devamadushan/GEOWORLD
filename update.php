<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" />
<title>Update utilisateur</title>
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
require_once 'header.php'; 
require_once 'inc/manager-db.php';
$id = $_GET['id'];
$utilisateur = getutilisateur($id);
/*print_r($utilisateur);*/
?>
<form action="updateutilisateurs.php" method="get" >
<fieldset>
<legend> <i>Utilisateur</i></legend>
Nom :
<input type="text" name="nom" required value="<?php echo $utilisateur->nom; ?>" /> <br />
Prénom :
<input type="text" name="prenom" required value="<?php echo $utilisateur->prenom; ?>" /> <br />
Date de naissance :
<input type="date" name="naissance" value="<?php echo $utilisateur->date_naissance; ?>"/> <br />
Role :
<select name="role">
<option value="<?php echo $utilisateur->role; ?>"><?php echo $utilisateur->role; ?></option>
 <option value="enseignant">Enseignant</option>
 <option value="eleve">Eleve</option>
 <option value="visiteur">Visiteur</option>
 </select>
<input type="hidden" name="id" value="<?php echo $utilisateur->id ?> ">
<fieldset>
<input type="submit" value="mettre à jour" />
<input type="reset" value="Effacer" />

</form>



<?php

//require_once 'javascripts.php';
//require_once 'footer.php';
?>
</html>