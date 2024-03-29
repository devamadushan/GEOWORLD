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

 require_once'inc/manager-db.php';
 require_once'inc/connect-db.php';
 // on teste si nos variables sont définies et remplies
if (isset($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['login'])&& !empty($_POST['login'])) {
    // on appele la fonction getAuthentification en lui passant en paramètre le login et password
    // la fonction retourne les caractéristiques du salaries si il est connu sinon elle retourne false
    $result= getAuthentification($_POST['login'], $_POST['pwd']);
    //print_r($result);
    // si le résulat n'est pas false
    if ($result) {
        // on la démarre la session
        session_start();
            // on enregistre les paramètres de notre visiteur comme variables de session
                $_SESSION['login'] = $result->login;
                $_SESSION['role'] = $result->role;
                // on redirige notre visiteur vers une page de notre section membre
                header('location: index.php');
    } else { // si le résultat est false on redirige vers la page d'authentification
        header('location: Authentif.php');
    }
} else { //si nos variables ne sont pas renseignées on redirige vers la page d'authentification

    header('location: Authentif.php');
}
?> 