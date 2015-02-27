﻿<?php
/**
* @version $Id: farsi.php 2419 2007-09-15 17:00:22Z Sigrid Suski $
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

DEFINE('_S_2_REV_TOP_RATED_HEADER', 'ليست كردن محبوب ترين ها');
DEFINE('_S_2_REV_MOST_REV_HEADER', 'ليست كردن بيشترين بازديد شده ها');

DEFINE('_S_2_REV_PAGENAV_START', '&lt;&lt;&nbsp;شروع');
DEFINE('_S_2_REV_PAGENAV_START_TITLE', 'برو يه صفحه اول');
DEFINE('_S_2_REV_PAGENAV_PREV', '&lt;&nbsp;قبلي');
DEFINE('_S_2_REV_PAGENAV_PREV_TITLE', 'برو به صفحه قبلي');
DEFINE('_S_2_REV_PAGENAV_NEXT', 'Next&nbsp;&gt;');
DEFINE('_S_2_REV_PAGENAV_NEXT_TITLE', 'برو به صفحه بعدي');
DEFINE('_S_2_REV_PAGENAV_END', 'پايان&nbsp;&gt;&gt;');
DEFINE('_S_2_REV_PAGENAV_END_TITLE', 'برو به آخرين صفحه');
DEFINE('_S_2_REV_PAGENAV_PAGE_TITLE', 'برو به صفحه : ');

/* RC 1 */

DEFINE('_S_2_REV_AUTHOR', 'نويسنده : ');
DEFINE('_S_2_REV_DATE', 'تاريخ : ');
DEFINE('_S_2_REV_SEND_BT', 'ارسال');
DEFINE('_S_2_REV_RATE_NOW', 'امتياز دهي فعلي : ');
DEFINE('_S_2_REV_WRITE_REV', 'نوشتن نظر');
DEFINE('_S_2_REV_AUTHOR_NAME', 'نام : ');
DEFINE('_S_2_REV_TEXT', 'متن : ');
DEFINE('_S_2_REV_TITLE', 'عنوان : ');
DEFINE('_S_2_REV_EMAIL', 'پست الكترونيك : ');
DEFINE('_S_2_REV_EMAIL_SHOW', 'آدرس پست الكترونيكي مرا نمايش بده ');
DEFINE('_S_2_REV_THNX_VOTE', 'از امتياز دهي شما متشكريم');
DEFINE('_S_2_REV_THNX_REV', 'از اظهار نظر شما متشكريم');
DEFINE('_S_2_REV_NO_AUTOPUBLISH', 'نظر شريف جنابعالي قبل از انتشار بايد تاييد شود');
DEFINE('_S_2_REV_ENTRY_UPDATED', 'در اين حال ورودي بروز آوري شده است!');
DEFINE('_S_2_REV_ERR_SAVING', 'خطا در ذخيره اطلاعات. لطفا مجددا سعي كنيد');
DEFINE('_S_2_REV_REVIEWS_LISTING', 'نظرات مرور : ');
DEFINE('_S_2_REV_VOTE_SELECT', 'انتخاب');


/*
 * adm config
 */

/* RC 2 */

DEFINE('_S_2_REV_ADM_LISTING_SETTINGS', 'تنظيمات ليست نمودن در');
DEFINE('_S_2_REV_ADM_VOTES_LIMIT', 'محدوديت ليست محبوب ترين ها');
DEFINE('_S_2_REV_ADM_VOTES_LIMIT_EXPL', 'Max. number of votes to get in the top list.');

DEFINE('_S_2_REV_ADM_LIST_LIMIT', 'محدوديت ورودي ها');
DEFINE('_S_2_REV_ADM_LIST_LIMIT_EXPL', 'How many entries should be shown in top rated and most reviewed listings.');

DEFINE('_S_2_REV_ADM_ALLOW_REV', 'اجازه اضافه كردن نظرات');
DEFINE('_S_2_REV_ADM_ALLOW_REV_EXPL', 'Allow adding reviews or only voting.');
DEFINE('_S_2_REV_ADM_LIMIT', 'تعداد اظهار نظرها در يك صفحه');
DEFINE('_S_2_REV_ADM_LIMIT_EXPL', 'How many reviews should be shown at once on a page.');
DEFINE('_S_2_REV_ADM_LIST', 'اظهار نظرات');
DEFINE('_S_2_REV_ADM_SETTINGS', 'تنظيمات');

/* RC 1 */

