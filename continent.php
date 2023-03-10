

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

?>

<?php  require_once 'header.php'; 
//session_start ();
$defUtilisateur = 'inconnu';
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
  $defUtilisateur = $_SESSION['role'];
    echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['login']."(".$_SESSION['role'].")";
    //echo '<br><a href="logoutGeoworld.php">Deconnexion</a></p>';
}?>
<?php
require_once 'inc/manager-db.php';
if (!empty($_GET['continent'])) { 
    $continent =$_GET['continent'];
} else {
    $continent ="Africa";
}

$desPays = getCountriesByContinent($continent);
//print_r($desPays);


?>
<body>

<main role="main" class="flex-shrink-0">

  <div class="container">

    <h1 onclick="info(this)">Countries of <?php 
    if (!empty($_GET['continent'])) {
        echo $_GET['continent']; 
    } else {
        echo "Africa";
    }
    
    ?></h1>
    <div>
     <table class="table">
         <tr>
           <th>Pays</th>
           <th>Population</th>
           <th>Capital</th>
            <?php if ($defUtilisateur =='enseignant' ||$defUtilisateur =='admin'):?> 
            <th>Modifier</th> 
            <?php endif; ?>
           </tr>
          </div>
    <p>
        <code>
      
      <?php foreach ($desPays as $pays ):?>  
      <tr>
              <td>
              <?php echo $pays->Name ?>
              </td>
              <td>
                <?php echo $pays->Population ?>
              </td>
               <?php 
                $name = $pays->Capital ;
                $capital= getCapital($name);
                foreach ($capital as $cap):
                      //print_r($capital);
                    ?> 
                
       <td> <?php echo $cap->Name ?> </td>

       <?php if($defUtilisateur =='enseignant' || $defUtilisateur =='admin'): ?>
       <td><a href="updatepays.php?id=<?php echo $pays->id ?>" 
        onClick="return(confirm('Etes-vous sûr de vouloir modifier <?php echo $pays->Name ?> ?'));">update</a></td> <?php endif; ?>
                <?php endforeach; ?>

               
      <?php endforeach; ?>

      </tr>
        </code>
      </table>
    </p>
    
  </div>
</main>
       </body>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
