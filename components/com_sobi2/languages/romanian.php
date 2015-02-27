<?php
/**
* @version $Id: english.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2 (Sobi2)
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET GmbH
* Email: sobi[at]sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2006 - 2010 Sigsiu.NET GmbH (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL.
* You can use, redistribute this file and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/

defined( '_SOBI2_' ) || exit("Acces restrictionat");

/*
 * added (RC 2.9.2.4)
 */
define('_SOBI2_NEVER', 'Niciodata');

/*
 * added (RC 2.9.2)
 */
define('_SOBI2_NOENTRYINCAT', 'Nu exista nici un meserias in aceasta categorie.');

/*
 * added (RC 2.9)
 */
define('_CCOUNT_VISITED', '( vizitat de %count% ori )');
defined('_BACK') or define('_BACK', 'Inapoi');

/*
 * added (RC 2.8.7.2)
 */
define('_SOBI2_GOOGLEMAPS_LABEL', 'Etichete');

/*
 * added (RC 2.8.7.1)
 */
defined('_PN_PREVIOUS') or define('_PN_PREVIOUS', 'Inapoi');
defined('_PN_START') or define('_PN_START', 'La inceput');
defined('_PN_NEXT') or define('_PN_NEXT', 'Urmatorul');
defined('_PN_END') or define('_PN_END', 'La sfarsit');

/*
 * added (RC 2.8.7)
 */
define('_SOBI2_RENEW_EXP_TXT', 'Acest meserias este expirat de %days% zile. Doriti  sa <a href="%href%" title="Reinoiti acest meserias acum">Reinoiti acest meserias acum</a> ?');

/*
 * added (RC 2.8.5)
 */
define('_SOBI2_DEFAULT_TOOLTIP_TITLE', 'Explicatie');
define('_SOBI2_ENTRIES_LIMIT_REACHED', 'Ati adaugat deja %count% de meseariasi. Puteti adauga maxim %limit% meseriasi.');

/*
 * added (RC 2.8.4)
 */
define('_SOBI2_RENEW_TPL_TXT', 'Acest meserias expira in %days% zile. Doriti  sa <a href="%href%" title="Reinoiti acest meserias acum">Reinoiti acest meserias acum</a> ?');
define('_SOBI2_RENEW_BT_NOW', 'Reinoiti acest meserias acum');
define('_SOBI2_RENEW_HEADER', 'Reinoiti meserias');
define('_SOBI2_RENEW_EXPL', 'Suteti pe punctul sa reinoiti acest meserias: ( %title% ). Valabilitatea acestui meserias este marita cu inca %days% zile. Va expira la data de %date%');
define('_SOBI2_RENEWED_EXPL', 'Acest meserias ( %title% ) este reinait pt inca %days% zile. Acest meserias expira la data de %date%');
define('_SOBI2_PAY_DISCOUNT', 'Discaunt');
define('_JS_SOBI2_QFIELD_NO_VALUE', 'Date lipsa');
define('_JS_SOBI2_QFIELD_DBL_CLK_TO_EDIT', 'Dati double click pentru a edita valoarea');

/*
 * added (RC 2.8.1)
 */
define('_SOBI2_NEW_LABEL', 'Nou');
define('_SOBI2_UPDATED_LABEL', 'Actualizat');
define('_SOBI2_HOT_LABEL', 'Hot');

/*
 * added 16.08.2007 (RC 2.8)
 */

//to get it working in this language you need the language files of the calender too
define("_SOBI2_CALENDAR_LANG", "en");
define("_SOBI2_CALENDAR_FORMAT", "y-mm-dd");

define("_SOBI2_USER_OWN_LISTING", "Anunturile lui %name%");
// use this line if  user (login) name should be used in "Show users listings" instead of the real name
//define("_SOBI2_USER_OWN_LISTING", "%username%'s listings");
define("_SOBI2_USER_OWN_NO_LISTING", "Nici un anunt gasit pt acest utilizator");

