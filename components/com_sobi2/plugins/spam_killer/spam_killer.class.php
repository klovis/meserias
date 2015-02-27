<?php
/**
* @version $Id: spam_killer.class.php 4929 2009-03-05 15:02:03Z Radek Suski $
* @package: Gallery Plugin for Sigsiu Online Business Index 2
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* The Gallery Plugin is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/
defined( '_SOBI2_' ) || ( trigger_error( 'Restricted access', E_USER_ERROR)  && exit() );

class espam_killer {

	/**
	 * @var string
	 */
	public $name = 'spam_killer';
	/**
	 * @var null
	 */
	public $listingStyle = null;

    /**
     * Trigger on onSobiStart action
     *
     * @param array $input
     * @return array
     */
    public function onSobiStart()
    {
    	$task = sobi2Config::request( $_REQUEST, 'sobi2Task', null );
    	if( $task == 'saveSobi' || $task == 'updateSobi' ) {
    		$this->check();
    	}
    }

    /**
	 * @author EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
	 * @author Nikolai Plath {@link http://www.easy-joomla.org}
     */
    private function check()
    {
		/*
		 * ADD NiK START
		 * We load the plugin group 'easy' and define an event 'onSaveSobi2Entry'
		 */

		//--Easy plugins
		JPluginHelper::importPlugin( 'easy' );

		//--Get reference to dispatcher
		$dispatcher	=& JDispatcher::getInstance();

    	$config =& sobi2Config::getInstance();
		$my 	=& $config->getUser();
		$db		=& $config->getDb();
		if( $config->mailSoJ == 0 ) {
			$query = "SELECT DISTINCT langKey FROM #__sobi2_language WHERE fieldid = {$config->mailFieldId} LIMIT 1";
			$db->setQuery( $query );
			$email = $db->loadResult();
			if ( $db->getErrorNum() ) {
				trigger_error("DB reports: ".$db->stderr(), E_USER_WARNING);
			}
			else {
				JRequest::setVar( 'field_email', sobi2Config::request( $_REQUEST, $email ) );
			}

		}
		//--Custom handlers
		$results = $dispatcher->trigger( 'onSaveSobi2Entry', array() );
		foreach( $results as $result )
		{
			if( JError::isError( $result ) ) {
				//--A plugin returned an error - hopefully it has displayed some message cause..
				//--We will end here
				JError::raiseError( 403, 'Possible SPAM attempt. If you feel that this is an error - please inform our site administrator' );
				// just to be sure ...
				exit();
			}
		}
    }
}
?>