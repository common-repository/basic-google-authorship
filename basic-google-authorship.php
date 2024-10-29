<?php
/*
 * Basic Google Authorship is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *     
 * Basic Google Authorship is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *    
 * You should have received a copy of the GNU General Public License
 * along with Basic Google Authorship.  If not, see <http://www.gnu.org/licenses/gpl-3.0.html>.
 *     
 *     --------------
 * 
 * Plugin Name: Basic Google Authorship
 * Plugin URI: http://www.php-geek.fr/plugin-wordpress-basic-google-authorship.html
 * Description: Replaces author links of your posts with your Google+ Profile Link.
 * Version: 1.0.0
 * Author: Bruce Delorme
 * Author URI: http://www.php-geek.fr

*/


if (!class_exists("basicgoogleauthorship")) :

class basicgoogleauthorship 
{

	function basicgoogleauthorship() 
	{
		register_activation_hook( __FILE__, array(&$this,'activate') );
		register_deactivation_hook( __FILE__, array(&$this,'deactivate') );

        add_shortcode( 'basic_google_authorship_link', array(&$this,'basic_google_authorship_link') );
        add_shortcode( 'basic_google_authorship_name', array(&$this,'basic_google_authorship_name') );
        
        add_action('show_user_profile',  array(&$this,'basic_google_authorship_user_edit'));
        add_action('edit_user_profile',  array(&$this,'basic_google_authorship_user_edit'));
        
        add_action('personal_options_update',  array(&$this,'basic_google_authorship_user_update'));
        add_action('edit_user_profile_update',  array(&$this,'basic_google_authorship_user_update'));

	}
	

	function activate($networkwide) 
	{

	}

	function deactivate($networkwide) 
	{

	}	


    function basic_google_authorship_link()
    {
        $userid = get_the_author_meta( 'ID' );
        $data = get_user_meta($userid, 'basic_google_authorsihp_url', true);
        if($data != ""){
          return $data;
        } else {
          return get_author_posts_url( $userid );
        }
    }
    
    function basic_google_authorship_name()
    {
        $userid = get_the_author_meta( 'ID' );
        $data = get_user_meta($userid, 'basic_google_authorship_name', true);
        if($data != ""){
          return $data;
        } else {
          return get_the_author();
        }
    }


    function basic_google_authorship_user_edit($user)
    {
    	$basic_google_authorsihp_url = get_user_meta($user->ID, 'basic_google_authorsihp_url', true);
        $basic_google_authorship_name = get_user_meta($user->ID, 'basic_google_authorship_name', true);
    	?>
    	<a href="#" name="google_authorship_options"></a>
    	<h3>Google Authorship options</h3>
    	<table class="form-table">
    		<tr>
    			<th><label for="basic_google_authorsihp_url">Google+ profile URL</label></th>
    			<td>
    				<input value="<?php echo htmlspecialchars($basic_google_authorsihp_url); ?>" class="regular-text" type="text" name="basic_google_authorsihp_url" id="basic_google_authorsihp_url" />
    				<br />
    				<span class="description">Link to your Google Plus profile, for example: https://plus.google.com/106602228191216539403/posts</span>
    			</td>
    		</tr>
    		<tr>
    			<th><label for="basic_google_authorship_name">Preferred name</label></th>
    			<td>
    			<input value="<?php echo htmlspecialchars($basic_google_authorship_name); ?>" type="text"  class="regular-text"  name="basic_google_authorship_name" id="basic_google_authorship_name" />
    			</td>
    		</tr>
    	</table>
    	<?php
    }


    function basic_google_authorship_user_update($user_id)
    {
    	if ( !current_user_can( 'edit_user', $user_id ) )
    		return false;
    	update_user_meta( $user_id, 'basic_google_authorsihp_url', ($_POST['basic_google_authorsihp_url']));
    	update_user_meta( $user_id, 'basic_google_authorship_name', ($_POST['basic_google_authorship_name']));
    }

} // end class
endif;

global $basicgoogleauthorship;
if (class_exists("basicgoogleauthorship") && !$basicgoogleauthorship) {
    $basicgoogleauthorship = new basicgoogleauthorship();	
}