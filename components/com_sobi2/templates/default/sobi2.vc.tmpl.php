<?php



/**



* @version $Id: sobi2.vc.tmpl.php 5462 2010-08-18 08:25:37Z Sigrid Suski $



* @package: Sigsiu Online Business Index 2 (Sobi2)



* ===================================================



* @author



* Name: Sigrid & Radek Suski, Sigsiu.NET GmbH



* Email: sobi[at]sigsiu.net



* Url: http://www.sigsiu.net



* ===================================================



* @copyright Copyright (C) 2006 - 2010 Sigsiu.NET GmbH (http://www.sigsiu.net). All rights reserved.



* @license see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL.



* You can use, redistribute this file and/or modify



* it under the terms of the GNU General Public License as published by



* the Free Software Foundation.



*/







/* Please do not remove this line */



defined( '_SOBI2_' ) || exit("Restricted access");







/* ------------------------------------------------------------------------------



 * This is the template for the V-Card View



 * ------------------------------------------------------------------------------



 */



/* Don't remove this line! */



function sobi2VCview($id, $style, $ico, $img, $title, $fieldsObjects, $fieldsFormatted, $plugins, $editButton = null, $deleteButton = null)



{



//  For advanced templating comment in the next line if you need to access other sobi2 object proporties



  $mySobi = new sobi2( $id );



  $config =& sobi2Config::getInstance();



  $waySearchLink = HTML_SOBI::createWaySearchUrl( $id );



  static $review  = null;



  if( !$review || !is_a( $review, "sobi_reviews" ) ) {



    $review = new sobi_reviews();



}



?>



<td class="vc-template" >



    <table style="width:100%">

      <tr><td><?php echo $editButton; ?></td><td><?php echo $deleteButton; ?></td></tr>

    <tr>



      <td width = "100"> 



    <?php if ($mySobi->image) :?>



    <img style="max-width:90px; max-height:80px;" src="images/com_sobi2/clients/<?php echo $mySobi->image; ?>" alt="<?php echo $mySobi->title; ?>"/> </td>



    <?php else: ?>



    <img style="max-width:90px; max-height:80px;" src="images/meserias1.jpg" alt="<?php echo $mySobi->title; ?>"/> </td>



      <?php endif;?>    



      <td >



         <div class="vc-title"> 



      <div style="float:left;">



      <?php echo $title ?> 



      </div>



      <div class="VcRatings"> 



      &nbsp;(&nbsp;



      </div>  



      <div class="VcRatings"> 



      <?php echo $review->showRating($id);?> 



      </div>



      <div class="VcRatings">



      din <?php echo $review->countVotes($id); ?> voturi ) 



      </div>



    </div>  



    <div class="vc-content">



      <div style="float:left;">



        <p>



          <?php echo $mySobi->customFieldsData['field_localitati'];?>, <?php echo $mySobi->customFieldsData['field_telefon'];?>, <?php echo $mySobi->customFieldsData['field_ani_vechime'];?> ani Experienta



        </p>

    

        <?php



    $string = '';



    foreach ($fieldsObjects['field_servicii']->data as $name => $value) {



      $string.= $value;



      $string.= ', ';

    }



    $string = substr($string,0,-2);

    ?>

  <?php if ($string) :?>

   <p>

        Ma pricep la:  <?php  echo $string; ?>

     </p>     

  <?php endif;?> 

    </div>



    </div>



    </td>



  



    </tr>



  </table>



 



<!-- here ends the template -->



 







<!-- Don't remove these lines! -->



</td><?php



}



?>