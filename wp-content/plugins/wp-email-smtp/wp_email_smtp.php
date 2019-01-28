<?php
/*
  Plugin Name: WP Email SMTP
  Description: WP Email SMTP plugin allows you to connect any SMTP for sending emails from your WordPress site.
  Version: 1.0.8
  Author: FormGet
  Author URI: https://www.formget.com/
  License: GPLv2
 */

/*
  Copyright (C) 2016 InkThemes

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

class WP_Email_Smtp {

	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		$this->options = get_option( 'wp_email_smtp_option_name' );
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
		add_filter( 'plugin_action_links', array( $this, 'mail_plugin_action_links' ), 10, 2 );
		//Add an action on phpmailer_init
		add_action( 'phpmailer_init', array( $this, 'phpmailer_init_smtp' ) );
		//Add filters to replace the mail from name and emailaddress
		add_filter( 'wp_mail_from', array( $this, 'mail_smtp_mail_from' ) );
		add_filter( 'wp_mail_from_name', array( $this, 'mail_smtp_mail_from_name' ) );
		add_action('admin_notices', array( $this,'wp_tracking_admin_notice'));
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		//This page will be under "Settings"
		add_options_page(
				__( 'WP Email SMTP', 'wp-email-smtp' ), __( 'WP Email SMTP', 'wp-email-smtp' ), 'manage_options', 'wp-email-smtp', array( $this, 'create_admin_page' )
		);
	}
	
	function wp_tracking_admin_notice() {
        global $current_user;
        $user_id = $current_user->ID;
	
  /* Check that the user hasn't already clicked to ignore the message */
        if (!get_user_meta($user_id, 'wp_email_tracking_ignore_notice')) {
			  ?>
            <div class="notice notice-success"><p>Allow WP Email SMTP to send you setup guide? Opt-in to our newsletter and we will immediately e-mail you a setup guide along with 20% discount which you can use to purchase MailGet SMTP.</p><p><a href="<?php echo admin_url('admin.php?page=wp-email-smtp&wp_email_tracking=email_smtp_allow_tracking');?>" class="button button-primary">Allow Sending</a>&nbsp;<a href="<?php echo admin_url('admin.php?page=wp-email-smtp&wp_email_tracking=email_smtp_hide_tracking');?>" class="button-secondary">Do not allow</a></p></div>
            <?php
        }
	}


	function mail_smtp_mail_from( $orig ) {

		// Get the site domain and get rid of www.
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		if ( substr( $sitename, 0, 4 ) == 'www.' ) {
			$sitename = substr( $sitename, 4 );
		}

		$default_from = 'wordpress@' . $sitename;

		// If the from email is not the default, return it unchanged
		if ( $orig != $default_from ) {
			return $orig;
		}
		if ( isset( $this->options['from_email'] ) && is_email( $this->options['from_email'], false ) ) {
			return $this->options['from_email'];
		}

		// If in doubt, return the original value
		return $orig;
	}

	function mail_smtp_mail_from_name( $orig ) {

		// Only filter if the from name is the default
		if ( $orig == 'WordPress' ) {
			if ( isset( $this->options['from_name'] ) && $this->options['from_name'] != "" && is_string( $this->options['from_name'] ) ) {
				return $this->options['from_name'];
			}
		}

		// If in doubt, return the original value
		return $orig;
	}

	function mail_plugin_action_links( $links, $file ) {
		if ( $file != plugin_basename( __FILE__ ) )
			return $links;

		$settings_link = '<a href="options-general.php?page=wp-email-smtp">' . __( 'Settings', 'wp-email-smtp' ) . '</a>';

		array_unshift( $links, $settings_link );

		return $links;
	}

	public function phpmailer_init_smtp( $phpmailer ) {

		// Check that mailer is not blank, and if mailer=smtp, host is not blank
		if ( !$this->options['mailer'] || ( $this->options['mailer'] == 'smtp' && !$this->options['smtp_host']) ) {
			return;
		}

		// Set the mailer type as per config above, this overrides the already called isMail method
		$phpmailer->Mailer = $this->options['mailer'];

		// Set the Sender (return-path) if required
		if ( $this->options['mail_set_return_path'] )
			$phpmailer->Sender = $phpmailer->From;

		// Set the SMTPSecure value, if set to none, leave this blank
		$phpmailer->SMTPSecure = $this->options['smtp_encryption'] == 'none' ? '' : $this->options['smtp_encryption'];

		// If we're sending via SMTP, set the host
		if ( $this->options['mailer'] == "smtp" ) {

			// Set the SMTPSecure value, if set to none, leave this blank
			$phpmailer->SMTPSecure = $this->options['smtp_encryption'] == 'none' ? '' : $this->options['smtp_encryption'];

			// Set the other options
			$phpmailer->Host = $this->options['smtp_host'];
			$phpmailer->Port = $this->options['smtp_port'];

			// If we're using smtp auth, set the username & password
			if ( $this->options['smtp_authentication'] == "true" ) {
				$phpmailer->SMTPAuth = true;
				$phpmailer->Username = $this->options['smtp_username'];
				$phpmailer->Password = $this->options['smtp_password'];
			}
		}
		$phpmailer = apply_filters( 'wp_email_smtp_custom_options', $phpmailer );
	}

	function admin_tabs( $current = 'homepage' ) {
		$tabs = array( 'email-option' => __( 'Email Options', 'wp-email-smtp' ), 'test-email' => __( 'Test Email', 'wp-email-smtp' ) );
		$links = array();
		echo '<div id="icon-themes" class="icon32"><br></div>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $tab => $name ) {
			$class = ( $tab == $current ) ? ' nav-tab-active' : '';
			echo "<a class='nav-tab$class' href='?page=wp-email-smtp&tab=$tab'>$name</a>";
		}
		echo '</h2>';
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		if ( !isset( $_REQUEST['settings-updated'] ) )
			$_REQUEST['settings-updated'] = false;

		// Load the options
		global $phpmailer;

		// Make sure the PHPMailer class has been instantiated 
		// (copied verbatim from wp-includes/pluggable.php)
		// (Re)create it, if it's gone missing
		if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
			require_once ABSPATH . WPINC . '/class-phpmailer.php';
			require_once ABSPATH . WPINC . '/class-smtp.php';
			$phpmailer = new PHPMailer( true );
		}

		// Send a test mail if necessary
		if ( isset( $_POST['mgs_action'] ) && $_POST['mgs_action'] == __( 'Send Test', 'wp-email-smtp' ) && is_email( $_POST['to'] ) ) {

			check_admin_referer( 'test-email' );

			// Set up the mail variables
			$to = $_POST['to'];
			$subject = 'WP Email SMTP: ' . __( 'Test mail to ', 'wp-email-smtp' ) . $to;
			$message = __( 'This is a test email generated by the WP Email SMTP WordPress plugin.', 'wp-email-smtp' );

			// Set SMTPDebug to true
			$phpmailer->SMTPDebug = true;

			// Start output buffering to grab smtp debugging output
			ob_start();

			// Send the test mail
			$result = wp_mail( $to, $subject, $message );

			// Strip out the language strings which confuse users
			//unset($phpmailer->language);
			// This property became protected in WP 3.2
			// Grab the smtp debugging output
			$smtp_debug = ob_get_clean();

			// Output the response
			?>
			<div id="message" class="updated fade"><p><strong><?php _e( 'Test Message Sent', 'wp-email-smtp' ); ?></strong></p>
				<p><?php _e( 'The result was:', 'wp-email-smtp' ); ?></p>
				<pre><?php var_dump( $result ); ?></pre>
				<p><?php _e( 'The full debugging output is shown below:', 'wp-email-smtp' ); ?></p>
				<pre><?php var_dump( $phpmailer ); ?></pre>
				<p><?php _e( 'The SMTP debugging output is shown below:', 'wp-email-smtp' ); ?></p>
				<pre><?php echo $smtp_debug ?></pre>
			</div>
			<?php
			// Destroy $phpmailer so it doesn't cause issues later
			unset( $phpmailer );
		}
		//print_r( $this->options );
		?>
		<div class="wrap">
			<h1><?php _e( 'WP Email SMTP Settings', 'wp-email-smtp' ); ?></h1>
			<div>
			   <a href="https://www.formget.com/smtp/" target="_blank">
				<img src="<?php echo plugins_url('m_bolt_img.png', __FILE__); ?>"/>
			   </a>
		   </div>
			<?php
			if ( isset( $_GET['tab'] ) ) {
				$this->admin_tabs( $_GET['tab'] );
			} else {
				$this->admin_tabs( 'email-option' );
			}
			if ( isset( $_GET['tab'] ) )
				$tab = $_GET['tab'];
			else
				$tab = 'email-option';

			switch ( $tab ) {
				case 'email-option':
					?>
					<form method="post" action="options.php">
						<?php
						// This prints out all hidden setting fields
						settings_fields( 'wp_email_smtp_option_group' );
						do_settings_sections( 'wp-email-smtp' );
						submit_button();
						?>
					</form>
					<?php
					break;
				case 'test-email':
					?>
					<form method="POST">
						<?php wp_nonce_field( 'test-email' ); ?>
						<table class="optiontable form-table">
							<tr valign="top">
								<th scope="row"><label for="to"><?php _e( 'To:', 'wp-email-smtp' ); ?></label></th>
								<td>
									<input name="to" type="email" id="to" value="" size="40" class="code" />
									<span class="description"><?php _e( 'Type an email address here and then click Send Test to generate a test email.', 'wp-email-smtp' ); ?></span>
								</td>
							</tr>
						</table>
						<p class="submit"><input type="submit" name="mgs_action" id="mgs_action" class="button-primary" value="<?php _e( 'Send Test', 'wp-email-smtp' ); ?>" /></p>
					</form>
					<?php
					break;
			}
			?>
		</div>
		<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {
		register_setting(
				'wp_email_smtp_option_group', // Option group
				'wp_email_smtp_option_name', // Option name
				array( $this, 'sanitize' ) // Sanitize
		);

		add_settings_section(
				'wp_email_setting_id', // ID
				__( 'Email Options', 'wp-email-smtp' ), // Title
				array( $this, 'print_section_info' ), // Callback
				'wp-email-smtp' // Page
		);

		add_settings_field(
				'from_email', // ID
				sprintf( '<label for="from_email">%s</label>', __( 'From Email', 'wp-email-smtp' ) ), // Title 
				array( $this, 'from_email_callback' ), // Callback
				'wp-email-smtp', // Page
				'wp_email_setting_id' // Section           
		);

		add_settings_field(
				'from_name', sprintf( '<label for="from_name">%s</label>', __( 'From Name', 'wp-email-smtp' ) ), // Title 
				array( $this, 'from_name_callback' ), 'wp-email-smtp', 'wp_email_setting_id'
		);
		add_settings_field(
				'mailer', __( 'Mailer', 'wp-email-smtp' ), // Title 
				array( $this, 'mailer_callback' ), 'wp-email-smtp', 'wp_email_setting_id'
		);
		add_settings_field(
				'mail_set_return_path', __( 'Return Path', 'wp-email-smtp' ), // Title 
				array( $this, 'return_path_callback' ), 'wp-email-smtp', 'wp_email_setting_id'
		);
		add_settings_section(
				'wp_email_smtp_setting_id', // ID
				__( 'SMTP Options', 'wp-email-smtp' ), // Title
				array( $this, 'print_smtp_section_info' ), // Callback
				'wp-email-smtp' // Page
		);
		add_settings_field(
				'smtp_host', // ID
				sprintf( '<label for="smtp_host">%s</label>', __( 'Host', 'wp-email-smtp' ) ), // Title 
				array( $this, 'smtp_host_callback' ), // Callback
				'wp-email-smtp', // Page
				'wp_email_smtp_setting_id' // Section           
		);
		add_settings_field(
				'smtp_port', // ID
				sprintf( '<label for="smtp_port">%s</label>', __( 'Port', 'wp-email-smtp' ) ), // Title 
				array( $this, 'smtp_port_callback' ), // Callback
				'wp-email-smtp', // Page
				'wp_email_smtp_setting_id' // Section           
		);
		add_settings_field(
				'smtp_encryption', // ID
				sprintf( '<label for="smtp_encryption">%s</label>', __( 'Encryption', 'wp-email-smtp' ) ), // Title 
				array( $this, 'smtp_encryption_callback' ), // Callback
				'wp-email-smtp', // Page
				'wp_email_smtp_setting_id' // Section           
		);
		add_settings_field(
				'smtp_authentication', // ID
				sprintf( '<label for="smtp_authentication">%s</label>', __( 'Authentication', 'wp-email-smtp' ) ), // Title 
				array( $this, 'smtp_authentication_callback' ), // Callback
				'wp-email-smtp', // Page
				'wp_email_smtp_setting_id' // Section           
		);
		add_settings_field(
				'smtp_username', // ID
				sprintf( '<label for="smtp_username">%s</label>', __( 'Username', 'wp-email-smtp' ) ), // Title 
				array( $this, 'smtp_username_callback' ), // Callback
				'wp-email-smtp', // Page
				'wp_email_smtp_setting_id' // Section           
		);
		add_settings_field(
				'smtp_password', // ID
				sprintf( '<label for="smtp_password">%s</label>', __( 'Password', 'wp-email-smtp' ) ), // Title 
				array( $this, 'smtp_password_callback' ), // Callback
				'wp-email-smtp', // Page
				'wp_email_smtp_setting_id' // Section           
		);
    global $current_user;
    $user_id = $current_user->ID;
	if(isset($_GET["wp_email_tracking"]) && $_GET["wp_email_tracking"] == "email_smtp_hide_tracking"){
		 add_user_meta($user_id, 'wp_email_tracking_ignore_notice', 'true', true);
	}
	if(isset($_GET["wp_email_tracking"]) && $_GET["wp_email_tracking"] == "email_smtp_allow_tracking"){
		$email = get_option("admin_email");
		if(isset($email) && $email != ""){
		$mg_api_key = "EsT96nYTlxED";
		require_once('inc/mailget_curl.php');
        $list_arr = array();
        $mg_obj = new mailget_curl($mg_api_key);
		$mg_arr = array(array(
                    'name' => "",
                    'email' => sanitize_email($email),
                    'get_date' => date('j-m-y'),
                    'ip' => ''
                )
            );
        $curt_status = $mg_obj->curl_data($mg_arr, "Ijc1OTcxNCI_3D", 'single');
        			
		}
		add_user_meta($user_id, 'wp_email_tracking_ignore_notice','true',true);
		
	}
	register_deactivation_hook(__FILE__,  array( $this,'wp_email_smtp_delete_meta'));
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function sanitize( $input ) {
		$new_input = array();
		if ( isset( $input['from_email'] ) ) {
			$new_input['from_email'] = sanitize_email( $input['from_email'] );
		}

		if ( isset( $input['from_name'] ) ) {
			$new_input['from_name'] = sanitize_text_field( $input['from_name'] );
		}
		if ( isset( $input['mailer'] ) ) {
			$new_input['mailer'] = sanitize_text_field( $input['mailer'] );
		}
		if ( isset( $input['mail_set_return_path'] ) ) {
			$new_input['mail_set_return_path'] = sanitize_text_field( $input['mail_set_return_path'] );
		}
		if ( isset( $input['smtp_host'] ) ) {
			$new_input['smtp_host'] = sanitize_text_field( $input['smtp_host'] );
		}
		if ( isset( $input['smtp_port'] ) ) {
			$new_input['smtp_port'] = filter_var( $input['smtp_port'], FILTER_SANITIZE_NUMBER_INT );
		}
		if ( isset( $input['smtp_encryption'] ) ) {
			$new_input['smtp_encryption'] = sanitize_text_field( $input['smtp_encryption'] );
		}
		if ( isset( $input['smtp_authentication'] ) ) {
			$new_input['smtp_authentication'] = sanitize_text_field( $input['smtp_authentication'] );
		}
		if ( isset( $input['smtp_username'] ) ) {
			$new_input['smtp_username'] = sanitize_text_field( $input['smtp_username'] );
		}
		if ( isset( $input['smtp_password'] ) ) {
			$new_input['smtp_password'] = sanitize_text_field( $input['smtp_password'] );
		}

		return $new_input;
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info() {
		print __( 'Enter your settings below:', 'wp-email-smtp' );
	}

	public function print_smtp_section_info() {
		print __( 'These options only apply if you have chosen to send mail by SMTP above.', 'wp-email-smtp' );
	}

	public function return_path_callback() {
		?>
		<fieldset><legend class="screen-reader-text"><span><?php _e( 'Return Path', 'wp-email-smtp' ); ?></span></legend><label for="mail_set_return_path">
				<input name="wp_email_smtp_option_name[mail_set_return_path]" type="checkbox" id="mail_set_return_path" value="true" <?php checked( 'true', isset( $this->options['mail_set_return_path'] ) ? $this->options['mail_set_return_path'] : ''  ); ?>>
				<?php _e( 'Set the return-path to match the From Email', 'wp-email-smtp' ); ?></label>
		</fieldset>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function from_email_callback() {
		printf(
				'<input type="email" id="from_email" class="regular-text" size="40" name="wp_email_smtp_option_name[from_email]" value="%s" /><span class="description">%s</span>', isset( $this->options['from_email'] ) ? esc_attr( $this->options['from_email'] ) : '', __( 'You can specify the email address that emails should be sent from. If you leave this blank, the default email will be used.', 'wp-email-smtp' )
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function from_name_callback() {
		printf(
				'<input type="text" id="from_name" class="regular-text" size="40" name="wp_email_smtp_option_name[from_name]" value="%s" /><span class="description">%s</span>', isset( $this->options['from_name'] ) ? esc_attr( $this->options['from_name'] ) : '', __( 'You can specify the name that emails should be sent from. If you leave this blank, the emails will be sent from WordPress.', 'wp-email-smtp' )
		);
	}

	public function mailer_callback() {
		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e( 'Mailer', 'wp-email-smtp' ); ?></span></legend>
			<p><input id="mailer_smtp" type="radio" name="wp_email_smtp_option_name[mailer]" <?php //echo!isset( $this->options['mailer'] ) ? "checked" : '';                          ?> value="smtp" <?php checked( 'smtp', isset( $this->options['mailer'] ) ? $this->options['mailer'] : ''  ); ?> />
				<label for="mailer_smtp"><?php _e( 'Send all WordPress emails via SMTP.', 'wp-email-smtp' ); ?></label></p>
			<p><input id="mailer_mail" type="radio" name="wp_email_smtp_option_name[mailer]" value="mail" <?php checked( 'mail', isset( $this->options['mailer'] ) ? $this->options['mailer'] : ''  ); ?> />
				<label for="mailer_mail"><?php _e( 'Use the PHP mail() function to send emails.', 'wp-email-smtp' ); ?></label></p>
		</fieldset>
			<p class="description">Want to send emails to your customers in bulk. <a href="https://www.formget.com/mailget-bolt/" target="_blank">Try MailGet here</a>.</p>
		<?php
	}

	public function smtp_host_callback() {
		printf(
				'<input type="text" id="smtp_host" class="regular-text" size="40" name="wp_email_smtp_option_name[smtp_host]" value="%s" /><span class="description">%s</span>', isset( $this->options['smtp_host'] ) ? esc_attr( $this->options['smtp_host'] ) : '', __( 'Enter your SMTP host here.', 'wp-email-smtp' )
		);
	}

	public function smtp_port_callback() {
		printf(
				'<input type="text" id="smtp_port" class="regular-text" size="40" name="wp_email_smtp_option_name[smtp_port]" value="%s" /><span class="description">%s</span>', isset( $this->options['smtp_port'] ) ? esc_attr( $this->options['smtp_port'] ) : '', __( 'Enter your SMTP port here.', 'wp-email-smtp' )
		);
	}

	public function smtp_encryption_callback() {
		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e( 'Encryption', 'wp-email-smtp' ); ?></span></legend>
			<p><input <?php //echo!isset( $this->options['smtp_encryption'] ) ? "checked" : '';                          ?> id="smtp_ssl_none" type="radio" name="wp_email_smtp_option_name[smtp_encryption]" value="none" <?php checked( 'none', isset( $this->options['smtp_encryption'] ) ? $this->options['smtp_encryption'] : ''  ); ?> />
				<label for="smtp_ssl_none"><?php _e( 'No encryption.', 'wp-email-smtp' ); ?></label></p>
			<p><input id="smtp_ssl_ssl" type="radio" name="wp_email_smtp_option_name[smtp_encryption]" value="ssl" <?php checked( 'ssl', isset( $this->options['smtp_encryption'] ) ? $this->options['smtp_encryption'] : ''  ); ?> />
				<label for="smtp_ssl_ssl"><?php _e( 'Use SSL encryption.', 'wp-email-smtp' ); ?></label></p>
			<p><input id="smtp_ssl_tls" type="radio" name="wp_email_smtp_option_name[smtp_encryption]" value="tls" <?php checked( 'tls', isset( $this->options['smtp_encryption'] ) ? $this->options['smtp_encryption'] : ''  ); ?> />
				<label for="smtp_ssl_tls"><?php _e( 'Use TLS encryption. This is not the same as STARTTLS. For most servers SSL is the recommended option.', 'wp-email-smtp' ); ?></label></p>
		</fieldset>
		<?php
	}

	public function smtp_authentication_callback() {
		?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e( 'Authentication', 'wp-email-smtp' ); ?></span></legend>
			<p><input <?php //echo!isset( $this->options['smtp_authentication'] ) ? "checked" : '';                          ?> id="smtp_auth_false" type="radio" name="wp_email_smtp_option_name[smtp_authentication]" value="false" <?php checked( 'false', isset( $this->options['smtp_authentication'] ) ? $this->options['smtp_authentication'] : ''  ); ?> />
				<label for="smtp_auth_false"><?php _e( 'No: Do not use SMTP authentication.', 'wp-email-smtp' ); ?></label></p>
			<p><input id="smtp_auth_true" type="radio" name="wp_email_smtp_option_name[smtp_authentication]" value="true" <?php checked( 'true', isset( $this->options['smtp_authentication'] ) ? $this->options['smtp_authentication'] : ''  ); ?> />
				<label for="smtp_auth_true"><?php _e( 'Yes: Use SMTP authentication.', 'wp-email-smtp' ); ?></label></p>	
			<span class="description"><?php _e( 'If this is set to no, the values below are ignored.', 'wp-email-smtp' ); ?></span>
		</fieldset>
		<?php
	}

	public function smtp_username_callback() {
		printf(
				'<input type="text" id="smtp_username" class="regular-text" size="40" name="wp_email_smtp_option_name[smtp_username]" value="%s" /><span class="description">%s</span>', isset( $this->options['smtp_username'] ) ? esc_attr( $this->options['smtp_username'] ) : '', __( 'Enter your SMTP username here.', 'wp-email-smtp' )
		);
	}

	public function smtp_password_callback() {
		printf(
				'<input type="text" id="smtp_password" class="regular-text" size="40" name="wp_email_smtp_option_name[smtp_password]" value="%s" /><span class="description">%s</span>', isset( $this->options['smtp_password'] ) ? esc_attr( $this->options['smtp_password'] ) : '', __( 'Enter your SMTP password here.', 'wp-email-smtp' )
		);
	}
	
	public function wp_email_smtp_delete_meta(){
		 global $current_user;
		 $user_id = $current_user->ID;
		 delete_user_meta($user_id, 'wp_email_tracking_ignore_notice', 'true', true);
    }

}

if ( is_admin() ) {
	$WP_Email_Smtp = new WP_Email_Smtp();
}