<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.lovrohrust.com.hr
 * @since      1.0.0
 *
 * @package    Ntg_Cookie_Consent
 * @subpackage Ntg_Cookie_Consent/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ntg_Cookie_Consent
 * @subpackage Ntg_Cookie_Consent/public
 * @author     Lovro Hrust <hrustlovro@gmail.com>
 */
class Ntg_Cookie_Consent_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ntg_Cookie_Consent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ntg_Cookie_Consent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ntg-cookie-consent-public.css', array(), $this->version, 'all' );
		$css_value = get_option( 'ntgccUseSeparateCssFile' );
		if ( ( $css_value == 1 ) || ( $css_value == 2 ) )
			$css_file_name = plugin_dir_url( __FILE__ ) . 'css/ccfd_example' . $css_value;
		elseif ( $css_value == 999 ) // 999 is the value for custom css file
			$css_file_name = get_stylesheet_directory_uri() . '/ccfd_custom';

		if ( $css_value != 0 )
			wp_enqueue_style( 'ccfd_styling', apply_filters( 'ccfd_custom_css_name',  $css_file_name  . '.css' ) );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ntg_Cookie_Consent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ntg_Cookie_Consent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ntg-cookie-consent-public.js', array( 'jquery' ), $this->version, false );

	}


	public function enqueue_inline_scripts() {

		/**
		 * This function inlines required scripts.
		 *
		 */
		// puts header code
		$header_code = home_url( '', 'relative' );
		if ($header_code == '')
			$header_code = '/';
		$showMessage = get_the_ID() != get_option( 'ntgccLearnmoreId' );
		echo get_option( 'ntgccHeadCode' ) .
			'<script>var ntgCookieAccepted=(function(){var v=document.cookie.match(\'(^|;) ?cookiesAccepted=([^;]*)(;|$)\');return v ? v[2] : null;})();var ntgrootpath="'. $header_code . '";function setCookie(cname, cvalue, exdays) {if (exdays == null) exdays=30; var d = new Date(); d.setTime(d.getTime() + (exdays*24*60*60*1000));var expires = "expires="+ d.toUTCString();document.cookie = cname + "=" + cvalue + ";" + expires + ";path=" + ntgrootpath + ";SameSite=Lax";};
function acceptFnHead() { showOrHide(false);setCookie("cookiesAccepted", 1, ' . get_option( 'ntgccsetCookieInterval' ) . '); ntgExecuteCodeFunction(); ntgSendEvent();};
function ntgExecuteCodeFunction() {' . get_option( 'ntgccExecuteHeadCode' ) . '};
function ntgSendEvent() {document.dispatchEvent(new Event(\'cookiesAnswered\'));};
if(ntgCookieAccepted==1) ntgExecuteCodeFunction();
function showOrHide(show){document.getElementById("cookies-background").style.display= show ? "block" : "none";};
function acceptCookies(acceptAll) {showOrHide(false);if (!acceptAll) {var c=document.cookie.split(";");for(var i=0;i<c.length;i++){var e=c[i].indexOf("=");var n=e>-1?c[i].substr(0,e):c[i];document.cookie=n+"=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/" + ntgrootpath;}};setCookie("cookiesAccepted", acceptAll ? 1 : 2, ' . get_option( 'ntgccsetCookieInterval' ) . ');if (acceptAll == 1) ntgExecuteCodeFunction(); ntgSendEvent();};
document.addEventListener("DOMContentLoaded",function(event){' .
	($showMessage ? 'showOrHide(!ntgCookieAccepted);' : '') .
	'if (document.getElementById("btnAcceptCookies") != null) {document.getElementById("btnAcceptCookies").addEventListener("click", function(event){acceptCookies(true);});document.getElementById("btnRefuseCookies").addEventListener("click", function(event){acceptCookies(false);})};});
window.addEventListener("load", function(event) {if (!ntgCookieAccepted) {' . get_option( 'ntgccCustomCode' ) . '} else ntgSendEvent();});
if (ntgCookieAccepted==2) {' . get_option( 'ntgccGoogleOptOutCode' ) . '};
			</script>';
	}


	public function show_html() {
		require 'partials/ntg-cookie-consent-public-display.php';
	}

	public function youtube_nocookie($content) {
		$content = str_replace  ( 'https://www.youtube.com/embed' , 'https://www.youtube-nocookie.com/embed' , $content );
		$content = str_replace  ( 'https://youtu.be' , 'https://www.youtube-nocookie.com/embed' , $content );
		return $content;
	}

}