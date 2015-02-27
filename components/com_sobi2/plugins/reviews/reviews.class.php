<?php
/**
* @version $Id: reviews.class.php 4918 2009-03-02 09:52:02Z Sigrid Suski $
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
define('_SR_MAX_VOTES', 10);


class sobi_reviews {
	/**
	 * @var string
	 */
	var $name = "Reviews and Ratings";
	/**
	 * @var string
	 */
	var $listingStyle = "sobi_reviews_VC";
	/**
	 * @var string
	 */
	var $voteDir = "./components/com_sobi2/plugins/reviews/images/Star-Rating";
	/**
	 * @var array
	 */
	var $votesImgs = array(
							0 => '00-0-star.png',
							1 => '00-5-star.png',
							2 => '01-0-star.png',
							3 => '01-5-star.png',
							4 => '02-0-star.png',
							5 => '02-5-star.png',
							6 => '03-0-star.png',
							7 => '03-5-star.png',
							8 => '04-0-star.png',
							9 => '04-5-star.png',
						   10 => '05-0-star.png',
							);
	var $ordering = 'DESC';
	/**
	 * @var bool
	 */
	var $showMails = 1;
	/**
	 * @var bool
	 */
	var $showIndVotes = 1;
	/**
	 * @var bool
	 */
	var $showUpdatesInfo = 1;
	/**
	 * @var int
	 */
	var $formPosition = 1;
	/**
	 * @var bool
	 */
	/**
	 * @var bool
	 */
	var $anonymous = 0;
	/**
	 * @var bool
	 */
	var $multiRev = 0;
	/**
	 * @var bool
	 */
	var $SobiRating = null;
	/**
	 * @var bool
	 */
	var $revsOn = 0;
	/**
	 * @var bool
	 */
	var $votesOn = 0;
	/**
	 * @var bool
	 */
	var $autopublish = 1;
	/**
	 * @var bool
	 */
	var $countInListing = 1;
	/**
	 * @var bool
	 */
	var $notifyAdmin = 0;
	/**
	 * @var bool
	 */
	var $notifyEntryAuthor = 0;
	/**
	 * @var bool
	 */
	var $notifyReviewAuthor = 0;
	/**
	 * @var int
	 */
	var $limit = 2;
	/**
	 * @var int
	 */
	var $textLimit = 500;
	/**
	 * @var int
	 */
	var $listingVotesLimit = 1;
	/**
	 * @var int
	 */
	var $listingExcludeCat = "";
	/**
	 * @var int
	 */
	var $listingLimit = 30;
	/**
	 * @var string
	 */
	var $infoText = "";
	/**
	 * @var int
	 */
	var $showUsername = 1;
	/**
	 * @var string
	 */
	var $notifyReviewAuthorTempl = "";
	var $notifyAdminTempl = "";
	var $notifyEntryAuthorTempl = "";
	var $notifyReviewAuthorSubj = "";
	var $notifyAdminSubj = "";
	var $notifyEntryAuthorSubj = "";
	/**
	 * @var int
	 */
	var $dateFormat = 'F j, Y';


	function sobi_reviews() 
	{
		$config =& sobi2Config::getInstance();
		$this->voteDir = "{$config->liveSite}/components/com_sobi2/plugins/reviews/images/Star-Rating";
		$config->addCustomHeadTag("<link href='{$config->liveSite}/components/com_sobi2/plugins/reviews/reviews.css' rel='stylesheet' type='text/css' />");
		$this->countInListing = $config->getValueFromDB("sobi_reviews","RcountInListing");
		$this->showUpdatesInfo = $config->getValueFromDB("sobi_reviews","RshowUpdatesInfo");
		$this->showMails = $config->getValueFromDB("sobi_reviews","RshowMails");
		$this->ordering = $config->getValueFromDB("sobi_reviews","Rordering");
		$this->showIndVotes = $config->getValueFromDB("sobi_reviews","RshowIndVotes");
		$this->formPosition = $config->getValueFromDB("sobi_reviews","RformPosition");
		$this->anonymous = $config->getValueFromDB("sobi_reviews","Ranonymous");
		$this->multiRev = $config->getValueFromDB("sobi_reviews","RmultiRev");
		$this->revsOn = $config->getValueFromDB("sobi_reviews","RrevsOn");
		$this->votesOn = $config->getValueFromDB("sobi_reviews","RvotesOn");
		$this->autopublish = $config->getValueFromDB("sobi_reviews","Rautopublish");
		$this->notifyAdmin = $config->getValueFromDB("sobi_reviews","RnotifyAdmin");
		$this->notifyEntryAuthor = $config->getValueFromDB("sobi_reviews","RnotifyEntryAuthor");
		$this->notifyReviewAuthor = $config->getValueFromDB("sobi_reviews","RnotifyReviewAuthor");
		$this->notifyAdminTempl = $config->getValueFromDB("sobi_reviews","RnotifyAdminTempl");
		$this->notifyEntryAuthorTempl = $config->getValueFromDB("sobi_reviews","RnotifyEntryAuthorTempl");
		$this->notifyReviewAuthorTempl = $config->getValueFromDB("sobi_reviews","RnotifyReviewAuthorTempl");
		$this->notifyAdminSubj = $config->getValueFromDB("sobi_reviews","RnotifyAdminSubj");
		$this->notifyEntryAuthorSubj = $config->getValueFromDB("sobi_reviews","RnotifyEntryAuthorSubj");
		$this->notifyReviewAuthorSubj = $config->getValueFromDB("sobi_reviews","RnotifyReviewAuthorSubj");
		$this->limit = $config->getValueFromDB("sobi_reviews","Rlimit");
		$this->textLimit = $config->getValueFromDB("sobi_reviews","RtextLimit");
		$this->listingVotesLimit = $config->getValueFromDB("sobi_reviews","RlistingVotesLimit");
		$this->listingExcludeCat = $config->getValueFromDB("sobi_reviews","RlistingExcludeCats");
		$this->listingLimit = $config->getValueFromDB("sobi_reviews","RlistingLimit");
    	$this->infoText = $config->getValueFromDB("sobi_reviews","RinfoText");
    	$this->showUsername = $config->getValueFromDB("sobi_reviews","RshowUsername");
		$this->dateFormat = $config->getValueFromDB("sobi_reviews","RdateFormat");
	}
	
	function customTask($sobi2Task) 
	{
		switch($sobi2Task) {
			case "addSRev":
				$this->saveReview();
				$ret = true;
				break;
			case "topRated":
				$this->topRatedListing();
				$ret = true;
				break;
			case "mostReviewed":
				$this->mostReviewedListing();
				$ret = true;
				break;
			case "getSrev":
				$this->getReviewsXML(intval(sobi2Config::request( $_REQUEST, 'sobi2Id', 0)),intval(sobi2Config::request($_REQUEST, 'spage', 0)), intval(sobi2Config::request($_REQUEST, 'curPage', 0)));
				$ret = true;
				break;
			default:
				$ret = false;
		}
		return $ret;
	}
	
  function showDetails($sobi2Id, $ajax = false) 
  {
    	ob_start();
		$this->getReviews($sobi2Id, $ajax);
		$reviews = ob_get_contents();
		ob_end_clean();
		$reviews = "\n\n<div id = 'srRespContMsg'></div>\n\n{$reviews}";
    	ob_start();
		$this->showForm($sobi2Id);
		$form = ob_get_contents();
		ob_end_clean();

		if($this->formPosition == 1)
			$view = "<div id='revsBox'>{$reviews}{$form}</div>";
		else
			$view = "<div id='revsBox'>{$form}{$reviews}</div>";

		return $view;
    }
    
	/**
	 * Show the Top rated Entries
	 *
	 */
	function topRatedListing() 
	{
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		
		$where = null;
		if ($this->listingExcludeCat) {
			$this->listingExcludeCat = explode (",",$this->listingExcludeCat);	//Array erzeugen
			if (count($this->listingExcludeCat)) {
				$this->listingExcludeCat = implode(",",$this->listingExcludeCat);
				$where = "(sitem.itemid NOT IN (SELECT itemid FROM #__sobi2_cat_items_relations WHERE catid IN ({$this->listingExcludeCat}))) AND ";
			}
		}
		$now = $config->getTimeAndDate();
		$showlimit = $this->listingVotesLimit -1;
		$query = "SELECT sitem.itemid, SUM(vote) / COUNT(*) AS votingResult FROM #__sobi2_plugin_reviews AS rev LEFT JOIN  #__sobi2_item AS sitem ON sitem.itemid = rev.itemid WHERE {$where} (vote > 0 AND rev.published = 1 AND sitem.published = 1 AND (sitem.publish_down > '{$now}' OR sitem.publish_down = '{$config->nullDate}')) GROUP BY itemid HAVING COUNT( * ) > {$showlimit} ORDER BY votingResult DESC LIMIT 0,  {$this->listingLimit}";
		$database->setQuery( $query );
		
		$sids = $database->loadResultArray();
		$url = "index.php?option=com_sobi2&amp;sobi2Task=topRated&amp;Itemid={$config->sobi2Itemid}";
		if(is_array($sids) && !empty($sids)) {
			$sidsorder = implode(" , ",$sids);
		}
		else {
			$sidsorder = null;
		}
		echo HTML_SOBI::buildCustomListing(
							$sids, 																	/* $sids 			*/
							null, 																	/* cids 			*/
							$url,  																	/* $navMenuUrl 		*/
							_S_2_REV_TOP_RATED_HEADER,												/* $header 			*/
							null,																	/* $stringForItems 	*/
							null,														  			/* $stringForCats 	*/
							_S_2_REV_TOP_RATED_HEADER,												/* $addToPathway	*/
							_S_2_REV_TOP_RATED_HEADER,												/* $addToSiteTitle 	*/
							0,																		/* $defCid 			*/
							"topRated",																/* $pluginTask		*/
							" field(itemid, {$sidsorder}) "											/* $itemsOrdering	*/
		);
	}
	
	/**
	 * Show the most reviewed entries
	 *
	 */
	function mostReviewedListing() {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		
		$now = $config->getTimeAndDate();
		$showlimit = $this->listingVotesLimit -1;

		$query = "SELECT sitem.itemid, COUNT(*) AS reviews FROM #__sobi2_plugin_reviews AS rev LEFT JOIN  #__sobi2_item AS sitem ON sitem.itemid = rev.itemid WHERE (rev.review != '' AND rev.published = 1 AND sitem.published = 1 AND (sitem.publish_down > '{$now}' OR sitem.publish_down = '{$config->nullDate}')) GROUP BY itemid ORDER BY reviews DESC LIMIT 0, {$this->listingLimit}";

		$database->setQuery( $query );
		$sids = $database->loadResultArray();
		$url = "index.php?option=com_sobi2&amp;sobi2Task=mostReviewed&amp;Itemid={$config->sobi2Itemid}";
		if(is_array($sids) && !empty($sids)) {
			$sidsorder = implode(" , ",$sids);
		}
		else {
			$sidsorder = null;
		}
		echo HTML_SOBI::buildCustomListing(
							$sids, 																	/* $sids 			*/
							null, 																	/* cids 			*/
							$url,  																	/* $navMenuUrl 		*/
							_S_2_REV_MOST_REV_HEADER,												/* $header 			*/
							null,																	/* $stringForItems 	*/
							null,														  			/* $stringForCats 	*/
							_S_2_REV_MOST_REV_HEADER,												/* $addToPathway	*/
							_S_2_REV_MOST_REV_HEADER,												/* $addToSiteTitle 	*/
							0,																		/* $defCid 			*/
							"mostReviewed",															/* $pluginTask		*/
							" field(itemid, {$sidsorder})  "										/* $itemsOrdering	*/
		);
	}
	
   function editForm($sobi2Id) {
    	return null;
    }
    
    function save($input,$sobi2Id) {
		return $input;
    }
    
    function update($input,$sobi2Id) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$now = $config->getTimeAndDate();
		$last = null;
		$query = "SELECT `updateInfo`, `revid` FROM `#__sobi2_plugin_reviews` WHERE `itemid` = {$sobi2Id} ORDER BY `added` LIMIT 1";
		$database->setQuery( $query );
		if (class_exists( "JDatabase" ) ) {
			$last = $database->loadObject();
		}
    	else {
    		$database->loadObject($last);
    	}

		if($database->getErrorNum())
			$config->logSobiError("Review plugin, update(): ".$database->stderr());
		/*
		 * if latest was update too
		 */
		if($last && $last->updateInfo) {
			$statement = "DELETE FROM `#__sobi2_plugin_reviews` WHERE `revid` = '{$last->revid}' LIMIT 1;";
			$database->setQuery($statement);
			$database->query();
			if($database->getErrorNum())
				$config->logSobiError("Review plugin, update(): ".$database->stderr());
		}
		$statement = "INSERT INTO `#__sobi2_plugin_reviews` VALUES (NULL, '{$sobi2Id}', '', '', '', '', '', '', '{$_SERVER['REMOTE_ADDR']}', '{$now}', '', 1, 1);";
		$database->setQuery($statement);
		$database->query();
		if($database->getErrorNum())
			$config->logSobiError("Review plugin, update(): ".$database->stderr());
		return $input;
    }
    
    function showListing($sobi2Id) {
		$ratings = "<span class=\"sobi2Rating\">";
		$ratings .= $this->showRating($sobi2Id);
    	if($this->countInListing) {
    		$ratings .= _S_2_REV_REVIEWS_LISTING.$this->countReviews($sobi2Id);
    	}
		$ratings .= "</span>";
    	return $ratings;
    }
    
    function replaceMarkers($string) {
    	return $string;
    }
    
    function showVote($vote) {
    	(float) $vote *= 2;
    	$vote = round($vote);
    	$v = sobi2Config::checkPNGImage("{$this->voteDir}/{$this->votesImgs[$vote]}", $vote);
    	return $v;
    }
    
    function pageNav($total) 
    {
    	$style = null;
    	if(!$total) {
    		$style = ' style="display:none;" ';
    	}
    	$h = "javascript:srpPageNav('0');";
    	$pn = '<span name="srpncont" '.$style.'>';
    	$pn .= "\n\t\t<a href=\"{$h}\" title=\""._S_2_REV_PAGENAV_START_TITLE."\" class=\"pagenav\">"._S_2_REV_PAGENAV_START."</a>";
		$h = "javascript:srpPageNav('-1');";
		$pn .= "\n\t\t<a href=\"{$h}\" title=\""._S_2_REV_PAGENAV_PREV_TITLE."\" class=\"pagenav\">"._S_2_REV_PAGENAV_PREV."</a>";
    	$sites = $total / $this->limit + 1;
    	for($i = 1; $i < $sites; $i++) {
			$h = "javascript:srpPageNav('{$i}');";
    		$pn .= "\n\t\t<a href=\"{$h}\" title=\""._S_2_REV_PAGENAV_PAGE_TITLE.$i."\" class=\"pagenav\">{$i}</a>";
    	}
    	$pn .= '<span name="dummyPnR"></span>';
		$h = "javascript:srpPageNav('-3');";
    	$pn  .= "\n\t\t<a href=\"{$h}\" title=\""._S_2_REV_PAGENAV_NEXT_TITLE."\" class=\"pagenav\">"._S_2_REV_PAGENAV_NEXT."</a>";
		$h = "javascript:srpPageNav('-2');";
		$pn .= "\n\t\t<a href=\"{$h}\" title=\""._S_2_REV_PAGENAV_END_TITLE."\" class=\"pagenav\">"._S_2_REV_PAGENAV_END."</a>\n\t\t";
		$pn .= '</span>';
		return $pn;
    }
    
    function pageNavScript($id, $all) 
    {
		$config =& sobi2Config::getInstance();
    	ob_start();
    	?>
    	<script type="text/javascript" language="javascript">
    	/* <![CDATA[ */
	    var srCurPg = 1;
	    var lastPage = <?php echo ceil($all/$this->limit);?>;
	    var srAllRevs = <?php echo $all;?>;
	    var srRevsLimit = <?php echo $this->limit;?>;
	    var srSemaphor = 0;
    	function srpPageNav(page) {
	    	page = parseInt(page);
    		if(	   srSemaphor == 1
	    		|| page == srCurPg
	    		|| (srCurPg >= lastPage && page < - 1)
	    		|| (srCurPg == 1  && (page == 0 || page == -1))
	    	) {
	    		return;
	    	}

    		srSemaphor = 1;
	    	var srppnHttpRequest;
	    	var url = "<?php echo $config->liveSite;?>/index2.php?option=com_sobi2&sobi2Id=<?php echo $id;?>&no_html=1&sobi2Task=getSrev&spage=" + page + "&curPage=" + srCurPg;
	        if (window.XMLHttpRequest) {
	            srppnHttpRequest = new XMLHttpRequest();
	            if (srppnHttpRequest.overrideMimeType) {
	                srppnHttpRequest.overrideMimeType('text/xml');
	            }
	        }
	        else if (window.ActiveXObject) {
	            try { srppnHttpRequest = new ActiveXObject("Msxml2.XMLHTTP"); }
	                catch (e) {
                       try { srppnHttpRequest = new ActiveXObject("Microsoft.XMLHTTP"); }
	                   catch (e) {}
	                 }
	        }
	        if (!srppnHttpRequest) {
	            alert('Sorry but I Cannot create an XMLHTTP instance');
	            srSemaphor = 0;
	            return;
	        }
	        srppnHttpRequest.onreadystatechange = function() { srppnChangePage(srppnHttpRequest,page); };
	        srppnHttpRequest.open('GET', url, true);
	        srppnHttpRequest.send(null);
	    }
	    
	    function srppnChangePage(srppnHttpRequest,page) {
	    	if (srppnHttpRequest.readyState == 4) {
	    		if (srppnHttpRequest.status == 200) {
			    	switch (page) {
			    		case 0:
			    			srCurPg = 1;
			    			break;
			    		case -1:
			    			srCurPg--;
			    			break;
			    		case -2:
			    			srCurPg = lastPage;
			    			break;
			    		case -3:
			    			srCurPg++;
			    			break;
			    		default:
			    			srCurPg = page;
			    	}
		    		srSemaphor = 0;
		    		var xmlDoc = srppnHttpRequest.responseXML;
					var revs = xmlDoc.getElementsByTagName('review');
					
					var htmlOutput = "";
					for(i = 0; i < revs.length; i++) {
						var rev = revs[i];
		            	var vote = rev.getElementsByTagName('vote').item(0).firstChild.data;
		            	var txt = rev.getElementsByTagName('txt').item(0).firstChild.data;
		            	var title = rev.getElementsByTagName('title').item(0).firstChild.data;
		            	var user = rev.getElementsByTagName('user').item(0).firstChild.data;
		            	var umail = rev.getElementsByTagName('umail').item(0).firstChild.data;
		            	var date = rev.getElementsByTagName('date').item(0).firstChild.data;
		            	var updateInfo = rev.getElementsByTagName('updateInfo').item(0).firstChild.data;
		            	if(updateInfo == 0) {
			            	date = '<div class="revDate"><?php echo _S_2_REV_REVIEW_ON;?>' + date + '</div>';
							if((txt && txt != 0) || (title && title != 0)) {
								vote = '<div class="revVote">' + Vimages[vote] + '&nbsp;</div>';
								title = '<div class="revTitle">' + title + '</div>'
								txt = '<div class="revText">' + txt.replace(/(?:<br \/>)?\r?\n/gi, '<br />') + '</div>'
								if(umail && umail != 0) {
									user = '<a href="mailto:' + umail + '">' + user + '</a>';
								}
								user = '<div class="revAuthor"><?php echo _S_2_REV_REVIEW_BY;?>' + user + '</div>';
								var header = '<div class="revHeaderTitle">' + vote + title + user + date + '</div>';
			            		htmlOutput = htmlOutput + '<div class="revCont">' + header + '<div class="revHeader">' + txt + '</div></div>';
							}
		            	}
		            	else if(updateInfo == 1) {
		            		htmlOutput = htmlOutput
		            				   + '<div class="revCont"><div class="revUpdate"><div class="revUpdateDate">'
		            				   + date + '</div><div class="revUpdateText"><?php echo _S_2_REV_ENTRY_UPDATED ?></div></div></div>';
		            	}
					}
					document.getElementById("reviewsCont").innerHTML = '<div id="srRespCont"></div>' + htmlOutput;
	    		}
	    	}
	    }
		/* ]]> */
    	</script>
    	<?php
		$script = ob_get_contents();
		ob_end_clean();
		return $script;
    }
    
 	/**
 	 * Darstellung der Reviews mit AJAX (bei Seitennavigation)
 	 *
 	 * @param int $id
 	 * @param int $page
 	 * @param int $curPage
 	 */
 	function getReviewsXML($id, $page, $curPage) 
 	{
    	switch ($page) {
    		case 1:
    		case 0:
    			$start = 0;
    			break;
    		case -1:
    			$start = ($curPage - 2) * $this->limit;
    			break;
    		case -2:
    			$start = 0;
    			$number_reviews = $this->countReviews($id);
    			if ($number_reviews > $this->limit)
    				$start = $number_reviews - $this->limit;
    			break;
    		case -3:
    			$start = $curPage * $this->limit;
    			break;
    		default:
    			$start = ($page - 1) * $this->limit;
    	}
    	
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$query = "SELECT * FROM `#__sobi2_plugin_reviews` WHERE (`itemid` = {$id} AND `published` = 1 AND (`review` != '' OR `updateInfo` = 1) ) ORDER BY `added` {$this->ordering} LIMIT {$start} , {$this->limit}";
		
		$database->setQuery( $query );
		$reviews = $database->loadObjectList();	
					
		if (count($reviews)) {
			$iso = explode( '=', _ISO );
			$iso = /*strtoupper*/($iso[1]);
			ob_clean();
			header('Content-type: application/xml');
			echo "<?xml version=\"1.0\" encoding=\"{$iso}\"?>";
			echo "\n<reviews>";
			foreach ($reviews as $review) {
				$review->title = trim($review->title);
				$review->title = ($review->title)?$review->title:0;
				$review->review = trim($review->review);
				$review->review = ($review->review)?$review->review:0;
				$review->username = trim($review->username);
				$review->username = ($review->username)?$review->username:0;
				$review->email = trim($review->email);
				$review->email = ($review->email)?$review->email:0;
				$review->email = ($this->showMails && $review->showEmail) ? $review->email : 0;
				$review->updateInfo = $review->updateInfo ? 1 : 0;
				$review->added = date($this->dateFormat, strtotime($review->added));
				
				echo "\n\t <review>";
				echo "\n\t\t <title>{$review->title}</title>";
				echo "\n\t\t <txt>{$review->review}</txt>";
				echo "\n\t\t <user>{$review->username}</user>";
				echo "\n\t\t <umail>{$review->email}</umail>";
				echo "\n\t\t <date>{$review->added}</date>";
				echo "\n\t\t <vote>{$review->vote}</vote>";
				echo "\n\t\t <updateInfo>{$review->updateInfo}</updateInfo>";
				echo "\n\t </review>";
			}
			echo "\n</reviews>";
			exit();
		}
	}

	/**
     * Darstellung der Reviews ohne AJAX (Erstdarstellung und Browser-refresh)
     *
     * @param int $sobi2Id
     * @param bool $ajax
     * @param int $start
     */
    function getReviews($sobi2Id, $ajax = false, $start = 0) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$cb = false;
    	$uinfo = false;
    	$query = "SELECT * FROM `#__sobi2_plugin_reviews` WHERE (`itemid` = {$sobi2Id} AND `published` = 1 AND (`review` != '' OR `updateInfo` = 1) ) ORDER BY `added` {$this->ordering} LIMIT {$start} , {$this->limit}";
		$database->setQuery( $query );
			
		$reviews = $database->loadObjectList();
    	if(file_exists(_SOBI_CMSROOT.DS."components".DS."com_comprofiler".DS."comprofiler.php")) {
    		$cb = true;
    	}
    	$counted_reviews = $this->countReviews($sobi2Id);
    	if (($this->revsOn) || ($counted_reviews)) {
	   		$pn = $this->pageNav($counted_reviews);
	   		$config->addCustomHeadTag($this->pageNavScript($sobi2Id,$counted_reviews));

	   		echo '<div class="revNavTop" id="revNavTop">';	//navigation on top
			echo $pn;
    		echo '</div>';
    	}
    	echo '<div id="reviewsCont">';
    	echo '<div id="srRespCont"></div>';
    	if(count($reviews)) {
	    	$r = false;
	    	foreach($reviews as $review) {
				$review->added = date($this->dateFormat, strtotime($review->added));
	   			if(!$review->updateInfo && $review->review != '') {
    				
	    			$r = true;
    				$uinfo = false;
    				
	   				$review->title = stripslashes($review->title);
					$review->review = stripslashes(nl2br($review->review));
					$review->username = stripslashes($review->username);
 	    				
	    			if (!strstr($review->email, '@')) {
	    				$review->email = null;
	    			}
	    			if ($cb) {
	    				$author = "<a href=\"/index.php?option=com_comprofiler&task=userProfile&user=".$review->userid."\">$review->username</a>";
	    			}
	    			else { 
		    			if ($this->showMails && $review->showEmail && $review->email) {
	    					$author = sobiHTML::emailCloaking($review->email, 1, $database->getEscaped($review->username), 0);
		    			}
		    			else
		    				$author = $review->username;
	    			}
	    				
	    			if($this->showIndVotes && isset($review->vote))
	    				$vote = $this->showVote($review->vote);
	    			else
	    				$vote = null;
	    			?>
	
	    			<div class="revCont">
	    				<div class="revHeaderTitle">
	    					<div class="revVote"><?php echo $vote ?>&nbsp;</div>
	    					<div class="revTitle"><?php echo $review->title ?></div>
	    					<div class="revAuthor"><?php echo _S_2_REV_REVIEW_BY.$author ?></div>
	    					<div class="revDate"><?php echo _S_2_REV_REVIEW_ON.$review->added ?></div>
	    				</div>
	    				<div class="revHeader">
	    					<div class="revText"><?php echo $review->review ?></div>
	    				</div>
	    			</div>
	    			<?php
    			}
    			else {
    				if($r && $review->updateInfo && $this->showUpdatesInfo && !$uinfo) {
	    			$uinfo = true;
    				?>
    				<div class="revCont">
	    				<div class="revUpdate">
	    					<div class="revUpdateDate"><?php echo $review->added ?></div>
	    					<div class="revUpdateText"><?php echo _S_2_REV_ENTRY_UPDATED ?></div>
	    				</div>
	    			</div>
	    			<?php
    				}
    			}
    		}
    	}
    	echo "\n\t\t</div>";
    	if (($this->revsOn) || ($counted_reviews)) {
	    	echo '<div class="revNavBottom" id="revNavBottom">';
			echo $pn;
	    	echo '</div>';
    	}
    }
    
    function showForm($sobi2Id) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$my =& $config->getUser();

    	$votes = array();
    	$javaScript = "<script language=\"javascript\" type=\"text/javascript\">\n\n" .
    				  "\n\n<!-- /* <![CDATA[ */ \n\n".
    				  "\t var Vimages =  new Array(); \n\n";
    	$img = $this->showVote(0);
    	$img = str_replace("\"", "\\\"", $img);
    	$javaScript .= "\t Vimages[0] = \"{$img}\";\n";

    	for($i = 1; $i < (_SR_MAX_VOTES / 2) + 1; $i++) {
    		$votes[] = sobiHTML::makeOption($i, $i);
    		$img = $this->showVote($i);
    		$img = str_replace("\"", "\\\"", $img);
    		$javaScript .= "\t Vimages[{$i}] = \"{$img}\";\n";
    	}
    	$javaScript .= " /* ]]> */ // --> </script>";
    	$config->addCustomHeadTag($javaScript);
    	
		if(!$this->anonymous && !$my->id) {
    		return null;
    	}
    	$hasVoted = !($this->checkUserVotes($my->id,$sobi2Id));
    	if(!$this->multiRev && !$this->checkUserReviews($my->id,$sobi2Id) && $hasVoted) {
    		return null;
    	}
    	if($my->id) {
    		$query = "SELECT `name`, `username`, `email` FROM `#__users` WHERE  `id` = '{$my->id}' ";
			$database->setQuery( $query );
			$user = $database->loadRow();
			if ($this->showUsername)
				$uname = $user[1];
			else
				$uname = $user[0];
			$umail = $user[2];
    	}
    	else {
    		$uname = $umail = null;
    	}

		$javascript = " onchange=\"if (this.options[selectedIndex].value!='')" .
				"{" .
				" document.getElementById('revVotePrev').innerHTML= Vimages[this.options[selectedIndex].value];" .
				"} " .
				"else " .
				"{" .
				"  document.a.src='../images/blank.png'" .
				"}\"";
    	$votes[] = sobiHTML::makeOption(0, _S_2_REV_VOTE_SELECT);

    	$votes = sobiHTML::selectList( $votes, 'rvote', 'size="1" id="rvote" class="inputbox"'.$javascript, 'value', 'text',_S_2_REV_VOTE_SELECT);
    	
    	if($uname) {
    		$nameBox = "<td style='text-align:right' class='srAuthorName'>"._S_2_REV_AUTHOR_NAME."</td><td style='text-align:left'><input type='hidden' name='uname' id='uname' value='{$uname}'/><input type='text' id='uname_d' name='uname' value='{$uname}' size='40' maxlength='40' class='inputbox' disabled='disabled'/></td>";
    	}
    	else {
    		$nameBox = "<td style='text-align:right' class='srAuthorName'>"._S_2_REV_AUTHOR_NAME."</td><td style='text-align:left'><input type='text' id='uname' name='uname' value='' size='40' maxlength='40' class='inputbox'/></td>";
    	}
    	if($umail) {
    		$mailBox = "<td style='text-align:right' class='srAuthorMail'>"._S_2_REV_EMAIL."</td><td style='text-align:left'><input type='hidden' name='umail' id='umail' value='{$umail}'/><input type='text' id='umail_d' name='umail_d' value='{$umail}' size='40' maxlength='40' class='inputbox' disabled='disabled'/></td>";
    	}
    	else {
    		$mailBox = "<td style='text-align:right' class='srAuthorMail'>"._S_2_REV_EMAIL."</td><td style='text-align:left'><input type='text' id='umail' name='umail' value='' size='40' maxlength='40' class='inputbox'/></td>";
    	}
    	$config->addCustomHeadTag($this->addRevScript($sobi2Id));
    	?>
    	
    	<div id="revFormCont">
	    <?php if((($this->votesOn) && ($this->multiRev || !$hasVoted)) || ($this->revsOn)) {?>
		<table class="revFormTable">
		    <?php if(($this->votesOn) && ($this->multiRev || !$hasVoted)) { ?>
		    <tr>
				<td colspan="2">
		      		<div id="revVoteSelect"><?php echo _S_2_REV_RATE_NOW; ?>&nbsp;<?php echo $votes; ?></div>
		      		<div id="revVotePrev"><img src="<?php echo $this->voteDir."/".$this->votesImgs[0]; ?>" alt='0'/></div>
				</td>		    
		    </tr>
		    <?php } ?>
		    <?php if($this->revsOn) { ?>
		    <tr>
		      <td colspan='2'>
			  <div id="reviewFormBox" style="display:none;">
		        <table id='revFormTable'>
		 			<colgroup><col class='revCol1'/><col class='revCol2'/></colgroup>
			    	<tr>
			    		<td></td>
			    		<td class='srRevInfo'><?php echo $this->infoText; ?></td>
			    	</tr>
		 			<tr>
		 				<?php echo $nameBox;?>
		 			</tr>
		 			<tr>
		 				<?php echo $mailBox;?>
		 			</tr>
		 			<tr>
		 				<td style='text-align:right' class='srRevMailShow'>
		 					<?php echo _S_2_REV_EMAIL_SHOW; ?>
		 				</td>
		 				<td style='text-align:left' class='srRevMailShowOn'>
		 					<input type='checkbox' checked='checked' id='email_show' name='email_show' value='1'/>
		 				</td>
		 			</tr>
		 			<tr>
		 				<td style='text-align:right' class='srRevTitle'>
		 					<?php echo _S_2_REV_TITLE; ?>
		 				</td>
		 				<td style='text-align:left' class='srRevTitleBox'>
		 					<input type='text' id='revTitle' name='revTitle' value='' size='40' maxlength='40' class='inputbox'/>
		 				</td>
		 			</tr>
		 			<tr>
		 				<td valign='top' style='text-align:right'  class='srRevText'>
		 					<?php echo _S_2_REV_TEXT; ?>
		 				</td>
		 				<td style='text-align:left'  class='srRevTextBox'>
		 					<textarea name='sobireview' id='sobireview' class='inputbox' rows='10' cols='50'></textarea>
		 				</td>
		 			</tr>
					<?php if($this->multiRev || $this->checkUserReviews($my->id,$sobi2Id,true)) { ?>
		 			<tr>
		 				<td valign='top' style='text-align:right'></td>
		 				<td style='text-align:left'  class='srRevSendBt'>
					      	<div id="revLoader"></div>
					      	<input type="button" onclick="sendRev();" class="button" id="revSendButton" value="<?php echo _S_2_REV_SEND_BT; ?>"/>
		 				</td>
		 			</tr>
				   <?php } ?>
		 		</table>
		 	  </div>
		      </td>
		    </tr>
		    <?php } ?>
		</table>
		
	    <?php if(($this->votesOn) && ($this->multiRev || !$hasVoted)) { ?>
	      	<div id="sendVoteBt" class='srRevSendBt'>
	      		<div id="revLoader"></div>
	      		<input type="button" onclick="sendRev();" class="button" id="voteSendButton" value="<?php echo _S_2_REV_SEND_BT; ?>"/>
	      	</div>
	    <?php } ?>
        <?php if($this->revsOn) { ?>
	    	<div id="reviewBt">
		      <?php if($this->multiRev || $this->checkUserReviews($my->id,$sobi2Id)) { ?>
		      		<input type="button" onclick="showRevForm();" class="button" id="revSendButton" value="<?php echo _S_2_REV_WRITE_REV; ?>"/>
		      <?php } ?>
		    </div>
	      <?php } ?>
		
 		<?php } ?>
		</div>
    <?php
    }
    
    function addRevScript($sobi2Id) 
    {
		$config =& sobi2Config::getInstance();
    	ob_start();
    	?>
		<script language="JavaScript" type="text/javascript">
    	/* <![CDATA[ */
		<?php if($this->revsOn) { ?>
		function showRevForm() {
			document.getElementById("reviewFormBox").style.display = "block";
			document.getElementById("reviewBt").style.display = "none";
			<?php if($this->votesOn) { ?>
			document.getElementById("sendVoteBt").style.display = "none";
			<?php } ?>
			document.getElementById("revSendButton").style.display = "block";
		}
		<?php } 
		if (($this->votesOn) || ($this->revsOn)) { ?>
		function sendRev() {
			<?php if($this->revsOn) { ?>
			var is_checked = false;
			var email_show = (document.getElementById("email_show").checked == true)?1:0;
			var revTitle = encodeURIComponent(document.getElementById("revTitle").value);
			var sobireview = encodeURIComponent(document.getElementById("sobireview").value);
			var uname = encodeURIComponent(document.getElementById("uname").value);
			var umail = encodeURIComponent(document.getElementById("umail").value);
			<?php } 
			if ($this->votesOn) {?>
			var rvote = document.getElementById("rvote") ? document.getElementById("rvote").value : 0;
			<?php } ?>		
			var sobiid = <?php echo $sobi2Id; ?>;
			var option = "com_sobi2";
			var sobi2Task = "addSRev";
			var no_html = 1;
			var params =  "option=" + option
			<?php if($this->revsOn) { ?>
				+ "&email_show=" + email_show
				+ "&revTitle=" + revTitle
				+ "&sobireview=" + sobireview
				+ "&uname=" + uname
				+ "&umail=" + umail
			<?php } 
			if ($this->votesOn) {?>
				+ "&rvote=" + rvote
				<?php } ?>	
				+ "&sobiid=" + sobiid
				+ "&sobi2Task=" + sobi2Task
				+ "&no_html=" + no_html;
			var url = "<?php echo $config->liveSite;?>/index2.php";
			
			<?php if (!$this->revsOn) {
				if ($this->votesOn) { ?>
					if (rvote > 0)
						srpMakeRequest(url,params);
				<?php } 
			} else { ?>
				srpMakeRequest(url,params);
			<?php } ?>	
		}
		<?php } ?>
	 	
 		function srpRevResp(srpHttpRequest) {
	    	if (srpHttpRequest.readyState == 4) {
	    		if (srpHttpRequest.status == 200) {
			 <?php if($this->revsOn) { ?>
	    		<?php if($this->multiRev) { ?>
	    			document.getElementById("reviewFormBox").style.display = "none";
			 		document.getElementById("reviewBt").style.display = "inline";
					<?php if($this->votesOn) { ?>
					document.getElementById("sendVoteBt").style.display = "inline";
					<?php } ?>
			 		document.getElementById("revTitle").value = '';
			 		document.getElementById("sobireview").value = '';
			 	<?php  }
			 	else { ?>
	            	document.getElementById("revFormCont").innerHTML = '';
	            <?php } ?>
	       <?php } ?>
	    			var XMLDoc = srpHttpRequest.responseXML;
	            	var rev = XMLDoc.getElementsByTagName('rev')[0];
	            	var msg = rev.getElementsByTagName('msg').item(0).firstChild.data;
	            	var vote = rev.getElementsByTagName('vote').item(0).firstChild.data;
	            	var txt = rev.getElementsByTagName('txt').item(0).firstChild.data;
	            	var title = rev.getElementsByTagName('title').item(0).firstChild.data;
	            	var user = rev.getElementsByTagName('user').item(0).firstChild.data;
	            	var umail = rev.getElementsByTagName('umail').item(0).firstChild.data;
	            	var date = rev.getElementsByTagName('date').item(0).firstChild.data;
	            	
	            	msg = '<div class="message">' + msg + '</div>';
	            	date = '<div class="revDate"><?php echo _S_2_REV_REVIEW_ON;?>' + date + '</div>';
					if((txt && txt != 0) || (title && title != 0)) {
						vote = '<div class="revVote">' + Vimages[vote] + '&nbsp;</div>';
						title = '<div class="revTitle">' + title + '</div>'
						txt = '<div class="revText">' + txt.replace(/(?:<br \/>)?\r?\n/gi, '<br />') + '</div>'
						if(umail && umail != 0) {
							user = '<a href="mailto:' + umail + '">' + user + '</a>';
						}
						user = '<div class="revAuthor"><?php echo _S_2_REV_REVIEW_BY;?>' + user + '</div>';
						var header = '<div class="revHeaderTitle">' + vote + title + user + date + '</div>';
	            		srAllRevs++;
	            	<?php if($this->ordering == "ASC" && $this->autopublish) { ?>
	            		if((srAllRevs%lastPage && srCurPg == lastPage) || (lastPage == 0)) {
	            			var s = document.createElement('span');
	            			s.innerHTML = '<div class="revCont">' + header + '<div class="revHeader">' + txt + '</div></div>';
							document.getElementById("reviewsCont").appendChild(s);
	            		}
	            		else {
	            			lastPage++;
							if(lastPage == 1) {
								document.getElementsByName("srpncont")[0].style.display = "block";
								document.getElementsByName("srpncont")[1].style.display = "block";
							}
	            			var node = '<a href="javascript:srpPageNav(\''+ lastPage +'\');" title="Go to page: '+ lastPage +'" class="pagenav">'+ lastPage +'</a>';
	            			document.getElementsByName("dummyPnR")[0].innerHTML = node;
	            			document.getElementsByName("dummyPnR")[1].innerHTML = node;
	            		}
					<?php } else if($this->autopublish){ ?>
						document.getElementById("srRespCont").innerHTML = '<div class="revCont">' + header + '<div class="revHeader">' + txt + '</div></div>';
					<?php } ?>
					}
					document.getElementById("srRespContMsg").innerHTML = msg;
					 <?php if(!$this->revsOn && !$this->multiRev) { ?>
					 	document.getElementById("revFormCont").innerHTML = '';
					 <?php } ?>
	    		}
	            else {
	                alert('There was a problem with the request.');
	            }
	        }
 		}

		function srpMakeRequest(url, params) {
			var srpHttpRequest;
			if (window.XMLHttpRequest) {
			    srpHttpRequest = new XMLHttpRequest();
			    if (srpHttpRequest.overrideMimeType) {
			        srpHttpRequest.overrideMimeType('text/xml');
			    }
			}
			else if (window.ActiveXObject) {
			    try { srpHttpRequest = new ActiveXObject("Msxml2.XMLHTTP"); }
			        catch (e) {
			           try { srpHttpRequest = new ActiveXObject("Microsoft.XMLHTTP"); }
			           catch (e) {}
			         }
			}
			if (!srpHttpRequest) {
			    alert('Sorry but I Cannot create an XMLHTTP instance');
			    return false;
			}
			srpHttpRequest.onreadystatechange = function() { srpRevResp(srpHttpRequest); };
			srpHttpRequest.open('POST', url, true);
			srpHttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				srpHttpRequest.setRequestHeader("Content-length", params.length);
				srpHttpRequest.setRequestHeader("Connection", "close");
			srpHttpRequest.send(params);
		}
		/* ]]> */
		</script>
    	<?php
		$script = ob_get_contents();
		ob_end_clean();
		return $script;
    }
    
    function showRating($sid, $unformatted=false) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$query = "SELECT COUNT(vote) AS votes, SUM(vote) AS vres FROM `#__sobi2_plugin_reviews` WHERE (`itemid` = '{$sid}' AND NOT (`vote` = 0) AND `published` = 1)";
		$database->setQuery( $query );
		$res = null;
		$this->SobiRating = 0;
		if( !$config->forceLegacy && class_exists( "JDatabase" ) ) {
			$res = $database->loadObject();
		}
    	else {
    		$database->loadObject( $res );
    	}
		if ( $database->getErrorNum() ) {
			trigger_error( "DB reports: ".$database->stderr(), E_USER_WARNING );
		}
		if($res->votes && $res->vres) {
			$this->SobiRating = (float)($res->vres / $res->votes);
		}
		
    	$vote = $this->showVote($this->SobiRating);
    	
    	if ($unformatted)
    		return $vote;
    	else
   			return "<span class='sobiRating'>{$vote}</span>";
    }
    
    /**
     * Review speichern nach Eingabe - Frontend
     *
     */
    function saveReview() 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$my =& $config->getUser();
    	$iso = explode( '=', _ISO );
		$iso = strtoupper($iso[1]);
		
		$sobi2Id = intval( sobi2Config::request( $_REQUEST, 'sobiid', 0 ) );
    	$reviewTitle = sobi2Config::request( $_REQUEST, 'revTitle',null,2);
    	$uname = sobi2Config::request( $_REQUEST, 'uname', null, 2);
    	$sobireview = sobi2Config::request( $_REQUEST, 'sobireview',null, 2);

    	if($iso != "UTF-8") { //wenn ISO dann nach ISO konvertieren vor >Speichern in DB
			if(function_exists("iconv")) {
				$uname = iconv("UTF-8", $iso, $uname);
				$sobireview = iconv("UTF-8", $iso, $sobireview);
				$reviewTitle = iconv("UTF-8", $iso, $reviewTitle);
			}
			else {
				$uname = utf8_decode($uname);
				$sobireview = utf8_decode($sobireview);
				$reviewTitle = utf8_decode($reviewTitle);
			}
    	}

    	if($reviewTitle || $sobireview) {
			$published = $this->autopublish;
		}
		else {
			$published = 1;
		}

    	$vote = intval( sobi2Config::request( $_REQUEST, 'rvote', 0 ) );
    	$umail = sobi2Config::request( $_REQUEST, 'umail', null,2);
    	$email_show = intval( sobi2Config::request( $_REQUEST, 'email_show', 0 ) );
    	$now = $config->getTimeAndDate();
		$reviewTitle = $database->getEscaped ($reviewTitle );
		$sobireview = $database->getEscaped ($sobireview );
		$umail = $database->getEscaped($umail);
		$uname = $database->getEscaped($uname);
    	if(!$this->multiRev) {
			$update = $this->checkUpdate($my->id,$sobi2Id);
		}
		else {
			$update  = null;
		}
		if ($update) { //wenn der gleiche der gevoted hat noch reviewed
			$vote1 = $vote ? "`vote` = '{$vote}', "	: null;
			$sobireview1 = $sobireview ? "`review` = '{$sobireview}', " : null;
			$reviewTitle1 = $reviewTitle ? "`title` = '{$reviewTitle}', " : null;
			$uname1 = $uname ? "`username` = '{$uname}', "	: null;
			$umail1 = $umail ? "`email` = '{$umail}', " : null;

			$statement = "UPDATE `#__sobi2_plugin_reviews` SET `updateInfo` = NULL, {$sobireview1} {$reviewTitle1} {$uname1} {$umail1} {$vote1} `ip` = '{$_SERVER['REMOTE_ADDR']}', `showEmail` = '{$email_show}' WHERE `revid` = '{$update}' LIMIT 1; ";
		}
		else {
			$statement = "INSERT INTO `#__sobi2_plugin_reviews` VALUES (NULL, '{$sobi2Id}', '{$reviewTitle}', '{$sobireview}', '{$my->id}', '{$uname}', '{$umail}', '{$email_show}', '{$_SERVER['REMOTE_ADDR']}', '{$now}', '{$vote}', '{$published}', NULL);";
		}
		$database->setQuery($statement);
		$database->query();
		if (!$update) {
			$update = $database->insertid();
		}

		//aus Verzweifelung über die Newlines holen wir es wieder aus der DB
		$query = "SELECT * FROM `#__sobi2_plugin_reviews` WHERE `revid` = {$update}";
		$database->setQuery( $query );

		if (class_exists("JDatabase")) 
			$review = $database->loadObject();
    	else 
    		$database->loadObject($review);
		$sobireview = $review->review;
		$reviewTitle = $review->title;
		$uname = $review->username;
		$umail = $review->email;
		$datum = date($this->dateFormat, strtotime($review->added));

		if ($sobireview || $reviewTitle) {
			$this->RsendEmails($sobi2Id,$umail,$reviewTitle,$sobireview);
		}
   		$msg = _S_2_REV_THNX_VOTE;
    	if ($reviewTitle || $sobireview) {
    		$msg = _S_2_REV_THNX_REV;
    		if(!$this->autopublish) {
    			$msg .= " "._S_2_REV_NO_AUTOPUBLISH;
    		}
    	}
    	
		$umail = $this->showMails && $email_show ? $umail : null;
		$sobireview		=	$sobireview		?	$sobireview			:	0;
		$reviewTitle	=	$reviewTitle	?	$reviewTitle		:	0;
		$uname			=	$uname			?	$uname				:	0;
		$umail			=	$umail			?	$umail				:	0;
		
		ob_clean();
		header('Content-type: application/xml');
		echo "<?xml version=\"1.0\" encoding=\"{$iso}\"?>";
		echo "\n<rev>";
		echo "\n\t<msg>{$msg}</msg>";
		echo "\n\t<vote>{$vote}</vote>";
		echo "\n\t<txt>{$sobireview}</txt>";
		echo "\n\t<title>{$reviewTitle}</title>";
		echo "\n\t<user>{$uname}</user>";
		echo "\n\t<umail>{$umail}</umail>";
		echo "\n\t<date>{$datum}</date>";
		echo "\n</rev>";
		exit();
    }
    
    function checkUpdate($uid,$sobi2Id) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$my =& $config->getUser();
    	if($my->id) {
    		$where = "`userid` = '{$uid}'";
    	}
    	else {
    		$where = "`ip` = '{$_SERVER['REMOTE_ADDR']}'";
    	}
    	$query = "SELECT `revid` FROM `#__sobi2_plugin_reviews` WHERE {$where} AND `itemid` = '{$sobi2Id}'";
		$database->setQuery( $query );
		$count = $database->loadResult();
    	if($count) {
    		return $count;
    	}
    	else {
    		return false;
    	}
    }
    
    function checkUserVotes($uid,$sobi2Id) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$my =& $config->getUser();
    	if($my->id) {
    		$where = "`userid` = '{$uid}'";
    	}
    	else {
    		$where = "`ip` = '{$_SERVER['REMOTE_ADDR']}'";
    	}
    	$query = "SELECT `vote` FROM `#__sobi2_plugin_reviews` WHERE {$where} AND `itemid` = '{$sobi2Id}' AND NOT (`vote` = '')";
		$database->setQuery( $query );
		$count = $database->loadResult();
    	if($count) {
    		return false;
    	}
    	else {
    		return true;
    	}
    }
    
    function checkUserReviews($uid,$sobi2Id,$rev = true) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	if($rev) {
    		$and = "AND NOT (`review` = '')";
    	}
    	else {
    		$and = "AND `review` = ''";
    	}
    	$query = "SELECT `review` FROM `#__sobi2_plugin_reviews` WHERE `userid` = '{$uid}' AND `itemid` = '{$sobi2Id}' {$and}";
		$database->setQuery( $query );
		$count = $database->loadResult();
    	if($count)
    		return false;
    	else
    		return true;
    }
    
    function RsendEmails($sobi2Id, $writerMail,$title,$text) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
		$query = "SELECT `title` FROM `#__sobi2_item` WHERE `itemid` = '{$sobi2Id}'";
		$database->setQuery( $query );
		$entryTitle = $database->loadResult();
				
    	if($this->notifyAdmin) {
    		$AdmMailSubject = $this->mailReplacearkers($this->notifyAdminSubj,$title,$text,$sobi2Id,$entryTitle);
    		$AdmMailText = $this->mailReplacearkers($this->notifyAdminTempl,$title,$text,$sobi2Id,$entryTitle);
    		$config->sendSobiMail($AdmMailSubject,$AdmMailText,null,true);
    	}
    	if($this->notifyEntryAuthor) {
    		$AuthorMailSubject = $this->mailReplacearkers($this->notifyEntryAuthorSubj,$title,$text,$sobi2Id,$entryTitle);
    		$AuthorMailText = $this->mailReplacearkers($this->notifyEntryAuthorTempl,$title,$text,$sobi2Id,$entryTitle);
    		$config->sendSobiMail($AuthorMailSubject,$AuthorMailText,null,false,null,null,$sobi2Id);
    	}
    	if($this->notifyReviewAuthor && $writerMail) {
    		$WriterMailSubject = $this->mailReplacearkers($this->notifyReviewAuthorSubj,$title,$text,$sobi2Id,$entryTitle);
    		$WriterMailText = $this->mailReplacearkers($this->notifyReviewAuthorTempl,$title,$text,$sobi2Id,$entryTitle);
    		$config->sendSobiMail($WriterMailSubject,$WriterMailText,$writerMail);
    	}
    }
    
    function mailReplacearkers($string,$title,$text,$sobi2Id,$entryTitle) 
    {
		$config =& sobi2Config::getInstance();
    	$string = str_replace('{sobi}',$config->componentName,$string);
    	$string = str_replace('{entry}',$entryTitle,$string);
    	$string = str_replace('{admin_url}',"{$config->liveSite}/administrator/index2.php?option=com_sobi2&task=edit&sobi2Id={$sobi2Id}&hidemainmenu=1&returnTask=listing&catid=-1",$string);
    	$admUrl = sobi2Config::sef("index.php?option=com_sobi2&sobi2Task=sobi2Details&sobi2Id={$sobi2Id}&Itemid={$config->sobi2Itemid}");
    	$string = str_replace('{auth_url}',$admUrl,$string);
    	$string = str_replace('{rev_title}',$title,$string);
    	$string = str_replace('{rev_text}',$text,$string);
    	return $string;
    }

    function countReviews($sobi2Id) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$query = "SELECT COUNT(*) FROM `#__sobi2_plugin_reviews` WHERE (`itemid` = {$sobi2Id} AND `published` = 1 AND NOT (`review` = '') )";
		$database->setQuery( $query );
		$count = $database->loadResult();
		return $count;
    }
    
    function countVotes($sobi2Id) 
    {
		$config =& sobi2Config::getInstance();
		$database =& $config->getDb();
    	$query = "SELECT COUNT(*) FROM `#__sobi2_plugin_reviews` WHERE (`itemid` = {$sobi2Id} AND `published` = 1 AND `vote` > 0)";
		$database->setQuery( $query );
		$count = $database->loadResult();
		return $count;
    }
}
?>