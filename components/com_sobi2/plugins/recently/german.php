<?php
/**
 * Sobi2 Entry Navigation plugin
 * @Copyright   Copyright (C) 2010 Mano
 * @licence     http://www.gnu.org/copyleft/gpl.html
 * @link        http://www.webmano.hu
 */

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

define('_S2REC_TITLE', '<h3>Zuletzt angesehene Einträge:</h3>');

define('_S2REC_HEADER', 'Sobi2 Zuletzt angesehene Einträge');
define('_S2REC_INFO_TITLE', 'Information');
define('_S2REC_INFO2_TITLE', 'Support');
define('_S2REC_INFO2', '<p>Eine ausführliche Beschreibung finden Sie unter <a href="http://www.webmano.hu/" target="_blank">http://www.webmano.hu</a>.</p><p>Wenn Sie Fragen haben, zögern Sie nicht diese in unserem Support Forum zu stellen <a href="http://www.webmano.hu/forum.html" target="_blank">http://www.webmano.hu/forum.html</a>.</p>');
define('_S2REC_INFO3_TITLE', 'Spenden');
define('_S2REC_INFO3', '<p style="color:#880000">Helfen Sie mir meine Erweiterung populärer zu machen und verfassen Sie einen Beitrag  <a href="http://extensions.joomla.org/extensions/owner/webmano" target="_blank">Jed - My Extensions</a>.</p><div style="float:right;"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VTG2PE6BPJQF2" target="_blank"><img src="components/com_sobi2/plugins/recently/btn_donateCC_LG.gif" /> Donation</a></div><p style="color:#880000">Wenn Sie meine Erweiterungen auf einer komerziellen Webseite nutzen oder Ihnen diese gefallen und bei Ihrer Arbeit helfen, würde ich mich sehr über eine Spende freuen. Es motiviert mich, die Erweiterungen zu verbessern und hilft mir, an weiteren Erweiterungen zu arbeiten. Vielen Dank!</p>');

define('_S2REC_STYLE', 'Ausgabe des Eintragsstils');
define('_S2REC_STYLE_OPT1', 'List');
define('_S2REC_STYLE_OPT2', 'Div');

define('_S2REC_ORDER', 'Sortierung');
define('_S2REC_ORDER_OPT1', 'Asc');
define('_S2REC_ORDER_OPT2', 'Desc');

define('_S2REC_NUMBER', 'Limit');
define('_S2REC_NUMBERD', 'Maximale Anzahl an Einträgen');

define('_S2REC_SHOW', 'Zeige/Verstecke die Ausgabenliste');
define('_S2REC_SHOW_OPT1', 'Zeige in Detailansicht');
define('_S2REC_SHOW_OPT2', 'Verstecke in Detailansicht');
define('_S2REC_SHOW_INFO', '<p>Dieses Plugin verfügt über zwei Funktionen <br>1., Es zeigt die zuletzt besuchten Sobi2 Einträge(in der Detailansicht) aus der aktuellen Sitzung an <br>2., Es zeigt den Link zu den zuletzt gesehenen Einträgen.</p><p>Benutzen Sie das <b>Sobi2 Recently Visited module</b> können Sie die Ausgabe in der Detailansicht verstecken (In diesem Fall werden nur die notwendigen Daten gespeichert, die zuletzt besuchten Einträge werden aber nicht in der Detailansicht angezeigt. Das Modul wird die gespeicherten Daten nutzen und eine Liste erzeugen)</p><p>Das Modul kann die zuletzt besuchten Seiten (link in der Detailansicht!) beliebig auf Ihrer Seite anzeigen!(nicht nur in der Detailansicht)</p><p><b>Es ist auf jeden Fall notwenig, dass Sie den Plugin-Code in das Template Ihrer Detailansicht einfügen.<b></p>');

define('_S2REC_INFO', '<p>Fügen Sie diesen Code in Ihrer Detailansicht an der Stelle ein, an der Sie die Navigation erstellen möchten.</p>
Title: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title);?&gt;</span>"<br>
Title+Image: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title,$mySobi->image);?&gt;</span>"<br>
Title+Icon: "<span style="color: rgb(204, 51, 204);">&lt;?php echo $this->plugins[\'recently\']->recently($mySobi->id,$mySobi->title,$mySobi->icon);?&gt;</span>"<br>
');

?>