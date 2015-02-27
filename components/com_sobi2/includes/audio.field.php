<?php
/**
* @version $Id: audio.field.php 2775 2007-11-04 16:38:37Z Radek Suski $
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
/*
 *  no direct access
 */
defined( '_SOBI2_' ) or die( 'Restricted access' );

function createSpecialMediaField($fid, $w, $h, $data, $autostart ) {
	$config =& sobi2Config::getInstance();
	$database =& $config->getDb();
	$query = "SELECT `enabled` FROM `#__sobi2_plugins` WHERE `name_id` = 'audio_field' ";
	$database->setQuery( $query );
	$enabled = $database->loadResult();

	if($enabled) {
		$config->addCustomHeadTag("<script type='text/javascript' src='{$config->liveSite}/components/com_sobi2/includes/ufo.js'></script>");
		if($autostart) {
			$autostart = "true";
		}
		else {
			$autostart = "false";
		}
		if($h < 20) {
			$h = 20;
		}
		if($w < 250) {
			$w = 250;
		}

		$sobiMediaObject = "<p id=\"{$fid}\">\n";
		$sobiMediaObject .= "<a href=\"http://www.macromedia.com/go/getflashplayer\">Get the Flash Player</a> to see this player.</p>\n";
		$sobiMediaObject .= "<script type=\"text/javascript\">\n\t";
		$sobiMediaObject .= "var FO_{$fid} = { movie:\"{$config->liveSite}/components/com_sobi2/includes/mp3player.swf\",width:\"{$w}\",height:\"{$h}\",majorversion:\"7\",build:\"0\",bgcolor:\"#FFFFFF\", flashvars:\"file={$data}&autostart={$autostart}\" };\n\t";
		$sobiMediaObject .= "UFO.create( FO_{$fid}, \"{$fid}\");\n";
		$sobiMediaObject .= "</script>\n";
	}
	else {
		$sobiMediaObject = "\n\t <object classid='clsid:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA' id='{$fid}' type='application/x-oleobject' height='$h' width='$w'>";
		$sobiMediaObject .= "\n\t\t <param name='FileName' value='{$data}' />";
		$sobiMediaObject .= "\n\t\t <param name='url' value='{$data}' />";
		$sobiMediaObject .= "\n\t\t <param name='ShowStatusBar' value='true' />";
		$sobiMediaObject .= "\n\t\t <param name='DisplayBackColor' value='0' />";
		$sobiMediaObject .= "\n\t\t <param name='TransparentAtStart' value='true' />";
		$sobiMediaObject .= "\n\t\t <param name='showcontrols' value='true' />";
		$sobiMediaObject .= "\n\t\t <embed src='{$data}' showstatusbar='1' transparentatstart='true' type='video/x-ms-wvx' autostart='{$autostart}' showcontrols='1' height='$h' width='$w'/>";
		$sobiMediaObject .= "\n\t </object>";
	}
	return $sobiMediaObject;
}
?>