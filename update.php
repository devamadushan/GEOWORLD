<doctype html>
<header>
<meta charset="utf-8">
<title>Editer</title>
</header>
<body>
<?php
require_once 'header.php'; 
require_once 'inc/manager-db.php';
$id = $_GET['id'];
$utilisateur = getutilisateur($id);
print_r($utilisateur);
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