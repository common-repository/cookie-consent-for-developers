<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://www.lovrohrust.com.hr
 * @since      1.0.0
 *
 * @package    Ntg_Cookie_Consent
 */

// If uninstall not called from WordPress, then exit.
if ( ! current_user_can( 'activate_plugins' ) ) {
	exit;
}
//check_admin_referer( ); this prevents deletion of options

if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
};


// This should for clarity be in separate file, but it is placed here since deinstalation is so small
//!!! Housekeeping, clean after itself
delete_option( 'ntgccTexttoshow' );
delete_option( 'ntgccBtnAcceptText' );
delete_option( 'ntgccBtnDeclineText' );
delete_option( 'ntgccBtnLearnMore' );
delete_option( 'ntgccLearnmoreId' );
delete_option( 'ntgccsetCookieInterval' );
delete_option( 'ntgccHeadCode' );
delete_option( 'ntgccExecuteHeadCode' );
delete_option( 'ntgccFooterCode' );
delete_option( 'ntgccExecuteFooterCode' );
delete_option( 'ntgccGoogleOptOutCode' );
delete_option( 'ntgccCustomCode' );
delete_option( 'ntgccUseSeparateCssFile' );
