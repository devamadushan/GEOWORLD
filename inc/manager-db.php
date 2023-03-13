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

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';


// Exemple d'une fonction sans paramètre, avec documentation technique PhpDoc  

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets de type StdClass représentant un Country 
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}



// Exemple d'une fonction paramétrée, avec documentation technique PhpDoc  

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Continent = :cont;';
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);

    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}

/**
 * Obtenir la liste de tous les continents
 *
 * @return array d'objets (des continents)
 */
function getNomContinents()
{
    global $pdo;
    $query = 'SELECT distinct Continent FROM country ORDER BY Continent;';
    try{
        $result = $pdo->query($query)->fetchall(PDO::FETCH_OBJ);
        return $result;
    } catch( Exception $e) {
         die("erreur dans la requete ".$e->getMessage());
    }
}

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $name le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCapital($name)
{
    global $pdo;
    $query = 'SELECT Name FROM  city WHERE id= :capital;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':capital', $name, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchALL();
}

function getLangueById($resultatPays){
    global $pdo;
    $query = 'SELECT language.Name FROM  language, countrylanguage, country WHERE country.id=countrylanguage.idCountry AND countrylanguage.idLanguage=language.id AND country.Name=:pays;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':pays', $resultatPays, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchALL();
}

/** 
 * Retourne le login et le password
 *
 * @param string $login 
 * 
 * @param string $pwd
 * 
 * @return array tableau d'utilisateur
 */
function getAuthentification($login,$pwd){
    global $pdo;
    $query = 'SELECT * FROM utilisateur WHERE login= :login and password= :pwd';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':login', $login);
    $prep->bindValue(':pwd', $pwd);
    $prep->execute();
    // on vérifie que la requête ne retourne qu'une seule ligne
    if($prep->rowCount() == 1) {
        $result = $prep->fetch();
        return $result;
    }
    else
    return false;
  
}
/** 
 * Retourne le login et le password
 *
 * @return array tableau d'utilisateur
 */
function listutilisateur()
{
    global $pdo;
    $query = 'SELECT * FROM utilisateur';
    try{
        $result = $pdo->query($query)->fetchall(PDO::FETCH_OBJ);
        return $result;
    } catch( Exception $e) {
         die("erreur dans la requete ".$e->getMessage());
    }
}
function getutilisateur($id)
{
    global $pdo;
    $requete = "SELECT * FROM utilisateur where id = :id";
    try{
        $prep = $pdo->prepare($requete);
        $prep->bindParam(':id', $id, PDO::PARAM_INT);
        $prep->execute();
        $result = $prep->fetch();
        return $result;
    }
    catch ( Exception $e ) {
        die ("erreur dans la requete ".$e->getMessage());
    }
}

function updategeoworld($id){
    global $pdo;
    $requete = "SELECT * FROM country where id = :id";
    try{
    $prep = $pdo->prepare($requete);
    $prep->bindParam(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    $result = $prep->fetch();
    return $result;
    }
    catch ( Exception $e ) {
    die ("erreur dans la requete ".$e->getMessage());
    }
   }


/**
 * TEST FONCTION
 */

 function saverequete($requete){
    global $pdo;
    $sql = " INSERT into requetes (Requete)
    values (:requete)";
try {
    //on prépare la requête avec les données reçues
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':requete', $requete, PDO::PARAM_STR);
    $statement->execute();
    //On renvoie vers la page Geoworld
}

catch(PDOException $e){
    echo 'Erreur : '.$e->getMessage();
}
   
 }

 function getsql(){
    global $pdo;
    $query = 'SELECT DISTINCT Requete FROM requetes';
    try{
        $result = $pdo->query($query)->fetchall(PDO::FETCH_OBJ);
        return $result;
    } catch( Exception $e) {
         die("erreur dans la requete ".$e->getMessage());
    }
 }
?>