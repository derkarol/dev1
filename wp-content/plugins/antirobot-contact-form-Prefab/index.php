<?php

/*

Plugin Name: AntiRobot Contact Form Prefab

Plugin URI: https://wordpress.org/plugins/antirobot-contact-form/

Description: AntiRobot Contact Form is a fast and simple spam-blocking contact form using the reCAPTCHA 2.0 API.

Version: 1.9.0

Text Domain: antirobot-contact-form

Author: Pascale Beier

Author URI: https://pascalebeier.de/

*/



/**

 * AntiRobot Contact Form My

 *

 * AntiRobot Contact Form is a fast and simple spam-blocking contact form using the reCAPTCHA 2.0 API.

 *

 * @package antirobot-contact-form

 * @author Pascale Beier <mail@pascalebeier.de>

 */



defined( 'ABSPATH' ) || die;



add_action( 'init', 'do_output_buffer' );

function do_output_buffer() {

	ob_start();

}



/**

 * Contact Form Frontend Code.

 */

function arcf_frontend() {

	?>
<?php /*?>
<O.O> remaking contact form based on parent plugin BEGIN
<?php */?>
<form method="post" id="arcf-contact-form">
	<fieldset class="form-group">
		<div class="bx--form-item">
		  <label for="arcf-company" class="bx--label"><?php _e( 'Company name', 'antirobot-contact-form' ) ?></label>
					  <div class="bx--form-requirement">
			Provide proper info.
		  </div>
		  <input id="company1" type="text" class="bx--text-input" id="arcf-company" name="arcf-company"

						<?php if ( get_option( 'arcf_placeholders' ) ): ?>

							placeholder="<?php _e( 'Best Company', 'antirobot-contact-form' ) ?>"

						<?php endif ?>

						   value="<?php echo ! empty( $_POST['arcf-company'] ) ? sanitize_text_field( $_POST['arcf-company'] ) : '' ?>"

						   >

		  <div class="bx--form-requirement">
			Company name is not required.
		  </div>	

		  <label for="arcf-name" class="bx--label"><?php _e( 'Name *', 'antirobot-contact-form' ) ?></label>
		  <input id="name1" type="text" class="bx--text-input" id="arcf-name" name="arcf-name"

						<?php if ( get_option( 'arcf_placeholders' ) ): ?>

							placeholder="<?php _e( 'Name Surname', 'antirobot-contact-form' ) ?>"

						<?php endif ?>

						   value="<?php echo ! empty( $_POST['arcf-name'] ) ? sanitize_text_field( $_POST['arcf-name'] ) : '' ?>"

						   required>

		  <div class="bx--form-requirement">
			Username is taken.
		  </div>	


		  <label for="arcf-country" class="bx--label"><?php _e( 'Country *', 'antirobot-contact-form' ) ?></label>
		  <input id="country1" type="text" class="bx--text-input" id="arcf-country" name="arcf-country"

						<?php if ( get_option( 'arcf_placeholders' ) ): ?>

							placeholder="<?php _e( 'Country', 'antirobot-contact-form' ) ?>"

						<?php endif ?>

						   value="<?php echo ! empty( $_POST['arcf-country'] ) ? sanitize_text_field( $_POST['arcf-country'] ) : '' ?>"

						   required>

		  <div class="bx--form-requirement">
			Provide proper country.
		  </div>	


		  <label for="arcf-adress" class="bx--label"><?php _e( 'Adress *', 'antirobot-contact-form' ) ?></label>
		  <input id="adress1" type="text" class="bx--text-input" id="arcf-adress" name="arcf-adress"

						<?php if ( get_option( 'arcf_placeholders' ) ): ?>

							placeholder="<?php _e( 'Street and Home number', 'antirobot-contact-form' ) ?>"

						<?php endif ?>

						   value="<?php echo ! empty( $_POST['arcf-adress'] ) ? sanitize_text_field( $_POST['arcf-adress'] ) : '' ?>"

						   required>
			<div class="bx--form-requirement">
			Provide proper street and number.
		  </div>
		  <input id="adress2" type="text" class="bx--text-input" id="arcf-adress2" name="arcf-adress2"

					<?php if ( get_option( 'arcf_placeholders' ) ): ?>

						placeholder="<?php _e( 'Postcode and City', 'antirobot-contact-form' ) ?>"

					<?php endif ?>

					   value="<?php echo ! empty( $_POST['arcf-adress2'] ) ? sanitize_text_field( $_POST['arcf-adress2'] ) : '' ?>"

					   required>

		  <div class="bx--form-requirement">
			Provide proper adress.
		  </div>

		  <label for="arcf-telephone" class="bx--label"><?php _e( 'Telephone *', 'antirobot-contact-form' ) ?></label>
		  <input id="telephone1" type="text" class="bx--text-input" id="arcf-telephone" name="arcf-telephone"

						<?php if ( get_option( 'arcf_placeholders' ) ): ?>

							placeholder="<?php _e( '+00 888 888 888', 'antirobot-contact-form' ) ?>"

						<?php endif ?>

						   value="<?php echo ! empty( $_POST['arcf-telephone'] ) ? sanitize_text_field( $_POST['arcf-telephone'] ) : '' ?>"

						   required>

		  <div class="bx--form-requirement">
			Provide proper telephone number.
		  </div>


		<label for="arcf-email" class="bx--label"><?php _e( 'E-Mail', 'antirobot-contact-form' ) ?></label>

					<input type="email" class="bx--text-input" id="arcf-email" name="arcf-email"

						<?php if ( get_option( 'arcf_placeholders' ) ): ?>

							placeholder="<?php _e( 'mail@example.org', 'antirobot-contact-form' ) ?>"

						<?php endif ?>

						   value="<?php echo ! empty( $_POST['arcf-email'] ) ? sanitize_email( $_POST['arcf-email'] ) : '' ?>"

						   required>
						<div class="bx--form-requirement">
			Provide proper E-Mail.
		  </div>

		<form method="post" id="arcf-contact-form">


			<label for="arcf-message" class="bx--label"><?php _e( 'Your Message', 'antirobot-contact-form' ) ?></label>

					<textarea class="bx--text-area" rows="4" cols="50" id="arcf-message" name="arcf-message"

						<?php if ( get_option( 'arcf_placeholders' ) ): ?>

							placeholder="<?php _e( 'Enter your message here', 'antirobot-contact-form' ) ?>"

						<?php endif ?>

							  required><?php echo ! empty( $_POST['arcf-message'] ) ? sanitize_text_field( $_POST['arcf-message'] ) : '' ?>
					</textarea>
			<p><?php _e( '*required', 'antirobot-contact-form' ) ?></p>
			
			<div class="bx--form-item bx--checkbox-wrapper">
				<input id="bx--checkbox-new" class="bx--checkbox" type="checkbox" value="new" name="checkbox" checked required>
				<label for="bx--checkbox-new" class="bx--checkbox-label"><?php _e( '*By submitting to this form you agree to collect and process, your data for contact purpose.', 'antirobot-contact-form' ) ?></label>
			  </div>			

		  <div class="bx--form-requirement">
			Please do not leave blank, send your message.
		  </div>
		</div>
	</fieldset>



		<?php if ( ! get_option( 'arcf_invisible' ) ): ?>

            <fieldset class="form-group">

                <div class="g-recaptcha"

                     data-sitekey="<?php echo sanitize_text_field( get_option( 'arcf_publickey' ) ) ?>"></div>

            </fieldset>

		<?php endif ?>



        <script type="text/javascript"

                src="https://www.google.com/recaptcha/api.js?hl=<?php echo get_locale() ?>"></script>



        <fieldset class="form-group">

			<?php if ( get_option( 'arcf_invisible' ) ): ?>

                <script>

                    function onSubmit(token) {

                        document.getElementById('arcf_submitted').value = 1;

                        document.getElementById('arcf-contact-form').submit();

                    }

                </script>

            <input  class="bx--form-item" type="hidden" id="arcf_submitted" name="arcf-submitted">

                <button class="bx--btn bx--btn--primary" id="arcf_submit"

                        data-sitekey="<?php echo sanitize_text_field( get_option( 'arcf_publickey' ) ) ?>"

                        data-callback='onSubmit'>

					<?php _e( 'Submit', 'antirobot-contact-form' ) ?>

                </button>

			<?php else: ?>

                <button type="submit" class="btn btn-primary" name="arcf-submitted">

					<?php _e( 'Submit', 'antirobot-contact-form' ) ?>

                </button>

			<?php endif ?>

        </fieldset>



    </form>



	<?php

}



