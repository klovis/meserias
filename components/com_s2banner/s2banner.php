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

// kein direkter Zugriff
defined('_JEXEC') or die('Restricted access');

// laden des Joomla! Basis Controllers
require_once (JPATH_COMPONENT.DS.'controller.php');
// laden von weiterer Controllern
if($controller = JRequest::getWord('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

//Include Pfad für Tables
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_s2banner'.DS.'tables');

// Erzeugen eines Objekts der Klasse controller
$classname	= 'S2bannerController'.ucfirst($controller);
$controller = new $classname( );

// den request task ausleben
$controller->execute(JRequest::getCmd('task'));

// Redirect aus dem controller
$controller->redirect();

?>