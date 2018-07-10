<div class="container">
    <h2><?php echo esc_html($fudge_lite_contact_title); ?></h2>
    <p class="tagline"><?php echo esc_html($fudge_lite_contact_tagline); ?></p>
    <div id="contact-form">
	<form id="contact-us" method="post">
	    <div class="message-details">
		<p>
		    <input type="text" name="contactName" class="requiredField" placeholder="<?php esc_attr_e('Name', 'fudge-lite') ?>"/>
		</p>
		<p><input type="text" name="phone" placeholder="<?php esc_attr_e('Number', 'fudge-lite') ?>"/></p>
		<p>
		    <input type="email" name="email" class="requiredField" placeholder="<?php esc_attr_e('Email', 'fudge-lite') ?>"/>
		</p>
	    </div>
	    <div class="message">
		<textarea name="comments" class="requiredField" placeholder="<?php esc_attr_e('Message', 'fudge-lite') ?>"></textarea>
	    </div>
	    <input type="hidden" name="action" value="send_contact_email" />
	    <input type="submit" name="submit" class="subbutton btn secondary-bkg-color" value="<?php esc_attr_e('Send Message', 'fudge-lite') ?>"/>
	    <input type="hidden" name="submitted" id="submitted" value="true" />
	    <?php wp_nonce_field('send_contact_message', 'fudge_lite'); ?>
	</form>
	<div class="social-media">
	    <?php get_template_part('menu', 'social'); ?>
	</div>
    </div>
</div>