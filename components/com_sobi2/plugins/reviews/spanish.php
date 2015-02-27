<?php
/**
* @version $Id: spanish.php 2444 2007-09-16 11:41:34Z Sigrid Suski $
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
* translated by Rudy Palacios
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

DEFINE('_S_2_REV_TOP_RATED_HEADER', 'Top Rated Listings');
DEFINE('_S_2_REV_MOST_REV_HEADER', 'Most Reviewed Listings');

DEFINE('_S_2_REV_PAGENAV_START', '&lt;&lt;&nbsp;Start');
DEFINE('_S_2_REV_PAGENAV_START_TITLE', 'Go to the first page');
DEFINE('_S_2_REV_PAGENAV_PREV', '&lt;&nbsp;Prev');
DEFINE('_S_2_REV_PAGENAV_PREV_TITLE', 'Go to the previous page');
DEFINE('_S_2_REV_PAGENAV_NEXT', 'Next&nbsp;&gt;');
DEFINE('_S_2_REV_PAGENAV_NEXT_TITLE', 'Go to the next page');
DEFINE('_S_2_REV_PAGENAV_END', 'End&nbsp;&gt;&gt;');
DEFINE('_S_2_REV_PAGENAV_END_TITLE', 'Go to the last page');
DEFINE('_S_2_REV_PAGENAV_PAGE_TITLE', 'Go to page: ');

/* RC 1 */
DEFINE('_S_2_REV_AUTHOR', 'Autor: ');
DEFINE('_S_2_REV_DATE', 'Fecha: ');
DEFINE('_S_2_REV_SEND_BT', 'Enviar');
DEFINE('_S_2_REV_RATE_NOW', 'Calificar: ');
DEFINE('_S_2_REV_WRITE_REV', 'Escribir Comentario');
DEFINE('_S_2_REV_AUTHOR_NAME', 'Nombre: ');
DEFINE('_S_2_REV_TEXT', 'Texto: ');
DEFINE('_S_2_REV_TITLE', 'T&iacute;tulo: ');
DEFINE('_S_2_REV_EMAIL', 'Correo: ');
DEFINE('_S_2_REV_EMAIL_SHOW', 'Mostrar correo ');
DEFINE('_S_2_REV_THNX_VOTE', 'Gracias por su voto');
DEFINE('_S_2_REV_THNX_REV', 'Gracias por su comentario');
DEFINE('_S_2_REV_NO_AUTOPUBLISH', 'Sus comentarios deben ser aprobados antes de ser publicados');
DEFINE('_S_2_REV_ENTRY_UPDATED', 'Su ingreso ya ha sido actualizado');
DEFINE('_S_2_REV_ERR_SAVING', 'Error al guardar. Por favor, intente nuevamente.');
DEFINE('_S_2_REV_REVIEWS_LISTING', 'Comentarios: ');
DEFINE('_S_2_REV_VOTE_SELECT', 'Seleccionar');
 
 
/*
 * adm config
*/
 
/* RC 2 */

DEFINE('_S_2_REV_ADM_LISTING_SETTINGS', 'Listing Settings');
DEFINE('_S_2_REV_ADM_VOTES_LIMIT', 'Top Rated List Limit');
DEFINE('_S_2_REV_ADM_VOTES_LIMIT_EXPL', 'Max. number of votes to get in the top list.');

DEFINE('_S_2_REV_ADM_LIST_LIMIT', 'Entries Limit');
DEFINE('_S_2_REV_ADM_LIST_LIMIT_EXPL', 'How many entries should be shown in top rated and most reviewed listings.');

DEFINE('_S_2_REV_ADM_ALLOW_REV', 'Enable Adding Reviews');
DEFINE('_S_2_REV_ADM_ALLOW_REV_EXPL', 'Enable adding reviews.');
DEFINE('_S_2_REV_ADM_LIMIT', 'Number of Reviews on a Page');
DEFINE('_S_2_REV_ADM_LIMIT_EXPL', 'How many reviews should be shown at once on a page.');
DEFINE('_S_2_REV_ADM_LIST', 'Reviews');
DEFINE('_S_2_REV_ADM_SETTINGS', 'Settings');

/* RC 1 */

