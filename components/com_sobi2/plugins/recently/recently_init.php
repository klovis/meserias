<?php
/**
 * Sobi2 Recently Visited Entries plugin
 * @Copyright   Copyright (C) 2010 Mano
 * @licence     http://www.gnu.org/copyleft/gpl.html
 * @link        http://www.webmano.hu
 */
 
defined( '_SOBI2_' ) or die( 'Restricted access Dies here' );

if( defined( "_SOBI_FE_PATH" ) ) {
$config =& sobi2Config::getInstance();
/* include class definition */
if(sobi2Config::import("plugins|recently|recently.class")) {

		if(!sobi2Config::import("plugins|recently|{$config->sobi2Language}", "front", false, false)) {
			sobi2Config::import("plugins|recently|english", "front", true, false);		
		}

			$sobi_recently= new sobi_recently();
			$config->S2_plugins[$plugin->name_id] = $sobi_recently;
		}
		else {
			trigger_error("Cannot import class definition files for the Sobi2 Recently Visited Entries Plugin", E_USER_WARNING);
		}

}

?>