/**

 *<O*O>

 */
add_filter('wp_mail','custom_mails', 10,1);

function custom_mails($args)
	{
		$admin_email2 = sanitize_email( get_option( 'arcf_mailto2' ) );
		$bcc_email = sanitize_email($admin_email2);

		if (is_array($args['headers'])) 
			{
			$args['headers'][] = 'Bcc: '.$bcc_email ;
			}
			else 
			{
			$args['headers'] .= 'Bcc: '.$bcc_email."\r\n";
		}

	return $args;
}

function arcf_validation() {

	if ( isset( $_POST['arcf-submitted'] ) ) {

		$admin_email = sanitize_email( get_option( 'arcf_mailto') );
		
		$bcc_email = sanitize_email( get_option( 'arcf_mailto2' ) );

		$company_name    = sanitize_text_field( $_POST['arcf-company'] );
		
		$sender_name    = sanitize_text_field( $_POST['arcf-name'] );
		
		$sender_country    = sanitize_text_field( $_POST['arcf-country'] );
		
		$sender_adress    = sanitize_text_field( $_POST['arcf-adress'] );
		
		$sender_adress2    = sanitize_text_field( $_POST['arcf-adress2'] );
		
		$sender_telephone    = sanitize_text_field( $_POST['arcf-telephone'] );

		$sender_email   = sanitize_email( $_POST['arcf-email'] );

		$sender_subject = sanitize_text_field( get_option( 'arcf_subject' ) );

		$sender_message = sprintf(

		/* translators: 1: Sender Name 2: Sender E-Mail */

			__( 'You received a new message from %1$s from company: %2$s placed in: %3$s under adress: street %4$s City: %5$s, E-mail: %6$s, telephone: %7$s', 'antirobot-contact-form' ),

			$sender_name,
			
			$company_name,
			
			$sender_country,
			
			$sender_adress,
			
			$sender_adress2,

			$sender_email,
			
			$sender_telephone

		);

		$sender_message .= "\r\n\r\n";

		$sender_message .= sanitize_text_field( $_POST['arcf-message'] );



		$admin_message = sprintf(

		/* translators: 1: Admin E-Mail 2: WordPress URL */

			__( 'You successfully sent the following message to %1$s (via %3$s)', 'antirobot-contact-form' ),

			$admin_email,
			
//			(*)

			get_bloginfo( 'url' )

		);

		$admin_message .= "\r\n\r\n";

		$admin_message .= sanitize_text_field( $_POST['arcf-message'] );



		$admin_subject = __( 'You successfully sent us an E-Mail!', 'antirobot-contact-form' );



		$admin_headers[] = "From: $admin_email";

		$admin_headers[] = "Reply-To: $admin_email";



		$sender_headers[] = "From: $sender_name <$sender_email>";

		$sender_headers[] = "Reply-To: $sender_name <$sender_email>";





		$privatekey = sanitize_text_field( get_option( 'arcf_privatekey' ) );



		$captcha = null;



		// Verify that a POST Request was issued to reCAPTCHA ...

		! empty( $_POST['g-recaptcha-response'] ) ? $captcha = $_POST['g-recaptcha-response'] : null;



		// ... if not, throw an Error ...

		if ( empty( $captcha ) ) {

			echo '<div class="alert alert-danger"><p>' .

			     __( 'Please solve the reCAPTCHA before submitting the form.', 'antirobot-contact-form' )

			     . '</p></div>';

		} else {

			// ... if so, get the response from the reCAPTCHA service ...

			$response = wp_remote_fopen( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $privatekey . '&response=' . $captcha . '&remoteip=' . $_SERVER['REMOTE_ADDR'] );

			$json     = json_decode( $response, true );

			// ... if the service did not return true, throw an error ...

			if ( true !== $json['success'] ) {

				echo '<div class="alert alert-danger"><p>' .

				     __( 'reCAPTCHA did not authorize your request. Make sure your keys are correct.',

					     'antirobot-contact-form' )

				     . '</p></div>';

				// ... if it did return true, send these mails ...

			} else {

				// ... and if wp_mail() is not causing troubles ...

				if ( wp_mail( [$admin_email, $admin_email2], $sender_subject, $sender_message, $sender_headers ) &&

				     wp_mail( $sender_email, $admin_subject, $admin_message, $admin_headers )

				) {

					// ... and notify the user of that successfully send mail.

					if ( get_option( 'arcf_redirect' ) ) {

						wp_redirect( get_permalink( get_option( 'arcf_redirect' ) ) );

						exit;

					}

					echo '<div class="alert alert-success"></p>' .

					     __( 'Message successfully sent. You will receive an E-Mail confirmation soon.',

						     'antirobot-contact-form' )

					     . '</p></div>';

					// ... but if wp_mail() is troubling, notify the user.

				} else {

					echo '<div class="alert alert-danger"><p>' .

					     __( 'Mail Delivery with wp_mail() failed. Is your web server configuration allowing to send mails?',

						     'antirobot-contact-form' )

					     . '</p></div>';

				}

			}

		}

	}

}


