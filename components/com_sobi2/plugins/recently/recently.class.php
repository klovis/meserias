<?php
/**
 * Sobi2 Recently Visited Entries plugin
 * @Copyright   Copyright (C) 2010 Mano
 * @licence     http://www.gnu.org/copyleft/gpl.html
 * @link        http://www.webmano.hu
 */
 
class sobi_recently {
/*
 * ************************************************************
 * required methods
 * ************************************************************
 */
	var $name = "Recently Visited Entries";
	var $listingStyle = "sobi_recently_VC";
	var $recently;
	var $fPos = 3; //position for edit
	var $user;
	var $recvisited_number; //NOCAT,CURCAT1,CURCAT2,ALLCAT
	var $recvisited_style;	
	var $recvisited_order;
  var $recvisited_show;  	
	
function sobi_recently() {
	error_reporting(E_NOTICE | E_ERROR);
	$config =& sobi2Config::getInstance();
	$database =& $config->getDb();
  $iso = explode( '=', _ISO );

  $this->encoding = strtoupper($iso[1]);
  $this->S_Itemid = $config->sobi2Itemid;
  $this->user =& $config->getUser();
  $this->catId = sobi2Config::request( $_REQUEST,'catid',0 );
  $this->now = $config->getTimeAndDate();
  $this->nulldate = $config->nullDate;
        
  $this->recvisited_number = $config->getValueFromDB("sobi_recently","recvisited_number");
  $this->recvisited_style = $config->getValueFromDB("sobi_recently","recvisited_style");    	
  $this->recvisited_order = $config->getValueFromDB("sobi_recently","recvisited_order");
  $this->recvisited_show = $config->getValueFromDB("sobi_recently","recvisited_show");  
  }

function showDetails($sobi2Id) {
  return null;
}

function recently($s2_id,$s2_title,$s2_img=NULL) {
  $return = NULL;
  $session = JFactory::getSession();
  $s2_recently_count = $this->recvisited_number;
  $s2_recently = array();
  $s2_recently_stored = array();
  $s2_recently_current = array();
  $s2_recently_new = array();
  $s2_recently_new_store = array();  
  $s2_recently_list = array();
//Current view
  $curS2Sid = $s2_id;
  $curS2Title = $s2_title;
  $curS2Img = $s2_img;
  $curS2CatId = JRequest::getVar( 'catid', false);
  if (!$curS2CatId) $curS2CatId = 0;
  $s2_recently_current[$curS2Sid]['id'] = $curS2Sid;
  $s2_recently_current[$curS2Sid]['title'] = $curS2Title;
  $s2_recently_current[$curS2Sid]['img'] = $curS2Img; 
  $s2_recently_current[$curS2Sid]['catid'] = $curS2CatId;
  
    //$session->clear('s2_recently');
//Recently viewed
  $s2_recently_stored = $session->get('s2_recently');
    //    echo "<br>STORED:<br>";
    //    print("<pre>".print_r($s2_recently_stored,true)."</pre>");  
// Get recently visites entries list
  if (isset($s2_recently_stored) && $this->recvisited_show){
//Last viewed S2Id
    $lastkey = end(array_keys($s2_recently_stored));  
    $s2_recently_list = $s2_recently_stored;  
    if (array_key_exists($curS2Sid,$s2_recently_list)){
      unset ($s2_recently_list[$curS2Sid]);
    }
    if (isset($s2_recently_list)){
      $return = $this->getRecentlyList($s2_recently_list);
    }
  }

//Store Current Entry
////If NOT last page refresh 
  if($lastkey != $curS2Sid){
    if(isset($s2_recently_stored)) {
      if (array_key_exists($curS2Sid,$s2_recently_stored)){
        unset ($s2_recently_stored[$curS2Sid]);
      }

      $s2_recently_new = $s2_recently_stored+$s2_recently_current;
    }
    else {$s2_recently_new = $s2_recently_current;}
    
    $i = 0;
    $s2_recently_new = array_reverse ($s2_recently_new,true);
    foreach($s2_recently_new as $item) {
      $i++;
      if($i <= $s2_recently_count){
        $s2_recently_new_store[current($item)] = $item;
      }
    }
    $s2_recently_new_store = array_reverse ($s2_recently_new_store,true);

    $session->set('s2_recently', $s2_recently_new_store);
}
    //$session->clear('s2_recently');
  return $return;
}

function getRecentlyList($recently_list){
  $return = NULL;
  $baseurl = JURI::base();
  JHTML::stylesheet('recently.css','components/com_sobi2/plugins/recently/');
  
  if (isset($recently_list)){
//sort-order
    if($this->recvisited_order == "asc"){$recently_list = array_reverse ($recently_list,true);}
//style for items
    if($this->recvisited_style == "div"){
      $tag_start = "<div class='s2_rv_ditem'>";
      $tag_end = "</div>";
    }
    else{
      $tag_start = "<li class='s2_rv_litem'>";
      $tag_end = "</li>";  
    }
//create items
    foreach($recently_list as $item) {
    $url  = "index.php?option=com_sobi2&amp;sobi2Task=sobi2Details&amp;catid=".$item['catid']."&amp;sobi2Id=".$item['id']."&amp;Itemid=".$this->S_Itemid;
    $url=sobi2Config::sef($url);
    $imagediv = NULL;
    $iconsrc = NULL;
    $link = "<a href='".$url."' alt='".$item['title']."'>".$item['title']."</a><br>";
    if ($item['img'] != NULL){
      $iconsrc = $baseurl."/images/com_sobi2/clients/".$item['img']; 
      $imagediv = "<div><img class='s2rv_img' src='".$iconsrc."' title='".$item['title']."' alt='".$item['title']."'/></div>";
    }
    
    $return .=  $tag_start.$link.$imagediv.$tag_end;
    }
//style for container
    if($this->recvisited_style == "div"){
    $return = _S2REC_TITLE."<div id='s2_rv'>".$return."</div>";
    }
    else{
      $return = _S2REC_TITLE."<div id='s2_rv'><ul>".$return."</ul></div>";
    }    

  }  
  return $return;
}

function customTask($sobi2Task) {
    	return null;
}
function showListing($sobi2Id){
	return null;
}

function editForm($sobi2Id){
			return null;
}

function editFormStart($sobi2Id,&$fields) {
			return null;
}

function save($input,$sobi2Id) {
			return null;
}

function update($input,$sobi2Id){
			return null;
}

}
?>