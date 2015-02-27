<?php
/*
* @version 1.0 com_s2banner 2008-12-24 Aspergillus
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
jimport('joomla.application.component.controller');

class S2bannerController extends JController
{
	function display()
	{
    $this->setRedirect('index.php');
	}
	
  	function click()
	{ 
	  $model = $this->getModel();
  	$url     = $model->click();
  	$this->setRedirect($url); 	  	
	}
}