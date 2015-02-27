<?php
/**
* @version $Id: templates.php 3136 2007-12-30 17:41:20Z Sigrid Suski $
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
defined( '_SOBI2_' ) || ( trigger_error("Restricted access", E_USER_ERROR) && exit() );
function sobi2DownloadPluginDetailsViewTemplate($ico, $fname, $ftype, $fsize, $license, $count, $date, $url, $sobi2Id) {
?>
	<div style="border-style:none; display:block;padding:10px;">
		<div style="padding:10px;">
			<?php echo $ico; ?>
		</div>
		<div style="display:block;">Filename: <?php echo $fname; ?></div>
		<div style="display:block;">Filesize: <?php echo $fsize; ?> kB</div>
		<div style="display:block;">Filetype: <?php echo $ftype; ?></div>
		<div style="display:block;">License: <?php echo $license; ?></div>
		<div style="display:block;">Downloaded: <?php echo $count; ?></div>
		<div style="display:block;">Added: <?php echo date("j.n.Y",strtotime ($date)); ?></div>
		<div style="display:block;"><a href="<?php echo $url;?>" title="download">Download</a></div>
	</div>
<?php
}
function sobi2DownloadPluginCategoryViewTemplate($ico, $fname, $ftype, $fsize, $license, $count, $date, $url, $sobi2Id) {
?>
	<div style="border-style:none; display:block;padding:10px; width:100%;">
		<div style="padding:10px;">
			<?php echo $ico; ?>
		</div>
		<div style="display:block;">Filename: <?php echo $fname; ?></div>
		<div style="display:block;">Filesize: <?php echo $fsize; ?> kB</div>
		<div style="display:block;">Filetype: <?php echo $ftype; ?></div>
		<div style="display:block;">License: <?php echo $license; ?></div>
		<div style="display:block;">Downloaded: <?php echo $count; ?></div>
		<div style="display:block;">Added: <?php echo date("j.n.Y",strtotime ($date)); ?></div>
	</div>
<?php
}
?>
