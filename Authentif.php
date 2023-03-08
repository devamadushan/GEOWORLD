<?php require_once 'inc/connect-db.php' ;
require_once 'header.php'; 
?>
<form action="loginGeoworld.php" method="post">
Votre utilisateur : <input type="text" name="login"><br />
<br />
Votre mot de passe : <input type="password" name="pwd"><br />
<br />
<input type="submit" value="Connexion">
</form>
 <form action="Inscrip.php" methode="post">
<p>Pas encore inscrit ? Cliquez ici<input type="submit" value="Inscription"></p>
    </form>
    <?php
require_once 'javascripts.php';
require_once 'footer.php';
?>