define('_SOBI2_FIELDLIST_SELECT', '&nbsp;---- select ----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

define('_SOBI2_ALPHA_HEADER', 'Letter ');
define('_SOBI2_ALPHA_CATS_WITH_LETTER', 'categorii incepand cu ');
define('_SOBI2_ALPHA_ITEMS_WITH_LETTER', 'Meseriasi incepand cu ');
define('_SOBI2_ALPHA_LETTER', 'Meseriasi si categorii incepand cu ');

define('_SOBI2_TAGGED_HEADER', 'Meseriasi etichetati cu ');
define('_SOBI2_ENTRIES_TAGGED_WITH', 'Meseriasi etichetati cu ');
define('_SOBI2_ENTRY_TAGGED_WITH', 'Etichete: ');

define('_SOBI2_POPULAR_HEADER', 'Cei mai populati');
define('_SOBI2_POPULAR_LISTING', 'Meseriasii cei mai populari');
define('_SOBI2_POPULAR_CATS', 'Categoriile cele mai populare');

define('_SOBI2_UPDATED_HEADER', 'Meseriasi actualizati recent');
define('_SOBI2_UPDATED_LISTING', 'Meseriasi actualizati recent');

define('_SOBI2_NEW_LISTINGS_HEADER', 'Meseriasi noi');
define('_SOBI2_NEW_LISTINGS_LISTING', 'meseriasi noi');

defined('_SEARCH_BOX') or define('_SEARCH_BOX', 'Cauta meserias ... ');
define('_SOBI2_SEARCH_RESET_FORM', 'Anuleaza cautarea');
define('_SOBI2_SEARCH_RESET_FORM_TITLE', 'Anuleaza criteriile de cautare');

/*
 * added 26.07.2007 (RC 2.7.4)
 */
DEFINE('_SOBI2_SEARCH_CAT_REMOVED', 'Categoria cautata a fost stearsa');
DEFINE('_SOBI2_SEARCH_TOOGLE_EXTENDED', 'Cautare avansata');
DEFINE('_SOBI2_SEARCH_TOOGLE_CATS', 'Alege categoria');
DEFINE('_SOBI2_SEARCH_CATBOX_SELECT', '&nbsp;---- alege ----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
DEFINE('_SOBI2_SEARCH_BOX_SELECT', '&nbsp;---- alege ----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

/*
 * added 16.06.2007 (RC 2.7.2)
 */
DEFINE('_SOBI2_FILE_NOT_UPLOADED', 'Nu s-a putut face upload la fisier, incercati din nou.');
DEFINE('_SOBI2_FILE_UPLOADED', 'Fisier adaugat cu succes');
DEFINE('_SOBI2_UPLOAD_FILE', 'Adauga fisier: ');
DEFINE('_SOBI2_UPLOAD', 'Adauga');
DEFINE('_SOBI2_UPLOAD_DISSALLOWED_FILETYPE', 'Tipul fisierului adaucat nu este permis');

/*
 * added 11.11.2006 (RC 2.5.4)
 */
DEFINE('_SOBI2_NEW_ENTRY_AWAITING_APP', " Anuntul dumneavoastra a fost adaugat cu succes si asteapta sa fie aprobat.");

/*
 * added 26.10.2006 (RC 2.5)
 */
DEFINE('_SOBI2_CHECKBOX_YES', 'Da');
DEFINE('_SOBI2_CHECKBOX_NO', 'Nu');
DEFINE('_SOBI2_FORM_SELECT_BG', 'Alege imaginea de fundal');
DEFINE('_SOBI2_FORM_SELECT_BG_EXPL', 'Select background image for details and cards view in category view.');
DEFINE('_SOBI2_FORM_BG_PREVIEW', 'Previzualizare imagine de fundal');
DEFINE('_SOBI2_NOT_LOGGED_FOR_DETAILS', 'Trebuie sa fiti un utilizator inregistrat si logat pt a vedea aceasta meserias');
DEFINE('_SOBI2_JS_NOT_LOGGED_FOR_DETAILS', 'Trebuie sa fiti un utilizator inregistrat si logat pt a vedea aceasta meserias');
define('_SOBI2_SEARCH_INPUTBOX', _SEARCH_BOX);
define('_SOBI2_SEARCH_ALL_ENTRIES', 'Toti meseriasii');

/*
 * added 11.10.2006 (RC 2)
 */
DEFINE('_SOBI2_FORM_JS_CAT_NO_PARENT_CAT', 'Trebuie sa selectati subcategorii. Nu puteti adauga un meserias la o categorie care are subcategorii.');
DEFINE('_SOBI2_SUBCATS_IN_THIS_CAT', 'Numarul de subcategorii pt aceasta categorie: ');
DEFINE('_SOBI2_SUBCATS_IN_CAT', 'subcategorii pt ');
DEFINE('_SOBI2_ITEMS_IN_THIS_CAT', 'numarul de meseriasi din acesta categorie: ');
DEFINE('_SOBI2_ITEMS_IN_CAT', 'Meseriasi pt ');
DEFINE('_SOBI2_ITEMS_CATS_SEPARATOR', '/');

/*
 * added 02.10.2006 (RC 1)
 */
DEFINE('_SOBI2_GOOGLEMAPS_GET_DIR', 'Actualizez orientarea');
DEFINE('_SOBI2_GOOGLEMAPS_FROM', 'De aici');
DEFINE('_SOBI2_GOOGLEMAPS_TO', 'Pana aici');
DEFINE('_SOBI2_GOOGLEMAPS_ADDR', 'Adresa: ');
DEFINE('_SOBI2_GOOGLEMAPS_DIR', 'Orientarea: ');

/*
 * added 26.09.2006 (Beta 2.2)
 */
 DEFINE('_SOBI2_CANCEL', 'Anuleaza');

/*
 * added 23.09.2006 (Beta 2.1)
 */
DEFINE('_SOBI2_SAVE_IMG_TO_BIG', 'Imaginea nu a putut fi adaugata! Marimea fisierului este prea mare. Marimea fisierului este: ');
DEFINE('_SOBI2_EF_MAX_FILE_SIZE', ' Marimea fisierului nu ar trebui sa fie mai mare de ');
DEFINE('_SOBI2_EF_KB_FILE_SIZE', ' kB');

/*
 * General Labels
 */

DEFINE('_SOBI2_SEND_L', 'Salveaza');
DEFINE('_SOBI2_ADD_U', 'Adauga');
DEFINE('_SOBI2_CATEGORY_L', 'categorie');
DEFINE('_SOBI2_CATEGORY_H', 'Categorie');
DEFINE('_SOBI2_CATEGORIES_L', 'categorii');
DEFINE('_SOBI2_CATEGORIES_H', 'Categorii');
DEFINE('_SOBI2_IS_FREE_L', 'nu este gratis');
DEFINE('_SOBI2_IS_NOT_FREE_L', 'nu este gratis. ');
DEFINE('_SOBI2_COST_L', 'Costa');
DEFINE('_SOBI2_NOT_AUTH', 'Nu sunteti autorizat sa vedeti aceasta pagina');
DEFINE('_SOBI2_SELECT', 'alege');
DEFINE('_SOBI2_SEARCH_H', 'Cauta');
DEFINE('_SOBI2_ADD_NEW_ENTRY', 'Adauga meserias');
DEFINE('_SOBI2_NUMBER_H', 'Numar');
DEFINE('_SOBI2_CONFIRM_DELETE', 'Doriti sa stergeti acest meserias? \n' .
								'Datele vor fi pierdute in mod irevocabil!');
DEFINE('_SOBI2_SEND_MAIL', 'Trimite Email');
DEFINE('_SOBI2_VISIT_WEBSITE', 'Vizitati Website');
DEFINE('_SOBI2_HITS', 'vizualizari: ');
DEFINE('_SOBI2_DATE_ADDED', 'Adaugat la data:');

DEFINE('_SOBI2_NOT_LOGGED', '<h4>Nu nunteti logat si de acceea nu puteti adauga un meserias.</h4>');
DEFINE('_SOBI2_NOT_LOGGED_CANNOT_EDIT', '<h4>Nu sunteti logat</h4>' .
		'<h4>Puteti adauga un meserias, dar nu-l veti mai putea edita pe viitor. Pentru a putea edita pe viitor un meserias trebuie sa va inregistrati mai intai <a href="/index.php/inregistrare.html">aici</a> si apoi sa adaugati meseriasul.</h4>');
DEFINE('_SOBI2_PLEASE_REGISTER_OR_LOGIN', '<h4>Va rugam sa va logati sau sa va inregistrati</h4>');


/*
 * Formular Labels
 */
DEFINE('_SOBI2_FORM_TITLE_ADD_NEW_ENTRY', 'Adauga meserias nou');
DEFINE('_SOBI2_FORM_TITLE_EDIT_ENTRY', 'Editeaza meserias');

DEFINE('_SOBI2_FORM_YOUR_IMG_LABEL', 'Your ');
DEFINE('_SOBI2_FORM_IMG_CHANGE_LABEL', 'Schimba ');
DEFINE('_SOBI2_FORM_IMG_REMOVE_LABEL', 'Sterge ');
DEFINE('_SOBI2_FORM_IMG_EXPL', 'Aceasta imagine va fi afisata in profilul dumneavoastra.');
DEFINE('_SOBI2_FORM_YOUR_ICO_LABEL', 'Your ');
DEFINE('_SOBI2_FORM_ICO_CHANGE_LABEL', 'Schimba ');
DEFINE('_SOBI2_FORM_ICO_REMOVE_LABEL', 'Sterge ');

DEFINE('_SOBI2_FORM_ICO_EXPL', 'Aceasta imagine va fi afisata la detaliile pt o categorie.');
DEFINE('_SOBI2_FORM_SAFETY_CODE', 'Codul de siguranta&nbsp;');
DEFINE('_SOBI2_FORM_ENTER_SAFETY_CODE', 'Va rog introduceti codul de siguranta');
DEFINE('_SOBI2_FORM_NOT_FREE_OPTION', 'Aceasta optiune nu este gratis.');
DEFINE('_SOBI2_FORM_SELECT_CATEGORY', 'Va rugam selectati o categorie');
DEFINE('_SOBI2_FORM_CAN_ADD_TO_NR_CATS', "Puteti adauga acest meserias la maxim {$config->maxCatsForEntry} categorii");
DEFINE('_SOBI2_FORM_CAT_1', 'Prima categorie');
DEFINE('_SOBI2_FORM_ADD_CAT_BT', _SOBI2_ADD_U.' '._SOBI2_CATEGORY_H);
DEFINE('_SOBI2_FORM_REMOVE_CAT_BT','Sterge '._SOBI2_CATEGORY_H);
DEFINE('_SOBI2_FORM_SELECTED_CAT_DESC', _SOBI2_CATEGORY_H.' Descriere:');
DEFINE('_SOBI2_FORM_PRICE_IS', 'Pretul aceste optiuni este de');
DEFINE('_SOBI2_FORM_FIELD_REQ_MARK', ' * ');
DEFINE('_SOBI2_FORM_FIELD_REQ_INFO', 'Toate campurile marcate cu '._SOBI2_FORM_FIELD_REQ_MARK.' sunt obligatorii.');
DEFINE('_SOBI2_FORM_META_KEYS_LABEL', 'Cuvinte cheie');
DEFINE('_SOBI2_FORM_META_KEYS_EXPL', 'Cuvintele introduse vor fi adaugate la lista de cuvinte metadate (Meta Tag Key) utile motoarelor de cautare.');
DEFINE('_SOBI2_FORM_META_DESC_LABEL', 'Descriere metadate');
DEFINE('_SOBI2_FORM_META_DESC_EXPL', 'Textul introdus va fi adaugat la lista de cuvinte metadate (Meta Tag).');
DEFINE('_SOBI2_FORM_JS_SELECT_CAT', 'Va rugam sa selectati cel putin o categorie.');
DEFINE('_SOBI2_FORM_JS_ACC_ENTRY_RULES', 'Trebuie sa acceptati termenii de utilizare al acestui site.');
DEFINE('_SOBI2_FORM_JS_ALL_REQUIRED_FIELDS', 'Va rugam sa completati toate campurile obligatorii.');
DEFINE('_SOBI2_FORM_JS_CAT_ALLREADY_ADDED', 'Aceasta categorie este deja adaugata.');
DEFINE('_SOBI2_SEC_CODE_WRONG', 'Cod de securitate intordus gresit');
DEFINE('_SOBI2_LISTING_CHECKED_OUT', 'Acest meserias este editat in acest moment de un alt utilizator.');


/*
 * On Saving
 */
DEFINE('_SOBI2_SAVE_DUPLICATE_ENTRY', 'Un meserias cu acest nume exista deja.');
DEFINE('_SOBI2_SAVE_NOT_ALLOWED_IMG_EXT', 'Fisierul are o extensie care nu este permisa de aceea nu a fost adaugat.');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_FILED', 'Imaginea nu a fost adaugrata!');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_OK', 'Imaginea de logo a meseriasului a fost adaugata!');
DEFINE('_SOBI2_SAVE_UPLOAD_ICO_OK', 'Pictograma meseriasului a fost adaugata!');
DEFINE('_SOBI2_SAVE_UPLOAD_IMG_FAILED', 'Imaginea de logo a meseriasului nu a fost adaugata!');
DEFINE('_SOBI2_SAVE_UPLOAD_ICO_FAILED', 'Pictograma meseriasului nu a fost adaugata!');
DEFINE('_SOBI2_SAVE_NOT_ALL_REQ_FIELDS_FILLED', 'Nu toate campurile obligatorii au fost completate!');
DEFINE('_SOBI2_SAVE_ICON_FEES', 'Pictograma dumneavoastra');
DEFINE('_SOBI2_SAVE_IMAGE_FEES', 'Imaginea/logoul dumneavoastra');
DEFINE('_SOBI2_CHANGES_SAVED', 'Toate modificarile au fost salvate');


/*
 * Entry Labels
 */
DEFINE('_SOBI2_LISTING_EDIT_PROMOTED_ITEMS', 'Meseriasi promovati');
DEFINE('_SOBI2_LISTING_EDIT_ENTRY_BT', 'Modifica');
DEFINE('_SOBI2_LISTING_DELET_ENTRY_BT', 'Sterge');
DEFINE('_SOBI2_LISTING_GO_UP_ICO', '');
DEFINE('_SOBI2_LISTING_GO_UP_TXT', '');


/*
 * Payment Class
 */
DEFINE('_SOBI2_PAY_CHOSEN_OPTIONS', 'Ati ales urmatoarea modalitate de plata');
DEFINE('_SOBI2_PAY_TOTAL_AMOUNT', 'Valoarea totala: ');
DEFINE('_SOBI2_PAY_WITH_BANK', 'Voi plati prin transfer bancar');
DEFINE('_SOBI2_PAY_WITH_PAYPAL', 'Voi plat iprin PayPal');
DEFINE('_SOBI2_PAY_BANK_DATA_SEND_EMAIL', 'Datele despre contul bancar v-au fost trimise prin email');
DEFINE('_SOBI2_PAY_BANK_DATA_JS_HEADER', 'Va rugam trimiteti banii in urmatorul cont bancar: ');
DEFINE('_SOBI2_PAY_BANK_DATA_JS_TITLE', 'Raport: ');


/*
 * search form
 */
DEFINE('_SOBI2_SEARCH_FOR', _SOBI2_SEARCH_H.' pe: ');
DEFINE('_SOBI2_SEARCH_ANY', 'Orice cuvant');
DEFINE('_SOBI2_SEARCH_ALL', 'Toate cuvintele');
DEFINE('_SOBI2_SEARCH_EXACT', 'Fraza exacta');
DEFINE('_SOBI2_SEARCH_RESULTS', 'Rezultatele cautarii');
DEFINE('_SOBI2_SEARCH_RESULTS_FOUND', 'Am gasit ');
DEFINE('_SOBI2_SEARCH_RESULTS_FOUND_RESULTS', 'meseriasi cautand ');

/*
 *  Deleting
 */
DEFINE('_SOBI2_DEL_UNPUBLISHED', 'Anuntul dumneavoastra nu mai este publicYour entry is unpublished now!');
DEFINE('_SOBI2_DEL_NOT_DELETED', 'Anuntul dumneavoastra nu a putut fi seters. Va rugam cuntactati administratorii acestui site.');
DEFINE('_SOBI2_DEL_DELETED', 'Anuntul a fost sters!');


?>