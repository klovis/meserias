<?php
/**
* @version $Id: english.php 3002 2007-12-23 16:33:34Z Sigrid Suski $
* @package: Gallery Plugin for Sigsiu Online Business Index 2
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* The Gallery Plugin is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/


// no direct access
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );
/* RC 2.43 Number of images to show in Details */

DEFINE("_SGADM_ADM_SHOWNUM", "# of Images Shown in Details");
DEFINE("_SGADM_ADM_SHOWNUM_EXPL", "This is the number of Images that will be displayed in the Details view of the Gallery. Set to 0 to show ALL Available, Other Images can be viewed with Lightbox Only");

/* RC2.4 */
/* --------------------------------- */

/* Fee's Addition */
/* --------------------------------- */

DEFINE("_S_2_ADM_CONFIG_HEADER_F", " - Fee Options");

DEFINE("_SGADM_ADM_FEE", "Fee");
DEFINE("_SGADM_ADM_FEE_EXPL", "This is the amount charged for the first Image and every X images set below.");
DEFINE("_SGADM_ADM_PER_ITEMS", " Per ");
DEFINE("_SGADM_ADM_PER_ITEMS_EXPL", "The Above Fee will be Charged for each group of this many images.");
DEFINE("_SGADM_ADM_PER_ITEMS_END", " Images");
DEFINE("_SGADM_ADM_FREE_IMAGES", "Number of Free Images");
DEFINE("_SGADM_ADM_FREE_IMAGES_EXPL", "This is the number of images that can be submitted at no charge before a fee will apply.");
DEFINE("_SGADM_ADM_FEE_DISCOUNT", "Fee Cumulative Premium/Discount %");
DEFINE("_SGADM_ADM_FEE_DISCOUNT_EXPL", "This is a Premium or Discount will be applied to each group of paid entries after the first.  Enter as Positive Number for Premium (ie 10 for +10%) and Negative Number for Discount (-10 for -10%).  These percentages are cumulative for each group after the first (ie Full Price, -10%, -20% etc.)");
DEFINE("_SGADM_ADM_MAX_DISCOUNT", "Maximum Premium/Discount %");
DEFINE("_SGADM_ADM_MAX_DISCOUNT_EXPL", "This will be the maximum Premium or Discount applied to groups of images.");

DEFINE("_SGADM_GEN_FEE_REFERENCE", "Image Insertion fee level");
DEFINE("_SGADM_GEN_FREE_IMAGES_1", "You can add up to ");
DEFINE("_SGADM_GEN_FREE_IMAGES_2", " Images for Free.");
DEFINE("_SGADM_GEN_IMAGES_FEE_1", "Current Fee for Selected Images is ");

DEFINE("_S_2_GALLERY_UPLOAD_BUTTON", "Upload");			//Adjust to fit your needs
DEFINE("_S_2_GALLERY_UPDATE_BUTTON", "Update");			//Adjust to fit your needs

DEFINE("_S_2_GALLERY_EDIT_DETAILS_BUTTON", "Edit Image Details");			//Adjust to fit your needs
DEFINE("_S_2_GALLERY_EDIT_FILENAME_LBL", "Filename");	//Adjust to fit your needs
DEFINE("_S_2_GALLERY_EDIT_WARNING", "Update this form BEFORE Saving Entry or Images will not be saved!");	//Adjust to fit your needs
DEFINE("_S_2_GALLERY_EDIT_TITLE_LBL", "Title");			//Adjust to fit your needs
DEFINE("_S_2_GALLERY_EDIT_ALTTEXT_LBL", "Alt Text");	//Adjust to fit your needs
DEFINE("_S_2_GALLERY_EDIT_POSITION_LBL", "Position");	//Adjust to fit your needs
DEFINE("_S_2_GALLERY_EDIT_UPDATE_BUTTON", "Update");	//Adjust to fit your needs


/* RC2.2 */
/* --------------------------------- */
DEFINE("_S_2_GALLERY_NOIMAGES", "No Images Available");		//Adjust to fit your needs

DEFINE("_SGADM_GEN_NOIMAGE", "Show Text if no Images");
DEFINE("_SGADM_GEN_NOIMAGE_EXPL", "Show a text in V-Card and Details View instead of number of images or gallery if no images are available for an entry. Adjust the text in the language file of the gallery.");
DEFINE("_SGADM_GEN_POPUP", "Show as Popup");
DEFINE("_SGADM_GEN_POPUP_EXPL", "Show the image in a popup window instead of using Lightbox effect. This works correctly only in Firefox. Check it in IE and use it only if you are satisfied with the result.");
DEFINE("_SGADM_GEN_NUMBERR", "Number of Images per Row");
DEFINE("_SGADM_GEN_NUMBERR_EXPL", "Enter how much images should be shown in one row (=number of columns). The resulting number of rows depends on the total number of images.");
DEFINE("_SGADM_GEN_ADJUSTSIZ", "Adjust Table Sizes");
DEFINE("_SGADM_GEN_ADJUSTSIZ_EXPL", "The table sizes are adjusted depending on the thumbnail size. If the images are shown horizontally, the width of the gallery is 100%. If the images are shown vertically, the width of the gallery depends on the thumbnail size and the number of images per row.");
DEFINE("_SGADM_GEN_SHOWFIRSTT", "Show first Thumbnail in V-Card");
DEFINE("_SGADM_GEN_SHOWFIRSTT_EXPL", "Show the first thumbnail also in V-Card.");

