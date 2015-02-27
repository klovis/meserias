<?php
/**
* @version $Id: reviews_init.php 4905 2009-02-18 17:14:45Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/

	defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );
	if(defined("_SOBI_FE_PATH")) {
		$config =& sobi2Config::getInstance();
		if(file_exists(_SOBI_FE_PATH.DS."plugins".DS."reviews".DS.$config->sobi2Language.".php"))
		{
			require_once(_SOBI_FE_PATH.DS."plugins".DS."reviews".DS.$config->sobi2Language.".php");
		}
		else
		{
			require_once(_SOBI_FE_PATH.DS."plugins".DS."reviews".DS."english.php");
		}
		/*
		 * include class definition
		 */
		require_once(_SOBI_FE_PATH.DS."plugins".DS."reviews".DS."reviews.class.php");
		/*
		 * create an object
		 */
		$sobi_reviews = new sobi_reviews();
		/*
		 * put the object to the plugins array
		 * $plugin->name is definied in sobi2.php
		 */
		$config->S2_plugins[$plugin->name_id] = $sobi_reviews;
	}
?>
