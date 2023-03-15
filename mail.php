<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" />
<title>Mail envoyé</title>
</head>

<body>
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
    $retour = mail('geoworldSIO12@gmail.com', 'Envoi depuis la page Contact', $_POST['text'], $_POST['message'], 'De : Contact Geoworld');
    if ($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
    ?>
<a href="index.php">Cliquez ici pour revenir à la page d'accueil</a>
</body>
</html>