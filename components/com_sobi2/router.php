<?php
/**
* @version $Id: router.php 5275 2009-07-30 10:10:29Z Sigrid Suski $
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
defined( '_JEXEC' ) or die( 'Restricted access' );
defined( "DS" ) 			|| define( "DS", DIRECTORY_SEPARATOR );
defined( "_SOBI_FE_PATH" ) 	|| define( "_SOBI_FE_PATH", dirname( __FILE__ ) );
defined( "_SOBI_CMSROOT" ) 	|| define( "_SOBI_CMSROOT", str_replace( DS."components".DS."com_sobi2", null, _SOBI_FE_PATH ) );
require_once( dirname( __FILE__ ).DS."config.class.php" );

function Sobi2ParseRoute( $segments )
{
	static $plugin = null;
	if( !$plugin ) {
    	if(!sobi2Config::import("plugins|sobisef|sobisef.class")) {
			trigger_error("Cannot import SobiSEF plugin class definition", E_USER_WARNING);
			return false;
		}
		else {
			$plugin =& sobi_sef::getInstance();
		}
	}
	return $plugin->revert( $segments );
}

function Sobi2BuildRoute( &$query, $save = true )
{
	static $plugin = null;
	if( !$plugin ) {
    	if(!sobi2Config::import("plugins|sobisef|sobisef.class")) {
			trigger_error("Cannot import SobiSEF plugin class definition", E_USER_WARNING);
			return false;
		}
		else {
			$plugin =& sobi_sef::getInstance();
		}
	}
	$r = $plugin->create( $query, $save );
	return $r;
}
?>
