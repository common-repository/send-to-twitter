<?php
   /*
      Plugin Name: Send to Twitter / Enviar a Twitter
      Plugin URI: http://braulioaquino.com/plugins/send-to-twitter
      Description: Displays a message to send a post to Twitter with title and shortened url.
      Version: 1.7.2
      Author: Braulio Aquino Garc&iacute;a
      Author URI: http://braulioaquino.com
   */
   
   /*
	Copyright 2009-2010  braulioaquino.com  (email: braulio@braulioaquino.com)

	This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

	You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
	*/
   
	$dir = basename(dirname(__FILE__))."";
	load_plugin_textdomain( 'send_to_twitter', 'wp-content/plugins/'.$dir, $dir);
	register_activation_hook(__FILE__, 'send_to_twitter_activate');
	function send_to_twitter_activate() {
		global $wpdb; 
		$table_name= $wpdb->prefix."send_to_twitter";
		$sql = "CREATE TABLE $table_name (
			`id` mediumint( 9 ) NOT NULL auto_increment,
			`type` tinytext NOT NULL,
			`user` tinytext NOT NULL,
			PRIMARY KEY  (`id`)
			)";
		$wpdb->query($sql);
		$sql = "INSERT INTO $table_name (`id`, `type`, `user`) VALUES (1, 'twtdefault', '')";
		$wpdb->query($sql);
		$sql = "INSERT INTO $table_name (`id`, `type`, `user`) VALUES (2, 'twtcustom', 'twitter')";
		$wpdb->query($sql);
		$sql = "INSERT INTO $table_name (`id`, `type`, `user`) VALUES (3, 'msgdefault', '')";
		$wpdb->query($sql);
		$sql = "INSERT INTO $table_name (`id`, `type`, `user`) VALUES (4, 'msgcustom', '???')";
		$wpdb->query($sql);
		$sql = "INSERT INTO $table_name (`id`, `type`, `user`) VALUES (5, 'apidefault', '392c141528f719f54714508743fd249d21170226')";
		$wpdb->query($sql);
		$sql = "INSERT INTO $table_name (`id`, `type`, `user`) VALUES (6, 'apicustom', '')";
		$wpdb->query($sql);
		add_option('send_to_twitter_user_typet', 'twtdefault');
		add_option('send_to_twitter_user_typem', 'msgdefault');
		add_option('send_to_twitter_user_typea', 'apidefault');
	}
	register_deactivation_hook(__FILE__, 'send_to_twitter_deactivate');
	function send_to_twitter_deactivate() {
		global $wpdb;
		$table_name = $wpdb->prefix."send_to_twitter";
		$sql = "DROP TABLE $table_name";
		$wpdb->query($sql);
		delete_option('send_to_twitter_user_typet');
		delete_option('send_to_twitter_user_typem');
		delete_option('send_to_twitter_user_typea');
	}
	add_action('admin_menu', 'send_to_twitter_menu');
	function send_to_twitter_menu() {
		add_options_page('Send to Twitter plugin options', 'Send to Twitter', 8, basename(__FILE__), 'send_to_twitter_options');
	}
	function send_to_twitter_options() {
		global $wpdb;
		$table_name = $wpdb->prefix."send_to_twitter";
		if(isset($_POST['user_custom_newt']) && !empty($_POST['user_custom_newt'])) {	
			$sql = "UPDATE $table_name SET user ='{$_POST['user_custom_newt']}' WHERE type='twtcustom'";
			$wpdb->query($sql);
		}
		if(isset($_POST['user_custom_newm']) && !empty($_POST['user_custom_newm'])) {	
			$sql = "UPDATE $table_name SET user ='{$_POST['user_custom_newm']}' WHERE type='msgcustom'";
			$wpdb->query($sql);
		}
		if(isset($_POST['user_custom_newa']) && !empty($_POST['user_custom_newa'])) {	
			$sql = "UPDATE $table_name SET user ='{$_POST['user_custom_newa']}' WHERE type='apicustom'";
			$wpdb->query($sql);
		}
		if(isset($_POST['user_typet'])) {	
			update_option('send_to_twitter_user_typet', $_POST['user_typet']);
		}
		if(isset($_POST['user_typem'])) {	
			update_option('send_to_twitter_user_typem', $_POST['user_typem']);
		}
		if(isset($_POST['user_typea'])) {	
			update_option('send_to_twitter_user_typea', $_POST['user_typea']);
		}
		$user_default_t = $wpdb->get_var("SELECT user FROM $table_name WHERE type='twtdefault'" );
		$user_custom_t = $wpdb->get_var("SELECT user FROM $table_name WHERE type='twtcustom'" );
		$user_default_m = $wpdb->get_var("SELECT user FROM $table_name WHERE type='msgdefault'" );
		$user_custom_m = $wpdb->get_var("SELECT user FROM $table_name WHERE type='msgcustom'" );
		$user_default_a = $wpdb->get_var("SELECT user FROM $table_name WHERE type='apidefault'" );
		$user_custom_a = $wpdb->get_var("SELECT user FROM $table_name WHERE type='apicustom'" );
		$user_typet = get_option('send_to_twitter_user_typet');
		if ($user_typet == "twtdefault") {
			$checked_twtdefault = "checked";
			$checked_twtcustom = "";
		} else {
			$checked_twtdefault = "";
			$checked_twtcustom = "checked";
		}
		$user_typem = get_option('send_to_twitter_user_typem');
		if ($user_typem == "msgdefault") {
			$checked_msgdefault = "checked";
			$checked_msgcustom = "";
		} else {
			$checked_msgdefault = "";
			$checked_msgcustom = "checked";
		}
		$user_typea = get_option('send_to_twitter_user_typea');
		if ($user_typea == "apidefault") {
			$checked_apidefault = "checked";
			$checked_apicustom = "";
		} else {
			$checked_apidefault = "";
			$checked_apicustom = "checked";
		}
		echo "<div class='wrap'><h2>Send to Twitter</h2><p><strong>",_e('Installation', 'send_to_twitter'),"</strong></p>";
		echo "<ul><li>",_e('Go to the menu', 'send_to_twitter')," <a href='theme-editor.php'>Themes/Theme-Editor</a>, ",_e('and enter the following code in the exact position where you want to see their text links', 'send_to_twitter'),":<br/> &nbsp; &nbsp; <code>&lt;?php if( function_exists('send_to_twitter') ){ send_to_twitter(); } ?&gt;</code></li></ul>";
		echo "<p><em>",_e('We recommend placing it in', 'send_to_twitter')," index.php ",_e('and','send_to_twitter')," single.php</em></p><br/>";
		echo "<p><span style='font-weight: bold;'>",_e('Options','send_to_twitter'),"</span></p>";
		echo "<form method='post' action=''><input type='radio' name='user_typet' value='twtdefault' ".$checked_twtdefault." /> ";
		echo _e('Without Twitter account','send_to_twitter'),"<br/><input type='radio' name='user_typet' value='twtcustom' ".$checked_twtcustom." /> ";
		echo _e('With Twitter account','send_to_twitter')," (<b>@".$user_custom_t."</b>)<br/>",_e('Twitter account','send_to_twitter');
		echo ": <input type='text' name='user_custom_newt' /><p/><input type='radio' name='user_typem' value='msgdefault' ".$checked_msgdefault." /> ";
		echo _e('Without custom message','send_to_twitter'),": <b>",_e('Send to Twitter', 'send_to_twitter'),"</b><br/><input type='radio' name='user_typem' value='msgcustom' ".$checked_msgcustom." /> ";
		echo _e('With custom message','send_to_twitter'),": <b>".$user_custom_m."</b><br/>",_e('Custom message','send_to_twitter');
		echo ": <input type='text' name='user_custom_newm' /><p/><input type='radio' name='user_typea' value='apidefault' ".$checked_apidefault." /> ";
		echo _e("Without API KEY","send_to_twitter"),'. ',_e("We recommend using an API KEY to have the shortened url's history.","send_to_twitter"),'<br/><input type="radio" name="user_typea" value="apicustom" '.$checked_apicustom.' /> ';
		echo _e('With API KEY','send_to_twitter'),": <b>".$user_custom_a."</b><br/>",_e('API KEY','send_to_twitter');
		echo ": <input type='text' name='user_custom_newa' /><br/><small>";
		echo _e('To obtain an API KEY and see the history of your shortened url visit','send_to_twitter');
		echo " <a href='http://ir.pe/login'>http://ir.pe/login</a></small><br/><input type='submit' name='update' value='",_e('Update','send_to_twitter'),"' style='margin:25px 0 0 100px;'/></form></div>";
	}
	function send_to_twitter() {
		global $wpdb;
		$table_name = $wpdb->prefix."send_to_twitter";
		$user_type = get_option('send_to_twitter_user_typet');
		$user = $wpdb->get_var("SELECT user FROM $table_name WHERE type='$user_type'" );
		$msg_type = get_option('send_to_twitter_user_typem');
		$msg = $wpdb->get_var("SELECT user FROM $table_name WHERE type='$msg_type'" );
		$api_type = get_option('send_to_twitter_user_typea');
		$api = $wpdb->get_var("SELECT user FROM $table_name WHERE type='$api_type'" );
		echo '<a href="http://twitter.com/?status='.get_the_title().'%20';
		//echo file_get_contents("http://ir.pe/?url=".get_permalink($post->ID)."&api=1&key=".$api."");
		echo file_get_contents("http://tinyurl.com/api-create.php?url=".get_permalink($post->ID));
		if ($user!='') {echo ' ',_e('by','send_to_twitter'),' @';}
		echo $user,'" target="_blank">';
		if ($msg=='') {echo _e('Send to Twitter', 'send_to_twitter');}
		else {echo $msg;}
		echo '</a>';
	}
?>