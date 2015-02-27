<?php
/**
 * @version $Id: sobisef.class.php 5367 2010-02-10 19:35:26Z Sigrid Suski $
 * @package: Sigsiu Online Business Index 2
 * @subpackage SobiSEF Plugin for Joomla 1.5 Core SEF function
 * ===================================================
 * @author
 * Name: Sigrid & Radek Suski, Sigsiu.NET GmbH
 * Email: sobi[at]sigsiu.net
 * Url: http://www.sigsiu.net
 * ===================================================
* @copyright Copyright (C) 2007-2010 Sigsiu.NET GmbH (www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL V2.
* You can use, redistribute this file and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
 */
defined( '_SOBI2_' ) || ( trigger_error( "Restricted access", E_USER_ERROR ) && exit() );
class sobi_sef
{
	/**
	 * @var string
	 */
	var $name = "SobiSEF";
	/**
	 * @var string
	 */
	var $pageSuffix = ".html";
	/**
	 * @var string
	 */
	var $pageName = "page";
	/**
	 * @var string
	 */
	var $pageFormat = "%s_%d";
	/**
	 * @var bool
	 */
	var $useAutomap = false;
	/**
	 * @var bool
	 */
	var $addSid = false;
	/**
	 * @var string
	 */
	var $sidFormat = "%title_%id";
	/**
	 * @var string
	 */
	var $specChars = "&,ä,ö,ü,ß,ę,ó,ą,ś,ł,ż,ź,ć,ń";
	/**
	 * @var string
	 */
	var $specCharsD = "and,ae,oe,ue,ss,e,o,a,s,l,z,z,c,n";
	/**
	 * @var string
	 */
	var $spaceChar = "-";
	/**
	 * @var string
	 */
	var $stripChars = '!,$,%,@,?,#,(,),+,*';
	/**
	 * @var bool
	 */
	var $toLower = true;
	/**
	 * @var bool
	 */
	var $debug = false;
	/**
	 * @var string
	 */
	var $debugForIP = "0.0.0.0.0";
	/**
	 * @var string
	 */
	var $listingStyle = "";
	/**
	 * @var bool
	 */
	var $on = 1;
	/**
	 * add categories to url
	 *
	 * @var bool
	 */
	var $addCat = 1;
	/**
	 * create url with all cats
	 *
	 * @var bool
	 */
	var $allCats = 1;
	/**
	 * user definable task
	 *
	 * @var array
	 */
	var $specialTask = array();
	/**
	 * @var string
	 */
	var $dirSep = "/";
	/**
	 * allways add suffix (.html)
	 *
	 * @var bool
	 */
	var $alwaysSuffix = 1;
	/**
	 * get urls on the fly
	 *
	 * @var bool
	 */
	var $onTheFly = 1;
	/**
	 * user name or user real name
	 *
	 * @var int
	 */
	var $uname = 1;
	/**
	 * @var int
	 */
	var $maxCreations = 5;
	/**
	 * @var array
	 */
	var $query = array();
	/**
	 * @var array
	 */
	var $unset = array();
	/**
	 * @var JConfig
	 */
	var $JConfig = array();

