=== basic-google-authorship ===
Contributors: Bilbud
Donate link: 
Tags: google authorship
Requires at least: 3.2.1
Tested up to: 3.5.1
Stable tag: 1.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

This plugin replaces author links of your posts with your Google+ Profile Link.

== Description ==

This plugin replaces author links of your posts with your Google+ Profile Link.
This allow your Google+ Profile picture to be displayed in Google search results. 
It Works for single author and multi-author WordPress sites.

== Installation ==

This section describes how to install the plugin and get it working.
e.g.

<ol>
<li>Extract and upload the `basic-google-authorship` directory into `/wp-content/plugins`</li>
<li>Activate the plugin through the ‘Plugins’ menu in WordPress</li>
<li>Each writer should update the “Contributor to” field in their Google+ profile to link to the website</li>
<li>Update each author’s profile to include a link to their Google+ profile.</li>
<li>In your Wordpress theme replace "get_the_author()" by "do_shortcode("[basic_google_authorship_name]")" and "get_author_posts_url( get_the_author_meta( 'ID' ) )" by "do_shortcode("[basic_google_authorship_link]")"</li>
<li>Confirm that your authorship is working properly by verifying with Google’s <a href="http://www.google.com/webmasters/tools/richsnippets">Rich Snippets tool</a>.
</ol>

== Changelog ==

= 1.0.0 =
* Initial commit