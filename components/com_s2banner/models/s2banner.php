<?php
/*
* @version 1.0.1 com_s2banner 2009-03-15 Aspergillus
* @package: SOBI2 Banner Manager (com_s2banner)
* ===================================================
* @author
* Name: Aspergillus
* Email: info@wasserchemie.ch
* Url: http://www.wasserchemie.ch
* ===================================================
* @copyright Copyright (C) 2008 Aspergillus (http://www.wasserchemie.ch). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 Banner Manager is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport('joomla.application.component.model');

//Sobi2 Banner Manager DatenModel

class S2bannerModelS2banner extends JModel
{

	function click(){ 
	  $row =& $this->getTable(s2banner);
    $sid= JRequest::getCmd( 'sobiid' );
	  $data= $this->getData($sid);  
    if ($data->id){
      $row->id = $data->id;
      $data->clicks = $data->clicks +1;		
		  if (!$row->bind($data)) {
			 echo "Bind Fehler";
			 return false;
		  }
		  //Make sure the hello record is valid
		  if (!$row->check()) {
			 echo "Check Fehler";
			 return false;
		  }		
		  // Store the web link table to the database
		  if (!$row->store()) {
			 echo "Store Fehler";
			 return false;
		  }				  
	  }
	  return $this->GetSobi2Url($sid);
  }
  
  function view($sid){
    //$row =& $this->getTable(S2banner);
    $row =& JTable::getInstance('s2banner', 'Table');
    
	  if (!$data= $this->getData($sid)){$data=& JTable::getInstance('s2banner', 'Table');}; 
     
		$result = " DataID:" . $data->id;		
    if ($data->id){
      $row->id = $data->id;
    }
    else{
      $data->sobiid=$sid;
    }
    $data->views = $data->views +1;			
		if (!$row->bind($data)) {
			echo "Bind Fehler";
			return false;
		}
		//Make sure the hello record is valid
		if (!$row->check()) {
			echo "Check Fehler";
			return false;
		}		
		// Store the web link table to the database
		if (!$row->store()) {
			echo "Store Fehler";
			return false;			  
	  }
	  return true;     
  }
   
  function getData($sid){
    $db			= JFactory::getDBO();
	  $query = "SELECT * FROM #__s2banner WHERE sobiid={$sid}";
		$db->setQuery( $query );
		$result = $db->loadObject();
		return $result;
  }          
 
  function getSobi2Url($sid){
    $config =& JComponentHelper::getParams('com_s2banner');
    $webfieldid = $config->get( 'webfieldid' );
    
    $db			= JFactory::getDBO();
    $query ="SELECT data_txt
    FROM #__sobi2_fields_data WHERE fieldid = {$webfieldid}
     AND itemid = {$sid}";
      
    $db->setQuery( $query );
		$result = $db->loadObject();
      
    if ( $result->data_txt ){
       return $result->data_txt; 
    }
    else{
      return "index.php";
    } 
  }
}

?>
