/**

 * Register the Antirobot Contact Form Shortcode.

 *

 * @return string

 */

function arcf_shortcode() {

	ob_start();

	arcf_validation();

	arcf_frontend();



	return ob_get_clean();

}



add_shortcode( 'antirobot_contact_form', 'arcf_shortcode' );



/**

 * Register the backend settings.

 */

add_action( 'admin_menu', 'arcf_setup_menu' );

add_action( 'admin_init', 'arcf_register_settings' );



function arcf_register_settings() {

	register_setting( 'arcf-option-group', 'arcf_publickey' );

	register_setting( 'arcf-option-group', 'arcf_privatekey' );

	register_setting( 'arcf-option-group', 'arcf_mailto' );
	
	register_setting( 'arcf-option-group', 'arcf_mailto2' );

	register_setting( 'arcf-option-group', 'arcf_subject' );

	register_setting( 'arcf-option-group', 'arcf_placeholders' );

	register_setting( 'arcf-option-group', 'arcf_invisible' );

	register_setting( 'arcf-option-group', 'arcf_redirect' );

}



/**

 * Setup the backend menu.

 */

function arcf_setup_menu() {

	add_options_page( 'AntiRobot Contact Form', 'AntiRobot Contact Form', 'manage_options', 'antirobot-contact-form',

		'arcf_init' );

}



