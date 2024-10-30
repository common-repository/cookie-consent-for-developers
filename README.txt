=== Cookie consent for developers ===
Contributors: lovor
Donate link: http://www.lovrohrust.com.hr
Tags: cookie, GDPR, PECR, eu cookie law, cookie law, cookie consent, developer, eu privacy directive, privacy directive, cookies, privacy, compliance
Requires at least: 4.9.6
Tested up to: 6.4.3
Stable tag: 1.7.1
Requires PHP: 5.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Give user a choice to control cookie or similar technology usage from your and third party sites

== Description ==

This plugin is intended primarily for developers, although any WordPress user with knowledge of HTML and JavaScript can use it. The plugin implements the logic of dealing with cookies as required by EU regulation and explained [here](https://ico.org.uk/for-organisations/guide-to-pecr/cookies-and-similar-technologies/). There is also [This European Union page](https://europa.eu/youreurope/business/dealing-with-customers/data-protection/online-privacy/index_en.htm) and [this European Comission page](https://wikis.ec.europa.eu/display/WEBGUIDE/04.+Cookies+and+similar+technologies) which explain basic things about cookies and legislation which regulates their usage.


**Multilingual capabilities**, compatible with each and every multilingual plugin. Simply wrap messages in language tags (check lang attribute of html tag, however, use _ instead of -). For example, Italian language sentence should be: \[it_IT]Il nostro sito web utilizza cookie per garantire...\[/it_IT] The language shortcodes have the same syntax like regular WordPress shortcodes, each opening tag with language attribute inside should have a closing tag. >ou can put language tags in first four upper fields of plugin regarding texts and page ID. Other fields do not accept language shortcodes.

Javascript event `cookiesAnswered` fires on document object when cookie status is resolved, either on pressing 'Accept' or 'Decline' button.

The plugin is also updated to use SameSite cookie directive with default setting SameSite=Lax.

With proper use, you can make your website GDPR and PECR compliant. The basic principles are that user must be clearly informed about cookies that you use on a webpage (even from external services - web pages), and that user should be given a choice to decide if he wants to accept these cookies. The exception are cookies that do not identify computer (without unique identificator) and which are necessary for proper page functioning, like remembering shopping basket in an online store.

= Why should I use this particular plugin? =

Because it is free from bloatware, no additional CSS, JavaScript or other files are used in frontend. It offers smooth integration with minimal footprint; all code and HTML is placed inline in HTML of the page.

Plugin is particularly crafted to not allow any unwanted cookie placement before user consents, you control that by placing proper code in designated form fields in background.

 The stress of the plugin is on simplicity, which also gives developers open hands to do customizations as preferred and needed. It is made to be cache - friendly; it means that it offers the same version of the page each time, no matter if user chose to opt-out of cookie usage, accepted cookies or has not yet decided. Plugin has been tested on "Cache Enabler" plugin, but it should work with other caching plugins and technologies as well. Only exception is YouTube videos which URL's are replaced in situ in the backend, effectively making it a little different page for the caching plugin. However, this is necessary, since this YouTube code should not place any cookies if user has decided to opt-out, therefore URL exchange could not be done after the page loads.


= How to use =

There is a setup page titled "Cookie consent for developers" on admin panel in standard menu item 'Settings'. It is important to understand how plugin works, and that you should divide JavaScript that places cookies into "working horse" part, which places cookies and does other things and part which starts that "working horse".

On the plugin settings page, you should give short information about cookies or other similar technologies (from now on I will refer simple as "cookies", although that also refers to local storage, session storage, ...) used and ID of the page which tells user more about use of such technologies. This info shows as info window and is customizable via CSS. Two examples, `css_example1.css` and `css_example2.css` are given to show different styling of this info window (or ribbon). The "learn more" page (whose ID is given) should also provide mechanism to choose between allowing only necessary cookies or allowing all cookies. More about this page later.

Then you have to enter code in the header and footer, which places cookies and the code that calls that code, separately. In this way, the code that places cookies is executed only when user allows.

Finally, you can enter opt-out code, which will block functions which place cookies if user decides not to use them.

There is also possibility to enter custom code which will run on window load event (when page fully loads) which you can use to add special effects to info window or anything else you wish.

= Learn more page =

On learn more page (you have to build it yourself) you should explain about the cookies and their usage in simple and understandable way to general public. The information about all cookies on your web and their purpose should be given (including third-party).

**Important**: Two buttons (or links) should also be given on this page, with id's: `btnAcceptCookies` and `btnRefuseCookies` (without apostrophes). These buttons shall be used to enable user to choose if cookies will be used or not (except necessary ones).

= Styling =

You can use two provided styles, or (very likely) do your own styling. If you choose option "Not used" in the settings, you should put custom CSS in theme or other styling CSS file, while if you choose "Custom CSS file", you should provide separate CSS file.

This separate CSS file should be named `ccfd_custom.css` and should be placed in the root of your theme directory, or you can use filter named `ccfd_custom_css_name` to provide custom string for your CSS file. The same full path, like for `wp_enqueue_style` should be given.

Live examples of two given styles you can see on pages [Učiliste Altius](https://uciliste-altius.hr/) or [Blog školskog muzeja](http://blog.hsmuzej.hr).

Ideally, you should put styling in your main theme stylesheet, or however you find more appropriate.

= YouTube =

The plugin has special function for YouTube. If user decides to opt-out from cookies, all YouTube URL-s will be replaced with `youtube-nocookie` versions. This will also work for shortened URL's like `https://youtu.be`. In this way, YouTube videos will still function, but they will not use cookies.

= Languages =

English and Croatian so far.

== Installation ==

Install and activate plugin from WordPress

or

1. Upload `cookie-consent-for-developers` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

Go to Settings -> Cookie consent for developers and fill the plugin settings

== Screenshots ==

1. Top part of settings section
2. Bottom part of settings section
3. Example of styling #1
4. Example of styling #2


== Frequently Asked Questions ==

I will readily answer your questions.

== Changelog ==

v1.7.1
Popup with question does not show on learn more page.

= 1.7.0 =

Fixed compatibility issue with WordPress < 5.0. It works also on ClassicPress now.

= 1.6.0 =

Added decline button, of same importance as accept button. It is only active if some text is added to respective field in the admin part. The same is true for "learn more" link.
Added javascript event `cookiesAnswered`, when cookie status is resolved, either on pressing 'Accept' or 'Decline' button - this event is fired on document object.

= 1.5.2 =

introduced multilingual capabilities and small fix to cookie serving not accepted

= 1.4.2 =

fixed css for ribbon on the bottom when body elements has paddings

= 1.4.1 =

small patches, settings moved from "Tools" menu item to "Settings", some mispelling fixed

= 1.4 =

Fixed bug in plugin deinstallation, not all created options were deleted in database.

= 1.3 =

Added SimeSite=Lax to cookie remember cookie preferences cookie

= 1.2 =

Added option to set Cookie expiry interval

= 1.1 =

Added possibility to choose between two pre-made CSS files, no file or custom style file which should be edited by developer.

= 1.0 =

* First version, fully functional, try it ;)

== Warning ==

This plugin enables entering of javascript for admin users. Do not install it if you do not trust your admins, because malicious code can be entered by them.
However, many plugins and even WordPress itself has access to development scripts, be it PHP or javascript, so this is nothing extraordinary.