<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" />
	<title>Mail envoyer</title>
</head>

<body>
    <?php
    $retour = mail('geoworldSIO12@gmail.com', 'Envoi depuis la page Contact', $_POST['text'], $_POST['message'], 'De : Contact Geoworld');
    if ($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
    ?>
<a href="index.php">Cliquez ici pour revenir à la page d'accueil</a>
</body>
</html>