	/**
	 * constructor
	 * @return sobi_sef
	 */
	function sobi_sef ()
	{
		$config = & sobi2Config::getInstance();
		$db = & $config->getDb();
		$q = "SELECT configValue, configKey FROM #__sobi2_config WHERE `sobi2Section` = 'sobi_sef'";
		$db->setQuery( $q );
		$confArray = $db->loadObjectList();
		/* create config */

		if ( ! empty( $confArray ) ) {
			foreach ( $confArray as $setting ) {
				$k = str_replace( "ssef_", null, trim( $setting->configKey ) );
				if ( isset( $this->$k ) ) {
					$this->$k = trim( $setting->configValue );
				}
			}
			//einige Korrekturen durchfuehren
			$this->stripChars = stripslashes($this->stripChars);
			$this->specChars = stripslashes($this->specChars);
			$this->specCharsD = stripslashes($this->specCharsD);

			$this->specialTask = unserialize( $this->specialTask );
			if ( ! is_array( $this->specialTask ) ) {
				if ($this->on)
					trigger_error( "sobi_sef::sobi_sef(): special tasks array is missing" );
				$this->specialTask = array( "usersListing" => "user" , "popular" => "popular" , "new" => "new" , "alpha" => "alpha" , "tag" => "tag" , "addNew" => "add-new" , "search" => "search" , "topRated" => "top rated" , "mostReviewed" => "most reviewed" , "featuredListing" => "featured" , "updated" => "updated" );
			}
			$this->JConfig = new JConfig();
			// tja .. dumm gelaufen
			if ( sobi2Config::translatePath( "components|com_sh404sef|sef_ext|com_sobi2", "root", true ) ) {
				$this->JConfig->sef_suffix = 0;
			}
		}
		else {
			$this->on = 0;
			trigger_error( "sobi_sef::sobi_sef(): config is missing" );
			return false;
		}
		if ( ! $this->on ) {
			return false;
		}
		sobi_sef::getInstance( $this );
	}
	/**
	 * singleton
	 * @return sobi_sef
	 */
	function &getInstance ( $set = null )
	{
		static $plugin;
		if ( $set && is_a( $set, "sobi_sef" ) ) {
			$plugin = & $set;
		}
		elseif ( ! is_a( $plugin, "sobi_sef" ) ) {
			$plugin = new sobi_sef( );
		}
		return $plugin;
	}
	/**
	 * Set used parameters
	 *
	 * @param string $key
	 */
	function unsetQuery ( $key )
	{
		$this->unset[] = $key;
	}
	/**
	 * Closing - remove all used params
	 *
	 */
	function close ( $full = false )
	{
		if ( $full ) {
			$ItId = isset( $this->query[ 'Itemid' ] ) ? $this->query[ 'Itemid' ] : null;
			$this->query = array( 'option' => 'com_sobi2' );
			if ( $ItId ) {
				$this->query[ 'Itemid' ] = $ItId;
			}
		}
		else {
			foreach ( $this->unset as $key ) {
				if ( isset( $this->query[ $key ] ) ) {
					unset( $this->query[ $key ] );
				}
			}
		}
	}
	/**
	 * creating new sef url
	 * @param array $string
	 * @return array
	 */
	function create ( &$query, $save = true )
	{
		if ( ! $this->on ) {
			return false;
		}
		if ( $this->debug ) {
			sobi2Config::_d( "Incoming request: " );
			sobi2Config::_d( $query );
		}
		$saveQuery = $query;
		$this->query = & $query;
		$config = & sobi2Config::getInstance();
		static $count = 0;
		if ( $this->maxCreations > 0 && $count >= $this->maxCreations ) {
			if ( $this->debug )
				sobi2Config::_d( "Limit {$this->maxCreations} exceeded skipping. Query number: {$count}" );
			$query = $saveQuery;
			return false;
		}
		$sefstring = null;
		$string = "index.php?";
		foreach ( $query as $k => $v ) {
			if ( $k != 'Itemid' && $v ) {
				$string .= "{$k}={$v}&";
			}
		}
		if ( ! ( isset( $this->query[ 'Itemid' ] ) ) ) {
			$this->query[ 'Itemid' ] = $this->fixItemid( $string );
			if ( $this->debug )
				sobi2Config::_d( "Overwriting Itemid" );
		}
		/* because Joomla gives for some reason only the array ( 'Itemid' => 'XX','option' => 'com_sobi2') */
		elseif ( ( count( $this->query ) == 2 || ( isset( $this->query[ 'start' ] ) ) ) && isset( $this->query[ 'Itemid' ] ) ) {
			$this->fixURL( $this->query[ 'Itemid' ], $string );
			if ( $this->debug )
				sobi2Config::_d( "Overwriting link" );
		}
		$sefstring = null;
		$string = "index.php?";
		foreach ( $query as $k => $v ) {
			if ( $k != 'Itemid' && $v ) {
				$string .= "{$k}={$v}&";
			}
		}
		if ( $string[ strlen( $string ) - 1 ] == "&" ) {
			$string = substr( $string, 0, ( strlen( $string ) - 1 ) );
		}
		if ( $this->debug ) {
			sobi2Config::_d( "Incoming request: " . $string );
			sobi2Config::_d( $query );
		}
		$string = str_replace( "&start=", "&limitstart=", $string );
		$string = str_replace( "&", "&amp;", $string );
		/* if already exist */
		if ( $sefstring = $this->findUrl( $string ) ) {
			if ( $this->debug )
				sobi2Config::_d( "URL exists - translated: " . $sefstring );
			$this->close( true );
			return strlen( $sefstring ) > 2 ? explode( $this->dirSep, $sefstring ) : array();
		}
		/* get task */
		$task = $this->getTask( $string );
		/* get catid */
		$cid = $this->getCid( $string );
		/* get sobi id */
		$sid = $this->getSid( $string );
		/* get the page */
		$page = $this->getPage( $string );
		if ( $this->debug )
			sobi2Config::_d( "Parameters created: Task=|{$task}|  Catid=|{$cid}|  SobiId=|{$sid}|  Page=|{$page}|" );
			/* if the automap is off do not create new url */
		if ( ! $this->useAutomap ) {
			if ( $this->debug )
				sobi2Config::_d( "auto map is off" );
			$query = $saveQuery;
			return false;
		}
		/* first check plugins */
		if ( ! empty( $config->S2_plugins ) ) {
			foreach ( $config->S2_plugins as $plugin ) {
				if ( method_exists( $plugin, "createSEFurl" ) ) {
					$urls = $plugin->createSEFurl( $string, $this );
					if ( $this->debug )
						sobi2Config::_d( "Plugin {$plugin->name} gives a result" );
				}
			}
		}
		/* but if plugin not giving SEF url */
		if ( ! isset( $urls ) ) {
			/* if sobi id - this is details view */
			if ( $sid ) {
				if ( $this->debug )
					sobi2Config::_d( "Creating FURL for entry: {$sid}" );
				$urls = $this->getEntryUrl( $sid, $string );
			} /* if not then probably category view */
			elseif ( $cid && $task != 'rss' ) {
				if ( $this->debug )
					sobi2Config::_d( "Creating FURL for category: {$cid}" );
				if ( $cid < 2 ) {
					$urls = $this->getFrontUrl( $page, $string );
				}
				else {
					$urls = $this->getCatUrl( $cid, $page, $string );
				}
			} /* if not then maybe some special task */
			elseif ( $task ) {
				if ( $this->debug )
					sobi2Config::_d( "Creating FURL for task: {$task}" );
				$urls = $this->getTaskUrl( $task, $page, $string );
			} /* if not could be only the frontpage */
			else {
				$urls = $this->getFrontUrl( $page, $string );
			}
		}
		/* if we created new urls - save it */
		if ( isset( $urls ) && is_array( $urls ) && ! empty( $urls ) ) {
			if ( $save ) {
				$count ++;
				if ( $this->debug )
					sobi2Config::_d( "URL array exists - saving in database" );
				$config->sobiCache->clearAll();
				$cUrls = array();
				foreach ( $urls as $int => $ext ) {
					$ext = str_replace( array( ',' , '....' , '...' , '..' , '----' , '---' , '--' , '____' , '___' , '__' ), array( '-' , '.' , '.' , '.' , '-' , '-' , '-' , '_' , '_' , '_' ), $ext );
					if (strlen($ext) > 0) {
						if ( $ext[ strlen( $ext ) - 1 ] == '.' ) {
							$ext = substr( $ext, 0, strlen( $ext ) - 1 );
						}
					}
					$cUrls[ $int ] = $ext;
				}
				$urls = $cUrls;
				$this->saveUrl( $cUrls, $string );
			}
		}
		/* get the first entry from the array and return as a url */
		$index = html_entity_decode( $string . '&Itemid=' . $this->query[ 'Itemid' ] );
		if ( ! empty( $urls ) && isset( $urls[ $index ] ) ) {
			$this->close();
			$return = explode( $this->dirSep, $urls[ $index ] );
			return $return;
		} /* it's not really possible but who knows */
		else {
			$query = $saveQuery;
			return false;
		}
	}
	function fixURL ( $id, $string )
	{
		static $queries = array();
		if ( $this->debug )
			sobi2Config::_d( "Incoming request for Itemid: $id and URL: $string" );
		if ( ! isset( $queries[ $string . $id ] ) ) {
			$menu = & JSite::getMenu();
			$item = $menu->getItem( $id );
			$this->query = array_merge( $item->query, $this->query );
			if ( $this->debug ) {
				sobi2Config::_d( 'Fixing query follows...' );
				sobi2Config::_d( $this->query );
			}
			$queries[ $string . $id ] = $this->query;
		}
		else {
			$this->query = $queries[ $string . $id ];
		}
	}
	/**
	 * searching for existing urls
	 * @param string $string
	 * @return string
	 */
	function findUrl ( $string )
	{
		$string = html_entity_decode( $string );
		if ( $this->debug )
			sobi2Config::_d( "Incoming string: {$string}" );
		$a = $this->fixItemid( $string );
		static $arr = array();
		$config = & sobi2Config::getInstance();
		if ( isset( $arr[ $string . '_' . $a ] ) ) {
			$r = $arr[ $string . '_' . $a ];
			if ( $this->debug )
				sobi2Config::_d( "Already exists: {$r}" );
		}
		elseif ( $r = $this->findLink( $string ) ) {
			if ( $this->debug )
				sobi2Config::_d( "Found link: {$r}" );
			$r = true;
			$arr[ $string . '_' . $a ] = $r;
		}
		else {
			$r = null;
			$db = & $config->getDb();
			$this->removeItemId( $string );
			if( !$this->allCats && strstr( $string, 'sobi2Details' ) && strstr( $string, 'catid' ) ) {
				$string = preg_replace( '/catid=(\d+)/', 'catid=%', $string );
				$query = "SELECT external, internal FROM #__sobi2_plugin_sef WHERE internal LIKE '{$string}&Itemid%' AND published = 1 ORDER BY link_prio DESC, id LIMIT 1";
				if ( $this->debug )
					sobi2Config::_d( "Setting query: {$query}" );
				$db->setQuery( $query );
				$r = $db->loadObject();
				if( $r ) {
					$a = explode( '&', $r->internal );
					foreach ( $a as $part ) {
						if( strstr( $part, 'Itemid' ) ) {
							$part = explode( '=', $part );
							$this->query[ 'Itemid' ] = $part[ 1 ];
							$a = $part[ 1 ];
							break;
						}
					}
					$r = $r->external;
				}
			}
			if ( !$r ) {
				$query = "SELECT external FROM #__sobi2_plugin_sef WHERE internal = '{$string}&Itemid={$a}' AND published = 1 ORDER BY link_prio DESC, id LIMIT 1";
				if ( $this->debug )
					sobi2Config::_d( "Setting query: {$query}" );
				$db->setQuery( $query );
				$r = $db->loadResult();
			}
			if (!$r) {	//wenn fuer diese Itemid nichts gefunden (d.h. noch keine FURL erzeugt) dann suche nach irgendeiner Itemid
				$query = "SELECT external FROM #__sobi2_plugin_sef WHERE internal LIKE '{$string}&Itemid=%' AND published = 1 ORDER BY link_prio DESC, id LIMIT 1";
				if ( $this->debug )
					sobi2Config::_d( "Setting query: {$query}" );
				$db->setQuery( $query );
				$r = $db->loadResult();
			}

			if ( $this->debug )
				sobi2Config::_d( "DB answers: |{$r}|" );
			if ( $db->getErrorNum() ) {
				trigger_error( "sobi_sef: DB reports: " . $db->stderr(), E_USER_WARNING );
			}
			$arr[ $string . '_' . $a ] = $r;
		}
		/* need to remove the Joomla part */
		$alias = $this->getAlias( $a );
		if ( $alias ) {
			$r = preg_replace( "|/{$alias}|", null, $r, 1 );
		}
		return $r;
	}
	function findLink ( $str )
	{
		static $ids = array();
		$a = isset( $this->query[ 'Itemid' ] ) ? $this->query[ 'Itemid' ] : 0;
		if ( ! isset( $ids[ $str . '_' . $a ] ) ) {
			$menu = & JSite::getMenu();
			if ( ( count( $this->query ) == 2 ) && ( $this->query[ 'Itemid' ] ) ) {
				$item = $menu->getItem( $this->query[ 'Itemid' ] );
			}
			else {
				$item = $menu->getItems( 'link', $str, true );
			}
			$ids[ $str . '_' . $a ] = isset( $item->route ) ? $item->route : false;
		}
		if ( $this->debug )
			sobi2Config::_d( "Checking for {$str}: [{$ids[ $str.'_'.$a ]}]" );
		return $ids[ $str . '_' . $a ];
	}
	/**
	 * getting all urls at once
	 * @return array
	 */
	function getAllUrls ()
	{
		static $arr = null;
		if ( is_array( $arr ) && ! empty( $arr ) ) {
			return $arr;
		}
		$arr = array();
		$config = & sobi2Config::getInstance();
		$db = & $config->getDb();
		$query = "SELECT external, internal FROM #__sobi2_plugin_sef WHERE internal LIKE '%index.php?option=com_sobi2%' AND published = 1 ORDER BY link_prio, id";
		$db->setQuery( $query );
		if ( ! $config->forceLegacy && class_exists( "JDatabase" ) ) {
			$urls = $db->loadObject();
		}
		else {
			$db->loadObject( $urls );
		}
		if ( $db->getErrorNum() ) {
			trigger_error( "sobi_sef:: DB reports: " . $db->stderr(), E_USER_WARNING );
		}
		if ( is_array( $urls ) && ! empty( $urls ) ) {
			foreach ( $urls as $url ) {
				$arr[ $url->internal ] = $url->external;
			}
		}
		return $arr;
	}
	/**
	 * @return string
	 */
	function revert ()
	{
		if ( ! $this->on ) {
			return false;
		}
		$config = & sobi2Config::getInstance();
		$live = str_replace( array( 'http://' , 'https://' ), null, $config->liveSite );
		$host = sobi2Config::request( $_SERVER, 'HTTP_HOST', null );
		$request = sobi2Config::request( $_SERVER, 'REQUEST_URI', null );
		if( strstr( $request, '?' ) ) {
			$request = explode( '?', $request );
			$request = $request[ 0 ];
		}
		// if subdirectory
		if ( $host != $live ) {
			$subdir = str_replace( $host, null, $live );
			$request = str_replace( $subdir . '/', null, $request );
		}
		else {
			$request = substr( $request, 1 );
		}
		$r = false;
		// if not mod_rewrite
		if ( strstr( $request, "index.php/" ) ) {
			$request = str_replace( "index.php/", null, $request );
		}
		// if we don't have Menu Itemid
		if ( strstr( $request, "component/" ) ) {
			$request = str_replace( "component/", null, $request );
		}
		$JConfig = new JConfig( );
		if ( $JConfig->sef_suffix == 1 ) {
			$request = substr( $request, 0, strlen( $request ) - 5 );
		}
		$request = '/' . $request;
		if ( $this->debug )
			sobi2Config::_d( "Incoming request: {$request}" );
		static $arr = array();
		$req = $request;
		/* search in Joomla menu first - if it was external link J! didn't reverted it */
		/* get the last element - this is the alias */
		$alias = explode( '/', $request );
		/* remove the page suffix */
		$alias = str_replace( $this->pageSuffix, null, $alias[ count( $alias ) - 1 ] );
		/* get J! menu object */
		$menu = & JSite::getMenu();
		/* get all elements with this alias */
		$items = $menu->getItems( 'alias', $alias );
		/* if there are any */
		if( count( $items ) ) {
			/* travel through these */
			foreach ( $items as $item ) {
				/* if the option for this item was sobi2  - then it is the right one */
				if( $item->query[ 'option' ] == 'com_sobi2' ) {
					if ( $this->debug )
						sobi2Config::_d( "Found in menu: {$item->link}" );
					/* small cheat - save it the array with already translated elements */
					$arr[ $request ] = $item->link;
					/* and we are ready */
					break;
				}
			}
		}
		if ( isset( $arr[ $request ] ) ) {
			$r = $arr[ $request ];
			if ( $this->debug )
				sobi2Config::_d( "Found in existing: {$r}" );
		}
		else {
			$config = & sobi2Config::getInstance();
			$db = & $config->getDb();
			$query = "SELECT internal FROM #__sobi2_plugin_sef WHERE external = '{$request}' AND published = 1 ORDER BY link_prio DESC, id LIMIT 1";
			if ( $this->debug )
				sobi2Config::_d( "Setting query: {$query}" );
			$db->setQuery( $query );
			$r = $db->loadResult();
			if ( $this->debug )
				sobi2Config::_d( "DB answers: |{$r}|" );
			if ( $db->getErrorNum() ) {
				trigger_error( "sobi_sef:: DB reports: " . $db->stderr(), E_USER_WARNING );
			}
			if ( is_null( $r ) ) {
				if ( $request[ strlen( $request ) - 1 ] != $this->pageSuffix ) {
					if ( $request[ strlen( $request ) - 1 ] == "/" ) {
						$request = substr( $request, 0, strlen( $request ) - 1 );
					}
					$query = "SELECT internal FROM #__sobi2_plugin_sef WHERE external = '{$request}' AND published = 1 ORDER BY link_prio, id LIMIT 1";
					$db->setQuery( $query );
					if ( $this->debug )
						sobi2Config::_d( "Setting second query: {$query}" );
					$r = $db->loadResult();
					if ( $this->debug )
						sobi2Config::_d( "DB answers: |{$r}|" );
					if ( $db->getErrorNum() ) {
						trigger_error( "sobi_sef:: DB reports: " . $db->stderr(), E_USER_WARNING );
					}
					if ( is_null( $r ) ) {
						/* if contain .php it was not SEF URL so this is not an error */
						if ( ! strstr( $request, ".php" ) ) {
							if ( $this->debug )
								sobi2Config::_d( "sobi_sef::revert(): cannot revert address {$request}" );
						}
						else {
							if ( $this->debug )
								sobi2Config::_d( "Is a nonSEF url - skipping" );
						}
					}
				}
			}
			$arr[ $req ] = $r;
		}
		$_SERVER[ 'REQUEST_URI' ] = $r;
		$r = str_replace( array( "index.php?option=com_sobi2&" , "index.php?option=com_sobi2&amp;" ), null, $r );
		$r = explode( "&", $r );
		$raar = array();
		foreach ( $r as $var ) {
			$var = explode( "=", $var );
			if ( isset( $var[ 1 ] ) ) {
				$raar[ $var[ 0 ] ] = $var[ 1 ];
			}
		}
		return $raar;
	}
	/**
	 * @param string $url
	 * @param bool $taskonly task only
	 * @param bool $params params only
	 * @return string
	 */
	function getTask ( $url, $params = false, $taskonly = false )
	{
		$task = null;
		$config = & sobi2Config::getInstance();
		$db = & $config->getDb();
		if ( $this->debug )
			sobi2Config::_d( "Incoming request: {$url}" );
		if ( isset( $this->query[ "sobi2Task" ] ) ) {
			$sobi2Task = $this->query[ "sobi2Task" ];
			if ( $this->debug )
				sobi2Config::_d( "Task is: {$sobi2Task}" );
			$this->unsetQuery( "sobi2Task" );
			/* extracting additional parameters */
			$parameters = array();
			/* ignore this parameters */
			$spec = array( 'sobi2Task' , 'Itemid' , 'limit' , 'limitstart' , 'start' , 'option' , 'search' , 'index.php?option' , 'index2.php?option' , 'sobi2Id' , 'catid' , 'no_html' );
			if ( is_array( $this->query ) && ! empty( $this->query ) ) {
				foreach ( $this->query as $k => $v ) {
					if ( ! in_array( $k, $spec ) ) {
						$parameters[ $k ] = $v;
						$this->unsetQuery( $k );
						if ( $this->debug )
							sobi2Config::_d( "Parameter found: {$k} == {$v}" );
					}
				}
			}
			if ( is_array( $this->query ) && ! empty( $this->query ) && isset( $this->query[ 'no_html' ] ) ) {
				$this->unsetQuery( 'no_html' );
			}
			/* handling for user listing */
			if ( is_array( $parameters ) ) {
				if ( $sobi2Task == "usersListing" ) {
					if ( $this->debug )
						sobi2Config::_d( "Task is userListings" );
					if ( isset( $parameters[ "uid" ] ) && $parameters[ "uid" ] ) {
						$user = & sobi2bridge::jUser( $db );
						$user->load( $parameters[ "uid" ] );
					}
					else {
						$user = & $config->getUser();
					}
					/* what should we use; user real name or login name */
					switch ( $this->uname )
					{
						default:
						case 1:
							$parameters[ "uid" ] = $user->name;
							break;
						case 2:
							$parameters[ "uid" ] = $user->username;
							break;
					}
					if ( $this->debug )
						sobi2Config::_d( "user name is {$parameters["uid"]}" );
					$parameters[ "uid" ] = /*$this->sefEncode*/( $parameters[ "uid" ] );
					$parameters[ $task ] = $parameters[ "uid" ];
					unset( $parameters[ "uid" ] );
					if ( $params ) {
						unset( $sobi2Task );
					}
					elseif ( $taskonly ) {
						unset( $parameters );
					}
				}
				/* calling plugins to translate special parameters */
				if ( ! empty( $config->S2_plugins ) ) {
					foreach ( $config->S2_plugins as $plugin ) {
						if ( method_exists( $plugin, "onSefCreateParams" ) ) {
							$plugin->onSefCreateParams( $parameters );
							if ( $this->debug )
								sobi2Config::_d( "Plugin {$plugin->name} has onSefCreateParams() method" );
						}
					}
				}
			}
			/* if only parameters */
			if ( $params ) {
				if ( is_array( $parameters ) && ! empty( $parameters ) ) {
					return $parameters;
				}
				else {
					return null;
				}
			}
			elseif ( ! empty( $sobi2Task ) && $sobi2Task != 'rss' ) {
				$task = isset( $this->specialTask[ $sobi2Task ] ) ? $this->sefEncode( $this->specialTask[ $sobi2Task ] ) : /*$this->sefEncode */( $sobi2Task );
			}
			elseif ( $sobi2Task == 'rss' ) {
				$task = $sobi2Task;
			}
		}
		else {
			if ( isset( $this->query[ "tag" ] ) ) {
				$tag = $this->query[ "tag" ];
				$this->unsetQuery( "tag" );
				/* if only parameters */
				if ( $params ) {
					$tag = urldecode( $tag );
					$task = array( $tag );
				}
				else {
					$task = isset( $this->specialTask[ "tag" ] ) ? $this->specialTask[ "tag" ] : "tag";
				}
				if ( $this->debug )
					sobi2Config::_d( "Tagged listing. Tag is: {$tag}" );
			}
			if ( isset( $this->query[ "letter" ] ) ) {
				$this->unsetQuery( "letter" );
				$letter = strtolower( $this->query[ "letter" ] );
				if ( $params ) {
					$task = array( /*$this->sefEncode*/( $letter ) );
				}
				else {
					$task = isset( $this->specialTask[ "alpha" ] ) ? $this->specialTask[ "alpha" ] : "alpha";
				}
				if ( $this->debug )
					sobi2Config::_d( "Alpha listing. Letter is: {$letter}" );
			}
		}
		return $task;
	}
	/**
	 * extracting category id
	 * @param string $string
	 * @return int
	 */
	function getCid ( $string )
	{
		if ( $this->debug )
			sobi2Config::_d( "Incoming request: {$string}" );
		$cat = 0;
		if ( isset( $this->query[ "catid" ] ) ) {
			$cat = $this->query[ "catid" ];
			$this->unsetQuery( "catid" );
		}
		if ( $this->debug )
			sobi2Config::_d( "CatId: {$cat}" );
		return $cat;
	}
	/**
	 * extracting sobi id
	 * @param string $string
	 * @return int
	 */
	function getSid ( $string )
	{
		$sid = 0;
		if ( $this->debug )
			sobi2Config::_d( "Incoming request: {$string}" );
		if ( isset( $this->query[ "sobi2Id" ] ) ) {
			$sid = $this->query[ "sobi2Id" ];
			$this->unsetQuery( "sobi2Id" );
		}
		if ( $this->debug )
			sobi2Config::_d( "SobiId: {$sid}" );
		return $sid;
	}
	/**
	 * extracting page number
	 * @param string $string
	 * @param bool $ls
	 * @return int
	 */
	function getPage ( $string, $ls = false )
	{
		$config = &sobi2Config::getInstance();
		$page = 0;
		$limit = $config->itemsInLine * $config->lineOnSite;
		$limitstart = 0;
		if ( $this->debug )
			sobi2Config::_d( "Incoming request: {$string}" );
		if ( isset( $this->query[ "start" ] ) ) {
			$limitstart = $this->query[ "start" ];
			$this->unsetQuery( "start" );
		}
		if ( $limitstart && $limit ) {
			$page = ( int ) ( $limitstart / $limit ) + 1;
		}
		/* if only parameters  */
		if ( $ls ) {
			if ( $this->debug )
				sobi2Config::_d( "Only limits: limitstart: |{$limitstart}|  limit: |{$limit}| page: |{$page}|" );
			return array( "ls" => $limitstart , "l" => $limit );
		}
		else {
			if ( $this->debug )
				sobi2Config::_d( "Only page: limitstart: |{$limitstart}|  limit: |{$limit}| page: |{$page}|" );
			return $page;
		}
	}
	/**
	 * replacing menu itemid with this from sobi
	 * @param string $url
	 */
	function removeItemId ( &$url )
	{
		if ( $this->debug )
			sobi2Config::_d( "Incoming request {$url}" );
		$config = & sobi2Config::getInstance();
		if ( preg_match( '/&Itemid=/i', $url ) ) {
			$temp = explode( '&Itemid=', $url );
			$temp = explode( '&', $temp[ 1 ] );
			$Itemid = $temp[ 0 ];
			$url = str_replace( "Itemid={$Itemid}", "Itemid={$config->sobi2Itemid}", $url );
		}
		if ( $this->debug )
			sobi2Config::_d( "Removed {$url}" );
	}
	/**
	 * @deprecated
	 * extracting menu itemid
	 * @param string $url
	 */
	function getItemId ( $query )
	{
		$Itemid = 0;
		if ( isset( $query[ "Itemid" ] ) ) {
			$Itemid = $query[ "Itemid" ];
		}
		if ( $this->debug )
			sobi2Config::_d( "Itemid: |{$Itemid}|" );
		return $Itemid;
	}
	/**
	 * extracting extra parameters for entry
	 *
	 * @param string $url
	 */
	function getSpecialParams ( $url )
	{
		if ( $this->debug )
			sobi2Config::_d( "Incoming request {$url}" );
		$config = & sobi2Config::getInstance();
		static $spec = array( "sobi2Task" , "Itemid" , 'site' , "limit" , "limitstart" , "start" , "search" , "index.php?option" , "index2.php?option" , "sobi2Id" , "catid" );
		$arr = explode( "&amp;", $url );
		$params = array();

		foreach ( $arr as $p ) {
			$p = explode( "=", $p );	//zerteilen
			if ( ! in_array( $p[ 0 ], $spec ) ) {	//wenn Parameter angegeben der nicht im o.g. Array enthalten ist
				if ( $this->debug )
					sobi2Config::_d( "Parameter found: {$p[0]} = {$p[1]}" );
				$params[ $p[ 0 ] ] = $p[ 1 ];
			}
		}
		if ( ! empty( $config->S2_plugins ) ) {
			foreach ( $config->S2_plugins as $plugin ) {
				if ( method_exists( $plugin, "onSefCreateParams" ) ) {
					$plugin->onSefCreateParams( $params );
					if ( $this->debug )
						sobi2Config::_d( "Plugin {$plugin->name} has onSefCreateParams() method" );
				}
			}
		}
		return $params;
	}
	/**
	 * creating entries url
	 * @param int $sid
	 * @return string
	 */
	function getEntryUrl ( $sid, $string )
	{
		$url = array();
		if ( $this->debug )
			sobi2Config::_d( "Incoming request for SOBI id {$sid}: {$string}" );
		$config = & sobi2Config::getInstance();
		$db = & $config->getDb();
		$q = "SELECT title FROM #__sobi2_item WHERE itemid = {$sid}";
		if ( $this->debug )
			sobi2Config::_d( "Setting query: {$q}" );
		$db->setQuery( $q );
		$title = $db->loadResult();
		if ( $this->debug )
			sobi2Config::_d( "DB answers: {$title}" );
		$pages = null;
		if ( $db->getErrorNum() ) {
			trigger_error( "sobi_sef::getEntryUrl(): DB reports: " . $db->stderr(), E_USER_WARNING );
		}
		$title = $config->getSobiStr( $title );
		$title = $this->sefEncode( $title );
		if ( $this->addSid ) {
			$title = str_replace( array( '%title' , '%id' ), array( $title , $sid ), $this->sidFormat );
		}
		$cats = $this->getSelectedCats( $sid );	//Kategorien fuer diesen Eintrag

		if ( $config->showEntriesFromSubcats ) {	//wenn in Parent anzeigen
			foreach ( $cats as $cid ) {
				$parents = array();
				$config->getParentCats( $cid, $parents );
				if ( ! empty( $parents ) ) {
					$cats = array_merge( $cats, $parents );
				}
			}
		}
		$cats = array_unique( $cats );
		if ( $this->debug )
			sobi2Config::_d($cats );

		$p = null;
		$params = $this->getSpecialParams( $string );
		if ( is_array( $params ) && ! empty( $params ) ) {
			foreach ( $params as $par => $val ) {
				if ( $par && ! is_numeric( $par ) ) {
					$p .= $this->sefEncode( $par ) . $this->dirSep;
				}
				if ( $val ) {
					$p .= $this->sefEncode( $val ) . $this->dirSep;
				}
			}
		}

		$sites = ( isset( $this->query[ "site" ] ) && $this->query[ "site" ] ) ? '&site=' . $this->query[ "site" ] : null;

		if ( isset( $this->query[ "site" ] ) && $this->query[ "site" ] > 1 ) {
			$page = str_replace( array( '%s' , '%d' ), array( $this->pageName , $this->query[ "site" ] ), $this->pageFormat );
			$pages = $this->dirSep . $page;
		}

		if ( $p ) { /* if special parameters exist, create special link */
			$string = html_entity_decode( $string );
			if ( $this->JConfig->sef_suffix ) {
				$sefLink = $p . $title;
			}
			else {
				$sefLink = $p . $title . $this->pageSuffix;
			}
			$id = ( isset( $this->query['Itemid'] ) && $this->query['Itemid'] ) ? $this->query['Itemid'] : $config->sobi2Itemid;
			$url[ $string.'&Itemid='.$id ] = $sefLink;
			if ( $this->debug )
				sobi2Config::_d( "Special parameters: |{$p}| FURL: |{$sefLink}|" );
		}

		/* if no category should be added to the entry url */
		elseif ( ! $this->addCat && ! $sites ) {
			if ( $this->JConfig->sef_suffix ) {
				$sefLink = $title . $pages;
			}
			elseif ( ! $sites ) {
				$sefLink = $title . $pages . $this->pageSuffix;
			}
			else {
				$sefLink = $title . $this->pageSuffix;
			}
			if ( is_array( $cats ) ) {
				foreach ( $cats as $cat ) {
					if ( $this->debug )
						sobi2Config::_d( "Without categories. Creating {$sefLink} for |index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}|" );
					$Itemid = $config->checkItemid( $cat );
					$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}&Itemid={$Itemid}" ] = $sefLink;
				}
			}
			if ( isset( $this->query[ "site" ] ) && $this->query[ "site" ] ) {
				$page = str_replace( array( '%s' , '%d' ), array( $this->pageName , $this->query[ "site" ] ), $this->pageFormat );
				$sefLink .= $this->dirSep . $page;
			}
			if ( $sites ) {
				$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&sobi2Id={$sid}" ] = $sefLink;
			}
			$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&sobi2Id={$sid}{$sites}&Itemid={$config->sobi2Itemid}" ] = $sefLink;
			$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid=0&sobi2Id={$sid}{$sites}&Itemid={$config->sobi2Itemid}" ] = $sefLink;
			$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid=1&sobi2Id={$sid}{$sites}&Itemid={$config->sobi2Itemid}" ] = $sefLink;
		}

