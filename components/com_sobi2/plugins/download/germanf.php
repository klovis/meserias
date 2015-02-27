<?php
/**
* @version $Id: english.php 3136 2007-12-30 17:41:20Z Sigrid Suski $
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

define("_SDP_UPLOAD_TITLE", "Neue Datei hochladen");
define("_SDP_UPLOAD_BT_TITLE", "Neue Datei hochladen");
define("_SDP_LIC_TITLE", "Lizenz");
define("_SDP_CLOSE_BT", "Fenster schließen");
define("_SDP_UPLOAD_TITLE_LEFT", "");
define("_SDP_UPLOAD_TITLE_BUTTON", 'Dateien hochladen');
define("_SDP_POP_UP_UPLOAD_TITLE", "Neue Datei hochladen");
define("_SDP_UPLOADED_FILES", "Hochgeladene Dateien: ");
define("_SDP_FILE_NAME", "Dateiname: ");
define("_SDP_FILE_TYPE", "Dateityp: ");
define("_SDP_FILE_SIZE", "Dateigröße: ");
define("_SDP_REMOVE_FILE", "Datei löschen");
define("_SDP_REMOVE_ID_MISMATCH", "Datei konnte nicht entfernt werden. Id Problem.");
define("_SDD_BOX_SELECT", "Wähle");
define("_SDD_LICENSE_SELECT", 'Bitte wähle eine Lizenz für diese Datei:');
define("_SDD_SELECTED_LICENSE", 'Für diese Datei gewählte Lizenz:&nbsp;');
define("_SDD_ASSIGN", "Zuweisen");
define("_SDD_CHANGE", "Ändern");
define("_SDP_CHANGE_LICENSE_ID_MISMATCH", "Kann die Lizen nichz ändern. Id Problem.");
define("_SDD_NO_LICENSE", "nicht gewählt");
define("_SDD_LICENSE_ACCEPT", '&nbsp;&nbsp;I have read, understand and agree with this license&nbsp;&nbsp;');
define("_SDD_DOWNLOAD", "Download");
define("_SDD_FILE_TOO_BIG", "Die Datei ist zu groß. Versuche eine kleinere Datei hochzuladen. Maximale Dateigröße: ");


/*ADM*/
define("_SDDADM_GEN_PANE", "General");
define("_SDDADM_GEN_DIRECTORY", "Store files in: ");
define("_SDDADM_GEN_DIRECTORY_EXPL", "Choose the directory where the files should be stored.");
define("_SDDADM_GEN_ALLOWED_FILES", "Number of allowed files: ");
define("_SDDADM_GEN_ALLOWED_FILES_EXPL", "Enter the numer of files which are allowed to upload for one entry.");
define("_SDDADM_GEN_PP_WIN_HEADER", "Add Entry Form Options");
define("_SDDADM_GEN_PP_WIN_H", "Window height: ");
define("_SDDADM_GEN_PP_WIN_W", "Window width: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_IMG", "Upload button image: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_IMG_EXPL", "Background image for the upload button in add entry form.");
define("_SDDADM_GEN_UPLOAD_BUTTON_POS", "Button position: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_POS_EXPL", "Button position in add entry form. Enter the order number or 0 if files are uploaded only from back-end.");
define("_SDDADM_GEN_ADD_LIC", "Use licenses: ");
define("_SDDADM_GEN_ADD_LIC_EXPL", "A license has to be chosen for every uploaded file.");
define("_SDDADM_GEN_MAX_FILESIZE", "Max. file size: ");
define("_SDDADM_GEN_ALLOWED_FILE_EXT", "Allowed file extensions: ");
define("_SDDADM_GEN_ALLOWED_FILE_EXT_EXPL", "Enter here, comma separated, the allowed file extensions.");
define("_SDDADM_GEN_DOWNLOAD_HEADER", "Download Options");
define("_SDDADM_DOWNLOAD_SORTBY", "Sort files by: ");
define("_SDDADM_DOWNLOAD_SORTBY_NAME", "Name");
define("_SDDADM_DOWNLOAD_SORTBY_EXT", "Extension");
define("_SDDADM_DOWNLOAD_SORTBY_SIZE", "Size");
define("_SDDADM_DOWNLOAD_SORTBY_DATE", "Date added");
define("_SDDADM_DOWNLOAD_SORTBY_HITS", "Hits");
define("_SDDADM_GEN_PPL_WIN_H", "License window height: ");
define("_SDDADM_GEN_PPL_WIN_W", "License window width: ");
define("_SDDADM_MIMETYPES_PANE", "Mime Types");
define("_SDDADM_MIMETYPES", "Icons for File Extensions");
define("_SDDADM_MIMETYPES_EXPL", "All image files have to be in the JoomlaRoot/components/com_sobi2/plugins/download/mimetypes directory!");
define("_SDDADM_MIMETYPES_ADD", "Add New Type");
define("_SDDADM_MIMETYPES_EXT", "File Extension");
define("_SDDADM_MIMETYPES_ICO", "Icon File");
define("_SDDADM_LICENSES", "Licenses");
define("_SDDADM_LICENSE_EDIT", "Edit License");
define("_SDDADM_LICENSE_TITLE", "License Title");
define("_SDDADM_LICENSE_URL", "License Url");
define("_SDDADM_LICENSE_SAVE", "Save License");
define("_SDDADM_LICENSE_SAVED", "License saved!");
define("_SDDADM_LICENSE_DELETED", "License removed!");
define("_SDDADM_LICENSE_DEL", "Remove this License");
define("_SDDADM_LICENSE_DEL_CONF", "Are you really sure that you want to remove this license?");
define("_SDDADM_LICENSE_ADD", "Add New License");

define("_SDDADM_INFO", "Info");
define("_SDDADM_INFO_DTEMPL", 'Code to add in <a href="index2.php?option=com_sobi2&amp;task=editTemplate">Details View Template</a>');
define("_SDDADM_INFO_VTEMPL", 'Code to add in <a href="index2.php?option=com_sobi2&amp;task=editVCTemplate">V-Card Template</a>');
define("_SDDADM_INFO_TEMPL", 'You can customize the output in <a href="index2.php?option=com_sobi2&amp;task=editTemplate">Details View Template</a> and <a href="index2.php?option=com_sobi2&amp;task=editVCTemplate">V-Card Template</a> by editing the file templates.php in JoomlaRoot/components/com_sobi2/plugins/download');
?>
