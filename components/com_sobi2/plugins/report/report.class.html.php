<?php
/**
* @version $Id: report.class.html.php 4076 2008-06-09 07:11:39Z Radek Suski $
* @package: Sigsiu Online Business Index 2
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET
* Email: sobi@sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2007 Sigsiu.NET (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/copyleft/gpl.html GNU/GPL.
* SOBI2 is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/
class sobi_report_html {

	/**
	 * Enter description here...
	 * @param sobi_report_adm $p
	 */
	function admConfig( &$p )
	{
		if( !defined( "_SOBI_ADM_PATH" ) ) {
			trigger_error( "Restricted access", E_USER_ERROR ) && exit();
		}
		?>
	 	<table class="SobiAdminForm" border="1" >
			<tr class="row0">
				<th height="75" width="100" colspan="3">
					<div style="text-align:left; width: 100%; padding:5px;">
						<?php echo $p->name ?>
					</div>
				</th>
			</tr>
			<?php
				$count = 0;
				$settings = get_object_vars( $p );
				unset( $settings["name"] );
				unset( $settings["_language"] );
				unset( $settings["name_id"] );
				unset( $settings["listingStyle"] );
				foreach ( $settings as $k => $v ) {
					$count++;
					$style = $count%2 ? "row1" : "row0";
					echo "\n\t\t<tr class=\"{$style}\" width=\"250\">";
					echo "\n\t\t\t<td valign=\"top\" width=\"20%\">";
					echo $p->txt( "var_{$k}_label" );
					echo "\n\t\t\t</td>";
					echo "\n\t\t\t<td width=\"45%\" width=\"250\">";
					if( is_array( $v ) ) {
						$v = implode( "\n", $v );
						echo "<textarea name=\"rlvar_{$k}\" id=\"var_{$k}\" class=\"text_area\" rows=\"5\" cols=\"50\">{$v}</textarea>";
					}
					elseif( strstr( $k, "expl" ) ) {
						echo "<textarea name=\"rlvar_{$k}\" id=\"var_{$k}\" class=\"text_area\" rows=\"5\" cols=\"50\">{$v}</textarea>";
					}
					else {
						echo sobiHTML::yesnoRadioList( "rlvar_{$k}", 'class="text_area"', $v );
					}
					echo "\n\t\t\t</td>";
					echo "\n\t\t\t<td>";
					echo $p->txt( "var_{$k}_expl" );
					echo "\n\t\t\t</td>";
					echo "\n\t\t</tr>";
				}
				$count++;
				$style = $count%2 ? "row1" : "row0";
				echo "\n\t\t<tr class=\"{$style}\">";
				echo "\n\t\t\t<td valign=\"top\" width=\"20%\">";
				echo $p->txt( "plugin_info_code" );
				echo "\n\t\t\t</td>";
				echo "\n\t\t\t<td width=\"45%\">";
				echo '<span style="color: rgb(0, 0, 187);"><span style="color: rgb(204, 51, 204);">&lt;?php</span><span style="color: rgb(51, 204, 0);"> <span style="color: rgb(255, 0, 0);">echo</span> $plugins</span><span style="color: rgb(0, 0, 187);"></span>[<span style="color: rgb(221, 0, 0);">\'report\'</span><span style="color: rgb(0, 119, 0);">]</span><span style="color: rgb(0, 119, 0);"></span><span style="color: rgb(0, 119, 0);"></span><span style="color: rgb(0, 0, 187);"></span>; <span style="color: rgb(204, 51, 204);">?&gt;</span></span>';
				echo "\n\t\t\t</td>";
				echo "\n\t\t\t<td>";
				echo $p->txt( "plugin_info_code_expl" );
				echo "\n\t\t\t</td>";
				echo "\n\t\t</tr>";
			?>
		</table>
		<?php
	}
	/**
	 * Enter description here...
	 * @param sobi_report $p
	 */
	function showForm( &$p )
	{
		$config =& sobi2Config::getInstance();
		$config->loadCSS( "components/com_sobi2/plugins/report/report.css" );
		$user =& $config->getUser();
		if( defined( "_SOBI_MAMBO" ) ) {
			$user->load( $user->id );
		}
		$sid = sobi2Config::request( $_REQUEST, "sid", 0 );
		if( !$sid || ( !$p->anonym && !$user->id ) ) {
			sobi2Config::redirect( "index.php", _SOBI2_NOT_AUTH );
			exit();
		}
		$sobi = new sobi2( $sid );
		$ip = $_SERVER["REMOTE_ADDR"];
		$now = $config->getTimeAndDate();
		$t = time();
		$ssid = md5( $ip.$t.$config->secret );
		$sobihref = sobi2Config::sef( "index.php?option=com_sobi2&amp;sobi2Task=sobi2Details&amp;sobi2Id={$sid}&amp;Itemid={$config->sobi2Itemid}" );
		$sobihref = "<a href=\"{$sobihref}\" title=\"{$sobi->title}\">{$sobi->title}</a>";
		$reasons = array();
		$reasons[] = sobiHTML::makeOption( 0, $p->txt( "select_reason_list" ) );
		foreach ( $p->reasons as  $reason ) {
			$reasons[] = sobiHTML::makeOption( $reason, $reason );
		}
		$rlp_reason = sobi2Config::request( $_POST, "rlp_reason", null );
		$rlp_name = sobi2Config::request( $_POST, "rlp_name", null );
		$rlp_majka = sobi2Config::request( $_POST, "rlp_majka", null );
		$rlp_report = sobi2Config::request( $_POST, "rlp_report", null );
		$msg = sobi2Config::request( $_POST, "rlp_msg", null );
		$o = defined( "__OPENSEF_INSTALLED" ) ? "?option=com_sobi2" : null;
		?>
		<script type="text/javascript">
			function sendSobiReportListing()
			{
				 var form = document.getElementById( 'rlp_send' );
				 if ( form.rlp_report.value == ''  ) {
					 alert( '<?php echo $p->txt( "form_validate_enter_report" ); ?>' );
					 return false;
				 }
				 else if ( form.rlp_majka.value == ''  ) {
					 alert( '<?php echo $p->txt( "form_validate_enter_email" ); ?>' );
					 return false;
				 }
				 else if ( form.rlp_name.value == ''  ) {
					 alert( '<?php echo $p->txt( "form_validate_enter_name" ); ?>' );
					 return false;
				 }
			<?php if( $p->captcha ) { ?>
				 else if ( form.rlp_nickname.value == ''  ) {
					 alert( '<?php echo $p->txt( "form_validate_enter_code" ); ?>' );
					 return false;
				 }
			<?php } ?>
			<?php if( $p->showReason && count( $p->reasons ) && $p->reasonReq ) { ?>
				 else if ( form.rlp_reason.selectedIndex == 0  ) {
					 alert( '<?php echo $p->txt( "form_validate_select_reason" ); ?>' );
					 return false;
				 }
			<?php } ?>
				 else {
					 return true;
				 }
			}
		</script>
		<?php if( $msg ) { ?>
			<div class="message" style="width: 95%; clear: both; color: rgb(204, 204, 204); background-color: #990000;"><?php echo $msg; ?> </div>
		<?php } ?>
		<form action="<?php echo $config->liveSite; ?>/index.php<?php echo $o; ?>" id="rlp_send" method="POST" onsubmit="return(sendSobiReportListing())">
		<div id="rlp_out">
			<div id="rlp_header" >
				<h1><?php echo $p->txt( "report_listing_header" ); ?> <small>[ <?php echo $sobihref; ?> ]</small></h1>
			</div>
			<div class="rlp_row">
				<div id="rlp_expl">
					<?php echo $p->explanation; ?>
				</div>
			</div>
			<?php if( $p->captcha ) { ?>
			<div class="rlp_row">
				<div class="rlp_lcol">
					<?php echo $p->txt( "security_code_label" ); ?>
				</div>
				<div class="rlp_rcol">
					<img src="index2.php?option=com_sobi2&sobi2Task=rlssci&no_html=1&amp;Itemid=<?php echo $config->sobi2Itemid;?>&amp;sid=<?php echo $t;?>" alt="logo"/>
					<?php echo sobiHTML::toolTip( $p->txt( "security_code_label_expl" ), $p->txt( "security_code_label" ), null, "info.png" ); ?>
				</div>
			</div>
			<div class="rlp_row">
				<div class="rlp_lcol">
					<?php echo $p->txt( "security_code_insert_label" ); ?>
				</div>
				<div class="rlp_rcol">
					<input type="text" class="inputbox" size="50" name="rlp_nickname" value=""/>
					<input type="text" class="inputbox" size="50" name="security_code" style="display:none;" value=""/>
				</div>
			</div>
			<?php } ?>
			<div class="rlp_row">
				<div class="rlp_lcol">
					<?php echo $p->txt( "enter_your_name" ); ?>
				</div>
				<div class="rlp_rcol">
					<input type="text" class="inputbox" size="50" name="rlp_name" value="<?php if( $user->id ) { echo $user->name; } else { echo $rlp_name; } ?>" <?php if( $user->id ) { echo 'readonly="readonly"'; } ?>/>
				</div>
			</div>
			<div class="rlp_row">
				<div class="rlp_lcol">
					<?php echo $p->txt( "enter_your_email" ); ?>
				</div>
				<div class="rlp_rcol">
					<input type="text" class="inputbox" size="50" name="rlp_majka" value="<?php if( $user->id ) { echo $user->email; }  else { echo $rlp_majka; } ?>" <?php if( $user->id ) { echo 'readonly="readonly"'; } ?>/>
				</div>
			</div>
			<?php if( $p->showReason && count( $p->reasons ) ) { ?>
			<div class="rlp_row">
				<div class="rlp_lcol">
					<?php echo $p->txt( "select_report_reason" ); ?>
				</div>
				<div class="rlp_rcol">
					<?php echo sobiHTML::selectList( $reasons, "rlp_reason", 'size="1" class="inputbox"', 'value', 'text', $rlp_reason ); ?>
				</div>
			</div>
			<?php } ?>
			<div class="rlp_row">
				<div class="rlp_lcol">
					<?php echo $p->txt( "enter_your_report" ); ?>
				</div>
				<div class="rlp_rcol">
					<textarea class="inputbox" id="rlp_report" name="rlp_report"><?php echo $rlp_report; ?></textarea>
				</div>
			</div>
			<div class="rlp_row">
				<div class="rlp_lcol">&nbsp;</div>
				<div class="rlp_rcol">
					<input type="submit" value="<?php echo $p->txt( "submit_report" ); ?>"/>
				</div>
			</div>
		</div>
		<input type="hidden" name="sobi2Task" value="sendListingReport"/>
		<input type="hidden" name="option" value="com_sobi2"/>
		<input type="hidden" name="SobiSSID" value="<?php echo $ssid; ?>"/>
		<input type="hidden" name="sid" value="<?php echo $sid; ?>"/>
		</form>
		<?php
	}
	/**
	 * Enter description here...
	 *
	 */
	function showSafetyImage()
	{
		$ErrorReporting = error_reporting( 0 );
		if( ob_get_length() ) {
			while ( @ob_end_clean() ) ;
		}
		include_once( sobi2Config::translatePath( "plugins|report|safetycode" ) );
		$font = sobi2Config::translatePath( "plugins|report|Walshes", "front", true, ".ttf" );

		$im = @imagecreatetruecolor( 180, 50 ) or die( "Cannot Initialize new GD image stream" );

		$bColor = explode( ",", _SRLP_SC_BG_COLOR );
		$backgroundColor = imagecolorallocate( $im, $bColor[0], $bColor[1], $bColor[2] );

		$tColor = explode( ",", _SRLP_SC_TEXT_COLOR );
		$textColor = imagecolorallocate( $im, $tColor[0], $tColor[1], $tColor[2] );
		imagefilledrectangle( $im, 0, 0, 180, 50, $textColor );
		imagefilledrectangle( $im, 2, 2, 177, 47, $backgroundColor );

		$config =& sobi2Config::getInstance();
		$db =& $config->getDb();

		$adj = $adjectives[rand( 0, count( $adjectives ) - 1 ) ];
		$no = $nouns[rand( 0, count( $nouns ) - 1 ) ];
		$ip = $_SERVER["REMOTE_ADDR"];
		$now = $config->getTimeAndDate();
		$t = (int) sobi2Config::request( $_GET, "sid", null );
		$sid = md5( $ip.$t.$config->secret );
		$db->setQuery( "INSERT INTO #__sobi2_plugin_report_sessions VALUES ('{$sid}', '{$adj}', '{$no}', '$ip', '{$now}' )");
		$db->query();

		header( "Content-type: image/png" );
		$r1 = rand( 25, 30 );
		imagettftext( $im, $r1, rand( -12, 12 ), 10, 35, $textColor, $font, $adj );
		imagettftext( $im, rand( 25, 30 ), rand( -6, 6 ), count( $adj ) * ( $r1 * 2.5 ) + rand( 0, 5 ) , 30, $textColor, $font, $no );
		imageline( $im, 0, 10, 180, 10, $textColor );
		imageline( $im, 0, 20, 180, 20, $textColor );
		imageline( $im, 0, 30, 180, 30, $textColor );
		imageline( $im, 0, 40, 180, 40, $textColor );
		imageline($im, 20, 0, 20, 50, $textColor);
		imageline($im, 40, 0, 40, 50, $textColor);
		imageline($im, 60, 0, 60, 50, $textColor);
		imageline($im, 80, 0, 80, 50, $textColor);
		imageline($im, 100, 0, 100, 50, $textColor);
		imageline($im, 120, 0, 120, 50, $textColor);
		imageline($im, 140, 0, 140, 50, $textColor);
		imageline($im, 160, 0, 160, 50, $textColor);
//		imageline( $im, 0, 0, 180, 50, $textColor );
//		imageline( $im, 0, 50, 180, 0, $textColor );
		imagepng( $im );
		imagedestroy( $im );
		error_reporting( $ErrorReporting );
		exit();
	}
}
?>