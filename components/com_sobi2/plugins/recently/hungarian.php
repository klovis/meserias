<?php
/**
 * Sobi2 Entry Navigation plugin
 * @Copyright   Copyright (C) 2010 Mano
 * @licence     http://www.gnu.org/copyleft/gpl.html
 * @link        http://www.webmano.hu
 */
 
// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

define('_S2REC_TITLE', '<h3>Utoljára megtekintett bejegyzések:</h3>');

define('_S2REC_HEADER', 'Sobi2 utoljára megtekintett bejegyzések');
define('_S2REC_INFO_TITLE', 'Információ');
define('_S2REC_INFO2_TITLE', 'Támogatás');
define('_S2REC_INFO2', '<p>Részletes leírást megtalálod a <a href="http://www.webmano.hu/" target="_blank">http://www.webmano.hu</a> oldalon.</p><p>Ha kérdésed van akkor felteheted a fórumon <a href="http://www.webmano.hu/forum.html" target="_blank">http://www.webmano.hu/forum.html</a>.</p>');
define('_S2REC_INFO3_TITLE', 'Adomány');
define('_S2REC_INFO3', '<p style="color:#880000">Segíts népszerűsíteni a bővítményt és írj egy visszajelzést a <a href="http://extensions.joomla.org/extensions/owner/webmano" target="_blank">Jed - Bővítményeim</a> -n .</p><div style="float:right;"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VTG2PE6BPJQF2" target="_blank"><img src="components/com_sobi2/plugins/recently/btn_donateCC_L.gif" /> Donation</a></div><p style="color:#880000">Ha kereskedelmi oldalon használod vagy csak tetszik a bővítmény és segít a munkádban kérlek támogasd a fejlesztést. Ez engem is motivál a munka folytatására. Köszömön!</p>');

define('_S2REC_STYLE', 'Megjelenés stílusa');
define('_S2REC_STYLE_OPT1', 'List');
define('_S2REC_STYLE_OPT2', 'Div');

define('_S2REC_ORDER', 'Sorrend');
define('_S2REC_ORDER_OPT1', 'Növekvő');
define('_S2REC_ORDER_OPT2', 'Csökkenő');

define('_S2REC_NUMBER', 'Limit');
define('_S2REC_NUMBERD', 'Bejegyzések maximális száma');

define('_S2REC_SHOW', 'Mutat/Elrejti a kimenetet');
define('_S2REC_SHOW_OPT1', 'Mutassa a részletes nézetben');
define('_S2REC_SHOW_OPT2', 'Rejtse el a részletes nézetben');
define('_S2REC_SHOW_INFO', '<p>2 dolgot csinál a plugin. <br>1., Elmenti a legutoljára látogatott Sobi2 oldalakat (a részletes nézetet!). <br>2., Megjeleníti az eltárolt oldalak linkjeit.</p><p>Ha a <b>Sobi2 Recently Visited modult</b> használod, akkor el lehet rejteni a kimenetet a részletes nézetben. Akkor a plugin csak a szükséges adatok eltárolását végzi el.</p><p>A modul meg tudja jeleníteni a legutoljára látogatott oldalakat (link a részletes nézetre) bárhol a weboldaladon (nem csak a részletes nézetben)</p><p><b>A plugin kódot mindképpen be kell tenni a részletes nézet sablonjába.<b></p>');

define('_S2REC_INFO', '<p>Helyezd az alábbi kód valamelyikét a Részletek sablonba (Details View Template) , ahol szeretnéd megjeleníteni a navigációt.</p>
Only title: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title);?&gt;</span>"<br>
Title+Image: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title,$mySobi->image);?&gt;</span>"<br>
Title+Icon: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title,$mySobi->icon);?&gt;</span>"<br>
');

?>