DEFINE('_S_2_REV_ADM_CONFIG_HEADER', 'Configuraci&oacute;n de comentarios y Calificaciones');
DEFINE('_S_2_REV_ADM_ALLOW_ANO', 'Permitir comentarios an&oacute;nimos');
DEFINE('_S_2_REV_ADM_ALLOW_ANO_EXPL', 'Permitir a usuarios no registrados a&ntilde;adir comentarios y votos.');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI', 'Permitir comentarios m&uacute;ltiples');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI_EXPL', 'Permitir a los usuarios ingresar m&aacute;s de un comentario por item. ' .
                                'Esto funciona solamente si los comentarios an&oacute;nimos no son permitidos.');
DEFINE('_S_2_REV_ADM_SORTBY', 'Ordenar Comentarios');
DEFINE('_S_2_REV_ADM_SORT_ASC', 'Ascendente');
DEFINE('_S_2_REV_ADM_SORT_DESC', 'Descendente');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES', 'Mostrar votos individuales');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES_EXPL', 'Mostrar voto individual del usuario si escribi&oacute; un comentario.');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH', 'Publicar autom&aacute;ticamente los comentarios');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH_EXPL', 'Un nuevo comentario ser&aacute; publicado directamente sin aprobaci&oacute;n del administrador.');
DEFINE('_S_2_REV_ADM_FORM_POS', 'Posici&oacute;n del formulario');
DEFINE('_S_2_REV_ADM_FORM_POS_BEFORE', 'Antes de la lista de comentarios');
DEFINE('_S_2_REV_ADM_FORM_POS_AFTER', 'Despu&eacute;s de la lista de comentarios');
DEFINE('_S_2_REV_ADM_SHOW_MAILS', 'Mostrar direcci&oacute;n de correo');
DEFINE('_S_2_REV_ADM_SHOW_MAILS_EXPL', 'Mostrar dirección de correo de usuarios.');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO', 'Mostrar informaci&oacute;n de actualizaci&oacute;n');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO_EXPL', 'Mostrar la informaci&oacute;n entre los comentarios si el autor de uno de ellos lo ha actualizado (Los comentarios est&aacute;n relacionados con su versi&oacute;n anterior).');
DEFINE('_S_2_REV_ADM_COUNT_LISTING', 'Contar comentarios en Vista de Categor&iacute;a');
DEFINE('_S_2_REV_ADM_COUNT_LISTING_EXPL', 'Mostrar el n&uacute;mero de comentarios en cada entrada de la Vista de Categor&iacute;a.');
DEFINE('_S_2_REV_ADM_NOT_ADM', 'Notificar al Administrador los comentarios nuevos');
DEFINE('_S_2_REV_ADM_NOT_AUTHOR', 'Notificar al Autor sobre una entrada en su nuevo comentario');
DEFINE('_S_2_REV_ADM_NOT_WRITER', 'Notificar al Autor acerca de su comentario');
 
DEFINE('_S_2_REV_ADM_INFO_TITLE', 'Info ');
DEFINE('_S_2_REV_ADM_INFO_1', 'Coloque "<span style="color: rgb(0, 0, 187);"><span
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
 en su "Details View Template" en donde quiere que se muestren los comentarios y se coloque la forma para a&ntilde;adir ingresos.');

 DEFINE('_S_2_REV_ADM_INFO_2', 'Coloque "<span style="color: rgb(0, 0, 187);"><span
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
en su "Details View Template" en donde quiere que se muestren los resultados de los votos.');

 DEFINE('_S_2_REV_ADM_INFO_3', 'Place "<span style="color: rgb(0, 0, 187);"><span
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
 in your V-Card-Template on the place where you want to show the reviews (numbers) and ratings (stars) results.');
 
 /*
  * adm entry
  */
 DEFINE('_S_2_REV_VOTING_RESULTS', '<strong>Votos para esta entrada: </strong>'); 
 DEFINE('_S_2_REV_VOTES_NUM', '<strong> Votos: </strong>');
 DEFINE('_S_2_REV_ADM_PUBL', 'Publicado');
 DEFINE('_S_2_REV_ADM_DEL', 'Borrar');
 DEFINE('_S_2_REV_ADM_AUTHOR', 'Autor');
 DEFINE('_S_2_REV_ADM_DATE', 'Fecha');
 DEFINE('_S_2_REV_REVIEW', 'Comentario');
 DEFINE('_S_2_REV_JS_DEL_CONF', '¿Est&aacute; seguro que desea borrar este comentario?\nEl comentario ser&aacute; borrado si el bot&oacute;n de "Guardar" es presionado.');
?>

