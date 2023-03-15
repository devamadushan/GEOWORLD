<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<?php  
/**
 * Requete SQL
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
require_once 'inc/connect-db.php';
if ($test=='enseignant' || $test=='admin' ) :
    ?>

<h1 style="text-align:center;">Requêtes SQL</h1>
   <div class="options" >
 <select id="selectOption1" class="option">
  <option value="">Sélectionnez une option</option>
  <option value="Option 1.1">SELECT</option>
 <option value="Option 1.3">INSERT</option>
 <option value="Option 1.4">UPDATE</option>
  <option value="Option 1.5">DELETE</option>
 </select>
  <label for="Options"></label>
 <select id="selectOption2" name="tables" class="option" >
  <option value="">*</option>
  <option value="Option 2.1">id</option>
  <option value="Option 2.16">Code</option>
 <option value="Option 2.2">Name</option>
 <option value="Option 2.3">Continent</option>
 <option value="Option 2.5">Region</option>
    <option value="Option 2.6">SurfaceArea</option>
   <option value="Option 2.7">IndepYear</option>
 <option value="Option 2.8">Population</option>
    <option value="Option 2.9">LifeExpectancy</option>
    <option value="Option 2.10">GNP</option>
 <option value="Option 2.11">GNPOLD</option>
    <option value="Option 2.12">LocalName</option>
    <option value="Option 2.13">GovernmentForm</option>
 <option value="Option 2.14">HeadOFState</option>
    <option value="Option 2.15">Capital</option>
    <option value="Option 2.16">Code2</option>
 </select>

  <label for="Options"></label>
 <select id="selectOption5" name="tables" class="option" >
  <option value=""></option>
  <option value="Option 5.1">,id</option>
  <option value="Option 5.16">,Code</option>
 <option value="Option 5.2">,Name</option>
 <option value="Option 5.3">,Continent</option>
 <option value="Option 5.5">,Region</option>
    <option value="Option 5.6">,SurfaceArea</option>
    <option value="Option 5.7">,IndepYear</option>
 <option value="Option 5.8">,Population</option>
    <option value="Option 5.9">,LifeExpectancy</option>
    <option value="Option 5.10">,GNP</option>
 <option value="Option 5.11">,GNPOLD</option>
    <option value="Option 5.12">,LocalName</option>
    <option value="Option 5.13">,GovernmentForm</option>
 <option value="Option 5.14">,HeadOFState</option>
    <option value="Option 5.15">,Capital</option>
    <option value="Option 5.16">,Code2</option>
 </select>
  <label for="Options"></label>
 <select id="selectOption3" name="tables" class="option ">
  <option value="Option 3.1">From country</option>
  </select>

  <select id="selectOption4" name="tables" class="option ">
  <label for="Options"></label>
  <option value="Option 4.1">;</option>
  <option value="Option 4.2">where id = </option>
  <option value="Option 2.16">where Code = " "</option>
<option value="Option 2.2">where Name = " "</option>
 <option value="Option 2.3">where Continent = " "</option>
 <option value="Option 2.5">where Region = " "</option>
    <option value="Option 2.6">where SurfaceArea =</option>
    <option value="Option 2.7">where IndepYear =</option>
 <option value="Option 2.8">where Population =</option>
    <option value="Option 2.9">where LifeExpectancy =</option>
    <option value="Option 2.10">where GNP =</option>
<option value="Option 2.11">where GNPOLD = </option>
    <option value="Option 2.12">where LocalName = " "</option>
    <option value="Option 2.13">where GovernmentForm = " "</option>
 <option value="Option 2.14">where HeadOFState = " "</option>
    <option value="Option 2.15">where Capital =</option>
    <option value="Option 2.16">where Code2 = " "</option>
  </select>
</div>
    <form class="RE" method="GET">    
       <input class="REQUETE" type="search" name="q"
        id="inputField" placeholder="Tapter votre requete.." /> <br>
       <input class="EX" type="submit" value="EXECUTER" />
      </form>
<script>
 // récupérer les références des éléments select et de 
 //l'élément input
 var select1 = document.getElementById("selectOption1");
 var select2 = document.getElementById("selectOption2");
 var select5  = document.getElementById("selectOption5");
 var select3 = document.getElementById("selectOption3");
 var select4 = document.getElementById("selectOption4");
 var inputField = document.getElementById("inputField");

 // ajouter un écouteur d'événement pour détecter 
 //le changement de sélection pour chacune des listes déroulantes
 select1.addEventListener("change", updateInputField);
 select2.addEventListener("change", updateInputField);
 select5.addEventListener("change", updateInputField);
 select3.addEventListener("change", updateInputField);
 select4.addEventListener("change", updateInputField);
    

 // fonction pour mettre à jour le champ de saisie avec 
 //les valeurs sélectionnées dans les trois listes déroulantes
 function updateInputField() {
 var option1 = select1.options[select1.selectedIndex].text;
 var option2 = select2.options[select2.selectedIndex].text;
 var option5 = select5.options[select5.selectedIndex].text;
 var option3 = select3.options[select3.selectedIndex].text;
 var option4 = select4.options[select4.selectedIndex].text;
 inputField.value = option1 + " " +option2+ " " +option5+ " " +option3+ " " +option4;
 }
 </script>
    
      <?php
      
        global $pdo;
            //$recherche = $pdo->query('SELECT * FROM country');
        if (isset($_GET['q']) AND !empty($_GET['q'])) {
              $q = ($_GET['q']);
              $recherche = $pdo->query($q);
              //print_r($recherche);
              echo $q;
             //print_r($recherche);
        } else {
            $recherche = $pdo->query("SELECT Capital FROM country");
            $q='en attente de votre requete..';
          
            echo $q;
            //echo $recherche;
        }
          
             $all="*";
             $id="id";
             //$id2=",id";
            $code="Code";
            $name="Name";
            $Continent="Continent";
            $rejion="Region";
            $surfacearea="SurfaceArea";
            $indepyear="IndepYear";
            $population="Population";
            $lifeexpectancy="LifeExpectancy";
            $gnp="GNP";
            $gnpold="GNPOld";
            $localname="LocalName";
            $governmentform="GovernmentForm";
            $headofstate="HeadofState";
            $capital="Capital";
            $code2="Code2";

        if (strpos($q, "where id")) {
                $id="affiche rien";
        }
        if (strpos($q, "LocalName")) {
              $name="affiche rien";
        }
        if (strpos($q, "Code2")) {
              $code="affiche rien";
              echo "pounde";
        }
            
        if (strpos($q, "where Code")) {
              $code="affiche rien";
        }

        if (strpos($q, "where Name")) {
            $name="affiche rien";
        }

        if (strpos($q, "where Continent")) {
            $Continent="affiche rien";
        }
        if (strpos($q, "where Region")) {
            $rejion="affiche rien";
        }
        if (strpos($q, "where SurfaceArea")) {
            $surfacearea="affiche rien";
        }
        if (strpos($q, "where IndepYear")) {
            $indepyear="affiche rien";
        }

        if (strpos($q, "where Population")) {
            $population="affiche rien";
        }

        if (strpos($q, "where LifeExpectancy")) {
            $lifeexpectancy ="affiche rien";
        }

        if (strpos($q, "where GNP")) {
            $gnp ="affiche rien";
        }

        if (strpos($q, "where GNPOld")) {
            $gnpold ="affiche rien";
        }

        if (strpos($q, "where LocalName")) {
            $localname ="affiche rien";
        }     

        if (strpos($q, "where GovernmentForm")) {
            $governmentform ="affiche rien";
        }

        if (strpos($q, "where HeadofState")) {
            $headofstate ="affiche rien";
        }

        if (strpos($q, "where Capital")) {
            $capital ="affiche rien";
        }

        if (strpos($q, "where Code2")) {
            $code2 ="affiche rien";
        }
        ?>
            <div class="carre3">
      <table class="ta2" style="width:1;">
         <tr>
         <?php if (strpos($q, $all)||strpos($q, $id)) : ?>
          <th>Id</th> 
         <?php endif ?>
           <?php if (strpos($q, $code)||strpos($q, $all) ) : ?>
            <th>Code</th> 
           <?php endif ?>
        <?php  if (strpos($q, $name)||strpos($q, $all)) : ?>
          <th>Name</th> 
        <?php endif ?>
          <?php if (strpos($q, $Continent)||strpos($q, $all)) : ?>
            <th>Continent</th> 
          <?php endif ?>
          <?php if (strpos($q, $rejion)||strpos($q, $all)) : ?>
            <th>Region</th>
          <?php endif ?>
            <?php if (strpos($q, $surfacearea)||strpos($q, $all)) : ?>
              <th>SurfaceArea</th> 
            <?php endif ?>
          <?php if (strpos($q, $indepyear)||strpos($q, $all)) : ?>
            <th>IndepYear</th>
          <?php endif ?>
         <?php if (strpos($q, $population)||strpos($q, $all)) : ?>
          <th>Population</th> 
         <?php endif ?>
          <?php if (strpos($q, $lifeexpectancy)||strpos($q, $all)) : ?> 
            <th>Life Expectancy</th>
          <?php endif ?>
            <?php if (strpos($q, $gnp)||strpos($q, $all)) : ?>
              <th>GNP</th> 
            <?php endif ?>
          <?php if (strpos($q, $gnpold)||strpos($q, $all)) : ?> 
            <th>GNPOLD</th>
          <?php endif ?>
            <?php if (strpos($q, $localname)||strpos($q, $all)) : ?>
              <th>Local Name</th>
            <?php endif ?>
          <?php if (strpos($q, $governmentform)||strpos($q, $all)) : ?>
            <th>Government Form</th>
          <?php endif ?>
          <?php if (strpos($q, $headofstate)||strpos($q, $all)) : ?>
            <th>Head Of State</th>
          <?php endif ?>
            <?php if (strpos($q, $capital)||strpos($q, $all)) : ?>
              <th>Capital</th>
            <?php endif ?>
          <?php if (strpos($q, $code2)||strpos($q, $all)) : ?>
            <th>Code2</th>
          <?php endif  ?>
        </tr>
      <?php foreach($recherche as $b): ?>
            <tr>
            
            <?php  if (strpos($q, $all) ||strpos($q, $id)) : ?>  
              <td><?php  echo $b->id ?></td>  
            <?php endif ?> 
            <?php if (strpos($q, $code)||strpos($q, $all)) : ?> 
              <td><?php echo $b->Code ?></td> 
            <?php endif ?>
            <?php  if (strpos($q, $name)||strpos($q, $all)) : ?> 
              <td><?php  echo $b->Name ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $Continent)||strpos($q, $all)) : ?>  
              <td><?php echo $b->Continent ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $rejion)||strpos($q, $all)) : ?>  
              <td><?php echo $b->Region?></td> 
            <?php endif ?>
            <?php if (strpos($q, $surfacearea)||strpos($q, $all)) : ?>    
              <td><?php echo $b->SurfaceArea ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $indepyear)||strpos($q, $all)) : ?>    
              <td><?php echo $b->IndepYear?></td> 
            <?php endif ?>
            <?php if (strpos($q, $population)||strpos($q, $all)) : ?>     
              <td><?php echo $b->Population ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $lifeexpectancy)||strpos($q, $all)) : ?>   
              <td><?php echo $b->LifeExpectancy ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $gnp)||strpos($q, $all)) : ?>  
              <td><?php echo $b->GNP ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $gnpold)||strpos($q, $all)) : ?>   
              <td><?php echo $b->GNPOld ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $localname)||strpos($q, $all)) : ?>   
              <td><?php echo $b->LocalName ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $governmentform)||strpos($q, $all)) :?>   
              <td><?php echo $b->GovernmentForm ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $headofstate)||strpos($q, $all)) : ?>   
              <td><?php echo $b->HeadOfState ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $capital)||strpos($q, $all)) : ?>    
              <td><?php echo $b->Capital ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $code2)||strpos($q, $all)) : ?>    
              <td><?php echo $b->Code2 ?></td> 
            <?php endif ?>
            </div>
      </tr>
      <?php endforeach ?>
        </table>
      
    <?php if (isset($_GET['q'])) {
            $requete=$_GET['q'];
            //echo $requete;
        $save= saverequete($requete);
    }
    ?>
<?php endif ?>
    <?php 
    if (($test=='eleve')) :
        ?>
        <?php 
        include_once 'inc/manager-db.php';
        $lesrequetes =getsql(); 
        //print_r($lesrequetes);
        ?>
        <?php foreach ($lesrequetes as $sql): ?>
        <a class="option24" href="?q=<?php echo $sql->Requete ?>">
            <?php echo $sql->Requete ?></a>   
        <?php endforeach ;?>
<br>
        <?php    

        if (isset($_GET['q']) AND !empty($_GET['q'])) {
              $q = htmlspecialchars($_GET['q']);
              $recherche = $pdo->query($q);
              //print_r($recherche);
              echo $q;
             //print_r($recherche);
        } else {

            $recherche = $pdo->query("SELECT Capital FROM country");
            $q='en attente de votre requete..';
          
            echo $q;
            //echo $recherche;
        }
        ?>
          <?php
            $all="*";
             $id="id";
             $id2=",id";
            $code="Code";
            $name="Name";
            $Continent="Continent";
            $rejion="Region";
            $surfacearea="SurfaceArea";
            $indepyear="IndepYear";
            $population="Population";
            $lifeexpectancy="LifeExpectancy";
            $gnp="GNP";
            $gnpold="GNPOld";
            $localname="LocalName";
            $governmentform="GovernmentForm";
            $headofstate="HeadofState";
            $capital="Capital";
            $code2="Code2";

            if (strpos($q, "where id")) {
                $id="affiche rien";
            }
            if (strpos($q, "LocalName")) {
                $name="affiche rien";
            }
            if (strpos($q, "Code2")) {
                $code="affiche rien";
            }


            ?>
            <div class="carre3">
      <table class="ta2" style="width:1;">
         <tr>
         <?php if (strpos($q, $all)||strpos($q, $id)||strpos($q, $id2)) : ?>
          <th>Id</th> 
         <?php endif ?>
          <?php if (strpos($q, $code)||strpos($q, $all)) : ?>
            <th>Code</th> 
          <?php endif ?>
        <?php  if (strpos($q, $name)||strpos($q, $all)) : ?>
          <th>Name</th> 
        <?php endif ?>
          <?php if (strpos($q, $Continent)||strpos($q, $all)) : ?>
            <th>Continent</th> 
          <?php endif ?>
          <?php if (strpos($q, $rejion)||strpos($q, $all)) : ?>
            <th>Region</th>
          <?php endif ?>
            <?php if (strpos($q, $surfacearea)||strpos($q, $all)) : ?>
              <th>SurfaceArea</th> 
            <?php endif ?>
          <?php if (strpos($q, $indepyear)||strpos($q, $all)) : ?>
            <th>IndepYear</th>
          <?php endif ?>
         <?php if (strpos($q, $population)||strpos($q, $all)) : ?>
          <th>Population</th> 
         <?php endif ?>
          <?php if (strpos($q, $lifeexpectancy)||strpos($q, $all)) : ?> 
            <th>Life Expectancy</th>
          <?php endif ?>
            <?php if (strpos($q, $gnp)||strpos($q, $all)) : ?>
              <th>GNP</th> 
            <?php endif ?>
          <?php if (strpos($q, $gnpold)||strpos($q, $all)) : ?> 
            <th>GNPOLD</th>
          <?php endif ?>
            <?php if (strpos($q, $localname)||strpos($q, $all)) : ?>
              <th>Local Name</th>
            <?php endif ?>
          <?php if (strpos($q, $governmentform)||strpos($q, $all)) : ?>
            <th>Government Form</th>
          <?php endif ?>
          <?php if (strpos($q, $headofstate)||strpos($q, $all)) : ?>
            <th>Head Of State</th>
          <?php endif ?>
          <?php if (strpos($q, $capital)||strpos($q, $all)) : ?>
            <th>Capital</th>
          <?php endif ?>
          <?php if (strpos($q, $code2)||strpos($q, $all)) : ?>
            <th>Code2</th>
          <?php endif  ?>
        </tr>
        <?php foreach($recherche as $b): ?>
            <tr>
            
            <?php  if (strpos($q, $all) ||strpos($q, $id)||strpos($q, $id2)) : ?>  
        <td><?php  echo $b->id ?></td>  
            <?php endif ?> 
            <?php if (strpos($q, $code)||strpos($q, $all)) : ?> 
        <td><?php echo $b->Code ?></td> 
            <?php endif ?>
            <?php  if (strpos($q, $name)||strpos($q, $all)) : ?> 
        <td><?php  echo $b->Name ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $Continent)||strpos($q, $all)) : ?>  
        <td><?php echo $b->Continent ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $rejion)||strpos($q, $all)) : ?>  
        <td><?php echo $b->Region?></td> 
            <?php endif ?>
            <?php if (strpos($q, $surfacearea)||strpos($q, $all)) : ?>    
        <td><?php echo $b->SurfaceArea ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $indepyear)||strpos($q, $all)) : ?>    
        <td><?php echo $b->IndepYear?></td> 
            <?php endif ?>
            <?php if (strpos($q, $population)||strpos($q, $all)) : ?>    
        <td><?php echo $b->Population ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $lifeexpectancy)||strpos($q, $all)) : ?>   
        <td><?php echo $b->LifeExpectancy ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $gnp)||strpos($q, $all)) : ?>  
        <td><?php echo $b->GNP ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $gnpold)||strpos($q, $all)) : ?>   
        <td><?php echo $b->GNPOld ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $localname)||strpos($q, $all)) : ?>  
        <td><?php echo $b->LocalName ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $governmentform)||strpos($q, $all)) :?>  
        <td><?php echo $b->GovernmentForm ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $headofstate)||strpos($q, $all)) : ?>  
        <td><?php echo $b->HeadOfState ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $capital)||strpos($q, $all)) : ?>   
        <td><?php echo $b->Capital ?></td> 
            <?php endif ?>
            <?php if (strpos($q, $code2) || strpos($q, $all)) :?>  
        <td><?php echo $b->Code2 ?></td>
            <?php endif ?>
            </div>
      </tr>
        <?php endforeach ?>
        </table>




    <?php endif ;?>
     
</body>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>