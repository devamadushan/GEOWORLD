<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" />
	<title>Update pays</title>
</head>

<?php
require_once 'header.php'; 
require_once 'javascripts.php';
require_once("inc/connect-db.php");
require_once("inc/manager-db.php");

//on récupère et on vérifie les données reçues par le formulaire

    $id = $_GET['id'] ;
    $updatePays = updategeoworld($id);
    
    //$name = $updatePays -> Capital;
    //$capital = getCapital($name);
    //print_r($updatePays);
  
    
?>
<form action="updatepaysmaj.php" method="get" >
<fieldset>

<legend> <i>Mise à jour des données</i></legend>
ID :
<input type="text" name = "id" required value="<?php echo $id; ?>" /> <br />
Code :
<input type="text" name="code" required value="<?php echo $updatePays->Code; ?>" /> <br />
Pays :
<input type="text" name="pays" required value="<?php echo $updatePays->Name; ?>" /> <br />
Continent :
<input type="text" name="continent" required value="<?php echo $updatePays->Continent; ?>" /> <br />
Region :
<input type="text" name="region" value="<?php echo $updatePays->Region; ?>"/> <br />
Surface :
<input type="text" name="surface" value="<?php echo $updatePays->SurfaceArea; ?>"/> <br />
Indépendance :
<input type="text" name="independance" value="<?php echo $updatePays->IndepYear; ?>"/> <br />
Population :
<input type="text" name="population" value="<?php echo $updatePays->Population; ?>"/> <br />
Espérance de vie :
<input type="text" name="espererancevie" value="<?php echo $updatePays->LifeExpectancy; ?>"/> <br />
PNB :  
<input type="text" name="pnb" value="<?php echo $updatePays->GNP; ?>"/> <br />
GNPOld : 
<input type="text" name="gnpold" value="<?php echo $updatePays->GNPOld; ?>"/> <br />
LocalName :
<input type="text" name="localname" value="<?php echo $updatePays->LocalName; ?>"/> <br />
GovernmentForm :
<input type="text" name="governmentname" value="<?php echo $updatePays->GovernmentForm; ?>"/> <br />
Head of state :
<input type="text" name="headofstate" value="<?php echo $updatePays->HeadOfState; ?>"/> <br />

Capital : 
<input type="text" name="capital" value="<?php echo $updatePays->Capital ; ?>"/> <br />


Code2 : 
<input type="text" name="code2" value="<?php echo $updatePays->Code2; ?>"/> <br />
<fieldset>
<input type="submit" value="mettre à jour" />
<input type="reset" value="Effacer" />
</form>
</html>