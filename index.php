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
<?php  require_once 'header.php'; ?>
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
           <th>Capital</th>
         </tr>
          </div>
    <p>
        <code>
      
      <?php foreach ($desPays as $pays ):?>  
      <tr>
              <td> <a href="?continent=<?php echo $pays->Continent ; ?>">
              <?php echo $pays->Name ?> </a> 
              </td>
               <?php 
                $name = $pays->Capital ;
                $capital= getCapital($name);
                foreach ($capital as $cap):
                      //print_r($capital);
                    ?> 
                
       <td> <?php echo $cap->Name ?> </td>
                <?php endforeach; ?>

               
      <?php endforeach; ?>

      </tr>
        </code>
      </table>
    </p>
    
  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