DEFINE('_S_2_REV_ADM_CONFIG_HEADER', 'تنظيمات مربوط به امتياز دهي و اظهار نظر كردن در');
DEFINE('_S_2_REV_ADM_ALLOW_ANO', 'اجازه به كاربران ناشناس براي اظهار نظر كردن و امتياز دادن');
DEFINE('_S_2_REV_ADM_ALLOW_ANO_EXPL', 'Allow unregistered users to add reviews and votings.');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI', 'اجازه چند اظهار نظر كردن');
DEFINE('_S_2_REV_ADM_ALLOW_MULTI_EXPL', 'Allow users to add more than one review and/or vote to an entry. If the user is not logged in, this will test the IP address of the user instead of the user id.');
DEFINE('_S_2_REV_ADM_SORTBY', 'مرتب سازي اظهار نظر ها');
DEFINE('_S_2_REV_ADM_SORT_ASC', 'صعودي');
DEFINE('_S_2_REV_ADM_SORT_DESC', 'نزولي');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES', 'نمايش امتيازات فردي');
DEFINE('_S_2_REV_ADM_SHOW_IND_VOTES_EXPL', 'Show individual vote of the user if he wrote a review too.');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH', 'انتشار خودكار اظهار نظر ها');
DEFINE('_S_2_REV_ADM_AUTOPUBLISH_EXPL', 'A new review will be published directly without approval of an administrator.');
DEFINE('_S_2_REV_ADM_FORM_POS', 'موقعيت فرم');
DEFINE('_S_2_REV_ADM_FORM_POS_BEFORE', 'قبل از ليست اظهار نظر');
DEFINE('_S_2_REV_ADM_FORM_POS_AFTER', 'بعد ليست اظهار نظر');
DEFINE('_S_2_REV_ADM_SHOW_MAILS', 'نمايش آدرس پست الكترونيك');
DEFINE('_S_2_REV_ADM_SHOW_MAILS_EXPL', 'Show email addres of the users.');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO', 'نمايش اطلاعات بروزآوري');
DEFINE('_S_2_REV_ADM_SHOW_UPDATE_INFO_EXPL', 'Show an info between the reviews if the author of an entry has updated his entry (Reviews are related to an older version of the entry).');
DEFINE('_S_2_REV_ADM_COUNT_LISTING', 'شمارش اظهار نظر ها در حالت نمايش طبقه بندي');
DEFINE('_S_2_REV_ADM_COUNT_LISTING_EXPL', 'Show the number of reviews for each entry in the Category View.');
DEFINE('_S_2_REV_ADM_NOT_ADM', 'تذكر به مدير سيستم در خصوص اظهار نظر هاي جديد');
DEFINE('_S_2_REV_ADM_NOT_AUTHOR', 'تذكر به نويسنده ورودي در خصوص اظهار نظر جديد');
DEFINE('_S_2_REV_ADM_NOT_WRITER', 'تذكر به نويسنده اظهار نظر در خصوص اظهار نظري كه نوشته');

DEFINE('_S_2_REV_ADM_INFO_TITLE', 'اطلاعات ');
DEFINE('_S_2_REV_ADM_INFO_1', 'عبارت روبرو را "<span style="color: rgb(0, 0, 187);"><span
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
 در your Details View Template on the place where you want to show the reviews and the add review/ratings form قرار دهيد.');

 DEFINE('_S_2_REV_ADM_INFO_2', 'عبارت روبرو را "<span style="color: rgb(0, 0, 187);"><span
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
در your Details View Template on the place where you want to show the rating results (stars) قرار دهيد.');

 DEFINE('_S_2_REV_ADM_INFO_3', 'عبارت روبرو را "<span style="color: rgb(0, 0, 187);"><span
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
 در your V-Card-Template on the place where you want to show the reviews (numbers) and ratings (stars) results قرار دهيد.');
 /*
  * adm entry
  */
 DEFINE('_S_2_REV_VOTING_RESULTS', '<strong>نتيجه امتازات براي اين ورودي : </strong>');
 DEFINE('_S_2_REV_VOTES_NUM', '<strong> امتيازات : </strong>');
 DEFINE('_S_2_REV_ADM_PUBL', 'منتشر شده');
 DEFINE('_S_2_REV_ADM_DEL', 'پاك شدن');
 DEFINE('_S_2_REV_ADM_AUTHOR', 'نويسنده');
 DEFINE('_S_2_REV_ADM_DATE', 'تاريخ');
 DEFINE('_S_2_REV_REVIEW', 'اظهار نظر');
 DEFINE('_S_2_REV_JS_DEL_CONF', 'آيا براي پاك كردن اين اظهار نظر مطمئن هستيد؟\nاظهار نظر پاك خواهد شد اگر شما گزينه ذخيره را فشار دهيد،');
?>
