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

require_once 'header.php'; 
require_once 'javascripts.php';
//require_once 'inc/connect-db.php';
require_once 'inc/manager-db.php';
//require_once 'updatepays.php';

//on récupère et on vérifie les données reçues par le formulaire
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = $_GET['id'] ;
}
    echo $id;
    // à faire sur chaque données reçues
    $code = $_GET['code'];
    $pays = $_GET['pays'];
    $continent = $_GET['continent'];
    $region = $_GET['region'];
    $surface = $_GET['surface'];
    $indep = $_GET['independance'];
    $population = $_GET['population'];
    $lifeexpectancy = $_GET['espererancevie'];
    $gnp = $_GET['pnb'];
    $gnpold = $_GET['gnpold'];
    $localname = $_GET['localname'];
    $gouvernement = $_GET['governmentname'];
    $headofstate = $_GET['headofstate'];
    $capital = $_GET['capital'];
    $code2 = $_GET['code2'];
    $code = $_GET['code'];
    // on rédige la requête SQL
    global $pdo;
    $sql = "update country set
    Code=:code,
    Name=:name,
    Continent=:continent,
    Region=:region,
    SurfaceArea=:surfacearea,
    IndepYear=:indepyear,
    Population=:population,
    LifeExpectancy=:lifeexpectancy,
    GNP=:gnp,
    GNPOld=:gnpold,
    LocalName=:localname,
    GovernmentForm=:governmentform,
    HeadOfState=:headofstate,
    Capital=:capital,
    Code2=:code2
    where id=:id";
    
try {
    //on prépare la requête avec les données reçues
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':name', $pays, PDO::PARAM_STR);
    $statement->bindParam(':continent', $continent, PDO::PARAM_STR);
    $statement->bindParam(':region', $region, PDO::PARAM_STR);
    $statement->bindParam(':surfacearea', $surface, PDO::PARAM_STR);
    $statement->bindParam(':indepyear', $indep, PDO::PARAM_STR);
    $statement->bindParam(':population', $population, PDO::PARAM_STR);
    $statement->bindParam(':lifeexpectancy', $lifeexpectancy, PDO::PARAM_STR);
    $statement->bindParam(':gnp', $gnp, PDO::PARAM_STR);
    $statement->bindParam(':gnpold', $gnpold, PDO::PARAM_STR);
    $statement->bindParam(':localname', $localname, PDO::PARAM_STR);
    $statement->bindParam(':governmentform', $gouvernement, PDO::PARAM_STR);
    $statement->bindParam(':headofstate', $headofstate, PDO::PARAM_STR);
    $statement->bindParam(':capital', $capital, PDO::PARAM_STR);
    $statement->bindParam(':code2', $code2, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    //On renvoie vers la liste des continents
     header("Location:continent.php");
}
catch(PDOException $e){
     echo 'Erreur : '.$e->getMessage();
}
?>