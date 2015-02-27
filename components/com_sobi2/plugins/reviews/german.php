<?php
/**
* @version $Id: german.php 4912 2009-02-27 19:56:40Z Sigrid Suski $
* @package: Review and Ratings Plugin for SOBI2
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007-2009 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/


// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

/* RC 3.0 */
define('_S_2_REV_VOTE', 'Bewertung');
define('_S_2_REV_REVIEW_EMPTY', 'Nicht kommentiert');
define('_S_2_REV_AUTHOR_EMPTY', '- keiner -');
define('_S_2_ADM_PAGINATION_START', 'Start');
define('_S_2_ADM_PAGINATION_PREV', 'Vorherige');
define('_S_2_ADM_PAGINATION_NEXT', 'N&auml;chste');
define('_S_2_ADM_PAGINATION_END', 'Ende');
define('_S_2_ADM_PAGINATION_PAGE', 'Seite');
define('_S_2_ADM_PAGINATION_OF', 'von');
define('_S_2_REV_ADM_VOTES_EXCL_CAT', 'Ignoriere Kategorien');
define('_S_2_REV_ADM_VOTES_EXCL_CAT_EXPL', 'Um Eintr&auml;ge von bestimmten Kategorien in der Top Rated Liste zu ignorieren, trage hier die Ids dieser Kategorien komma-separiert ein.');
define('_S_2_REV_ADM_ALLOW_VOTE', 'Erlaube Bewerten');
define('_S_2_REV_ADM_ALLOW_VOTE_EXPL', 'Erlaube das Bewerten von Eintr&auml;gen.');
define('_S_2_REV_ADM_LIST_EXPLANATION', 'Benutze die SOBI2 Spezialaufgaben (special tasks) <span style="color: rgb(255, 0, 0);"><strong>sobi2Task=topRated</strong></span> und <span style="color: rgb(255, 0, 0);"><strong>sobi2Task=mostReviewed</strong></span> um eine Liste der top rated und most reviewed Eintr&auml;ge anzuzeigen.');
define('_S_2_REV_ADM_REVIEWS_SETTINGS', 'Kommentar-Einstellungen');
define('_S_2_REV_ADM_USERNAME', 'Verwende den Usernamen');
define('_S_2_REV_ADM_USERNAME_EXPL', 'Verwende den Usernamen anstelle des echten Namens. Bitte beachten Sie, dass dies ein Sicherheitsrisiko sein kann, da der Username der Anmeldename ist!');
define('_S_2_REV_ADM_TEXT', 'Informationstext');
define('_S_2_REV_ADM_TEXT_EXPL', 'Geben Sie den Text ein, der zur Information oberhalb des Kommentarformulars angezeigt wird.');
define('_S_2_REV_ADM_EMAIL_SETTINGS', 'Email-Einstellungen');
define('_S_2_REV_ADM_EMAIL_EXPLANATION', 'Die folgenden Platzhalter k&ouml;nnen in der Email-Vorlage verwendet werden:<br/>
<span style="color: rgb(255, 0, 0);">{sobi}</span> - Verzeichnisname; <span style="color: rgb(255, 0, 0);">{entry}</span> - Titel des Eintrages; <span style="color: rgb(255, 0, 0);">{admin_url}</span> - URL zur Administrationsseite des Eintrages; <span style="color: rgb(255, 0, 0);">{auth_url}</span> - URL zum Eintrag; <span style="color: rgb(255, 0, 0);">{rev_title}</span> - Titel des Kommentars; <span style="color: rgb(255, 0, 0);">{rev_text}</span> - Kommentartext.');
define('_S_2_REV_ADM_NOT_ADM_TEMPL', 'Emailvorlage f&uuml;r Administrator');
define('_S_2_REV_ADM_NOT_AUTHOR_TEMPL', 'Emailvorlage f&uuml;r Autor des Eintrags');
define('_S_2_REV_ADM_NOT_WRITER_TEMPL', 'Emailvorlage f&uuml;r Kommentator');
define('_S_2_REV_ADM_NOT_ADM_SUBJ', 'Emailbetreff an Administrator');
define('_S_2_REV_ADM_NOT_AUTHOR_SUBJ', 'Emailbetreff an Autor des Eintrags');
define('_S_2_REV_ADM_NOT_WRITER_SUBJ', 'Emailbetreff an Kommentator');
define('_S_2_REV_REVIEW_BY', ' von ');
define('_S_2_REV_REVIEW_ON', ' am ');
define('_S_2_REV_ADM_DATEFORMAT', 'Datumsformat');
define('_S_2_REV_ADM_DATEFORMAT_EXPL', 'Geben Sie hier das Datumsformat ein. F&uuml;r m&ouml;gliche Angaben siehe http://php.net/date.');

/* RC 2 */

DEFINE('_S_2_REV_TOP_RATED_HEADER', 'Top Rated Listings');
DEFINE('_S_2_REV_MOST_REV_HEADER', 'Most Reviewed Listings');


DEFINE('_S_2_REV_PAGENAV_START', '&lt;&lt;&nbsp;Anfang');
DEFINE('_S_2_REV_PAGENAV_START_TITLE', 'Gehe zur ersten Seite');
DEFINE('_S_2_REV_PAGENAV_PREV', '&lt;&nbsp;Vorherige');
DEFINE('_S_2_REV_PAGENAV_PREV_TITLE', 'Gehe zur vorherigen Seite');
DEFINE('_S_2_REV_PAGENAV_NEXT', 'N&auml;chste&nbsp;&gt;');
DEFINE('_S_2_REV_PAGENAV_NEXT_TITLE', 'Gehe zur n&auml;chsten Seite');
DEFINE('_S_2_REV_PAGENAV_END', 'Ende&nbsp;&gt;&gt;');
DEFINE('_S_2_REV_PAGENAV_END_TITLE', 'Gehe zur letzten Seite');
DEFINE('_S_2_REV_PAGENAV_PAGE_TITLE', 'Gehe zu Seite: ');


/* RC 1 */

DEFINE('_S_2_REV_AUTHOR', 'Autor: ');
DEFINE('_S_2_REV_DATE', 'Datum: ');
DEFINE('_S_2_REV_SEND_BT', 'Abschicken');
DEFINE('_S_2_REV_RATE_NOW', 'Bewerten: ');
DEFINE('_S_2_REV_WRITE_REV', 'Kommentar schreiben');
DEFINE('_S_2_REV_AUTHOR_NAME', 'Name: ');
DEFINE('_S_2_REV_TEXT', 'Text: ');
DEFINE('_S_2_REV_TITLE', 'Titel: ');
DEFINE('_S_2_REV_EMAIL', 'Email: ');
DEFINE('_S_2_REV_EMAIL_SHOW', 'Zeige Email ');
DEFINE('_S_2_REV_THNX_VOTE', 'Danke für Ihre Bewertung.');
DEFINE('_S_2_REV_THNX_REV', 'Danke für Ihren Kommentar.');
DEFINE('_S_2_REV_NO_AUTOPUBLISH', 'Ihr Kommentar wird geprüft bevor er veröffentlicht wird.');
DEFINE('_S_2_REV_ENTRY_UPDATED', 'Der Eintrag wurde in der Zwischenzeit geändert!');
DEFINE('_S_2_REV_ERR_SAVING', 'Fehler beim Speichern der Daten. Bitte versuchen Sie es erneut.');
DEFINE('_S_2_REV_REVIEWS_LISTING', 'Kommentare: ');
DEFINE('_S_2_REV_VOTE_SELECT', 'Wähle');

/*
 * adm config
 */
 
/* RC 2 */

DEFINE('_S_2_REV_ADM_LISTING_SETTINGS', 'Listing-Einstellungen');
DEFINE('_S_2_REV_ADM_VOTES_LIMIT', 'Top Rated Listenbegrenzung');
DEFINE('_S_2_REV_ADM_VOTES_LIMIT_EXPL', 'Max. Anzahl von Bewertungen um in die Top Rated Liste zu kommen.');

DEFINE('_S_2_REV_ADM_LIST_LIMIT', 'Begrenzung der Eintr&auml;ge');
DEFINE('_S_2_REV_ADM_LIST_LIMIT_EXPL', 'Anzahl Eintr&auml;ge, die in den Top Rated und Most Reviewed Listen angezeigt werden sollen.');

DEFINE('_S_2_REV_ADM_ALLOW_REV', 'Erlaube Hinzuf&uuml;gen von Kommentaren');
DEFINE('_S_2_REV_ADM_ALLOW_REV_EXPL', 'Erlaube das Hinzuf&uuml;gen von Kommentaren oder nur die Abgabe von Bewertungen.');
DEFINE('_S_2_REV_ADM_LIMIT', 'Anzahl Kommentare auf einer Seite');
DEFINE('_S_2_REV_ADM_LIMIT_EXPL', 'Wieviele Kommentare auf einer Seite angezeigt werden sollen.');
DEFINE('_S_2_REV_ADM_LIST', 'Reviews');
DEFINE('_S_2_REV_ADM_SETTINGS', 'Einstellungen');

/* RC 1 */

DEFINE('_S_2_REV_ADM_CONFIG_HEADER', 'Allgemeine Review und Rating Konfiguration');
DEFINE('_S_2_REV_ADM_ALLOW_ANO', 'Erlaube anonyme Kommentare/Bewertungen');
DEFINE('_S_2_REV_ADM_ALLOW_ANO_EXPL', 'Erlaube unregistrierten Benutzern Kommentare und Bewertungen abzugeben.');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI', 'Erlaube Mehrfachkommentare und -bewertungen');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI_EXPL', 'Erlaube den Benutzern mehrmals Kommentare und Bewertungen f&uuml;r einen Eintrag abzugeben. Wenn der Benutzer nicht eingeloggt ist, wird die IP Adresse anstelle der Benutzer-ID gepr&uuml;ft.');
DEFINE('_S_2_REV_ADM_SORTBY', 'Sortierung der Kommentare');
DEFINE('_S_2_REV_ADM_SORT_ASC', 'Aufsteigend');
DEFINE('_S_2_REV_ADM_SORT_DESC', 'Absteigend');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES', 'Zeige individuelle Bewertung');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES_EXPL', 'Zeige die individuelle Bewertung eines Benutzers wenn er auch einen Kommentar geschrieben hat.');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH', 'Publiziere Kommentare automatisch');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH_EXPL', 'Ein neuer Kommentar wird sofort ver&ouml;ffentlicht ohne das ein Administrator ihn zuerst &uuml;berpr&uuml;ft.');
DEFINE('_S_2_REV_ADM_FORM_POS', 'Position des Formulars');
DEFINE('_S_2_REV_ADM_FORM_POS_BEFORE', 'Vor der Kommentarliste');
DEFINE('_S_2_REV_ADM_FORM_POS_AFTER', 'Nach der Kommentarliste');
DEFINE('_S_2_REV_ADM_SHOW_MAILS', 'Zeige Emailadresse');
DEFINE('_S_2_REV_ADM_SHOW_MAILS_EXPL', 'Zeige die Emailadresse des Benutzers.');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO', 'Zeige &Auml;nderungsinformation');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO_EXPL', 'Zeige eine Information innerhalb der Kommentare wenn der Eintrag sich inzwischen ge&auml;ndert hat (Kommentare beziehen sich auf eine alte Version des Eintrag).');
DEFINE('_S_2_REV_ADM_COUNT_LISTING', 'Anzahl Kommentare in Kategorienansicht');
DEFINE('_S_2_REV_ADM_COUNT_LISTING_EXPL', 'Zeige die Anzahl der Kommentare eines Eintrags in der Kategorienansicht.');
DEFINE('_S_2_REV_ADM_NOT_ADM', 'Benachrichtige Admin bei neuem Kommentar');
DEFINE('_S_2_REV_ADM_NOT_AUTHOR', 'Benachrichtige den Autor des Eintrags bei neuem Kommentar');
DEFINE('_S_2_REV_ADM_NOT_WRITER', 'Benachrichtige den Kommentator');

