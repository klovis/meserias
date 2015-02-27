<?php
/**
* @version $Id: english.php 4533 2008-10-08 16:01:56Z Radek Suski $
* @package: Sigsiu Online Business Index 2
* @subpackage download plugin
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 Download Plugin is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/


// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );

define("_SDP_UPLOAD_TITLE", "Wczytaj pliki");
define("_SDP_UPLOAD_BT_TITLE", "Wybierz plik do wczytania");
define("_SDP_LIC_TITLE", "Licencja");
define("_SDP_CLOSE_BT", "Zamknij okno");
define("_SDP_UPLOAD_TITLE_LEFT", "");
define("_SDP_UPLOAD_TITLE_BUTTON", 'Załaduj pliki na serwer');
define("_SDP_POP_UP_UPLOAD_TITLE", "Wczytaj pliki");
define("_SDP_UPLOADED_FILES", "Wczytane pliki: ");
define("_SDP_FILE_NAME", "Nazwa pliku: ");
define("_SDP_FILE_TYPE", "Typ pliku: ");
define("_SDP_FILE_SIZE", "Rozmiar pliku: ");
define("_SDP_REMOVE_FILE", "Usuń plik");
define("_SDP_REMOVE_ID_MISMATCH", "Ni można usunąć pliku. Niepoprawne id.");
define("_SDD_BOX_SELECT", "Wybierz");
define("_SDD_LICENSE_SELECT", 'Wybierz licencję dla tego pliku:');
define("_SDD_SELECTED_LICENSE", 'Wybrana licencja do tego pliku:&nbsp;');
define("_SDD_ASSIGN", "Przypisz");
define("_SDD_CHANGE", "Zmień");
define("_SDP_CHANGE_LICENSE_ID_MISMATCH", "Nie można zmienić licencji. Niepoprawne id.");
define("_SDD_NO_LICENSE", "brak licencji");
define("_SDD_LICENSE_ACCEPT", '&nbsp;&nbsp;Przeczytałem, zrozumiałem i akceptuje powyższe warunki licencji.&nbsp;&nbsp;');
define("_SDD_DOWNLOAD", "Pobierz");
define("_SDD_FILE_TOO_BIG", "Plike jest zbyt duży. Maksymalny dopuszczalny rozmiar pliku: ");


/*ADM*/
define("_SDDADM_GEN_PANE", "Ogólne");
define("_SDDADM_GEN_DIRECTORY", "Zapisz pliki w: ");
define("_SDDADM_GEN_DIRECTORY_EXPL", "Wybierz folder w którym będą zapisywane pliki");
define("_SDDADM_GEN_ALLOWED_FILES", "Dopuszczalna ilość plików: ");
define("_SDDADM_GEN_ALLOWED_FILES_EXPL", "Maksymalna dopuszczalna ilość plików dodanych do jednego wpisu");
define("_SDDADM_GEN_PP_WIN_HEADER", "Opcje formularza");
define("_SDDADM_GEN_PP_WIN_H", "Wysokość okna: ");
define("_SDDADM_GEN_PP_WIN_W", "Szerokość okna: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_IMG", "Obrazek przycisku: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_IMG_EXPL", "Obrazek tła dla przyciski służącego do załadowywania plików na serwer.");
define("_SDDADM_GEN_UPLOAD_BUTTON_POS", "Opcje przycisku: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_POS_EXPL", "Pozycja przycisku. Wybierz 0 jeśli nie chcesz aby użtykownicy byli w stanie załadowywać pliki ze strony frontowej.");
define("_SDDADM_GEN_ADD_LIC", "Aktywuj licencje: ");
define("_SDDADM_GEN_ADD_LIC_EXPL", "Do każdego pliku można będzie można wybrać licencję.");
define("_SDDADM_GEN_MAX_FILESIZE", "Maksymalna wielkość pliku: ");
define("_SDDADM_GEN_MAX_FILESIZE_PHP", "Ustawienia PHP zezwalają maksymalnie: ");
define("_SDDADM_GEN_ALLOWED_FILE_EXT", "Dozwolone typy plików: ");
define("_SDDADM_GEN_ALLOWED_FILE_EXT_EXPL", "Wprowadź listę dopuszczalnych rozszerzeń rozdzieloną przecinkiem");
define("_SDDADM_GEN_DOWNLOAD_HEADER", "Opcje pobierania");
define("_SDDADM_DOWNLOAD_SORTBY", "Sortuj pliki według: ");
define("_SDDADM_DOWNLOAD_SORTBY_NAME", "Nazwy");
define("_SDDADM_DOWNLOAD_SORTBY_EXT", "Rozszerzenia");
define("_SDDADM_DOWNLOAD_SORTBY_SIZE", "Wielkości");
define("_SDDADM_DOWNLOAD_SORTBY_DATE", "Daty dodania");
define("_SDDADM_DOWNLOAD_SORTBY_HITS", "Ilości pobrań");
define("_SDDADM_GEN_PPL_WIN_H", "Wyskość okna licencji: ");
define("_SDDADM_GEN_PPL_WIN_W", "Szerokość okna licencji: ");
define("_SDDADM_MIMETYPES_PANE", "Mime Types");
define("_SDDADM_MIMETYPES", "Ikonki dla rozszerzeń plików");
define("_SDDADM_MIMETYPES_EXPL", "Pliki muszą znajdować się w folderze JoomlaRoot/components/com_sobi2/plugins/download/mimetypes");
define("_SDDADM_MIMETYPES_ADD", "Dodaj nowy typ");
define("_SDDADM_MIMETYPES_EXT", "Rozszerzenie pliku");
define("_SDDADM_MIMETYPES_ICO", "Ikonka pliku");
define("_SDDADM_LICENSES", "Licencje");
define("_SDDADM_LICENSE_EDIT", "Edytuj licencję");
define("_SDDADM_LICENSE_TITLE", "Tytuł licencji");
define("_SDDADM_LICENSE_URL", "Adres do licencji");
define("_SDDADM_LICENSE_SAVE", "Zapisz");
define("_SDDADM_LICENSE_SAVED", "Licencja zachowana!");
define("_SDDADM_LICENSE_DELETED", "Licencja usunięta!");
define("_SDDADM_LICENSE_DEL", "Usuń tą licencję");
define("_SDDADM_LICENSE_DEL_CONF", "Czy na pewno chcesz usunąć tą licencję?");
define("_SDDADM_LICENSE_ADD", "Dodaj nową licencję");

define("_SDDADM_INFO", "Info");
define("_SDDADM_INFO_DTEMPL", 'Kod do <a href="index2.php?option=com_sobi2&amp;task=editTemplate">Szablonu widoku szczegółowego</a>');
define("_SDDADM_INFO_VTEMPL", 'Ko do <a href="index2.php?option=com_sobi2&amp;task=editVCTemplate">Szablonu V-Card</a>');
define("_SDDADM_INFO_TEMPL", 'Wygląd generowanego kodu może być zmieniony poprzez edycję pliku JoomlaRoot/components/com_sobi2/plugins/download/templates.php');
?>
