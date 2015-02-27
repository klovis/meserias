<?php
/**
* @version $Id: english.php 1.0.0 05/03/2008
* @package: Sigsiu Online Business Index 2
* ===================================================
* @author
* Name: Fabien LAHAULLE
* Email: fabien.lahaulle@gmail.com
* Url: http://www.creationscristina.com
* ===================================================
* @copyright Copyright (C) 2007 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/

// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

/*
 * adm config
 */

DEFINE('_S_2_PAY_ADM_LIST', 'Payments');

//TABS
DEFINE('_S_2_PAY_ADM_LIST_TODAY', 'TODAY PAYMENTS');
DEFINE('_S_2_PAY_ADM_LIST_CUR_MONTH', 'CURRENT MONTH PAYMENTS');
DEFINE('_S_2_PAY_ADM_LIST_LAST_MONTH', 'LAST MONTH PAYMENTS');

//listings headers
DEFINE('_S_2_PAY_ADM_PAYED_DATE', 'Payed Date');
DEFINE('_S_2_PAY_ADM_ENTRY_ID', 'Entry ID');
DEFINE('_S_2_PAY_ADM_REFERENCE', 'Reference');
DEFINE('_S_2_PAY_ADM_AMOUNT', 'Amount');

//categories
DEFINE('_S_2_PAY_ADM_CUR_MONTH_PAY_PER_DAY', 'CURRENT MONTH PAYMENTS PER DAY');
DEFINE('_S_2_PAY_ADM_LAST_MONTH_PAY_PER_DAY', 'LAST MONTH PAYMENTS PER DAY');

//graphic
DEFINE('_S_2_PAY_ADM_GRAPH_Y_AXIS', 'Payments');
DEFINE('_S_2_PAY_ADM_GRAPH_X_AXIS', 'Days of the month');
DEFINE('_S_2_PAY_ADM_GRAPH_TITLE_CUR_MONTH', 'CURRENT MONTH PAYMENTS PER DAY');
DEFINE('_S_2_PAY_ADM_GRAPH_TITLE_LAST_MONTH', 'LAST MONTH PAYMENTS PER DAY');

?>