DEFINE('_S_2_REV_ADM_INFO_TITLE', 'Info ');
DEFINE('_S_2_REV_ADM_INFO_1', 'Plazieren Sie "<span style="color: rgb(0, 0, 187);"><span
 style="color: rgb(204, 51, 204);">&lt;?php</span><span
 style="color: rgb(51, 204, 0);"> <span
 style="color: rgb(255, 0, 0);">echo</span> $plugins</span><span
 style="color: rgb(0, 0, 187);"></span>[<span
 style="color: rgb(221, 0, 0);">\'reviews\'</span><span
 style="color: rgb(0, 119, 0);">]</span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 0, 187);"></span>;
 <span style="color: rgb(204, 51, 204);">?&gt;</span></span>"
 in Ihr Template der Detailansicht an die Stelle an der Sie die Kommentare und das Kommentar-Eingabeformular anzeigen wollen.');

 DEFINE('_S_2_REV_ADM_INFO_2', 'Plazieren Sie "<span style="color: rgb(0, 0, 187);"><span
 style="color: rgb(204, 51, 204);">&#60;?php</span><span
 style="color: rgb(51, 204, 0);"> <span
 style="color: rgb(255, 0, 0);">echo</span> $this</span><span
 style="color: rgb(0, 119, 0);">-&#62;</span><span
 style="color: rgb(0, 0, 187);">plugins</span>[<span
 style="color: rgb(221, 0, 0);">\'reviews\'</span><span
 style="color: rgb(0, 119, 0);">]</span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 0, 187);">-&#62;showRating</span>(<span
 style="color: rgb(51, 204, 0);">$mySobi-&#62;id</span>);
