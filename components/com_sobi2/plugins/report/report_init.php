<?php
/**
* @version $Id: report_init.php 4063 2008-06-08 17:57:10Z Radek Suski $
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
defined( '_SOBI2_' ) || ( trigger_error( "Restricted access", E_USER_ERROR ) && exit() );
if( defined( "_SOBI_FE_PATH" ) ) {
	$config =& sobi2Config::getInstance();
	if( sobi2Config::import( "plugins|report|report.class" ) ) {
		$config->S2_plugins[$plugin->name_id] = new sobi_report();
	}
	else {
		trigger_error( "Cannot import class definitions files for report plugin", E_USER_WARNING );
	}
}
?>
