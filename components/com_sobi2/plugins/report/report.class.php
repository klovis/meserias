<?php
/**
* @version $Id: report.class.php 4508 2008-10-06 10:33:37Z Radek Suski $
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
class sobi_report {
	/**
	 * @var string
	 */
	var $name = "Report Listing";
	/**
	 * @var string
	 */
	var $name_id = "Report Listing";
	/**
	 * @var bool
	 */
	var $showReason = true;
	/**
	 * @var bool
	 */
	var $reasonReq = true;
	/**
	 * @var array
	 */
	var $reasons = array();
	/**
	 * @var int
	 */
	var $eMailTo = 1;
	/**
	 * @var array
	 */
	var $eMailCustom = array();
	/**
	 * @var bool
	 */
	var $mailToOwner = true;
	/**
	 * @var bool
	 */
	var $anonym = true;
	/**
	 * @var string
	 */
	var $explanation = "";
	/**
	 * @var string
	 */
	var $explToolTip = "";
	/**
	 * @var bool
	 */
	var $captcha = true;
	/**
	 * @var array
	 */
	var $_language = array();
	/**
	 * @var string
	 */
	var $listingStyle = "";

	/**
	 * Enter description here...
	 *
	 * @return sobi_report
	 */
	function sobi_report()
	{
		if( sobi2Config::translatePath( "administrator|components|com_sef|includes|css|opensef", "root", true, ".css" ) ) {
			define( "__OPENSEF_INSTALLED", true );
		}
		$config =& sobi2Config::getInstance();
		if( !$lang = sobi2Config::translatePath( "plugins|report|{$config->sobi2Language}", "front", true, ".ini" ) ) {
			$lang = sobi2Config::translatePath( "plugins|report|english", "front", true, ".ini" );
		}
		$this->_language = parse_ini_file( $lang );
		$config =& sobi2Config::getInstance();
		$db =& $config->getDb();
		$db->setQuery( "SELECT * FROM #__sobi2_plugin_report_config ");
		$c = $db->loadObjectList();
		if ( $db->getErrorNum() ) {
			trigger_error( "DB reports: ".$db->stderr(), E_USER_WARNING );
		}
		foreach ( $c as $r ) {
			$k = trim( (string) $r->configKey );
			if( isset( $this->$k ) ) {
				$this->$k = $r->configValue;
			}
		}
		$this->eMailCustom 	= strstr( $this->eMailCustom, "[|]" ) 	? explode( "[|]", str_replace( array( "\n", "\r"), null, $this->eMailCustom ) ) 	: array();
		$this->reasons 		= strstr( $this->reasons, "[|]" ) 		? explode( "[|]", str_replace( array( "\n", "\r"), null, $this->reasons ) ) 		: array();

	}
	/**
	 * Enter description here...
	 *
	 * @param string $sobi2Task
	 * @return bool
	 */
	function customTask( $sobi2Task )
	{
		switch( $sobi2Task ) {
			// report listing show safety code image
			case "rlssci":
				sobi2Config::import( "plugins|report|report.class.html" );
				sobi_report_html::showSafetyImage();
				$ret = true;
				break;
			case "report_listing":
				sobi2Config::import( "sobi2.class" );
				sobi2Config::import( "plugins|report|report.class.html" );
				sobi_report_html::showForm( $this );
				$config =& sobi2Config::getInstance();
				$db =& $config->getDb();
				$time = date( 'Y-m-d H:i:s', ( time() - 1800 ) );
				$db->setQuery( "DELETE FROM #__sobi2_plugin_report_sessions WHERE time < '{$time}' ");
				$db->query();
				if ( $db->getErrorNum() ) {
					trigger_error( "DB reports: ".$db->stderr(), E_USER_WARNING );
				}
				$ret = true;
				break;
			case "sendListingReport":
				sobi2Config::import( "sobi2.class" );
				$this->sendListingReport();
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
	function sendListingReport()
	{
		$code 		= sobi2Config::request( $_POST, "rlp_nickname", null );
		$secCheck 	= sobi2Config::request( $_POST, "security_code", null );
		if( $secCheck ) {
			sobi2Config::redirect( "index.php", _SOBI2_NOT_AUTH );
			exit();
		}
		$name 	= sobi2Config::request( $_POST, "rlp_name", null );
		$mail 	= sobi2Config::request( $_POST, "rlp_majka", null );
		$reason	= sobi2Config::request( $_POST, "rlp_reason", null );
		$mesg	= sobi2Config::request( $_POST, "rlp_report", null );
		$sess	= sobi2Config::request( $_POST, "SobiSSID", null );
		$sid	= (int) sobi2Config::request( $_POST, "sid", null );
		$go 	= true;
		$config =& sobi2Config::getInstance();
		$db 	=& $config->getDb();
		if( $this->captcha ) {
			$db->setQuery( "SELECT * FROM `#__sobi2_plugin_report_sessions` WHERE `sid` = '{$sess}' LIMIT 1" );
			$words = null;
			if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
				$words = $db->loadObject();
			}
	    	else {
	    		$db->loadObject( $words );
	    	}
			if ( $db->getErrorNum() ) {
				trigger_error( "DB reports: ".$db->stderr(), E_USER_WARNING );
			}
			$db->setQuery( "DELETE FROM `#__sobi2_plugin_report_sessions` WHERE `sid` = '{$sess}' LIMIT 1" );
			$db->query();
			if ( $db->getErrorNum() ) {
				trigger_error( "DB reports: ".$db->stderr(), E_USER_WARNING );
			}
			$code = explode( " ", $code );
			$w1 = strtolower( trim( $code[0] ) );
			$w2 = strtolower( trim( $code[1] ) );
			$c1 = strtolower( trim( $words->word1 ) );
			$c2 = strtolower( trim( $words->word2 ) );
			if( ( $w1 != $c1 ) || ( $w2 != $c2 ) ) {
				$secCodeMsg = $this->txt( "msg_wrong_sec_code" );
				$o = defined( "__OPENSEF_INSTALLED" ) ? "?option=com_sobi2" : null;
				echo "<form action=\"{$config->liveSite}/index.php{$o}\" id=\"rlp_send\" method=\"POST\">";
				echo "<input type=\"hidden\" name=\"option\" value=\"com_sobi2\"/>";
				echo "<input type=\"hidden\" name=\"sobi2Task\" value=\"report_listing\"/>";
				echo "<input type=\"hidden\" name=\"sid\" value=\"{$sid}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_name\" value=\"{$name}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_majka\" value=\"{$mail}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_reason\" value=\"{$reason}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_report\" value=\"{$mesg}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_msg\" value=\"{$secCodeMsg}\"/>";
				echo "<input type=\"hidden\" name=\"Itemid\" value=\"{$config->sobi2Itemid}\"/>";
				echo '</form>';
				echo "<script> document.getElementById('rlp_send').submit();</script>";
				$go = false;
			}
		}
		if( !strstr( $mail, "@" ) ) {
			$Msg = $this->txt( "msg_wrong_email" );
				$o = defined( "__OPENSEF_INSTALLED" ) ? "?option=com_sobi2" : null;
				echo "<form action=\"{$config->liveSite}/index.php{$o}\" id=\"rlp_send\" method=\"POST\">";
				echo "<input type=\"hidden\" name=\"option\" value=\"com_sobi2\"/>";
				echo "<input type=\"hidden\" name=\"sobi2Task\" value=\"report_listing\"/>";
				echo "<input type=\"hidden\" name=\"sid\" value=\"{$sid}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_name\" value=\"{$name}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_majka\" value=\"{$mail}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_reason\" value=\"{$reason}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_report\" value=\"{$mesg}\"/>";
				echo "<input type=\"hidden\" name=\"rlp_msg\" value=\"{$secCodeMsg}\"/>";
				echo "<input type=\"hidden\" name=\"Itemid\" value=\"{$config->sobi2Itemid}\"/>";
				echo '</form>';
				echo "<script> document.getElementById('rlp_send').submit();</script>";
				$go = false;
		}
		if( $go ) {
			$sobi = new sobi2( $sid );
			$sobihref = sobi2Config::sef( "index.php?option=com_sobi2&amp;sobi2Task=sobi2Details&amp;sobi2Id={$sid}&amp;Itemid={$config->sobi2Itemid}" );
			$mailMsg = str_replace(
				array( "%name%", "%usermail%", "%reason%", "%sobititle%", "%url%", "%msg%", "%newline%" ),
				array( $name, $mail, $reason, $sobi->title, $sobihref, $mesg, "\n" ),
				$this->txt( "report_mail_text" )
			);
			$mailMsg .= $config->mailFooter;
			$mailSub = str_replace(
				array( "%name%", "%usermail%", "%reason%", "%sobititle%", "%url%", "%msg%" ),
				array( $name, $mail, $reason, $sobi->title, $sobihref, $mesg ),
				$this->txt( "report_mail_subject" )
			);
			if( $this->eMailTo && is_array( $this->eMailCustom ) ) {
				foreach ( $this->eMailCustom as $mail ) {
					sobi2bridge::mail( $mail, $mail, $mail, $config->makeSubject( $mailSub ), $mailMsg );
				}
			}
			else {
				$query = "SELECT email, name"
					. "\n FROM #__users"
					. "\n WHERE gid IN ({$config->mailAdmGid})"
					. "\n AND ( sendemail = 1 OR gid IN (18, 19, 20, 21, 23) )"
					;
				$db->setQuery( $query );
				$adminRows = $db->loadObjectList();
				if ( $db->getErrorNum() ) {
					trigger_error ("DB reports: ".$db->stderr(), E_USER_WARNING );
				}
				foreach( $adminRows as $adminRow ) {
					sobi2bridge::mail( $adminRow->email, $adminRow->name, $adminRow->email, $config->makeSubject( $mailSub ), $mailMsg );
				}

			}
			if( $this->mailToOwner ) {
				if( $config->mailSoJ == 0 ) {
					$query = "SELECT `data_txt` FROM `#__sobi2_fields_data` WHERE `fieldid` = {$config->mailFieldId} AND `itemid` = {$sid}";
					$db->setQuery( $query );
					$email = $db->loadResult();
					if ( $db->getErrorNum() ) {
						trigger_error("DB reports: ".$db->stderr(), E_USER_WARNING );
					}
				}
				else {
					$u =& sobi2bridge::jUser( $db );
					$u->load( $sobi->owner );
					$email = $u->email;
				}
				if( !isset( $email ) || !$email ) {
					trigger_error( "Having no valid email address for entry '{$sobi->title}' (id:{$sobi->id}) owner.", E_USER_WARNING);
				}
				else {
					sobi2bridge::mail( $config->mailfrom, $config->fromname, $email, $config->makeSubject( $mailSub ), $mailMsg );
				}
			}
			sobi2Config::redirect( $sobihref, $this->txt( "msg_thanks_for_reporting" ) );
		}
	}
    /**
     * Enter description here...
     *
     * @param int $sobi2Id
     * @return string
     */
    function showDetails( $sobi2Id )
    {
    	$config =& sobi2Config::getInstance();
		$a = sobi2Config::sef( "index.php?option=com_sobi2&amp;sobi2Task=report_listing&amp;sid={$sobi2Id}&Itemid={$config->sobi2Itemid}" );
		$t = $this->txt( "report_listing_label" );
    	$view = null;
    	$view .= "<a href=\"{$a}\" title=\"{$t}\">{$t}</a>";
    	if( strlen( $this->explToolTip ) ) {
    		$view .= "&nbsp;".sobiHTML::toolTip( $this->explToolTip, $t, null, "info.png" );
    	}
    	return $view;
    }
	/**
	 *
	 * @param string $txt
	 * @return string
	 */
	function txt( $txt )
	{
		return ( isset( $this->_language[$txt] ) && $this->_language[$txt] ) ? $this->_language[$txt] : $txt;
	}
}
?>