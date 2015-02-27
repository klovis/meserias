<?php
/**
* @version $Id: english.php 2099 2007-09-11 07:15:36Z Radek Suski $
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

define("_SDP_UPLOAD_TITLE", "Carica Nuovo File");
define("_SDP_UPLOAD_BT_TITLE", "Carica nuovo file");
define("_SDP_LIC_TITLE", "Licenza");
define("_SDP_CLOSE_BT", "Chiudi Finestra");
define("_SDP_UPLOAD_TITLE_LEFT", "");
define("_SDP_UPLOAD_TITLE_BUTTON", 'Carica Files');
define("_SDP_POP_UP_UPLOAD_TITLE", "Carica nuovo file");
define("_SDP_UPLOADED_FILES", "File Caricati: ");
define("_SDP_FILE_NAME", "Nome File: ");
define("_SDP_FILE_TYPE", "Tipo File: ");
define("_SDP_FILE_SIZE", "Dimensione File: ");
define("_SDP_REMOVE_FILE", "Rimuovi File");
define("_SDP_REMOVE_ID_MISMATCH", "Impossibile rimuovere il file. Id differente.");
define("_SDD_BOX_SELECT", "Seleziona");
define("_SDD_LICENSE_SELECT", 'Per piacere seleziona la licenza per questo file:');
define("_SDD_SELECTED_LICENSE", 'Licenza selezionata per questo file:&nbsp;');
define("_SDD_ASSIGN", "Assegna");
define("_SDD_CHANGE", "Cambia");
define("_SDP_CHANGE_LICENSE_ID_MISMATCH", "Impossibile cambiare la licenza. Id differente.");
define("_SDD_NO_LICENSE", "non selezionato");
define("_SDD_LICENSE_ACCEPT", '&nbsp;&nbsp;Ho letto, capito e sono daccordo con i termini di questa licenza&nbsp;&nbsp;');
define("_SDD_DOWNLOAD", "Scarica");
define("_SDD_FILE_TOO_BIG", "Il file è troppo grande, per piacere prova a caricare un file più piccolo. Massima dimensione file: ");


/*ADM*/
define("_SDDADM_GEN_PANE", "Generale");
define("_SDDADM_GEN_DIRECTORY", "Memorizza file in: ");
define("_SDDADM_GEN_DIRECTORY_EXPL", "Selezionare la directory dove i file verranno memorizzati.");
define("_SDDADM_GEN_ALLOWED_FILES", "Numero di file permessi: ");
define("_SDDADM_GEN_ALLOWED_FILES_EXPL", "Inserisci il numero di file che è possibile caricare per una scheda.");
define("_SDDADM_GEN_PP_WIN_HEADER", "Aggiungi un Form delle opzioni per la scheda");
define("_SDDADM_GEN_PP_WIN_H", "Altezza Finestra: ");
define("_SDDADM_GEN_PP_WIN_W", "Larghezza Finestra: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_IMG", "Immagine del pulsante Carica: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_IMG_EXPL", "Immagine di sfondo per il pulsante Carica nel form della scheda.");
define("_SDDADM_GEN_UPLOAD_BUTTON_POS", "Posizione Pulsante: ");
define("_SDDADM_GEN_UPLOAD_BUTTON_POS_EXPL", "Posizione del bottone nel form della scheda. Inserisci il numero di ordine oppure 0 se i file sono caricati solo dal back-end.");
define("_SDDADM_GEN_ADD_LIC", "Licenza d\'uso: ");
define("_SDDADM_GEN_ADD_LIC_EXPL", "Una licenza è stata scelta per ogni file caricato.");
define("_SDDADM_GEN_MAX_FILESIZE", "Max. dimensione file: ");
define("_SDDADM_GEN_ALLOWED_FILE_EXT", "Estensioni di file permessi: ");
define("_SDDADM_GEN_ALLOWED_FILE_EXT_EXPL", "Inserisci qui, separati da virgole, le estensioni dei file permessi.");
define("_SDDADM_GEN_DOWNLOAD_HEADER", "Opzioni di Scaricamento");
define("_SDDADM_DOWNLOAD_SORTBY", "Ordina file per: ");
define("_SDDADM_DOWNLOAD_SORTBY_NAME", "Nome");
define("_SDDADM_DOWNLOAD_SORTBY_EXT", "Estensione");
define("_SDDADM_DOWNLOAD_SORTBY_SIZE", "Dimensione");
define("_SDDADM_DOWNLOAD_SORTBY_DATE", "Data di aggiunta");
define("_SDDADM_DOWNLOAD_SORTBY_HITS", "Click");
define("_SDDADM_GEN_PPL_WIN_H", "Altezza della Finestra Licenza: ");
define("_SDDADM_GEN_PPL_WIN_W", "Larghezza della Finestra Licenza: ");
define("_SDDADM_MIMETYPES_PANE", "Tipi Mime");
define("_SDDADM_MIMETYPES", "Icone per le Estensioni dei file");
define("_SDDADM_MIMETYPES_EXPL", "Tutti le immagini devono essere inserite nella cartella JoomlaRoot/components/com_sobi2/plugins/download/mimetypes");
define("_SDDADM_MIMETYPES_ADD", "Aggiungi nuovo tipo");
define("_SDDADM_MIMETYPES_EXT", "Estensione File");
define("_SDDADM_MIMETYPES_ICO", "Icona File");
define("_SDDADM_LICENSES", "Licenze");
define("_SDDADM_LICENSE_EDIT", "Modifica Licenza");
define("_SDDADM_LICENSE_TITLE", "Titolo Licenza");
define("_SDDADM_LICENSE_URL", "Url Licenza");
define("_SDDADM_LICENSE_SAVE", "Salva Licenza");
define("_SDDADM_LICENSE_SAVED", "Licenza salvata!");
define("_SDDADM_LICENSE_DELETED", "Licenza rimossa!");
define("_SDDADM_LICENSE_DEL", "Rimuovi questa Licenza");
define("_SDDADM_LICENSE_DEL_CONF", "Sei veramente sicuro di voler rimuovere questa licenza?");
define("_SDDADM_LICENSE_ADD", "Aggiungi Nuova Licenza");

define("_SDDADM_INFO", "Informazioni");
define("_SDDADM_INFO_DTEMPL", 'Codice da aggiungere nel <a href="index2.php?option=com_sobi2&amp;task=editTemplate"> Template della Vista Dettagliata</a>');
define("_SDDADM_INFO_VTEMPL", 'Codice da aggiungere nel <a href="index2.php?option=com_sobi2&amp;task=editVCTemplate"> Template V-Card</a>');
define("_SDDADM_INFO_TEMPL", 'Puoi personalizzare l\'output nel <a href="index2.php?option=com_sobi2&amp;task=editTemplate">Template delle Vista Dettagliata</a> e nel <a href="index2.php?option=com_sobi2&amp;task=editVCTemplate">Template V-Card</a> modificando il file templates.php che si trova in JoomlaRoot/components/com_sobi2/plugins/download');
?>
