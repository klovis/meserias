<?php
/**
* @version $Id: sobi2.details.tmpl.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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

/*please do not remove this line */
defined( '_SOBI2_' ) || exit("Restricted access");

/* ------------------------------------------------------------------------------
 * This is the template for the Details View
 * ------------------------------------------------------------------------------
 */
?>
<?php HTML_SOBI::renewal( $config,$mySobi ); ?>
<?php   static $review  = null;

  if( !$review || !is_a( $review, "sobi_reviews" ) ) {

    $review = new sobi_reviews();

}?>
<div class="details_container">
  <div class="details_picture">
    <?php if ($mySobi->image) :?>
       <img class="details_img" src="images/com_sobi2/clients/<?php echo $mySobi->image; ?>" alt="<?php echo $mySobi->title?>"/> 
    <?php else: ?>
      <img class="details_img" src="images/meserias1.jpg" alt="<?php echo $mySobi->title?>"/> 
    <?php endif;?>
  </div>
  <div class="details_personal" style="min-width:600px">
    <center>
    <p> Categorii:  <?php echo HTML_SOBI::getMyCategories($mySobi, true);?> </p>  
    <div style="float:right;"><?php echo $plugins['report']; ?></div>
  </center>
   <div class="vc-title" style="width:100%"> 

      <div style="float:left;">
        <p class="sobi2ItemTitle details_title"> <?php echo $mySobi->title ?> </p>
      </div>

      <div class="VcRatings"> 
        &nbsp;(&nbsp;
      </div>  

      <div class="VcRatings"> 
        <?php echo $this->plugins['reviews']->showRating($mySobi->id); ?>
      </div>

      <div class="VcRatings">
        din <?php echo $this->plugins['reviews']->countVotes($mySobi->id);?>  voturi ) 
      </div>
   
  <?php $mini_descriere = '';
     $mini_descriere.= $mySobi->customFieldsData['field_sex'] ? $mySobi->customFieldsData['field_sex'] . ', ' : '';
     $mini_descriere.= $mySobi->customFieldsData['field_varsta'] ? $mySobi->customFieldsData['field_varsta'].' ani, ': '';
     $mini_descriere.= $mySobi->customFieldsData['field_ani_vechime'] ? $mySobi->customFieldsData['field_ani_vechime'].' ani vechime, ': '';
     $mini_descriere.= $mySobi->customFieldsData['field_nivel_educational'] ? $mySobi->customFieldsData['field_nivel_educational'].', ': '';
     $mini_descriere= substr($mini_descriere,0,-2);
  ?>
  <div style="float:left;clear:left; margin-left:10px; width:100%">
      <p>
        <?php echo $mini_descriere?>
      </p>
    <table style="width:100%; padding:0; margin:0;">
    <tbody class="no-left">
      <tr> 
      <td style="width:50%; text-align:left;">
         <p class="no-left"> DATE CONTACT : </p>
      </td> 
      <td style="width:50%; text-align: left;">
        <p class="no-left"> ADRESA : </p>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">
          <?php echo  $mySobi->customFieldsData['field_telefon'] ? 'Telefon: '.$mySobi->customFieldsData['field_telefon'].'<br />' : '' ?>   
      <?php echo  $mySobi->customFieldsData['field_website'] ? 'Website: 
<a href="'.$mySobi->customFieldsData['field_website'].'" target="_blank"> '.$mySobi->customFieldsData['field_website'].'</a><br />' : '' ?> 
      </td>
      <td style="vertical-align: top;">
        <?php echo  $mySobi->customFieldsData['field_cartier'] ? 'Cartier: '.$mySobi->customFieldsData['field_cartier'].'<br />' : ''  ?>  
      <?php echo  $mySobi->customFieldsData['field_localitati'] ? 'Localitatea: '.$mySobi->customFieldsData['field_localitati'].'<br />' : '' ?> 
      </td>
    </tr>
    </tbody>
    </table>
  </div>
  </div>  
</div>
  
<div class="section" style="margin-top:20px;">
 <div class="section_header">
   <h2 style="margin:0;"> Descriere personala </h2>
 </div>
 <div class="section_content">
    <?php echo $mySobi->customFieldsData['field_ani_vechime'] ? '<p> Numar ani experienta : '.$mySobi->customFieldsData['field_ani_vechime'].'</p>' : ''  ?>
  <?php echo $mySobi->customFieldsData['field_experienta'] ? '<p> Detalii experienta : '.$mySobi->customFieldsData['field_experienta'].'</p>' : ''  ?>
  <?php 
   $string = '';
     foreach ($fieldsObjects['field_servicii']->data as $name => $value) {
      $string.= $value;
      $string.= ', ';
    }
    $string = substr($string,0,-2);
  ?>
  <?php echo $string ? '<p> Servicii : '.$string.'</p>' : ''  ?>
  <?php echo $mySobi->customFieldsData['field_dotari'] ? '<P>Dotari speciale : '.$mySobi->customFieldsData['field_dotari'].'</p>' : ''  ?>
 </div>
</div>  

<div class="section" style="margin-top:20px;">
  <div class="section_header">
    <h2 style="margin:0;"> Cerinte angajare </h2>
  </div>
  <div class="section_content">
      <?php echo $mySobi->customFieldsData['field_preturi'] ? '<p> Preturi : '.$mySobi->customFieldsData['field_preturi'].'</p>' : ''  ?>
    <?php echo $mySobi->customFieldsData['field_detalii_preturi'] ? ' <p> Detalii preturi : '.$mySobi->customFieldsData['field_detalii_preturi'].'</p>' : ''  ?>
    <?php echo $mySobi->customFieldsData['field_permis_conducere'] ? '<p> Permis conducere : '.$mySobi->customFieldsData['field_permis_conducere'].'</p >' : ''  ?>
    <?php echo $mySobi->customFieldsData['field_masina_proprie'] ? '<p> Masina proprie : '.$mySobi->customFieldsData['field_masina_proprie'].'</p>' : ''  ?>
    <?php echo $mySobi->customFieldsData['field_firma_persoana'] ? '<p> Detalii juridice : '.$mySobi->customFieldsData['field_firma_persoana'].'</p>' : ''  ?>
  </div>
</div>  

<div class="section" style="margin-top:20px;">
  <div class="section_header">
    <h2 style="margin:0;"> Calificari si acreditari </h2>
  </div>
  <div class="section_content">
     <?php echo $mySobi->customFieldsData['field_nivel_educational'] ? '<p> Nivel educational : '.$mySobi->customFieldsData['field_nivel_educational'].'</p>' : ''  ?>
     <?php echo $mySobi->customFieldsData['field_acreditari'] ? '<p> Calificari si acreditari : '.$mySobi->customFieldsData['field_acreditari'].'</p>' : ''  ?>
  </div>
</div>  

<div class="section" style="margin-top:20px;">
  <div class="section_header">
    <h2 style="margin:0;"> Portofoliu lucrari in imagini </h2>
  </div>
  <div class="section_content" style="padding-left:0">
     <?php echo $plugins["gallery"]; ?>
  </div>
</div>  
</div>
<?php echo HTML_SOBI::editButtons($config, $mySobi); ?>
<p align="right"> *Spune meseriasului tau ca l-ai gasit pe www.emeserias.ro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</br>
<?php echo $plugins['reviews'];  ?>

<?php echo HTML_SOBI::showTags($mySobi); ?>
