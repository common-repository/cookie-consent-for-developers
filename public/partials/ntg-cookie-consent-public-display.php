<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.lovrohrust.com.hr
 * @since      1.0.0
 *
 * @package    Ntg_Cookie_Consent
 * @subpackage Ntg_Cookie_Consent/public/partials
 */
// <!-- This file should primarily consist of HTML with a little bit of PHP. -->

/**
 * Function to resolve language shortcodes from text loaded from option
 * @return [string]
 */
function extract_language_text($option) {
	$text = get_option($option);
	/**
	 * WP <5.0 compatibility
	 */
	if (function_exists('determine_locale'))
		$lang = determine_locale();
	else $lang = get_locale();
	return preg_match("/\[$lang\](.*)\[\/$lang\]/U", $text, $matches) ? $matches[1] : $text;
}

if ( !is_admin() ) : ?>
	<!--googleoff: index-->
		<div id="cookies-background" style="display:none;">
			<div id="cookies-box">
				<div class="infoText"><?php echo balanceTags( extract_language_text('ntgccTexttoshow') ); ?></div>
				<div class="btnsCookie">
					<button class="btnCookie" onclick="acceptFnHead();acceptFnFooter()"> <?php echo extract_language_text( 'ntgccBtnAcceptText' ); ?></button>
					<?php
					if (get_option( 'ntgccBtnDeclineText' )) :
					?>
					<button class="btnCookie decline" onclick="acceptCookies(false);"> <?php echo extract_language_text( 'ntgccBtnDeclineText' ); ?></button>
					<?php
					endif;
					if (get_option( 'ntgccLearnmoreId' )) :
					?>
					<a id="btnLearn-more" href="<?php echo get_permalink( extract_language_text('ntgccLearnmoreId') ); ?>"><?php echo extract_language_text( 'ntgccBtnLearnMore' ); ?></a>
					<?php
					endif;
					?>
				</div>
			</div>
		</div>
	<!--googleon: index-->
<?php endif;
	echo get_option( 'ntgccFooterCode' ); ?>
	<script>function acceptFnFooter(){<?php echo get_option( 'ntgccExecuteFooterCode' ); ?>};
		if (ntgCookieAccepted===1) acceptFnFooter();</script>