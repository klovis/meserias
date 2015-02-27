<?php
/**
* @version $Id: italian.php 2419 2007-09-15 17:00:22Z Sigrid Suski $
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
* italian.php 12-Apr-2008 by Pasquale Riefoli
*/

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

/* RC 3.0 */
define('_S_2_REV_VOTE', 'Vote');
define('_S_2_REV_REVIEW_EMPTY', 'Not reviewed');
define('_S_2_REV_AUTHOR_EMPTY', '- none -');
define('_S_2_ADM_PAGINATION_START', 'Start');
define('_S_2_ADM_PAGINATION_PREV', 'Prev');
define('_S_2_ADM_PAGINATION_NEXT', 'Next');
define('_S_2_ADM_PAGINATION_END', 'End');
define('_S_2_ADM_PAGINATION_PAGE', 'Page');
define('_S_2_ADM_PAGINATION_OF', 'of');
define('_S_2_REV_ADM_VOTES_EXCL_CAT', 'Ignore Categories');
define('_S_2_REV_ADM_VOTES_EXCL_CAT_EXPL', 'To ignore entries from specific categories in the top rated list, enter comma-separated all ids of these categories.');
define('_S_2_REV_ADM_ALLOW_VOTE', 'Enable Voting');
define('_S_2_REV_ADM_ALLOW_VOTE_EXPL', 'Enable voting (rating).');
define('_S_2_REV_ADM_LIST_EXPLANATION', 'Use the SOBI2 special tasks <span style="color: rgb(255, 0, 0);"><strong>sobi2Task=topRated</strong></span> and <span style="color: rgb(255, 0, 0);"><strong>sobi2Task=mostReviewed</strong></span> to show a list of the top rated and most reviewed entries.');
define('_S_2_REV_ADM_REVIEWS_SETTINGS', 'Review Settings');
define('_S_2_REV_ADM_USERNAME', 'Use Username');
define('_S_2_REV_ADM_USERNAME_EXPL', 'Use username of the user instead of the real name. But be aware that this could be a safety risk because the username is the login name!');
define('_S_2_REV_ADM_TEXT', 'Information Text');
define('_S_2_REV_ADM_TEXT_EXPL', 'Enter the information text shown above the review form.');
define('_S_2_REV_ADM_EMAIL_SETTINGS', 'Email Settings');
define('_S_2_REV_ADM_EMAIL_EXPLANATION', 'Use the following placeholders in the email texts:<br/>
<span style="color: rgb(255, 0, 0);">{sobi}</span> - directory name; <span style="color: rgb(255, 0, 0);">{entry}</span> - title of the entry; <span style="color: rgb(255, 0, 0);">{admin_url}</span> - URL to administration page of the entry; <span style="color: rgb(255, 0, 0);">{auth_url}</span> - URL to entry; <span style="color: rgb(255, 0, 0);">{rev_title}</span> - title of the review; <span style="color: rgb(255, 0, 0);">{rev_text}</span - review text.');
define('_S_2_REV_ADM_NOT_ADM_TEMPL', 'Email template for Admin');
define('_S_2_REV_ADM_NOT_AUTHOR_TEMPL', 'Email template for Owner of Entry');
define('_S_2_REV_ADM_NOT_WRITER_TEMPL', 'Email template for Author of Review');
define('_S_2_REV_ADM_NOT_ADM_SUBJ', 'Email subject for Admin');
define('_S_2_REV_ADM_NOT_AUTHOR_SUBJ', 'Email subject for Owner of Entry');
define('_S_2_REV_ADM_NOT_WRITER_SUBJ', 'Email subject for Author of Review');
define('_S_2_REV_REVIEW_BY', ' by ');
define('_S_2_REV_REVIEW_ON', ' on ');
define('_S_2_REV_ADM_DATEFORMAT', 'Date Format');
define('_S_2_REV_ADM_DATEFORMAT_EXPL', 'Enter here the date format. For possible parameters see http://php.net/date.');

/* RC 2 */

define('_S_2_REV_TOP_RATED_HEADER', 'Lista dei pi&ugrave; Votati');
define('_S_2_REV_MOST_REV_HEADER', 'Lista dei pi&ugrave; Recensiti');

define('_S_2_REV_PAGENAV_START', '&lt;&lt;&nbsp;Inizio');
define('_S_2_REV_PAGENAV_START_TITLE', 'Vai alla prima pagina');
define('_S_2_REV_PAGENAV_PREV', '&lt;&nbsp;Precedente');
define('_S_2_REV_PAGENAV_PREV_TITLE', 'Vai alla pagina precedente');
define('_S_2_REV_PAGENAV_NEXT', 'Prossima&nbsp;&gt;');
define('_S_2_REV_PAGENAV_NEXT_TITLE', 'Vai alla prossima pagina');
define('_S_2_REV_PAGENAV_END', 'Fine&nbsp;&gt;&gt;');
define('_S_2_REV_PAGENAV_END_TITLE', 'Vai all\'ultima pagina');
define('_S_2_REV_PAGENAV_PAGE_TITLE', 'Vai a pagina: ');

/* RC 1 */

define('_S_2_REV_AUTHOR', 'Autore: ');
define('_S_2_REV_DATE', 'Data: ');
define('_S_2_REV_SEND_BT', 'Invia');
define('_S_2_REV_RATE_NOW', 'Vota ora: ');
define('_S_2_REV_WRITE_REV', 'Scrivi Recensione');
define('_S_2_REV_AUTHOR_NAME', 'Nome: ');
define('_S_2_REV_TEXT', 'Testo: ');
define('_S_2_REV_TITLE', 'Titolo: ');
define('_S_2_REV_EMAIL', 'Email: ');
define('_S_2_REV_EMAIL_SHOW', 'Mostra mia email ');
define('_S_2_REV_THNX_VOTE', 'Grazie per il tuo voto');
define('_S_2_REV_THNX_REV', 'Grazie per la tua recensione');
define('_S_2_REV_NO_AUTOPUBLISH', 'La tua recensione deve essere approvata prima di essere pubblicata');
define('_S_2_REV_ENTRY_UPDATED', 'La scheda &egrave; stata aggiornata ed &egrave; in attesa!');
define('_S_2_REV_ERR_SAVING', 'Errore nel salvare le informazioni. Per piacere riprovare pi&ugrave; tardi.');
define('_S_2_REV_REVIEWS_LISTING', 'Recensioni: ');
define('_S_2_REV_VOTE_SELECT', 'Seleziona');


/*
 * adm config
 */

/* RC 2 */

define('_S_2_REV_ADM_LISTING_SETTINGS', 'Configurazione Lista');
define('_S_2_REV_ADM_VOTES_LIMIT', 'Limite della lista dei pi&ugrave; Votati');
define('_S_2_REV_ADM_VOTES_LIMIT_EXPL', 'Max. numero massimo di voti da inserire nella top list.');

define('_S_2_REV_ADM_LIST_LIMIT', 'Limite Inserzioni');
define('_S_2_REV_ADM_LIST_LIMIT_EXPL', 'Quante Inserzioni verranno mostrate nella lista dei pi&ugrave; votati e recensiti.');

define('_S_2_REV_ADM_ALLOW_REV', 'Permetti Aggiunta Recensioni');
define('_S_2_REV_ADM_ALLOW_REV_EXPL', 'Permetti Aggiunta Recensioni o solo votazione.');
define('_S_2_REV_ADM_LIMIT', 'Numero di Recensioni in una Pagina');
define('_S_2_REV_ADM_LIMIT_EXPL', 'Quante recensioni dovrebbero essere mostrate su ogni pagina.');
define('_S_2_REV_ADM_LIST', 'Recensioni');
define('_S_2_REV_ADM_SETTINGS', 'Configurazioni');

/* RC 1 */

define('_S_2_REV_ADM_CONFIG_HEADER', 'Configurazione Recensioni e Voti');
define('_S_2_REV_ADM_ALLOW_ANO', 'Permetti Recensioni e Voti Anonime');
define('_S_2_REV_ADM_ALLOW_ANO_EXPL', 'Permetti algi utenti non Registrati di inserire recensioni e voti.');
define('_S_2_REV_ADM_ALLOW_MULTI', 'Permetti Recensioni Multiple');
define('_S_2_REV_ADM_ALLOW_MULTI_EXPL', 'Permetti agli utenti di aggiungere pi&ugrave; di una recensione ad una scheda. ' .
		'Questa impostazione funziona solo se le recensioni e i voti anonimi non sono permessi.');
define('_S_2_REV_ADM_SORTBY', 'Ordina Recensioni');
define('_S_2_REV_ADM_SORT_ASC', 'Ascendente');
define('_S_2_REV_ADM_SORT_DESC', 'Discendente');
define('_S_2_REV_ADM_SHOW_IND_VOTES', 'Mostra i Voti Individuali');
define('_S_2_REV_ADM_SHOW_IND_VOTES_EXPL', 'Mostra il Voto Individuale dell\'utente se ha scritto anche una recensione.');
define('_S_2_REV_ADM_AUTOPUBLISH', 'Pubblica Recensioni Automaticamente');
define('_S_2_REV_ADM_AUTOPUBLISH_EXPL', 'Una nuova recensione verr&agrave; pubblicata direttamente senza l\'approvazione di un\'Amministratore.');
define('_S_2_REV_ADM_FORM_POS', 'Posizione Form');
define('_S_2_REV_ADM_FORM_POS_BEFORE', 'Lista Recensioni Precedenti');
define('_S_2_REV_ADM_FORM_POS_AFTER', 'Lista Recensioni Successive');
define('_S_2_REV_ADM_SHOW_MAILS', 'Mostra Indirizzo Email');
define('_S_2_REV_ADM_SHOW_MAILS_EXPL', 'Mostra l\'indirizzo email degli utenti.');
define('_S_2_REV_ADM_SHOW_UPDATE_INFO', 'Mostra le Informazioni di Aggiornamento');
define('_S_2_REV_ADM_SHOW_UPDATE_INFO_EXPL', 'Mostra un\'informazione tra recensioni se l\'autore aggiornata la sua scheda (Le Recensioni sono relazionate ad una vecchia versione della scheda).');
define('_S_2_REV_ADM_COUNT_LISTING', 'Conta Recensioni nella Vista per Categorie');
define('_S_2_REV_ADM_COUNT_LISTING_EXPL', 'Mostra il numero di Recensioni per ogni Scheda nella Vista per Categorie.');
define('_S_2_REV_ADM_NOT_ADM', 'Notifica all\'Amministratore di nuove Recensioni');
define('_S_2_REV_ADM_NOT_AUTHOR', 'Notifica all\'Autore di una Scheda l\'inserimento di una nuova Recensione');
define('_S_2_REV_ADM_NOT_WRITER', 'Notifica all\'Autore di una Recensione su una Recensione');

define('_S_2_REV_ADM_INFO_TITLE', 'Informazioni ');
define('_S_2_REV_ADM_INFO_1', 'Posiziona "<span style="color: rgb(0, 0, 187);"><span
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
 nel Template della Vista Dettagliata nel posto in cui si vuole vedere il form per aggiungere le recensioni e i voti.');

 define('_S_2_REV_ADM_INFO_2', 'Posiziona "<span style="color: rgb(0, 0, 187);"><span
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
nel Template della Vista Dettagliata nel posto in cui si vuole vedere i risultati del voto (stelle).');

 define('_S_2_REV_ADM_INFO_3', 'Posiziona "<span style="color: rgb(0, 0, 187);"><span
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
 nel Template delle V-Card nel posto in cui si vuole vedere i risultati delle recensioni (numeri) e del voto (stelle).');
 /*
  * adm entry
  */
 define('_S_2_REV_VOTING_RESULTS', '<strong>Risultato Voti per questa scheda: </strong>');
 define('_S_2_REV_VOTES_NUM', '<strong> Voti: </strong>');
 define('_S_2_REV_ADM_PUBL', 'Pubblicato');
 define('_S_2_REV_ADM_DEL', 'Cancella');
 define('_S_2_REV_ADM_AUTHOR', 'Autore');
 define('_S_2_REV_ADM_DATE', 'Data');
 define('_S_2_REV_REVIEW', 'Recensione');
 define('_S_2_REV_JS_DEL_CONF', 'Sei sicuro di voler cancellare questa recensione?\nLa recensione verr&agrave; cancellata se verr&agrave; premuto il bottone Salva.');
?>
