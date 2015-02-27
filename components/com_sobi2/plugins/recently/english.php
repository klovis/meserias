<?php
/**
 * Sobi2 Entry Navigation plugin
 * @Copyright   Copyright (C) 2010 Mano
 * @licence     http://www.gnu.org/copyleft/gpl.html
 * @link        http://www.webmano.hu
 */

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

define('_S2REC_TITLE', '<h3>Recently visited entries:</h3>');

define('_S2REC_HEADER', 'Sobi2 Recently Visited Entries');
define('_S2REC_INFO_TITLE', 'Information');
define('_S2REC_INFO2_TITLE', 'Support');
define('_S2REC_INFO2', '<p>You find the detaild description at <a href="http://www.webmano.hu/" target="_blank">http://www.webmano.hu</a>.</p><p>If you have any question feel free to ask on the Support forum at <a href="http://www.webmano.hu/forum.html" target="_blank">http://www.webmano.hu/forum.html</a>.</p>');
define('_S2REC_INFO3_TITLE', 'Donation');
define('_S2REC_INFO3', '<p style="color:#880000">Help me popularize this extension and please write a review on the <a href="http://extensions.joomla.org/extensions/owner/webmano" target="_blank">Jed - My Extensions</a>.</p><div style="float:right;"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VTG2PE6BPJQF2" target="_blank"><img src="components/com_sobi2/plugins/recently/btn_donateCC_LG.gif" /> Donation</a></div><p style="color:#880000">If you use any of my extension at commercial site or you just like it and this helps with your work, please make a small donation. It motivates me to improve the extensions and helps me to keep on working. Thank You!</p>');

define('_S2REC_STYLE', 'Output of Entries style');
define('_S2REC_STYLE_OPT1', 'List');
define('_S2REC_STYLE_OPT2', 'Div');

define('_S2REC_ORDER', 'Sort');
define('_S2REC_ORDER_OPT1', 'Asc');
define('_S2REC_ORDER_OPT2', 'Desc');

define('_S2REC_NUMBER', 'Limit');
define('_S2REC_NUMBERD', 'Max number of entries');

define('_S2REC_SHOW', 'Show/Hide output List');
define('_S2REC_SHOW_OPT1', 'Show in details view');
define('_S2REC_SHOW_OPT2', 'Hide in Details view');
define('_S2REC_SHOW_INFO', '<p>This plugin do two things. <br>1., Store the visited Sobi2 pages(the details view!) in a session. <br>2., Display the links of stored pages.</p><p>If you use the <b>Sobi2 Recently Visited module</b> you can hide the output of this plugin in the details view.(in this case the plugin only store the neccesary data, but not show the latest visited pages. The module will use these data and it shows the list)</p><p>The module can show the recently visited pages (link of the details views!) anywhere on your site!(not only in the details view)</p><p><b>Anyway in it is necessary to put the plugin code into the template of the details view.<b></p>');

define('_S2REC_INFO', '<p>Place one of these codes in your Details View Template on the place where you want to show the navigation.</p>
Only title: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title);?&gt;</span>"<br>
Title+Image: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title,$mySobi->image);?&gt;</span>"<br>
Title+Icon: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title,$mySobi->icon);?&gt;</span>"<br>
');
?>