		/* if only one category should be added to the entry url */
		elseif ( ! $this->allCats ) {
			$defCat = $this->getCatString( $cats[ 0 ] ) . $this->dirSep;
			if ( $this->JConfig->sef_suffix ) {
				$sefLink = $defCat . $title . $pages;
			}
			elseif ( ! $sites ) {
				$sefLink = $defCat . $title . $this->pageSuffix;
			}
			else {
				$sefLink = $defCat . $title . $pages . $this->pageSuffix;
			}
			if ( is_array( $cats ) ) {
				foreach ( $cats as $cat ) {
					if ( $this->debug )
						sobi2Config::_d( "One category only: creating {$sefLink} for |index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}|" );
					$Itemid = $config->checkItemid( $cat );
					if ( $sites ) {
						$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}&Itemid={$Itemid}" ] = $sefLink;
					}
					$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}{$sites}&Itemid={$Itemid}" ] = $sefLink;
				}
			}
			$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&sobi2Id={$sid}{$sites}&Itemid={$config->sobi2Itemid}" ] = $sefLink;
			$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid=0&sobi2Id={$sid}{$sites}&Itemid={$config->sobi2Itemid}" ] = $sefLink;
			$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid=1&sobi2Id={$sid}{$sites}&Itemid={$config->sobi2Itemid}" ] = $sefLink;
		}

		// create a SEF link for all categories the entry was added and its parent categories, the first category is used
		else {
			if ( is_array( $cats ) ) {
				$defLink = null;
				foreach ( $cats as $cat ) {
					$catStr = $this->getCatString( $cat );
					$catStr = strlen( $catStr ) ? $catStr . $this->dirSep : null;
					$Itemid = $config->checkItemid( $cat );
					if ( $this->debug )
						sobi2Config::_d("All categories: adding category {$cat} as {$catStr} with Itemid {$Itemid}");

					if ( $this->JConfig->sef_suffix ) {
						$sefLink = $catStr . $title . $pages;
					}
					elseif ( ! $sites ) {
						$sefLink = $catStr . $title . $this->pageSuffix;
					}
					else {
						$sefLink = $catStr . $title . $pages . $this->pageSuffix;
					}
					if ( ! $defLink ) {
						$defLink = $sefLink;
						if ( $this->debug )
							sobi2Config::_d( "Default link is {$defLink}" );
					}
					if ( $this->debug )
						sobi2Config::_d( "Creating {$sefLink} for |index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}|" );
					if ( $sites ) {
						$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}&Itemid={$Itemid}" ] = $sefLink;
					}
					$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid={$cat}&sobi2Id={$sid}{$sites}&Itemid={$Itemid}" ] = $sefLink;
				}
				$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&sobi2Id={$sid}{$sites}&Itemid={$Itemid}" ] = $defLink;
				$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid=0&sobi2Id={$sid}{$sites}&Itemid={$Itemid}" ] = $defLink;
				$url[ "index.php?option=com_sobi2&sobi2Task=sobi2Details&catid=1&sobi2Id={$sid}{$sites}&Itemid={$Itemid}" ] = $defLink;
			}
		}
		return $url;
	}

	/**
	 * creating category url's
	 * @param int $cid
	 * @param int $page
	 * @param string $url
	 * @return array
	 */
	function getCatUrl ( $cid, $page, $url )
	{
		if ( $this->debug )
			sobi2Config::_d( "Incoming request {$url} for id:{$cid} and page: {$page}" );
		$config = & sobi2Config::getInstance();
		$title = $this->getCatString( $cid );
		$sefStr = $title;
		$Itemid = $config->checkItemid( $cid );
		if ( $page ) {
			$title = null;
			$title = $this->pageName ? $this->pageName : $title;
			$page = str_replace( array( '%s' , '%d' ), array( $title , $page ), $this->pageFormat );
			if ( $this->JConfig->sef_suffix ) {
				$sefStr .= $this->dirSep . $page;
			}
			else {
				$sefStr .= $this->dirSep . $page . $this->pageSuffix;
			}
			$limits = $this->getPage( $url, true );
			$int = "index.php?option=com_sobi2&catid={$cid}&limitstart={$limits['ls']}&Itemid={$Itemid}";
			if ( $this->debug )
				sobi2Config::_d( "Page found: {$page}. Internal is {$int}" );
		}
		elseif ( $this->alwaysSuffix ) {
			if ( ! $this->JConfig->sef_suffix ) {
				$sefStr .= $this->pageSuffix;
			}
			$int = "index.php?option=com_sobi2&catid={$cid}&Itemid={$Itemid}";
		}
		else {
			$int = "index.php?option=com_sobi2&catid={$cid}&Itemid={$Itemid}";
			if ( ! $this->JConfig->sef_suffix ) {
				$sefStr .= $this->dirSep;
			}
		}
		$int2 = "index.php?option=com_sobi2&catid={$cid}&limitstart=0&Itemid={$Itemid}";
		if ( $this->debug )
			sobi2Config::_d( "Created FURL <br/> {$int} <br/> {$int2} <br/> => {$sefStr}" );
		return array( $int => $sefStr , $int2 => $sefStr );
	}
	/**
	 * creating special task url
	 * @param string $task
	 * @param int $page
	 * @param array $url
	 */
	function getTaskUrl ( $task, $page, $url )
	{
		if ( $this->debug ) {
			sobi2Config::_d( "Incoming request {$url} for task:{$task} and page: {$page}" );
		}
		/* RSS special task */
		$Itemid = $this->query[ 'Itemid' ];
		$config = & sobi2Config::getInstance();
		if ( $task == 'rss' ) {
			$add = null;
			$str = isset( $this->specialTask[ 'rss' ] ) ? $this->sefEncode( $this->specialTask[ 'rss' ] ) : $this->sefEncode( 'RSS' );
			if ( isset( $this->query ) && is_array( $this->query ) && isset( $this->query[ 'catid' ] ) && $this->query[ 'catid' ] ) {
				$alias = $this->getCatAlias( $this->query[ 'catid' ] );
				$cats = $this->getCatString( $this->query[ 'catid' ] );
//				if ( $alias ) {
//					$add .= $alias . $this->dirSep;
//				}
				if ( $alias ) {
					$add .= $cats . $this->dirSep;
				}
				if ( strlen( $add ) ) {
					$sefStr = $add . $this->dirSep . $str;
				}
				else {
					$sefStr = $str;
				}
				$Itemid = $config->checkItemid( $this->query[ 'catid' ] );
				$Itemid = strlen( $Itemid ) ? '&Itemid=' . $Itemid : null;
			}
			else {
				$Itemid = '&Itemid=' . $config->sobi2Itemid;
				if ( strlen( $add ) ) {
					$sefStr = $add . $this->dirSep . $str;
				}
				else {
					$sefStr = $str;
				}
			}
			return array( html_entity_decode( $url . $Itemid ) => $sefStr );
		}
		$params = $this->getTask( $url, true, false ) ? $this->getTask( $url, true, false ) : null;
		$par = null;
		if ( is_array( $params ) && ! empty( $params ) ) {
			foreach ( $params as $parameter => $val ) {
				if ( $parameter && ! is_numeric( $parameter ) ) {
					$par .= $this->sefEncode( $parameter ) . $this->dirSep;
				}
				if ( $val ) {
					$par .= $this->sefEncode( $val ) . $this->dirSep;
				}
			}
			if ( $this->debug )
				sobi2Config::_d( "Parameter found: |{$par}|" );
		}
		$param = $par ? $par : null;
		if ( $page ) {
			$t = $this->getTask( $url, false, true ) ? $this->getTask( $url, false, true ) : null;
			/* check if the alias should be added */
			$Itemid = $this->query[ 'Itemid' ];
			if ( $t && $this->findLink( 'index.php?option=com_sobi2&sobi2Task=' . $t ) ) {
				$addTask = null;
			}
			else {
				$addTask = $t . $this->dirSep;
			}
			$p = $this->pageName ? $this->pageName : null;
			$page = str_replace( array( '%s' , '%d' ), array( $p , $page ), $this->pageFormat );
			if ( $this->JConfig->sef_suffix ) {
				$sefStr = $addTask . $param . $page;
			}
			else {
				$sefStr = $t . $this->dirSep . $param . $page . $this->pageSuffix;
			}
			if ( $this->debug )
				sobi2Config::_d( "Page found: |{$page}| FURL created: {$sefStr}" );
		}
		else {
			if ( $param ) {
				$Itemid = $this->query[ 'Itemid' ];
				$pos = strrpos( $param, $this->dirSep );
				if ( $pos !== false ) {
					$param = substr( $param, 0, $pos );
				}
				if ( $this->findLink( 'index.php?option=com_sobi2&sobi2Task=' . $task ) ) {
					$sefStr = $param;
				}
				else {
					$sefStr = $this->sefEncode( $task ) . $this->dirSep . $param;
				}
				if ( $this->debug )
					sobi2Config::_d( "Parameter found: |{$param}| FURL created: {$sefStr}" );
			}
			else {
				$sefStr = $task;
				if ( $this->debug )
					sobi2Config::_d( "No parameters found. FURL created: {$sefStr}" );
			}
			if ( ! $this->JConfig->sef_suffix ) {
				$sefStr .= $this->pageSuffix;
			}
		}
		if ( isset( $this->query[ 'letter' ] ) ) {
			$Itemid = $config->sobi2Itemid;
		}
		$Itemid = strlen( $Itemid ) ? '&Itemid=' . $Itemid : null;
		$url = html_entity_decode( $url . $Itemid );
		return array( $url => $sefStr );
	}
	/**
	 * creating frontpage url
	 * @param int $page
	 * @param array $url
	 */
	function getFrontUrl ( $page, $url )
	{
		if ( $this->debug )
			sobi2Config::_d( "Incoming request for URL {$url} and page {$page}" );
		$p = null;
		$sefStr = null;
		if ( $page ) {
			$sefStr = $this->pageName ? $p . $this->pageName : $p;
			$page = str_replace( array( '%s' , '%d' ), array( $sefStr , $page ), $this->pageFormat );
			if ( ! $this->JConfig->sef_suffix ) {
				$sefStr = $page . $this->pageSuffix;
			}
			else {
				$sefStr = $page;
			}
			if ( $this->debug )
				sobi2Config::_d( "Page found: |{$page}| FURL created: {$sefStr}" );
			$url = html_entity_decode( $url );

			$config = & sobi2Config::getInstance();
			$Itemid = $config->sobi2Itemid;	//Frontpage hat immer SOBI-Itemid
			$Itemid = strlen( $Itemid ) ? '&Itemid=' . $Itemid : null;
			$url = html_entity_decode( $url . $Itemid );
			return array( $url => $sefStr );
		}
	}
	/**
	 * Encode URLs in sef_ext.php extensions
	 *
	 * @param string $string
	 * @return string
	 */
	function sefEncode ( $string )
	{
		if( !is_string( $string ) ) {
			return false;
		}
		$string = html_entity_decode( $string );
		$string = str_ireplace( array( "Aacute;" , "Agrave;" , "Acirc;" , "Atilde;" , "Aring;" , "Auml;" , "AElig;" , "Ccedil;" , "Eacute;" , "Egrave;" , "Ecirc;" , "Euml;" , "Iacute;" , "Igrave;" , "Icirc;" , "Iuml;" , "ETH;" , "Ntilde;" , "Oacute;" , "Ograve;" , "Ocirc;" , "Otilde;" , "Ouml;" , "Oslash;" , "Uacute;" , "Ugrave;" , "Ucirc;" , "Uuml;" , "Yacute;" , "THORN;" , "szlig;" , "aacute;" , "agrave;" , "acirc;" , "atilde;" , "atilde;" , "auml;" , "aelig;" , "ccedil;" , "eacute;" , "egrave;" , "ecirc;" , "euml;" , "iacute;" , "igrave;" , "icirc;" , "iuml;" , "eth;" , "ntilde;" , "oacute;" , "ograve;" , "ocirc;" , "otilde;" , "ouml;" , "oslash;" , "uacute;" , "ugrave;" , "ucirc;" , "uuml;" , "yacute;" , "thorn;" , "yuml;" , ',' ), null, $string );
		if ( $this->debug )
			sobi2Config::_d( "Incoming request {$string}" );
		$spec_chars_d = explode( ",", stripcslashes( $this->specCharsD ) );
		$spec_chars = explode( ",", stripslashes( $this->specChars ) );
		/* no idea why but otherweise the & will not be replaced :-/ */
		$string = str_replace( "&", $spec_chars[ array_search( "&", $spec_chars_d ) ], $string );
		if ( is_array( $spec_chars_d ) && is_array( $spec_chars ) ) {
			$string = str_replace( $spec_chars, $spec_chars_d, $string );
		}
		$string = urlencode( $string );
		$string = preg_replace( '/%2F/i', '%10', $string );
		$string = preg_replace( '/\+/i', $this->spaceChar, $string );
		$replace = explode( ',', stripslashes( $this->stripChars ) );
		foreach ( $replace as $value ) {
			if ( $value != "" ) {
				$string = preg_replace( '/'.urlencode( $value ).'/i', "", $string );
			}
		}
		if ( $this->toLower ) {
			$string = strtolower( $string );
		}
		$string = str_replace( array( ',' , "'" ), $this->spaceChar, $string );
		if ( $this->debug )
			sobi2Config::_d( "String encoded {$string}" );
		return $string;
	}
	/**
	 * extracting SOBI2 alias
	 * @return string
	 */
	function getSobiAlias ()
	{
		return $this->getAlias( $this->query[ 'Itemid' ] );
	}
	/**
	 * extracting SOBI2 alias
	 * @return string
	 */
	function getCatAlias ( $url )
	{
		static $alias = array();
		if ( isset( $alias[ $url ] ) ) {
			return $alias[ $url ];
		}
		if ( ! isset( $alias[ $url ] ) ) {
			$link = null;
			$menu = & JSite::getMenu();
			$item = & $menu->getItem( $this->fixItemid( $url ) );
			$alias[ $url ] = $item->route;
		}
		return isset( $alias[ $url ] ) ? $alias[ $url ] : false;
	}
	/**
	 * Enter description here...
	 *
	 * @param string $url
	 * @return int
	 */
	function fixItemid ( $url )
	{
		$config = & sobi2Config::getInstance();
		$id = $config->sobi2Itemid;
		$link = array();
		if ( strstr( $url, 'catid' ) && !(strstr( $url, 'catid=0') || strstr( $url, 'catid=1') )) {
			preg_match( '/catid=(\d+)/', $url, $link );
			if ( ! empty( $link ) && isset( $link[ 1 ] ) ) {
				$id = $config->checkItemid( $link[ 1 ] );
			}
		}
		elseif ( strstr( $url, 'sobi2Task' ) ) {
			preg_match( '/sobi2Task=(\w+)/', $url, $link );
			if ( ! empty( $link ) && isset( $link[ 1 ] ) ) {	//die Task abfragen
				if ($link[1] == 'sobi2Details') {	//wenn Detailansicht
					preg_match( '/sobi2Id=(\d+)/', $url, $link );
					$cids = $this->getSelectedCats($link[1]);
					$id = $config->checkItemid( $cids[ 0 ] );
				}
				else
					$id = $config->checkItemid( $link[ 1 ] );
			}
		}
		elseif ( strstr( $url, 'letter' ) || strstr( $url, 'tag' ) ) {
			$id = $config->sobi2Itemid;
		}
		return $id;
	}
	/**
	 * extracting SOBI2 alias
	 * @return string
	 */
	function getAlias ( $id )
	{
		static $alias = array();
		if ( isset( $alias[ $id ] ) ) {
			return $alias[ $id ];
		}
		if ( ! isset( $alias[ $id ] ) ) {
			$menu = & JSite::getMenu();
			$item = & $menu->getItem( $id );
			$alias[ $id ] = $item->route;
		}
		if ( $this->debug )
			sobi2Config::_d( "Alias: [$id]: {$alias[$id]}" );
		return $alias[ $id ];
	}
	/**
	 * saving created urls
	 * @param array $urls
	 */
	function saveUrl ( $urls, $url )
	{
		if ( $this->debug )
			sobi2Config::_d( "Incoming request for URL {$url}" );
		if ( is_array( $urls ) && ! empty( $urls ) ) {
			reset( $urls );
			$config = & sobi2Config::getInstance();
			$db = & $config->getDb();
			$values = array();
			$now = $config->getTimeAndDate();
			$prio = 50;
			foreach ( $urls as $int => $ext ) {
				$ext = str_replace( array( $this->dirSep.$this->dirSep.$this->dirSep.$this->dirSep, $this->dirSep.$this->dirSep.$this->dirSep, $this->dirSep.$this->dirSep, '//', '\\\\' ), $this->dirSep, $ext );
				if ( $int && $ext ) {
					if ( ! $this->findUrl( $int ) ) {
						$alias = $this->getCatAlias( $int );
						if ( $alias ) {
							$u = "/{$alias}/{$ext}";
							$u = str_replace( array( $this->dirSep.$this->dirSep.$this->dirSep.$this->dirSep, $this->dirSep.$this->dirSep.$this->dirSep, $this->dirSep.$this->dirSep, '//', '\\\\' ), $this->dirSep, $u );
							$values[] = "\n\t ( NULL, '$u', '{$int}', '1', '{$now}', '{$now}', {$prio} )";
						}
						else {
							$values[] = "\n\t ( NULL, '/{$ext}', '{$int}', '1', '{$now}', '{$now}', {$prio} )";
						}
					}
				}
				else {
					trigger_error( "sobi_sef::saveUrl(): empty values for url int: {$int} ext: {$ext}", E_USER_WARNING );
				}
				if ( $this->debug )
					sobi2Config::_d( "Creating query for {$int} <br/> {$ext}" );
				if ( $prio > 0 ) {
					$prio --;
				}
			}
			if ( is_array( $values ) && ! empty( $values ) ) {
				$values = implode( " , ", $values );
				$query = "\n INSERT INTO `#__sobi2_plugin_sef` ( `id` ,  `external` , `internal` , `published` , `created` ,  `modified` , `link_prio` ) VALUES {$values}; \n\n";
				if ( $this->debug )
					sobi2Config::_d( "Setting query: {$query}" );
				$db->setQuery( $query );
				$db->query();
				if ( $db->getErrorNum() ) {
					trigger_error( "sobi_sef::saveUrl(): DB reports: " . $db->stderr(), E_USER_WARNING );
				}
			}
		}
	}
	/**
	 * get selected categories for this entry
	 * @param int $sid
	 * @return array
	 */
	function getSelectedCats ( $sid )
	{
		if ( $this->debug )
			sobi2Config::_d( "Incoming request for entry {$sid}" );

		static $entry_catids = array();
		if (!isset($entry_catids[$sid])) {
			$config = & sobi2Config::getInstance();
			$db = & $config->getDb();
			$query = "SELECT rel.catid FROM #__sobi2_categories AS cat LEFT JOIN #__sobi2_cat_items_relations AS rel ON cat.catid = rel.catid AND cat.published = 1 WHERE itemid = {$sid} ";
			if ( $this->debug )
				sobi2Config::_d( "Setting query: {$query}" );
			$db->setQuery( $query );
			$r = $db->loadResultArray();
			if ( $db->getErrorNum() ) {
				trigger_error( "sobi_sef::getSelectedCats(): DB reports: " . $db->stderr(), E_USER_WARNING );
			}
			$entry_catids[$sid] = $r;
		}
		return $entry_catids[$sid];
	}
	/**
	 * getting category names
	 * @param int $cid
	 * @param bool $nameOnly
	 * @return array
	 */
	function getCatString ( $cid, $nameOnly = false )
	{
		if ( $this->debug )
			( "Incoming request for category {$cid}" );
		static $catSefs = array();
		static $catNames = array();
		if ( $nameOnly && isset( $catNames[ $cid ] ) ) {
			if ( $this->debug )
				sobi2Config::_d( "Found in existing name; returning name only {$catNames[$cid]}" );
			return $catNames[ $cid ];
		}
		elseif ( isset( $catSefs[ $cid ] ) ) {
			if ( $this->debug )
				sobi2Config::_d( "Found in existing name; returning all {$catSefs[$cid]}" );
			return $catSefs[ $cid ];
		}
		$config = & sobi2Config::getInstance();
		$db = & $config->getDb();
		$cats = array();
		$cids = array();
		$config->getParentCats( $cid, $cats );
		if ( is_array( $cats ) && ! empty( $cats ) ) {
			foreach ( $cats as $cat ) {
				if ( $config->checkCatItemid( $cat ) ) {
					break;
				}
				else {
					$cids[] = $cat;
				}
			}
			$cats = array_reverse( $cids );
			if ( is_array( $cats ) && ! empty( $cats ) ) {
				$cats = implode( " , ", $cats );
				if ( strlen( $cats ) ) {
					$query = "SELECT name FROM #__sobi2_categories WHERE catid IN( {$cats} ) ORDER BY FIELD( catid, {$cats} )";
					if ( $this->debug )
						sobi2Config::_d( "Setting query: {$query}" );
					$db->setQuery( $query );
					$cats = $db->loadResultArray();
					if ( $db->getErrorNum() ) {
						trigger_error( "sobi_sef::getCatString(): DB reports: " . $db->stderr(), E_USER_WARNING );
					}
				}
			}
			else {
				$cats = null;
			}
		}
		$catsStr = array();
		if ( is_array( $cats ) && ! empty( $cats ) ) {
			foreach ( $cats as $cat ) {
				$cat = $this->sefEncode( $cat );
				if ( ! isset( $catNames[ $cid ] ) || empty( $catNames[ $cid ] ) ) {
					if ( $this->debug )
						sobi2Config::_d( "Found category {$cat}" );
					$catNames[ $cid ] = $cat;
				}
				$catsStr[] = $cat;
			}
		}
		$cats = implode( $this->dirSep, $catsStr );
		$catSefs[ $cid ] = $cats;
		if ( $nameOnly && isset( $catNames[ $cid ] ) ) {
			if ( $this->debug )
				sobi2Config::_d( "Found after query and returning name only {$catNames[$cid]}" );
			return $catNames[ $cid ];
		}
		if ( $this->debug )
			sobi2Config::_d( "Returning {$cats} for category {$cid}" );
		return $cats;
	}

	/**
	 * Enter description here...
	 *
	 * @param string $msg
	 * @param bool $direct
	 */
	function debug ( $msg, $direct = true )
	{
		if ( $direct ) {
			sobi2Config::_d( $msg );
		}
	//    	if( $this->debug || $_SERVER['REMOTE_ADDR'] == $this->debugForIP ) {
	//    		echo '<div style="position: relative; left: 8px; top: 8px; font-weight: bold; text-align:left;"><big><span style="color: rgb(51, 51, 255); background-color: rgb(255, 0, 0);"><pre>'.$msg.'</pre></span></big></div>';
	//    	}
	}
}
?>