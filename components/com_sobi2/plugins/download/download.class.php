<?php
/**
* @version $Id: download.class.php 5178 2009-06-29 10:15:16Z Radek Suski $
* @package: Sigsiu Online Business Index 2
* @subpackage download plugin
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

class sobi_download {
	/**
	 * @var string
	 */
	var $name = "Download";
	/**
	 * @var string
	 */
	var $listingStyle = "sobi_download_VC";
	/**
	 * upload directory location
	 *
	 * @var string
	 */
	var $directory = "sobi_downloads";
	/**
	 * number of allowed files
	 *
	 * @var int
	 */
	var $allowedFiles = 3;
	/**
	 * upload popup high
	 *
	 * @var int
	 */
	var $ppWinH = 450;
	/**
	 * upload popup width
	 *
	 * @var int
	 */
	var $ppWinW = 650;
	/**
	 * licence popup high
	 *
	 * @var int
	 */
	var $ppLicWinH = 450;
	/**
	 * licence popup width
	 *
	 * @var int
	 */
	var $ppLicWinW = 650;
	/**
	 * @var boolean
	 */
	var $addLicense = true;
	/**
	 * position in form
	 *
	 * @var int
	 */
	var $fPos = 5;
	/**
	 * image for uplad button
	 *
	 * @var string
	 */
	var $uploadImage = "/components/com_sobi2/plugins/download/upload.png";
	/**
	 * image for uplad button high
	 *
	 * @var int
	 */
	var $uploadImageH = 160;
	/**
	 * image for uplad button width
	 *
	 * @var int
	 */
	var $uploadImageW = 40;
	/**
	 * @var array
	 */
	var $mimeIcons = array();
	/**
	 * @var string
	 */
	var $sortOrder = "filename";

	/**
	 * @var int
	 */
	var $maxFileSize = 500;
	/**
	 * @var array
	 */
	var $allowedExt = array();
	/**
	 * @var string
	 */
	var $_ppTitle = _SDP_UPLOAD_TITLE;
	/**
	 * constructor
	 *
	 * @return sobi_download
	 */
	function sobi_download()
	{
		define( '_SDP_J15', defined( '_JEXEC' ) ? '&amp;format=html' : '');
		$config =& sobi2Config::getInstance();
		$config->addCustomHeadTag("<link rel='StyleSheet' href='{$config->liveSite}/components/com_sobi2/plugins/download/download.css' type='text/css' />");
		$this->directory = $config->getValueFromDB("sobi_download","sd_directory");
		$this->directory = stripslashes($this->directory);
		if ($this->directory[strlen($this->directory)-1] != '/' && $this->directory[strlen($this->directory)-1] != '\\') {
			$this->directory = "{$this->directory}/";
		}
		$this->directory =  str_replace(array("/", "\\"), DS, $this->directory);	//schliesst immer mit dem Directory Separator ab

		$this->allowedFiles = $config->getValueFromDB("sobi_download","sd_allowedFiles");
		$this->ppWinH = $config->getValueFromDB("sobi_download","sd_ppWinH");
		$this->ppWinW = $config->getValueFromDB("sobi_download","sd_ppWinW");
		$this->ppLicWinW = $config->getValueFromDB("sobi_download","sd_ppLicWinW");
		$this->ppLicWinH = $config->getValueFromDB("sobi_download","sd_ppLicWinH");
		$this->addLicense = $config->getValueFromDB("sobi_download","sd_addLicense");
		$this->fPos = $config->getValueFromDB("sobi_download","sd_fPos");
		$this->uploadImage = $config->getValueFromDB("sobi_download","sd_uploadImage");
		$this->sortOrder = $config->getValueFromDB("sobi_download","sd_sortOrder");
		$this->maxFileSize = $config->getValueFromDB("sobi_download","sd_maxFileSize");
    	if( empty( $this->allowedExt ) ) {
	    	$fExts = $config->getValueFromDB( "sobi_download","sd_allowedExt" );
	    	$fExts = explode( ',', $fExts );
	    	foreach ( $fExts as $ext ) {
	    		$this->allowedExt[] = trim( $ext );
	    	}
    	}
    	if(empty($this->mimeIcons)) {
			static $path = "/components/com_sobi2/plugins/download/mimetypes/";
    		$mimetypesPath = _SOBI_CMSROOT.str_replace("/", DS, $path);
    		$v = $config->getValueFromDB("sobi_download","sd_mimeIcons");
    		$v = explode(",",$v);
    		foreach ($v as $img) {
    			$img = explode("=",$img);
				if(key_exists(0,$img) && key_exists(1,$img) && file_exists($mimetypesPath.$img[1])) {
    				$this->mimeIcons[trim($img[0])] = trim($img[1]);
				}
				unset($img);
    		}
    	}
		if(file_exists(_SOBI_CMSROOT.$this->uploadImage)) {
			list($this->uploadImageW, $this->uploadImageH, $imgType) = getimagesize(_SOBI_CMSROOT.$this->uploadImage);
		}
		$this->uploadImage = $this->uploadImage;
	}
	/**
	 *
	 * @param string $sobi2Task
	 * @return boolean
	 */
	function customTask($sobi2Task)
	{
		switch($sobi2Task) {
			case "dd_window":
				$this->uploadWindow();
				$ret = true;
				break;
			case "sobiDDupload":
				$this->uploadFile();
				$ret = true;
				break;
			case "sobiDDremove":
				$this->removeFile();
				$ret = true;
				break;
			case "sobiDDassignLicence":
				$this->assignLicence();
				$ret = true;
				break;
			case "ddLicWindow":
				$this->showLicencePopUp();
				$ret = true;
				break;
			case "dd_download":
				$this->downloadFile();
				$ret = true;
				break;
			default:
				$ret = false;
		}
		return $ret;
	}
	/**
	 * Enter description here...
	 *
	 */
	function showLicencePopUp()
	{
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$fid = (int) sobi2Config::request($_GET, "fid", 0);
		if($fid) {
			$query = "SELECT lic.license FROM `#__sobi2_plugin_download_licenses` AS lic ".
					 "LEFT JOIN `#__sobi2_plugin_download` AS fi ON fi.license = lic.id WHERE fid = '{$fid}'";
			$database->setQuery($query);
			$txt = $database->loadResult();
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
			echo "<div id=\"license\">{$txt}</div>";
			echo "<div id=\"licenseAgr\" style=\"padding: 20px;\">";
			echo "<input type = \"checkbox\" class=\"inputbox\" onclick=\"if(this.checked) { document.getElementById('downloadButton').disabled = false; } else { document.getElementById('downloadButton').disabled = true; } \"/>";
			echo '<span class="sd_licenseAgreement">'._SDD_LICENSE_ACCEPT.'</span>';
			echo "<input disabled=\"disabled\" type = \"button\" class=\"button\" id =\"downloadButton\" onclick=\" location.href = '{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=dd_download&amp;fid={$fid}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}';\" value=\""._SDD_DOWNLOAD."\"/>";
			echo "<input type=\"button\" class=\"button\" onclick=\"window.top.hidePopWin();\" value=\""._SDP_CLOSE_BT."\" />";
			echo "</div>";
		}
    	else {
    		trigger_error("sobi_download::showLicencePopUp(): missing file id",E_USER_WARNING);
    		return null;
    	}
	}
	/**
	 * Enter description here...
	 *
	 */
	function downloadFile()
	{
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$fid = sobi2Config::request($_REQUEST, "fid", 0);
    	if($fid) {
			$query = "SELECT `filename`, `filetype`, `filesize`, `fileext`, `itemid` FROM `#__sobi2_plugin_download` WHERE `fid` = {$fid} AND `enabled` = 1";
 			$database->setQuery($query);
 			$file = null;
			if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
				$file = $database->loadObject();
			}
	    	else {
	    		$database->loadObject( $file );
	    	}
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
 			$query = "UPDATE `#__sobi2_plugin_download` SET `counter` = `counter` + 1 WHERE `fid` = {$fid}";
 			$database->setQuery($query);
 			$database->query();
    	}
    	else {
    		trigger_error("sobi_download::downloadFile(): missing file id",E_USER_WARNING);
    		return null;
    	}
 		if(!is_object($file)) {
 			trigger_error("sobi_download::downloadFile(): DB error ($query)",E_USER_WARNING);
 			return null;
 		}

 		$filePath = _SOBI_CMSROOT.DS.$this->directory.$file->itemid.DS.$file->filename;

 		if(!file_exists($filePath)) {
			trigger_error("sobi_download::downloadFile(): file {$filePath} does not exist");
			return null;
		}

		$fileType = $this->mapExtension($file->fileext);
		ob_end_clean();
		ob_start();
		header("Content-Disposition: attachment; filename = \"{$file->filename}\"");
		header("Content-Type: {$fileType}");
		readfile($filePath);
		exit();
	}
	/**
	 * Enter description here...
	 *
	 * @param int $sobi2Id
	 * @param array $fields
	 */
	function editFormStart($sobi2Id,&$fields)
	{
		$config =& sobi2Config::getInstance();
		if (($this->fPos == 0) && (!defined("_SOBI2_ADMIN")))
			return false;

		$hid = null;
    	if(!$sobi2Id) {
    		$sobi2Id = $this->sessionCookieValue();
    		$hid = "<input type=\"hidden\" name=\"tempSobi2Id\" value=\"{$sobi2Id}\"/>";
    	}
		$dummy = new stdClass();
		$dummy->label = _SDP_UPLOAD_TITLE_LEFT;
		$dummy->fieldname = "sobi_download_plugin";
		$dummy->is_free = true;
		$dummy->fieldType = 4;
		$dummy->wysiwyg = false;
		$dummy->payment = 0;
		if($this->uploadImageH && $this->uploadImageW) {
			$bg = "background: transparent url({$config->liveSite}{$this->uploadImage}) no-repeat scroll left center; width: {$this->uploadImageW}px; height: {$this->uploadImageH}px;";
		}
		else {
			$bg = null;
		}
		$dummy->customCode = "<div onclick=\"showPopWin('{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=dd_window&amp;sobi2Id={$sobi2Id}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}', {$this->ppWinW}, {$this->ppWinH}, null);\" style='{$bg} cursor: pointer; vertical-align: middle; text-align: center;'>".
								"<div class='sd_uploadFilesBt'><a href=\"javascript:void(0);\" class='sd_uploadFilesBt' onclick=\"showPopWin('{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=dd_window&amp;sobi2Id={$sobi2Id}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}', {$this->ppWinW}, {$this->ppWinH}, null);\">"._SDP_UPLOAD_TITLE_BUTTON."</a></div>{$hid}".
							 "</div>";
		$dummy->is_required = false;
		$this->fPos = $this->fPos - 1;
		$newArray = array();
		$c = 0;
		foreach ($fields as $n => $field) {
			if($c == $this->fPos) {
				define("_SDPH_LINK_ADDED",1);
				$newArray[$c] = $dummy;
				$c++;
			}
			$newArray[$c] = $field;
			$c++;
		}
		if(!defined("_SDPH_LINK_ADDED")) {
			define("_SDPH_LINK_ADDED",1);
			$newArray[$c] = $dummy;
		}
		$fields = $newArray;
	}
	/**
	 * Enter description here...
	 *
	 * @param int $sobi2Id
	 * @param boolean $details
	 * @return string
	 */
	function showDetails($sobi2Id, $details = true)
	{
    	$files = $this->getAllFiles($sobi2Id);
    	$v = null;
    	$this->_ppTitle = _SDP_LIC_TITLE;
    	if(count($files)) {
	    	foreach ($files as $file) {
				$v .= $this->getOneFileView($file,$sobi2Id,$details);
	    	}
    	}
		return $v;
    }
    /**
     * Enter description here...
     *
     * @param int $sobi2Id
     * @return string
     */
    function showListing($sobi2Id)
    {
    	$this->_ppTitle = _SDP_LIC_TITLE;
    	return $this->showDetails($sobi2Id, false);
    }
    /**
     * Enter description here...
     *
     * @param object $file
     * @param boolean $details
     * @return string
     */
    function getOneFileView($file, $sobi2Id, $details = true)
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$filePath = _SOBI_CMSROOT.DS.$this->directory.$file->itemid.DS.$file->filename;

 		if(!file_exists($filePath)) {
			trigger_error("sobi_download::getOneFileView(): file {$filePath} does not exist");
			return null;
		}
		if($this->addLicense && !defined("_SDD_HEADER_PPWIN_ADDED")) {
			define("_SDD_HEADER_PPWIN_ADDED",1);
			$config->addCustomHeadTag($this->addScript());
		}
		if($this->addLicense && $file->license) {
			$href = "href=\"javascript:void(0);\" onclick=\"showPopWin('{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=ddLicWindow&amp;fid={$file->fid}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}', {$this->ppLicWinW}, {$this->ppLicWinH}, null);\"";
			$url = "javascript:showPopWin('{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=ddLicWindow&amp;fid={$file->fid}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}', {$this->ppLicWinW}, {$this->ppLicWinH}, null);";
		}
		else {
			$href = "href=\"{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=dd_download&amp;fid={$file->fid}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}\"";
			$url = "{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=dd_download&amp;fid={$file->fid}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}";
		}
		if($file->license) {
			$query = "SELECT `name`, `url` FROM `#__sobi2_plugin_download_licenses` WHERE `id` = {$file->license}";
			$database->setQuery($query);
			$license = null;
			if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
				$license = $database->loadObject();
			}
	    	else {
	    		$database->loadObject( $license );
	    	}
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
			if($license->url) {
				$license = "<a href=\"{$license->url}\" target=\"_blank\" title=\"{$license->name}\">{$license->name}</a>";
			}
			else {
				$license = $license->name;
			}
		}
		else {
			$license = _SDD_NO_LICENSE;
		}
		$ico = $this->getIcon($file->fileext, $file->filetype);
		$img = sobi2Config::checkPNGImage($ico, $file->filename, "border-style:none;");
		$ico = "<a {$href} title=\"{$file->filename}\">{$img}</a>";
		$fname = "<a {$href} title=\"{$file->filename}\">{$file->filename}</a>";

		require_once("templates.php");
		ob_start();
		if($details) {
			sobi2DownloadPluginDetailsViewTemplate($ico, $fname, $file->filetype, round($file->filesize/1024), $license, $file->counter,$file->added, $url, $sobi2Id);
		}
		else {
			sobi2DownloadPluginCategoryViewTemplate($ico, $fname, $file->filetype, round($file->filesize/1024), $license, $file->counter,$file->added, $url, $sobi2Id);
		}
		$s = ob_get_contents();
		ob_end_clean();
		return $s;
    }
    /**
     * Enter description here...
     *
     * @param int $sobi2Id
     * @return array
     */
    function getAllFiles($sobi2Id)
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$query = "SELECT * FROM `#__sobi2_plugin_download` WHERE `itemid` = '{$sobi2Id}' AND `enabled` = 1 ORDER BY {$this->sortOrder}";
 		$database->setQuery($query);
 		$files = $database->loadObjectList();
		if( $database->getErrorNum() ) {
			$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
		}
 		return $files;
    }
    /**
     * Enter description here...
     *
     * @param int $sobi2Id
     * @return string
     */
    function editForm($sobi2Id)
    {
		$config =& sobi2Config::getInstance();
    	$hid = null;
    	if(!$sobi2Id) {
    		$sobi2Id = $this->sessionCookieValue();
    		$hid = "<input type=\"hidden\" name=\"tempSobi2Id\" value=\"{$sobi2Id}\"/>";
    	}
    	if(!defined("_SDPHADD")) {
    		define("_SDPHADD",1);
			$config->addCustomHeadTag($this->addScript());
    	}
    	if(!defined("_SDPH_LINK_ADDED")) {
			$form =  "<a href=\"javascript:void(0);\" onclick=\"showPopWin('{$config->liveSite}/index2.php?option=com_sobi2&amp;sobi2Task=dd_window&amp;sobi2Id={$sobi2Id}"._SDP_J15."&amp;Itemid={$config->sobi2Itemid}', {$this->ppWinW}, {$this->ppWinH}, null);\">"._SDP_UPLOAD_TITLE."</a>{$hid}";
    	}
    	else {
    		$form = null;
    	}
		return $form;
    }
    /**
     * Enter description here...
     *
     * @param array $input
     * @param int $sobi2Id
     * @return array
     */
    function save($input,$sobi2Id)
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$itemid = sobi2Config::request( $_REQUEST,"tempSobi2Id", null );
		if($itemid && file_exists(_SOBI_CMSROOT.DS.$this->directory.$itemid)) {
    		$query = "UPDATE `#__sobi2_plugin_download` SET `itemid` = '{$sobi2Id}' WHERE `itemid` = '{$itemid}' LIMIT {$this->allowedFiles} ;";
			$database->setQuery($query);
			$database->query();
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
			$dirNewName = _SOBI_CMSROOT.DS.$this->directory.$sobi2Id;
			$dirOldName = _SOBI_CMSROOT.DS.$this->directory.$itemid;
			if(!rename($dirOldName,$dirNewName)) {
				trigger_error("sobi_download::save(): Cannot rename target directory from {$dirOldName} to {$dirNewName}");
			}
		}
		else {
			trigger_error("sobi_download::save(): missing temp id");
		}
    	return $input;
    }
    /**
     * Enter description here...
     *
     */
    function assignLicence()
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
 		@session_start();
 		session_name('_SSD_VALID');
	   	$id = session_id();
    	$idGet = sobi2Config::request($_GET,"sid",null);
    	$fid = (int) sobi2Config::request($_GET,"id",0);
    	$lid = (int) sobi2Config::request($_GET,"lid",0);
    	if($fid && $id == $idGet) {
    		$query = "UPDATE `#__sobi2_plugin_download` SET `license` = '{$lid}' WHERE `fid` = '{$fid}' LIMIT 1 ;";
    		$database->setQuery($query);
    		$database->query();
	    	$query = "SELECT * FROM `#__sobi2_plugin_download` WHERE `fid` = {$fid} AND `enabled` = 1 ";
	 		$database->setQuery($query);
	 		$file = null;
			if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
				$file = $database->loadObject();
			}
	    	else {
	    		$database->loadObject( $file );
	    	}
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
    		echo $this->addLicensesBox($file,false);
    	}
    	else {
    		trigger_error("sobi_download::assignLicence():Unauthorized access to this function. File to change:{$fid} - {$id} != {$idGet}", E_USER_WARNING);
    		echo _SDP_CHANGE_LICENSE_ID_MISMATCH;
    		die();
    	}
    }
    /**
     * @param object $file
     * @param boolean $first
     * @return string
     */
    function addLicensesBox($file, $first = true)
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$query = "SELECT `name`, `id` FROM #__sobi2_plugin_download_licenses";
 		$database->setQuery($query);
 		$licenses = $database->loadObjectList();
		if( $database->getErrorNum() ) {
			$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
		}
 		$r = null;
 		if($first) {
 			$r = "<div id='lbox_{$file->fid}'>";
 		}
 		$lbox = array();
 		$lbox[] = sobiHTML::makeOption( 0, _SDD_BOX_SELECT);
		if($licenses) {
			foreach ($licenses as $licence) {
				$lbox[] = sobiHTML::makeOption( $licence->id, $licence->name);
			}
			$lbox = sobiHTML::selectList( $lbox, "licence_{$file->fid}", 'class="inputbox" style="display:inline; clear:right;" id="licence_'.$file->fid.'"' , 'value', 'text', $file->license);
			if(!$file->license) {
				$r .= '<span class="sd_licenseSelect">'._SDD_LICENSE_SELECT.'</span>';
				$v = _SDD_ASSIGN;
			}
			else {
				$r .= '<span class="sd_selectedLicense">'._SDD_SELECTED_LICENSE.'</span>';
				$v = _SDD_CHANGE;
			}
			$js = "sddAssignLicense({$file->fid}, document.getElementById('licence_{$file->fid}').options[document.getElementById('licence_{$file->fid}').selectedIndex].value  )";
			$r .= $lbox;
			$r .= '<input type="button" class="button" style="display:inline;" value="'.$v.'" onclick="'.$js.'"/>';
			$r .= "<br/>";
			if($first) {
				$r .= "</div>";
			}
		}
		return $r;
    }
    /**
     * Enter description here...
     *
     */
    function removeFile()
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		@session_start();
		session_name('_SSD_VALID');
    	$id = session_id();
    	$idGet = sobi2Config::request($_GET,"sid",null);
    	$fid = (int) sobi2Config::request($_GET,"id",0);
    	$sobi2Id = sobi2Config::request($_GET,"sobi2Id",$this->sessionCookieValue());

    	if($fid && $id == $idGet) {
	    	$query = "SELECT * FROM `#__sobi2_plugin_download` WHERE `fid` = {$fid} AND `enabled` = 1 ";
	 		$database->setQuery($query);
	 		$file = null;
			if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
				$file = $database->loadObject();
			}
	    	else {
	    		$database->loadObject( $file );
	    	}
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
	 		if(file_exists(_SOBI_CMSROOT.DS.$this->directory.$file->itemid.DS.$file->filename)) {
				if(!(unlink(_SOBI_CMSROOT.DS.$this->directory.$file->itemid.DS.$file->filename))) {
					trigger_error("sobi_download::removeFile():Could not remove file. Unlink function failure. File to remove:{$file->filename} -  {$fid}");
				}
	 		}
	 		else {
	 			trigger_error("sobi_download::removeFile():Could not remove file. File does not exist. File to remove:{$file->filename} -  {$fid}");
	 		}
			$query = "UPDATE `#__sobi2_plugin_download` SET `enabled` = 0 WHERE `fid` = '{$fid}' LIMIT 1 ;";
