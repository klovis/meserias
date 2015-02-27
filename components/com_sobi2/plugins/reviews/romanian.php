<?php
/**
* @version $Id: english.php 4912 2009-02-27 19:56:40Z Sigrid Suski $
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
DEFINE('_S_2_REV_DATE', 'Data: ');
DEFINE('_S_2_REV_SEND_BT', 'Trimite');
DEFINE('_S_2_REV_RATE_NOW', 'Voteaza acum: ');
DEFINE('_S_2_REV_WRITE_REV', 'Scrie o recomandare');
DEFINE('_S_2_REV_AUTHOR_NAME', 'Nume: ');
DEFINE('_S_2_REV_TEXT', 'Recomandarea: ');
DEFINE('_S_2_REV_TITLE', 'Titlu: ');
DEFINE('_S_2_REV_EMAIL', 'Email: ');
DEFINE('_S_2_REV_EMAIL_SHOW', 'Arata emailul ');
DEFINE('_S_2_REV_THNX_VOTE', 'Multumim pentru votul tau.');
DEFINE('_S_2_REV_THNX_REV', 'Multumim pentru recomandarea ta.');
DEFINE('_S_2_REV_NO_AUTOPUBLISH', 'Recomandarea ta va trebui sa sa fie aprobata inainte de a fi publicata .');
DEFINE('_S_2_REV_ENTRY_UPDATED', 'Inregistrea a fost actualizata intre timp!');
DEFINE('_S_2_REV_ERR_SAVING', 'Eroare la salvarea datalor. Va rugam sa incercati din nou.');
DEFINE('_S_2_REV_REVIEWS_LISTING', 'Recomandari: ');
DEFINE('_S_2_REV_VOTE_SELECT', 'Selecteaza');


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

DEFINE('_S_2_REV_ADM_CONFIG_HEADER', 'General Review and Rating Configuration');
DEFINE('_S_2_REV_ADM_ALLOW_ANO', 'Allow anonymous Review and Voting');
DEFINE('_S_2_REV_ADM_ALLOW_ANO_EXPL', 'Allow unregistered users to add reviews and votings.');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI', 'Allow Multiple Reviews and Votes');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI_EXPL', 'Allow users to add more than one review and/or vote to an entry. If the user is not logged in, this will test the IP address of the user instead of the user id.');
DEFINE('_S_2_REV_ADM_SORTBY', 'Sort Reviews');
DEFINE('_S_2_REV_ADM_SORT_ASC', 'Ascending');
DEFINE('_S_2_REV_ADM_SORT_DESC', 'Descending');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES', 'Show Individual Votes');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES_EXPL', 'Show the individual vote of the user if he also wrote a review.');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH', 'Publish Reviews Automatically');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH_EXPL', 'A new review will be published directly without approval of an administrator.');
DEFINE('_S_2_REV_ADM_FORM_POS', 'Form Position');
DEFINE('_S_2_REV_ADM_FORM_POS_BEFORE', 'Before Review List');
DEFINE('_S_2_REV_ADM_FORM_POS_AFTER', 'After Review List');
DEFINE('_S_2_REV_ADM_SHOW_MAILS', 'Show Email Address');
DEFINE('_S_2_REV_ADM_SHOW_MAILS_EXPL', 'Show email address of the users.');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO', 'Show Update Info');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO_EXPL', 'Show an info between the reviews if the author of an entry has updated his entry (Reviews are related to an older version of the entry).');
DEFINE('_S_2_REV_ADM_COUNT_LISTING', 'Count Reviews in Category View');
DEFINE('_S_2_REV_ADM_COUNT_LISTING_EXPL', 'Show the number of reviews for each entry in the Category View.');
DEFINE('_S_2_REV_ADM_NOT_ADM', 'Notify Admin about new Reviews');
DEFINE('_S_2_REV_ADM_NOT_AUTHOR', 'Notify Owner of Entry about new Reviews');
DEFINE('_S_2_REV_ADM_NOT_WRITER', 'Send Confirmation to Authors of Reviews');

DEFINE('_S_2_REV_ADM_INFO_TITLE', 'Info ');
DEFINE('_S_2_REV_ADM_INFO_1', 'Place "<span style="color: rgb(0, 0, 187);"><span
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
 in your Details View Template on the place where you want to show the reviews and the add review/ratings form.');

 DEFINE('_S_2_REV_ADM_INFO_2', 'Place "<span style="color: rgb(0, 0, 187);"><span
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
in your Details View Template on the place where you want to show the rating results (stars).');

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
 DEFINE('_S_2_REV_VOTING_RESULTS', '<strong>Voting result: </strong>');
 DEFINE('_S_2_REV_VOTES_NUM', '<strong>Number of Votes: </strong>');
 DEFINE('_S_2_REV_ADM_PUBL', 'Published');
 DEFINE('_S_2_REV_ADM_DEL', 'Delete');
 DEFINE('_S_2_REV_ADM_AUTHOR', 'Author/IP');
 DEFINE('_S_2_REV_ADM_DATE', 'Date');
 DEFINE('_S_2_REV_REVIEW', 'Review');
 DEFINE('_S_2_REV_JS_DEL_CONF', 'Are you sure to delete this review/vote?\nThe review/vote will be deleted if the Save/Apply Button is pressed.');
?>