DEFINE("_S_2_ADM_CONFIG_HEADER_G", " - General");
DEFINE("_S_2_ADM_CONFIG_HEADER_S", " - Sizes/Limits");
DEFINE("_S_2_ADM_CONFIG_HEADER_V", " - V-Card View");
DEFINE("_S_2_ADM_CONFIG_HEADER_A", " - Add Entry Form");
DEFINE("_S_2_ADM_INFOVCARD"," in your V-Card-Template to show the number of images and/or the first thumbnail.");
DEFINE("_S_2_ADM_INFODV"," in your Details View Template to show the Gallery.");

/* Changed */
DEFINE('_S_2_ADM_DISPLAY_EXPL', 'Display the image thumbnails vertically or horizontally in details view. This setting has an effect only if \'Adjust Table Size\' is set to yes.');
DEFINE('_S_2_ADM_INFO', 'Place "
<span style="color: rgb(0, 0, 187);"><span
 style="color: rgb(204, 51, 204);">&lt;?php</span><span
 style="color: rgb(51, 204, 0);"> <span
 style="color: rgb(255, 0, 0);">echo</span> $plugins</span><span
 style="color: rgb(0, 0, 187);"></span>[<span
 style="color: rgb(221, 0, 0);">"gallery"</span><span
 style="color: rgb(0, 119, 0);">]</span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 119, 0);"></span><span
 style="color: rgb(0, 0, 187);"></span>; <span
 style="color: rgb(204, 51, 204);">?&gt;</span></span>"');

/* RC2.1 */
/* --------------------------------- */
DEFINE('_S_2_ADM_USED_SCRIPT', 'Use Existing MooTools');
DEFINE('_S_2_ADM_USED_SCRIPT_EXPL', 'If you have already installed the MooTools with your template it could conflict with the Lightbox of the Gallery. Set this to yes to use the existing MooTools and Slimbox instead of Lightbox. If you have not installed MooTools do not set this to Yes. Valid only if Lightbox effect is used.');
DEFINE("_SGADM_GEN_POS_EXPL", "IFrame position in add entry form. Enter the order number. If set to 0, the IFrame isn't shown in the add entry form.");

/* RC2.0 */
/* --------------------------------- */
DEFINE('_S_2_GALLERY_TITLE', 'Images Gallery');
DEFINE("_SGADM_GEN_POS", "IFrame Position");

/* Beta 4 */
/* --------------------------------- */
DEFINE('_S_2_GALLERY_DELETE_FILE', 'Remove this image');
DEFINE('_S_2_GALLERY_IMAGE_TITLE', 'Image description ');
DEFINE('_S_2_GALLERY_IMAGES', 'Images: ');
DEFINE('_S_2_GALLERY_ADD_IMAGE', '<strong>Add new image</strong>');
DEFINE('_S_2_GALLERY_ERR_RESAMPLING', 'Error resampling image');
DEFINE('_S_2_GALLERY_ERR_COPY', 'Error copying image');
DEFINE('_S_2_GALLERY_ERR_MOVE', 'Error moving image');
DEFINE('_S_2_GALLERY_ERR_FILESIZE', 'Uploaded file is too big');
DEFINE('_S_2_GALLERY_ERR_EXT', 'Uploaded file has not an allowed extension');

DEFINE('_S_2_ADM_INFO_TITLE', 'Info ');

DEFINE('_S_2_ADM_CONFIG_HEADER', 'SOBI2 Gallery Configuration');
DEFINE('_S_2_ADM_DISPLAY', 'Show Images');
DEFINE('_S_2_ADM_DISPLAY_H', 'Horizontally');
DEFINE('_S_2_ADM_DISPLAY_V', 'Vertically');
DEFINE('_S_2_ADM_COUNT_IN_LIST', 'Count Number of Images in V-Card');
DEFINE('_S_2_ADM_COUNT_IN_LIST_EXPL', 'Show the number of images of an entry in the V-Card view.');
DEFINE('_S_2_ADM_ALLOWED_IMGS', 'Max. Number of Images');
DEFINE('_S_2_ADM_ALLOWED_IMGS_EXPL', 'Max.number of images the user can add to one entry.');
DEFINE('_S_2_ADM_IMG_SIZE', 'Image Size');
DEFINE('_S_2_ADM_IMG_SIZE_EXPL', 'Max. size of the image shown in the lightbox.');
DEFINE('_S_2_ADM_IMG_RESIZE', 'Always Resize Image');
DEFINE('_S_2_ADM_IMG_RESIZE_EXPL', 'Resize image even if it is smaller than max. size of the image. If it is smaller, the image will be enlarged.');
DEFINE('_S_2_ADM_THM_SIZE', 'Thumbnail Size');
DEFINE('_S_2_ADM_THM_SIZE_EXPL', 'Max. size of the thumbnails.');
DEFINE('_S_2_ADM_THM_RESIZE', 'Always Resize Thumbnail');
DEFINE('_S_2_ADM_THM_RESIZE_EXPL', 'Resize thumbnail even if it is smaller than max. size of the thumbnail. If it is smaller, the thumbnail will be enlarged.');
DEFINE('_S_2_ADM_FILE_SIZE', 'Max. File Size');
DEFINE('_S_2_ADM_FILE_SIZE_EXPL', 'Max. allowed file size of uploaded image files.');
DEFINE('_S_2_ADM_IMG_H', 'Height');
DEFINE('_S_2_ADM_IMG_W', 'Width');
DEFINE('_S_2_ADM_IFRAME_H', 'IFrame Height');
DEFINE('_S_2_ADM_IFRAME_H_EXPL', 'Height of the IFrame in edit/new entry form. Adjust it corresponding to the max. size of the thumbnails and the max. number of the images. If the IFrame content is larger than the IFrame size, a scrollbar is shown.');
?>