//	    	$query = "DELETE FROM `#__sobi2_plugin_download` WHERE `fid` = {$fid}";
	 		$database->setQuery($query);
			$database->query();
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
	 		require_once(_SOBI_FE_PATH.DS."includes".DS."uploader".DS."upload.class.php");
			$uploader = new SobiFileUploader($this->directory, $sobi2Id, true, true, "sobiDDupload");
			$uploader->showField($sobi2Id.$fid);
    	}
    	else {
    		trigger_error("sobi_download::removeFile():Unauthorized access to this function. File to remove:{$fid}", E_USER_WARNING);
    		echo _SDP_REMOVE_ID_MISMATCH;
    		die();
    	}
    }
    function uploadWindow()
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();

		$config->addCustomHeadTag($this->addPPScript());
		$config->addCustomHeadTag("<link rel='StyleSheet' href='{$config->liveSite}/components/com_sobi2/plugins/download/download.css' type='text/css' />");

 		require_once(_SOBI_FE_PATH.DS."includes".DS."uploader".DS."upload.class.php");
 		$sobi2Id = sobi2Config::request($_GET,"sobi2Id",$this->sessionCookieValue());
 		$query = "SELECT COUNT( `fid` ) FROM `#__sobi2_plugin_download` WHERE `itemid` = '{$sobi2Id}' AND `enabled` = 1 ";
 		$database->setQuery($query);
 		$count = $database->loadResult();
		if( $database->getErrorNum() ) {
			$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
		}
 		$this->allowedFiles -= $count;
   		$uploader = new SobiFileUploader($this->directory, $sobi2Id, true, true, "sobiDDupload");
    	if(defined("_SOBI_MAMBO")) {
    		echo $uploader->addScript();
    		$style = "style='padding-left:10px;'";
    	}
    	else {
    		$style = null;
    	}
   		echo "<div class=\"sddUploadWindow\" {$style}>";
 		echo "<img src=\"{$config->liveSite}/components/com_sobi2/plugins/download/folder-remote.png\" alt=\"upload\" style=\"float:left\">";
 		echo "<h3 class='sd_popUpDowloadTitle'>"._SDP_POP_UP_UPLOAD_TITLE."</h3>";
 		if($count) {
 			$this->showAllFiles($sobi2Id);
 		}
 		for($this->allowedFiles; $this->allowedFiles > 0; $this->allowedFiles--) {
 			$id = rand( 5, 15 );
 			$id = "{$id}_{$this->allowedFiles}";
 			echo "<span class=\"sddUploadField\" id=\"sddUploadField_{$this->allowedFiles}\">";
 			$uploader->showField( $id );
 			echo "</span>";
 		}
		echo "<div style='padding-bottom:10px; padding-top:10px;'/>";
		echo "<input type=\"button\" style=\"float:right; margin:20px;\" class=\"button\" onclick=\"window.top.hidePopWin();\" value=\""._SDP_CLOSE_BT."\" />";
		echo "</div>";
    }
    function uploadFile()
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$sobi2Id = sobi2Config::request($_GET,"sobi2Id",$this->sessionCookieValue());
    	define('_SOBI2_UPLOADER_CORE_PASSED',1);
    	require_once(_SOBI_FE_PATH.DS."includes".DS."uploader".DS."upload.class.php");

    	$fsize = $_FILES["sobiAjaxUpload"]["size"]["file"];
    	if($fsize > $this->maxFileSize) {
    		$uploader = new SobiFileUploader($this->directory, $sobi2Id, true, true, "sobiDDupload");
    		$fs = $this->maxFileSize / 1024;
    		echo _SDD_FILE_TOO_BIG."&nbsp;".$fs."&nbsp;kB.";
    		$uploader->showField(rand(5, 15));
    		return null;
    	}
    	$uploader = new SobiFileUploader($this->directory, $sobi2Id, true, true, "sobiDDupload");
    	$uploader->filesExtentions = $this->allowedExt;
 		$uploader->uploadFile();
 		$fileName = $_FILES["sobiAjaxUpload"]["name"]["file"];
 		$file = _SOBI_CMSROOT.DS.$this->directory.$sobi2Id.DS.$fileName;

 		if( $fileName && file_exists( $file ) ) {
 			$ext = explode( '.', $fileName );
 			$ext = $ext[ count( $ext ) - 1 ];
 			if( !( $fileType = @exec(escapeshellcmd( "file " ).@escapeshellarg( $file ) ) ) ) {
				$fileType = $this->mapExtension( $ext );
 			}
 			else {
 				$fileType = str_ireplace( "{$file}: ", null, $fileType );
 			}
 			$htaccesPath =  _SOBI_CMSROOT.DS.$this->directory.$sobi2Id.DS.".htaccess";
 			if(!file_exists($htaccesPath)) {
				$htaccess = "<Files *>";
				$htaccess .= "\n\t\t Order Deny,Allow";
				$htaccess .= "\n\t\t Deny from all";
				$htaccess .= "\n\t\t Allow from localhost";
				$htaccess .= "\n </Files>";
				if($htaccessFile = @fopen($htaccesPath,"w")) {
					if(!@fwrite($htaccessFile, $htaccess)){
						trigger_error("sobi_download::uploadFile(): Cannot put content in .htaccess file for protecting download directory");
					}
					@fclose($htaccessFile);
				}
				else {
					trigger_error("sobi_download::uploadFile(): Cannot create .htaccess file for protecting download directory");
				}
 			}
 			$fileSize = filesize($file);
 			$now = $config->getTimeAndDate();
 			$query = "LOCK TABLE `#__sobi2_plugin_download` WRITE";
 			$database->setQuery($query);
 			$database->query();
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
 			$query = "INSERT INTO `#__sobi2_plugin_download`( `fid` , `itemid` , `filename` , `filetype`, `fileext`, `filesize`, `title` , `added` , `params` , `enabled` , `position` , `counter`, `license` )".
					 "VALUES ( NULL , '{$sobi2Id}', '{$fileName}', '{$fileType}','{$ext}', '{$fileSize}', '', '{$now}', NULL , '1', '0', '0', '0'); ";
			$database->setQuery($query);
			$database->query();
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
	    	$query = "SELECT MAX(`fid`) FROM `#__sobi2_plugin_download`";
	 		$database->setQuery($query);
 			$fid = $database->loadResult();
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
			$query = "UNLOCK TABLES;";
 			$database->setQuery($query);
 			$database->query();
			if( $database->getErrorNum() ) {
				$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
			}
 			$this->showFile($fid);
 		}
    }
    /**
     * Enter description here...
     *
     * @param int $fid
     * @return string
     */
    function showFile($fid)
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$query = "SELECT `fid`, `filename`, `filetype`, `fileext`,`license`, `filesize` FROM `#__sobi2_plugin_download` WHERE `fid` = {$fid} AND `enabled` = 1 ";
 		$database->setQuery($query);
 		$file = null;
		if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
			$file = $database->loadObject();
		}
    	else {
    		$database->loadObject( $file );
    	}
		if( $database->getErrorNum() ) {
			$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
		}
 		if(!is_object($file)) {
 			trigger_error("sobi_download::showFile(): DB error ($query)");
 			return null;
 		}
		$ico = $this->getIcon($file->fileext, $file->filetype);
		static $rem = "/components/com_sobi2/plugins/download/remove.png";
		$remIco = $config->liveSite.$rem;
		$license = null;
		if($this->addLicense) {
 			$license = $this->addLicensesBox($file);
		}
		?>
				<div style="display:block; float:left; clear:right; width:100%; margin-top:25px;" id="<?php echo $file->fid;?>">
					<div style="display:block; float:left; clear:right;">
						<img src="<?php echo $ico;?>" title="<?php echo $file->filetype;?>" alt="<?php echo $file->filetype;?>"/>
					</div>
					<div style="display:block; float:left; clear:right; text-align:center; margin-left:25px;">
						<a href="javascript:void(0);" onclick="javascript:sddRemoveFile(<?php echo $file->fid;?>);">
							<img style="border-style:none;" src="<?php echo $remIco;?>" title="<?php echo _SDP_REMOVE_FILE;?>" alt="<?php echo _SDP_REMOVE_FILE;?>"/>
						</a>
						<div style="width:100%; text-align:center;">
							<a href="javascript:void(0);" onclick="javascript:sddRemoveFile(<?php echo $file->fid;?>);">
								<?php echo _SDP_REMOVE_FILE;?>
							</a>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div style="text-align:left; margin-top:15px; display:block; ">
						<span style="display:block;"><label><?php echo _SDP_FILE_NAME;?></label><?php echo $file->filename;?></span>
						<span style="display:block;"><label><?php echo _SDP_FILE_TYPE;?></label><?php echo $file->filetype;?></span>
						<span style="display:block;"><label><?php echo _SDP_FILE_SIZE;?></label><?php echo round($file->filesize/1024);?> kB</span>
					</div>
					<div>
						<?php echo $license;?>
					</div>
				</div>
	<?php
    }
    /**
     * Enter description here...
     *
     * @param int $sobi2Id
     */
    function showAllFiles($sobi2Id)
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$query = "SELECT `fid`, `filename`, `filetype`, `license`, `fileext`, `filesize` FROM `#__sobi2_plugin_download` WHERE `itemid` = '{$sobi2Id}' AND `enabled` = 1 ";
 		$database->setQuery($query);
 		$files = $database->loadObjectList();
		if( $database->getErrorNum() ) {
			$config->logSobiError( "Download plugin. DB reports: ".$database->stderr() );
		}
 		echo "<hr>";
 		echo _SDP_UPLOADED_FILES;
 		echo "<br/><br/>";
		static $rem = "/components/com_sobi2/plugins/download/remove.png";
		$remIco = $config->liveSite.$rem;
 		if(!empty($files)) {
 			foreach ($files as $file) {
				$ico = $this->getIcon($file->fileext, $file->filetype);
				$license = null;
				if($this->addLicense) {
		 			$license = $this->addLicensesBox($file);
				}
 				?>
					<div style="display:block; float:left; clear:right; width:100%; margin-top:25px;" id="<?php echo $file->fid;?>">
						<div style="display:block; float:left; clear:right;" class="sddFileIco">
							<img src="<?php echo $ico;?>" title="<?php echo $file->filetype;?>" alt="<?php echo $file->filetype;?>"/>
						</div>
						<div style="display:block; float:left; clear:right; text-align:center; margin-left:25px;" class="sddRemoveIco">
							<a href="javascript:void(0);" onclick="javascript:sddRemoveFile(<?php echo $file->fid;?>);">
								<img style="border-style:none;" src="<?php echo $remIco;?>" title="<?php echo _SDP_REMOVE_FILE;?>" alt="<?php echo _SDP_REMOVE_FILE;?>"/>
							</a>
							<div style="width:100%; text-align:center;" class="sddRemoveIcoTxt">
								<a href="javascript:void(0);" onclick="javascript:sddRemoveFile(<?php echo $file->fid;?>);">
									<?php echo _SDP_REMOVE_FILE;?>
								</a>
							</div>
						</div>
						<div style="clear:both;"></div>
						<div style="text-align:left; margin-top:15px; display:block; ">
							<span style="display:block;" class="sddFileName"><label><?php echo _SDP_FILE_NAME;?></label><?php echo $file->filename;?></span>
							<span style="display:block;" class="sddFileType"><label><?php echo _SDP_FILE_TYPE;?></label><?php echo $file->filetype;?></span>
							<span style="display:block;" class="sddFileSize"><label><?php echo _SDP_FILE_SIZE;?></label><?php echo round($file->filesize/1024);?> kB</span>
						</div>
						<div class="sddFileLicense">
							<?php echo $license;?>
						</div>
					</div>
				<?php
 			}
 		}
    }
    /**
     * Enter description here...
     *
     * @param string $ext
     * @param string $ftype
     * @return string
     */
    function getIcon($ext)
    {
		$config =& sobi2Config::getInstance();
    	$ext = strtolower($ext);
    	$ico = null;
    	static $path = "/components/com_sobi2/plugins/download/mimetypes/";
    	$mimetypesLive = $config->liveSite.$path;
    	if(isset($this->mimeIcons[$ext]) && $this->mimeIcons[$ext]) {
    		$ico = $mimetypesLive."/".$this->mimeIcons[$ext];
    	}
    	else {
    		/**
    		 * @todo another method to find out the icon
    		 */
    		$ico = $mimetypesLive.$this->mimeIcons['generic'];
    	}
    	return $ico;
    }
	/**
	* @param int $id
	*/
	function sessionCookieValue( $id = null )
	{
		static $value = null;
		if( !$value ) {
			$config =& sobi2Config::getInstance();
			$user =& $config->getUser();
			$ip	= $_SERVER[ 'REMOTE_ADDR' ];
			$value = md5( $config->secret . $id . $ip . $user->id . microtime() );
		}
		return $value;
	}
    /**
     * Enter description here...
     *
     * @param string $ext
     * @return string
     */
    function mapExtension($ext)
    {
		$fileType = null;
		$ext = strtolower($ext);
		/* Array from DOCMan 1.3.0 for Mambo 4.5.1 CMS */
		static $mime_extension_map = array(
		    '3ds' => 'image/x-3ds',
		    'bland' => 'application/x-blender',
		    'C' => 'text/x-c++src',
		    'CSSL' => 'text/css',
		    'NSV' => 'video/x-nsv',
		    'XM' => 'audio/x-mod',
		    'Z' => 'application/x-compress',
		    'a' => 'application/x-archive',
		    'abw' => 'application/x-abiword',
		    'abw.gz' => 'application/x-abiword',
		    'ac3' => 'audio/ac3',
		    'adb' => 'text/x-adasrc',
		    'ads' => 'text/x-adasrc',
		    'afm' => 'application/x-font-afm',
		    'ag' => 'image/x-applix-graphics',
		    'ai' => 'application/illustrator',
		    'aif' => 'audio/x-aiff',
		    'aifc' => 'audio/x-aiff',
		    'aiff' => 'audio/x-aiff',
		    'al' => 'application/x-perl',
		    'arj' => 'application/x-arj',
		    'as' => 'application/x-applix-spreadsheet',
		    'asc' => 'text/plain',
		    'asf' => 'video/x-ms-asf',
		    'asp' => 'application/x-asp',
		    'asx' => 'video/x-ms-asf',
		    'au' => 'audio/basic',
		    'avi' => 'video/x-msvideo',
		    'aw' => 'application/x-applix-word',
		    'bak' => 'application/x-trash',
		    'bcpio' => 'application/x-bcpio',
		    'bdf' => 'application/x-font-bdf',
		    'bib' => 'text/x-bibtex',
		    'bin' => 'application/octet-stream',
		    'blend' => 'application/x-blender',
		    'blender' => 'application/x-blender',
		    'bmp' => 'image/bmp',
		    'bz' => 'application/x-bzip',
		    'bz2' => 'application/x-bzip',
		    'c' => 'text/x-csrc',
		    'c++' => 'text/x-c++src',
		    'cc' => 'text/x-c++src',
		    'cdf' => 'application/x-netcdf',
		    'cdr' => 'application/vnd.corel-draw',
		    'cer' => 'application/x-x509-ca-cert',
		    'cert' => 'application/x-x509-ca-cert',
		    'cgi' => 'application/x-cgi',
		    'cgm' => 'image/cgm',
		    'chrt' => 'application/x-kchart',
		    'class' => 'application/x-java',
		    'cls' => 'text/x-tex',
		    'cpio' => 'application/x-cpio',
		    'cpio.gz' => 'application/x-cpio-compressed',
		    'cpp' => 'text/x-c++src',
		    'cpt' => 'application/mac-compactpro',
		    'crt' => 'application/x-x509-ca-cert',
		    'cs' => 'text/x-csharp',
		    'csh' => 'application/x-shellscript',
		    'css' => 'text/css',
		    'csv' => 'text/x-comma-separated-values',
		    'cur' => 'image/x-win-bitmap',
		    'cxx' => 'text/x-c++src',
		    'dat' => 'video/mpeg',
		    'dbf' => 'application/x-dbase',
		    'dc' => 'application/x-dc-rom',
		    'dcl' => 'text/x-dcl',
		    'dcm' => 'image/x-dcm',
		    'dcr' => 'application/x-director',
		    'deb' => 'application/x-deb',
		    'der' => 'application/x-x509-ca-cert',
		    'desktop' => 'application/x-desktop',
		    'dia' => 'application/x-dia-diagram',
		    'diff' => 'text/x-patch',
		    'dir' => 'application/x-director',
		    'djv' => 'image/vnd.djvu',
		    'djvu' => 'image/vnd.djvu',
		    'dll' => 'application/octet-stream',
		    'dms' => 'application/octet-stream',
		    'doc' => 'application/msword',
		    'dsl' => 'text/x-dsl',
		    'dtd' => 'text/x-dtd',
		    'dvi' => 'application/x-dvi',
		    'dwg' => 'image/vnd.dwg',
		    'dxf' => 'image/vnd.dxf',
		    'dxr' => 'application/x-director',
		    'egon' => 'application/x-egon',
		    'el' => 'text/x-emacs-lisp',
		    'eps' => 'image/x-eps',
		    'epsf' => 'image/x-eps',
		    'epsi' => 'image/x-eps',
		    'etheme' => 'application/x-e-theme',
		    'etx' => 'text/x-setext',
		    'exe' => 'application/x-executable',
		    'ez' => 'application/andrew-inset',
		    'f' => 'text/x-fortran',
		    'fig' => 'image/x-xfig',
		    'fits' => 'image/x-fits',
		    'flac' => 'audio/x-flac',
		    'flc' => 'video/x-flic',
		    'fli' => 'video/x-flic',
		    'flw' => 'application/x-kivio',
		    'fo' => 'text/x-xslfo',
		    'g3' => 'image/fax-g3',
		    'gb' => 'application/x-gameboy-rom',
		    'gcrd' => 'text/x-vcard',
		    'gen' => 'application/x-genesis-rom',
		    'gg' => 'application/x-sms-rom',
		    'gif' => 'image/gif',
		    'glade' => 'application/x-glade',
		    'gmo' => 'application/x-gettext-translation',
		    'gnc' => 'application/x-gnucash',
		    'gnucash' => 'application/x-gnucash',
		    'gnumeric' => 'application/x-gnumeric',
		    'gra' => 'application/x-graphite',
		    'gsf' => 'application/x-font-type1',
		    'gtar' => 'application/x-gtar',
		    'gz' => 'application/x-gzip',
		    'h' => 'text/x-chdr',
		    'h++' => 'text/x-chdr',
		    'hdf' => 'application/x-hdf',
		    'hh' => 'text/x-c++hdr',
		    'hp' => 'text/x-chdr',
		    'hpgl' => 'application/vnd.hp-hpgl',
		    'hqx' => 'application/mac-binhex40',
		    'hs' => 'text/x-haskell',
		    'htm' => 'text/html',
		    'html' => 'text/html',
		    'icb' => 'image/x-icb',
		    'ice' => 'x-conference/x-cooltalk',
		    'ico' => 'image/x-ico',
		    'ics' => 'text/calendar',
		    'idl' => 'text/x-idl',
		    'ief' => 'image/ief',
		    'ifb' => 'text/calendar',
		    'iff' => 'image/x-iff',
		    'iges' => 'model/iges',
		    'igs' => 'model/iges',
		    'ilbm' => 'image/x-ilbm',
		    'iso' => 'application/x-cd-image',
		    'it' => 'audio/x-it',
		    'jar' => 'application/x-jar',
		    'java' => 'text/x-java',
		    'jng' => 'image/x-jng',
		    'jp2' => 'image/jpeg2000',
		    'jpg' => 'image/jpeg',
		    'jpe' => 'image/jpeg',
		    'jpeg' => 'image/jpeg',
		    'jpr' => 'application/x-jbuilder-project',
		    'jpx' => 'application/x-jbuilder-project',
		    'js' => 'application/x-javascript',
		    'kar' => 'audio/midi',
		    'karbon' => 'application/x-karbon',
		    'kdelnk' => 'application/x-desktop',
		    'kfo' => 'application/x-kformula',
		    'kil' => 'application/x-killustrator',
		    'kon' => 'application/x-kontour',
		    'kpm' => 'application/x-kpovmodeler',
		    'kpr' => 'application/x-kpresenter',
		    'kpt' => 'application/x-kpresenter',
		    'kra' => 'application/x-krita',
		    'ksp' => 'application/x-kspread',
		    'kud' => 'application/x-kugar',
		    'kwd' => 'application/x-kword',
		    'kwt' => 'application/x-kword',
		    'la' => 'application/x-shared-library-la',
		    'latex' => 'application/x-latex',
		    'lha' => 'application/x-lha',
		    'lhs' => 'text/x-literate-haskell',
		    'lhz' => 'application/x-lhz',
		    'log' => 'text/x-log',
		    'ltx' => 'text/x-tex',
		    'lwo' => 'image/x-lwo',
		    'lwob' => 'image/x-lwo',
		    'lws' => 'image/x-lws',
		    'lyx' => 'application/x-lyx',
		    'lzh' => 'application/x-lha',
		    'lzo' => 'application/x-lzop',
		    'm' => 'text/x-objcsrc',
		    'm15' => 'audio/x-mod',
		    'm3u' => 'audio/x-mpegurl',
		    'man' => 'application/x-troff-man',
		    'md' => 'application/x-genesis-rom',
		    'me' => 'text/x-troff-me',
		    'mesh' => 'model/mesh',
		    'mgp' => 'application/x-magicpoint',
		    'mid' => 'audio/midi',
		    'midi' => 'audio/midi',
		    'mif' => 'application/x-mif',
		    'mkv' => 'application/x-matroska',
		    'mm' => 'text/x-troff-mm',
		    'mml' => 'text/mathml',
		    'mng' => 'video/x-mng',
		    'moc' => 'text/x-moc',
		    'mod' => 'audio/x-mod',
		    'moov' => 'video/quicktime',
		    'mov' => 'video/quicktime',
		    'movie' => 'video/x-sgi-movie',
		    'mp2' => 'video/mpeg',
		    'mp3' => 'audio/x-mp3',
		    'mpe' => 'video/mpeg',
		    'mpeg' => 'video/mpeg',
		    'mpg' => 'video/mpeg',
		    'mpga' => 'audio/mpeg',
		    'ms' => 'text/x-troff-ms',
		    'msh' => 'model/mesh',
		    'msod' => 'image/x-msod',
		    'msx' => 'application/x-msx-rom',
		    'mtm' => 'audio/x-mod',
		    'mxu' => 'video/vnd.mpegurl',
		    'n64' => 'application/x-n64-rom',
		    'nc' => 'application/x-netcdf',
		    'nes' => 'application/x-nes-rom',
		    'nsv' => 'video/x-nsv',
		    'o' => 'application/x-object',
		    'obj' => 'application/x-tgif',
		    'oda' => 'application/oda',
		    'ogg' => 'application/ogg',
		    'old' => 'application/x-trash',
		    'oleo' => 'application/x-oleo',
		    'p' => 'text/x-pascal',
		    'p12' => 'application/x-pkcs12',
		    'p7s' => 'application/pkcs7-signature',
		    'pas' => 'text/x-pascal',
		    'patch' => 'text/x-patch',
		    'pbm' => 'image/x-portable-bitmap',
		    'pcd' => 'image/x-photo-cd',
		    'pcf' => 'application/x-font-pcf',
		    'pcf.Z' => 'application/x-font-type1',
		    'pcl' => 'application/vnd.hp-pcl',
		    'pdb' => 'application/vnd.palm',
		    'pdf' => 'application/pdf',
		    'pem' => 'application/x-x509-ca-cert',
		    'perl' => 'application/x-perl',
		    'pfa' => 'application/x-font-type1',
		    'pfb' => 'application/x-font-type1',
		    'pfx' => 'application/x-pkcs12',
		    'pgm' => 'image/x-portable-graymap',
		    'pgn' => 'application/x-chess-pgn',
		    'pgp' => 'application/pgp',
		    'php' => 'application/x-php',
		    'php3' => 'application/x-php',
		    'php4' => 'application/x-php',
		    'pict' => 'image/x-pict',
		    'pict1' => 'image/x-pict',
		    'pict2' => 'image/x-pict',
		    'pl' => 'application/x-perl',
		    'pls' => 'audio/x-scpls',
		    'pm' => 'application/x-perl',
		    'png' => 'image/png',
		    'pnm' => 'image/x-portable-anymap',
		    'po' => 'text/x-gettext-translation',
		    'pot' => 'application/vnd.ms-powerpoint',
		    'ppm' => 'image/x-portable-pixmap',
		    'pps' => 'application/vnd.ms-powerpoint',
		    'ppt' => 'application/vnd.ms-powerpoint',
		    'ppz' => 'application/vnd.ms-powerpoint',
		    'ps' => 'application/postscript',
		    'ps.gz' => 'application/x-gzpostscript',
		    'psd' => 'image/x-psd',
		    'psf' => 'application/x-font-linux-psf',
		    'psid' => 'audio/prs.sid',
		    'pw' => 'application/x-pw',
		    'py' => 'application/x-python',
		    'pyc' => 'application/x-python-bytecode',
		    'pyo' => 'application/x-python-bytecode',
		    'qif' => 'application/x-qw',
		    'qt' => 'video/quicktime',
		    'qtvr' => 'video/quicktime',
		    'ra' => 'audio/x-pn-realaudio',
		    'ram' => 'audio/x-pn-realaudio',
		    'rar' => 'application/x-rar',
		    'ras' => 'image/x-cmu-raster',
		    'rdf' => 'text/rdf',
		    'rej' => 'application/x-reject',
		    'rgb' => 'image/x-rgb',
		    'rle' => 'image/rle',
		    'rm' => 'audio/x-pn-realaudio',
		    'roff' => 'application/x-troff',
		    'rpm' => 'application/x-rpm',
		    'rss' => 'text/rss',
		    'rtf' => 'application/rtf',
		    'rtx' => 'text/richtext',
		    's3m' => 'audio/x-s3m',
		    'sam' => 'application/x-amipro',
		    'scm' => 'text/x-scheme',
		    'sda' => 'application/vnd.stardivision.draw',
		    'sdc' => 'application/vnd.stardivision.calc',
		    'sdd' => 'application/vnd.stardivision.impress',
		    'sdp' => 'application/vnd.stardivision.impress',
		    'sds' => 'application/vnd.stardivision.chart',
		    'sdw' => 'application/vnd.stardivision.writer',
		    'sgi' => 'image/x-sgi',
		    'sgl' => 'application/vnd.stardivision.writer',
		    'sgm' => 'text/sgml',
		    'sgml' => 'text/sgml',
		    'sh' => 'application/x-shellscript',
		    'shar' => 'application/x-shar',
		    'shtml' => 'text/html',
		    'siag' => 'application/x-siag',
		    'sid' => 'audio/prs.sid',
		    'sik' => 'application/x-trash',
		    'silo' => 'model/mesh',
		    'sit' => 'application/x-stuffit',
		    'skd' => 'application/x-koan',
		    'skm' => 'application/x-koan',
		    'skp' => 'application/x-koan',
		    'skt' => 'application/x-koan',
		    'slk' => 'text/spreadsheet',
		    'smd' => 'application/vnd.stardivision.mail',
		    'smf' => 'application/vnd.stardivision.math',
		    'smi' => 'application/smil',
		    'smil' => 'application/smil',
		    'sml' => 'application/smil',
		    'sms' => 'application/x-sms-rom',
		    'snd' => 'audio/basic',
		    'so' => 'application/x-sharedlib',
		    'spd' => 'application/x-font-speedo',
		    'spl' => 'application/x-futuresplash',
		    'sql' => 'text/x-sql',
		    'src' => 'application/x-wais-source',
		    'stc' => 'application/vnd.sun.xml.calc.template',
		    'std' => 'application/vnd.sun.xml.draw.template',
		    'sti' => 'application/vnd.sun.xml.impress.template',
		    'stm' => 'audio/x-stm',
		    'stw' => 'application/vnd.sun.xml.writer.template',
		    'sty' => 'text/x-tex',
		    'sun' => 'image/x-sun-raster',
		    'sv4cpio' => 'application/x-sv4cpio',
		    'sv4crc' => 'application/x-sv4crc',
		    'svg' => 'image/svg+xml',
		    'swf' => 'application/x-shockwave-flash',
		    'sxc' => 'application/vnd.sun.xml.calc',
		    'sxd' => 'application/vnd.sun.xml.draw',
		    'sxg' => 'application/vnd.sun.xml.writer.global',
		    'sxi' => 'application/vnd.sun.xml.impress',
		    'sxm' => 'application/vnd.sun.xml.math',
		    'sxw' => 'application/vnd.sun.xml.writer',
		    'sylk' => 'text/spreadsheet',
		    't' => 'application/x-troff',
		    'tar' => 'application/x-tar',
		    'tar.Z' => 'application/x-tarz',
		    'tar.bz' => 'application/x-bzip-compressed-tar',
		    'tar.bz2' => 'application/x-bzip-compressed-tar',
		    'tar.gz' => 'application/x-compressed-tar',
		    'tar.lzo' => 'application/x-tzo',
		    'tcl' => 'text/x-tcl',
		    'tex' => 'text/x-tex',
		    'texi' => 'text/x-texinfo',
		    'texinfo' => 'text/x-texinfo',
		    'tga' => 'image/x-tga',
		    'tgz' => 'application/x-compressed-tar',
		    'theme' => 'application/x-theme',
		    'tif' => 'image/tiff',
		    'tiff' => 'image/tiff',
		    'tk' => 'text/x-tcl',
		    'torrent' => 'application/x-bittorrent',
		    'tr' => 'application/x-troff',
		    'ts' => 'application/x-linguist',
		    'tsv' => 'text/tab-separated-values',
		    'ttf' => 'application/x-font-ttf',
		    'txt' => 'text/plain',
		    'tzo' => 'application/x-tzo',
		    'ui' => 'application/x-designer',
		    'uil' => 'text/x-uil',
		    'ult' => 'audio/x-mod',
		    'uni' => 'audio/x-mod',
		    'uri' => 'text/x-uri',
		    'url' => 'text/x-uri',
		    'ustar' => 'application/x-ustar',
		    'vcd' => 'application/x-cdlink',
		    'vcf' => 'text/x-vcalendar',
		    'vcs' => 'text/x-vcalendar',
		    'vct' => 'text/x-vcard',
		    'vfb' => 'text/calendar',
		    'vob' => 'video/mpeg',
		    'voc' => 'audio/x-voc',
		    'vor' => 'application/vnd.stardivision.writer',
		    'vrml' => 'model/vrml',
		    'vsd' => 'application/vnd.visio',
		    'wav' => 'audio/x-wav',
		    'wax' => 'audio/x-ms-wax',
		    'wb1' => 'application/x-quattropro',
		    'wb2' => 'application/x-quattropro',
		    'wb3' => 'application/x-quattropro',
		    'wbmp' => 'image/vnd.wap.wbmp',
		    'wbxml' => 'application/vnd.wap.wbxml',
		    'wk1' => 'application/vnd.lotus-1-2-3',
		    'wk3' => 'application/vnd.lotus-1-2-3',
		    'wk4' => 'application/vnd.lotus-1-2-3',
		    'wks' => 'application/vnd.lotus-1-2-3',
		    'wm' => 'video/x-ms-wm',
		    'wma' => 'audio/x-ms-wma',
		    'wmd' => 'application/x-ms-wmd',
		    'wmf' => 'image/x-wmf',
		    'wml' => 'text/vnd.wap.wml',
		    'wmlc' => 'application/vnd.wap.wmlc',
		    'wmls' => 'text/vnd.wap.wmlscript',
		    'wmlsc' => 'application/vnd.wap.wmlscriptc',
		    'wmv' => 'video/x-ms-wmv',
		    'wmx' => 'video/x-ms-wmx',
		    'wmz' => 'application/x-ms-wmz',
		    'wpd' => 'application/wordperfect',
		    'wpg' => 'application/x-wpg',
		    'wri' => 'application/x-mswrite',
		    'wrl' => 'model/vrml',
		    'wvx' => 'video/x-ms-wvx',
		    'xac' => 'application/x-gnucash',
		    'xbel' => 'application/x-xbel',
		    'xbm' => 'image/x-xbitmap',
		    'xcf' => 'image/x-xcf',
		    'xcf.bz2' => 'image/x-compressed-xcf',
		    'xcf.gz' => 'image/x-compressed-xcf',
		    'xht' => 'application/xhtml+xml',
		    'xhtml' => 'application/xhtml+xml',
		    'xi' => 'audio/x-xi',
		    'xls' => 'application/vnd.ms-excel',
		    'xla' => 'application/vnd.ms-excel',
		    'xlc' => 'application/vnd.ms-excel',
		    'xld' => 'application/vnd.ms-excel',
		    'xll' => 'application/vnd.ms-excel',
		    'xlm' => 'application/vnd.ms-excel',
		    'xlt' => 'application/vnd.ms-excel',
		    'xlw' => 'application/vnd.ms-excel',
		    'xm' => 'audio/x-xm',
		    'xml' => 'text/xml',
		    'xpm' => 'image/x-xpixmap',
		    'xsl' => 'text/x-xslt',
		    'xslfo' => 'text/x-xslfo',
		    'xslt' => 'text/x-xslt',
		    'xwd' => 'image/x-xwindowdump',
		    'xyz' => 'chemical/x-xyz',
		    'zabw' => 'application/x-abiword',
		    'zip' => 'application/zip',
		    'zoo' => 'application/x-zoo',
		    '123' => 'application/vnd.lotus-1-2-3',
		    '669' => 'audio/x-mod'
		    );
		if(isset($mime_extension_map[$ext])) {
			$fileType = $mime_extension_map[$ext];
		}
    	return $fileType;
    }
    /**
     * @return string
     */
    function addScript()
    {
    	$config =& sobi2Config::getInstance();
		$config->addCustomHeadTag( '<script type="text/javascript" src="'.$config->liveSite.'/components/com_sobi2/plugins/download/download.js"></script>' );
    	return "<script type=\"text/javascript\"> var SobiDownloadWinTitle = \"{$this->_ppTitle}\";</script>";

    }
    /**
     * @return string
     */
    function addPPScript()
    {
		$config =& sobi2Config::getInstance();
 		$sobi2Id = sobi2Config::request($_GET,"sobi2Id",$this->sessionCookieValue());
		@session_start();
 		session_name('_SSD_VALID');
    	$ssid = session_id();
    	ob_start();
    	?>
    	<script type="text/javascript">
    	<!--
    	/* <![CDATA[ */
		    var sddHttpRequest;
    		function sddMakeRequest(url,id, a) {
		        if (window.XMLHttpRequest) {
		            sddHttpRequest = new XMLHttpRequest();
		            if (sddHttpRequest.overrideMimeType) {
		                sddHttpRequest.overrideMimeType('text/xml');
		            }
		        }
		        else if (window.ActiveXObject) {
		            try { sddHttpRequest = new ActiveXObject("Msxml2.XMLHTTP"); }
		                catch (e) {
                           try { sddHttpRequest = new ActiveXObject("Microsoft.XMLHTTP"); }
		                   catch (e) {}
		                 }
		        }
		        if (!sddHttpRequest) {
		            alert('Sorry but I Cannot create an XMLHTTP instance');
		            return false;
		        }
		        if(a == 0) {
					sddHttpRequest.onreadystatechange = function() { sddFileRemoved(sddHttpRequest,id); };
		        }
		        else if(a == 1){
		        	sddHttpRequest.onreadystatechange = function() { sddLicenceChanged(sddHttpRequest,id); };
		        }
		        sddHttpRequest.open('GET', url, true);
		        sddHttpRequest.send(null);
		    }
		    function sddFileRemoved(r,id) {
		    	if(sddHttpRequest.readyState == 4) {
		    		if (sddHttpRequest.status == 200) {
						document.getElementById(id).innerHTML = r.responseText;
		    		}
		    	}
		    }
		    function sddLicenceChanged(r,id) {
		    	if(sddHttpRequest.readyState == 4) {
		    		if (sddHttpRequest.status == 200) {
		    			document.getElementById("lbox_"+id).innerHTML = r.responseText;
		    		}
		    	}
		    }
		    function sddRemoveFile(id) {
		    	if(id) {
		    		url = "<?php echo $config->liveSite;?>/index2.php?option=com_sobi2<?php echo str_replace( 'amp;', null, _SDP_J15 ); ?>&sobi2Task=sobiDDremove&id="+id+"&sid=<?php echo $ssid;?>&sobi2Id=<?php echo $sobi2Id;?>&Itemid=<?php echo $config->sobi2Itemid;?>";
		    		sddMakeRequest(url,id, 0);
		    	}
		    }
		    function sddAssignLicense(id, lid) {
		    	if(id) {
		    		url = "<?php echo $config->liveSite;?>/index2.php?option=com_sobi2<?php echo str_replace( 'amp;', null, _SDP_J15 ); ?>&sobi2Task=sobiDDassignLicence&id="+id+"&sid=<?php echo $ssid;?>&sobi2Id=<?php echo $sobi2Id;?>&lid=" + lid + "&Itemid=<?php echo $config->sobi2Itemid;?>";
		    		sddMakeRequest(url,id, 1);
		    	}
		    }
		/* ]]> */
		// -->
		</script>
    	<?php
		$s = ob_get_contents();
		ob_end_clean();
		return $s;
    }
}
?>