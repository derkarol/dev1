<div class="container">
    <?php
    if (!empty($fudge_lite_event_date)) {
	?>
        <div class="event-when">
    	<h2><?php _e('When', 'fudge-lite'); ?></h2>
    	<p><?php echo esc_html($fudge_lite_event_date); ?></p>
    	<p><span><?php _e('Starting at', 'fudge-lite'); ?> <?php echo esc_html($fudge_lite_event_time); ?></span></p>
        </div>
        <div class="event-where">
    	<h2><?php _e('Where', 'fudge-lite'); ?></h2>
    	<p><?php echo esc_html($fudge_lite_event_city); ?></p>
    	<p><span><?php echo esc_html($fudge_lite_event_location); ?></span></p>
        </div>
	<?php
    }
    ?>
</div>