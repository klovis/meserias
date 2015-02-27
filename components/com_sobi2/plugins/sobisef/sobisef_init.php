<?php
/**
* @version $Id: sobisef_init.php 5275 2009-07-30 10:10:29Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2
* @subpackage SobiSEF Plugin for Joomla 1.5 Core SEF function
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007-2009 Sigsiu.NET (www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL V2.
* You can use, redistribute this file and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/

	defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );
	if(defined("_SOBI_FE_PATH")) {
		$config =& sobi2Config::getInstance();
		if(sobi2Config::import("plugins|sobisef|sobisef.class")) {
			$config->S2_plugins[$plugin->name_id] = new sobi_sef();
		}
		else {
			trigger_error("Cannot import class definitions files for SobiSEF plugin", E_USER_WARNING);
		}
	}
?>