<span style="color: rgb(204, 51, 204);">?&#62;</span></span>"
in Ihr Template der Detailansicht an die Stelle an der Sie das Bewertungsergebnis (Sterne) anzeigen wollen.');

DEFINE('_S_2_REV_ADM_INFO_3', 'Plazieren Sie "<span style="color: rgb(0, 0, 187);"><span
 style="color: rgb(204, 51, 204);">&lt;?php</span><span
 style="color: rgb(51, 204, 0);"> <span
 style="color: rgb(255, 0, 0);">echo</span> $plugins</span><span
 style="color: rgb(0, 0, 187);"></span>[<span
 style="color: rgb(221, 0, 0);">\'reviews\'</span><span
 style="color: rgb(0, 119, 0);">]</span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 0, 187);"></span>;
 <span style="color: rgb(204, 51, 204);">?&gt;</span></span>"
 in Ihr V-Card-Template an die Stelle an der Sie die Anzahl Kommentare und das Bewertungsergebnis (Sterne) anzeigen wollen.');

 /*
  * adm entry
  */
 DEFINE('_S_2_REV_VOTING_RESULTS', '<strong>Bewertungsergebnis: </strong>');
 DEFINE('_S_2_REV_VOTES_NUM', '<strong>Anzahl Bewertungen: </strong>');
 DEFINE('_S_2_REV_ADM_PUBL', 'Ver&ouml;ffentlicht');
 DEFINE('_S_2_REV_ADM_DEL', 'L&ouml;schen');
 DEFINE('_S_2_REV_ADM_AUTHOR', 'Autor/IP');
 DEFINE('_S_2_REV_ADM_DATE', 'Datum');
 DEFINE('_S_2_REV_REVIEW', 'Kommentar');
 DEFINE('_S_2_REV_JS_DEL_CONF', 'Sind Sie sicher, dass Sie diesen Kommentar löschen wollen?\nDer Kommentar wird gelöscht sobald die Speichern/Anwenden-Schaltfläche betätigt wird.');
?>
