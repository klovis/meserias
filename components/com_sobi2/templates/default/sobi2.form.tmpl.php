<?php
/**
* @version $Id: sobi2.form.tmpl.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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
 * This is an example template for the Entry Form
 * ------------------------------------------------------------------------------
 */
?>
<?php
/* ------------------------------------------------------------------------------
 * Here are several standard free fields
 * ------------------------------------------------------------------------------
 */
?>
<?php echo $screenTitle; ?>
<?php echo $requiredFieldsInfo; ?>
<table id="sobi2FormTable">
  <tbody>
  <tr>
    <td>
      <?php echo $fields['EntryName']['label']; ?>
    </td>
    <td>
       <?php echo $fields['EntryName']['field']; ?>  
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_telefon']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_telefon']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_localitati']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_localitati']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_ani_vechime']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_ani_vechime']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_echipa']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_echipa']['field']; ?>  
    </td>
  </tr>
  <tr>
     <td>
       <?php echo $fields['field_nr_persoane']['label']; ?>
     </td>
     <td>
        <?php echo $fields['field_nr_persoane']['field']; ?>  
     </td>
  </tr>    
  <tr>
    <td>
      <?php echo $fields['field_sex']['label']; ?>
    </td>
    <td>
     <?php echo $fields['field_sex']['field']; ?>
   <!-- <input type="radio" name="field_sex" id="field_sex" value="field_sex_opt_1" checked="checked"> Barbat&nbsp;&nbsp;<input type="radio" name="field_sex" value="field_sex_opt_2"> Femeie -->
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_varsta']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_varsta']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_emailul']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_emailul']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_website']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_website']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <p style="font-weight:bold;"> Adresa </p>
    </td>
    <td> </td>
  </tr>
  <tr>
    <td></td>
  <td>
    <table style="padding:0;">
      <tr>
        <td><?php echo $fields['field_cartier']['label']; ?> &nbsp;&nbsp; <?php echo $fields['field_cartier']['field']; ?> &nbsp;&nbsp;<?php echo $fields['field_strada']['label']; ?> &nbsp;&nbsp; <?php echo $fields['field_strada']['field']; ?> &nbsp;&nbsp;<?php echo $fields['field_nr_strada']['label']; ?> &nbsp;&nbsp; <?php echo $fields['field_nr_strada']['field']; ?> </td>
    </tr>
      <tr>    
        <td><?php echo $fields['field_bloc']['label']; ?> &nbsp;&nbsp; <?php echo $fields['field_bloc']['field']; ?> &nbsp;&nbsp;<?php echo $fields['field_bloc_etaj']['label']; ?> &nbsp;&nbsp; <?php echo $fields['field_bloc_etaj']['field']; ?> &nbsp;&nbsp;<?php echo $fields['field_bloc_apartament']['label']; ?> &nbsp;&nbsp; <?php echo $fields['field_bloc_apartament']['field']; ?> &nbsp;&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_servicii']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_servicii']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_experienta']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_experienta']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_acreditari']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_acreditari']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_preturi']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_preturi']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_detalii_preturi']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_detalii_preturi']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_dotari']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_dotari']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_zile_disponibil']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_zile_disponibil']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_interval_orar']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_interval_orar']['field']; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_permis_conducere']['label']; ?>
    </td>
    <td>
    <?php echo $fields['field_permis_conducere']['field']; ?>
      <!-- <input type="radio" name="field_permis_conducere" id="field_permis_conducere" value="field_permis_conducere_opt_1" checked="checked"> Da&nbsp;&nbsp;<input type="radio" name="field_permis_conducere" value="field_permis_conducere_opt_2"> Nu -->
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_masina_proprie']['label']; ?>
    </td>
    <td>
     <?php echo $fields['field_masina_proprie']['field']; ?>
       <!-- <input type="radio" name="field_masina_proprie" id="field_masina_proprie" value="field_masina_proprie_opt_1" checked="checked"> Da&nbsp;&nbsp;<input type="radio" name="field_masina_proprie" value="field_masina_proprie_opt_2"> Nu -->
    </td>
  </tr>
    <tr>
    <td>
      <?php echo $fields['field_firma_persoana']['label']; ?>
    </td>
    <td>
      <?php echo $fields['field_firma_persoana']['field']; ?>
        <!-- <input type="radio" name="field_firma_persoana" id="field_firma_persoana" value="field_firma_persoana_opt_1" checked="checked"> Firma&nbsp;&nbsp;<input type="radio" name="field_firma_persoana" value="field_firma_persoana_opt_2"> Persoana-fizica &nbsp;&nbsp; -->
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $fields['field_nivel_educational']['label']; ?>
    </td>
    <td>
       <?php echo $fields['field_nivel_educational']['field']; ?>
    </td>
  </tr>
  <tr>
    <td width="150"><div align="right"><?php echo $fields['ImgField']['label']; ?>&nbsp;</div></td>
    <td><?php echo $fields['ImgField']['field']; ?></td>
  </tr>
  <tr>
    <td width="150"><div align="right"><?php echo $fields['sobi_gallery_plugin']['label']; ?>&nbsp;</div></td>
    <td><?php echo $fields['sobi_gallery_plugin']['field']; ?></td>
  </tr>
  </tbody>
</table>  
<?php
/* ------------------------------------------------------------------------------
 * Safety code is splitted in two fields too
 * ------------------------------------------------------------------------------
 */
?>
<?php echo $fields['SafetyCodeImage']['label']; ?><?php echo $fields['SafetyCodeImage']['field']; ?>
<?php echo $fields['SafetyCodeField']['label']; ?><?php echo $fields['SafetyCodeField']['field']; ?>
<div align="center" id="accept_rules_row">
  <?php echo $fields['field_lege']['field']; ?>&nbsp;Sunt  deacord cu publicarea pe site-ul www.emeserias.ro a datelor cu  caracted personal (precum numele/prenumele, adresa de e-mail, numarul  de telefon, etc.) conform Legii  nr. 677/2001.
<br/>
<?php echo $fields['EntryRules']['field']; ?>&nbsp;&nbsp;<?php echo $fields['EntryRules']['label']; ?><br />
</div>

<?php
/* ------------------------------------------------------------------------------
 * And of course the buttons
 * ------------------------------------------------------------------------------
 */
?>
<br/>
<?php echo $sendButton; ?>
<?php echo $cancelButton; ?>
<br/>