/**

 * Backend GUI.

 */

function arcf_init() {

	?>

    <style>

        span.dashicons-before.dashicons-external {

            display: inline-block;

            line-height: 22px;

        }

    </style>

    <div class="wrap">



        <h1><?php _e( 'AntiRobot Contact Form', 'antirobot-contact-form' ); ?>

            <a target="_blank" class="page-title-action" style="display: none" href="https://www.google.com/recaptcha/admin">

                <span class="dashicons-before dashicons-external"></span> <?php _e( 'Get your keys',

					'antirobot-contact-form' ); ?>

            </a>

        </h1>



        <form method="post" action="options.php">

			<?php settings_fields( 'arcf-option-group' ) ?>

			<?php do_settings_sections( 'arcf-option-group' ) ?>



            <table class="form-table">

                <tbody>

                <tr style="display: none">

                    <th scope="row">

                        <label for="arcf_publickey">

							<?php _e( 'Public Key', 'antirobot-contact-form' ); ?>

                        </label>

                    </th>

                    <td>

                        <input id="arcf_publickey" type="text" name="arcf_publickey"

                               value="<?php echo esc_attr( get_option( 'arcf_publickey' ) ) ?>"

                               class="regular-text">

                    </td>

                </tr>



                <tr style="display: none">

                    <th scope="row">

                        <label for="arcf_privatekey">

							<?php _e( 'Secret Key', 'antirobot-contact-form' ); ?>

                        </label>

                    </th>

                    <td>

                        <input id="arcf_privatekey" type="text" name="arcf_privatekey"

                               value="<?php echo esc_attr( get_option( 'arcf_privatekey' ) ) ?>"

                               class="regular-text">

                    </td>

                </tr>



                <tr>

                    <th scope="row">

                        <label for="arcf_mailto">

							<?php _e( 'Recipient', 'antirobot-contact-form' ) ?>

                        </label>

                    </th>

                    <td>

                        <input id="arcf_mailto" type="email" name="arcf_mailto"

                               value="<?php echo esc_attr( get_option( 'arcf_mailto' ) ) ?>"

                               class="regular-text">

                    </td>
					
				  <th scope="row">

                        <label for="arcf_mailto2" style="display: none">

							<?php _e( 'Recipient2', 'antirobot-contact-form' ) ?>

                        </label>

                    </th>

                    <td>

                        <input id="arcf_mailto2" type="email" name="arcf_mailto2"

                               value="<?php echo esc_attr( get_option( 'arcf_mailto2' ) ) ?>"

                               class="regular-text" style="display: none">

                    </td>

                </tr>



                <tr>

                    <th scope="row">

                        <label for="arcf_subject">

							<?php _e( 'Subject', 'antirobot-contact-form' ) ?>

                        </label>

                    </th>

                    <td>

                        <input id="arcf_subject" type="text" name="arcf_subject"

                               value="<?php echo esc_attr( get_option( 'arcf_subject' ) ) ?>"

                               class="regular-text">

                    </td>

                </tr>



                <tr>

                    <th scope="row">

						<?php _e( 'Invisible reCAPTCHA', 'antirobot-contact-form' ); ?>

                    </th>

                    <td>

                        <fieldset>

                            <legend class="screen-reader-text">

								<?php _e( 'Invisible reCAPTCHA', 'antirobot-contact-form' ); ?>

                            </legend>

                            <label for="arcf_invisible">

                                <input id="arcf_invisible" name="arcf_invisible" type="checkbox"

                                       value="1" <?php checked( get_option( 'arcf_invisible' ), 1 ) ?>>

								<?php _e( 'Enable Invisible reCAPTCHA', 'antirobot-contact-form' ); ?>

                            </label>

                            <p class="description">

								<?php _e( 'Enable or Disable Invisible reCAPTCHA. This also needs to be set at the reCAPTCHA site settings.', 'antirobot-contact-form' ); ?>

                            </p>

                        </fieldset>

                    </td>

                </tr>



                <tr>

                    <th scope="row">

						<?php _e( 'Placeholder Visibility', 'antirobot-contact-form' ); ?>

                    </th>

                    <td>

                        <fieldset>

                            <legend class="screen-reader-text">

								<?php _e( 'Placeholder Visibility', 'antirobot-contact-form' ); ?>

                            </legend>

                            <label for="arcf_placeholders">

                                <input id="arcf_placeholders" name="arcf_placeholders" type="checkbox"

                                       value="1" <?php checked( get_option( 'arcf_placeholders' ), 1 ) ?>>

								<?php _e( 'Show Placeholders', 'antirobot-contact-form' ); ?>

                            </label>

                            <p class="description">

								<?php _e( 'This controls the display of the placeholder attributes.', 'antirobot-contact-form' ); ?>

                            </p>

                        </fieldset>

                    </td>

                </tr>



                <tr>

                    <th scope="row">

						<?php _e( 'Redirection', 'antirobot-contact-form' ); ?>

                    </th>

                    <td>

                        <fieldset>

                            <legend class="screen-reader-text">

								<?php _e( 'Redirection', 'antirobot-contact-form' ); ?>

                            </legend>

                            <label for="arcf_redirect">

								<?php wp_dropdown_pages( array(

									'name'              => 'arcf_redirect',

									'id'                => 'arcf_redirect',

									'echo'              => 1,

									'selected'          => get_option( 'arcf_redirect' ),

									'show_option_none'  => __( 'Disable', 'antirobot-contact-form' ),

									'option_none_value' => 0

								) ); ?>

                            </label>

                            <p class="description">

								<?php _e( 'Select a page to redirect to after form submission.', ' ' ); ?>

                            </p>

                        </fieldset>

                    </td>

                </tr>



                </tbody>

            </table>



			<?php submit_button() ?>

        </form>


<?php /*?>
        <h2 class="title"><?php _e( 'Usage', 'antirobot-contact-form' ); ?></h2>



        <p><?php _e( 'After setting up, you may insert the shortcode <code>[antirobot_contact_form]</code> on pages or posts to display the contact form.',

				'antirobot-contact-form' ); ?></p>



        <h2 class="title"><?php _e( 'Did you save time?', 'antirobot-contact-form' ); ?></h2>



        <p><?php _e( 'If this Plugin has done its job saving your time, <a href="https://wordpress.org/support/view/plugin-reviews/antirobot-contact-form#postform">leave a review</a> and spread the word. If you want to support my coffee addiction, you can <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DCGHNCDNK4XU4">tip me on paypal</a>.</p>',

				'antirobot-contact-form' ); ?></p><?php */?>

    </div>

	<?php

}

