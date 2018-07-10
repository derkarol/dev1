<div class="container">
    <h2><?php echo esc_html($fudge_lite_schedule_title); ?></h2>
    <p class="tagline"><?php echo esc_html($fudge_lite_schedule_tagline); ?></p>
    <p><?php echo esc_html($fudge_lite_schedule_text); ?></p>
    <div class="date-picker">
	<?php
	foreach ($session_dates as $session_date) {
	    ?>
    	<a href="#" data-timestamp="<?php echo esc_attr($session_date->meta_value); ?>">
    	    <span class="weekday"><?php echo(esc_html(date_i18n('l', fudge_lite_timestamp_fix($session_date->meta_value)))); ?></span>
    	    <span class="date"><?php echo(esc_html(date_i18n('d', fudge_lite_timestamp_fix($session_date->meta_value)))); ?></span>
    	    <span class="month"><?php echo(esc_html(date_i18n('M', fudge_lite_timestamp_fix($session_date->meta_value)))); ?></span>
    	</a>
	    <?php
	}
	?>
    </div>
    <div class="filters">
	<ul class="filter date-picker-mobile main-bkg-color">
	    <li>
		<a title="<?php _e('Filter by Track', 'fudge-lite'); ?>" data-timestamp="" data-ignore-click="1"></a>
		<ul>
		    <?php
		    foreach ($session_dates as $session_date) {
			?>
    		    <li>
    			<a href="#" data-timestamp="<?php echo esc_attr($session_date->meta_value); ?>"><?php echo esc_html(date(get_option('date_format'), fudge_lite_timestamp_fix($session_date->meta_value))); ?></a>
    		    </li>
			<?php
		    }
		    ?>
		</ul>
	    </li>
	</ul>
	<ul class="filter track">
	    <li>
		<a title="<?php _e('Filter by Track', 'fudge-lite'); ?>" data-track="0"><?php _e('Filter By Track', 'fudge-lite'); ?></a>
		<ul>
		    <li><a href="#" data-track="0"><?php _e('Reset', 'fudge-lite'); ?></a></li>
		    <?php
		    foreach ($session_tracks as $session_track) {
			?>
    		    <li><a href="#" data-track="<?php echo esc_attr($session_track->term_id); ?>"><?php echo esc_html($session_track->name); ?></a></li>
			<?php
		    }
		    ?>
		</ul>
	    </li>
	</ul>
	<ul class="filter location">
	    <li>
		<a title="<?php _e('Filter by Location', 'fudge-lite'); ?>" data-location="0"><?php _e('Filter By Location', 'fudge-lite'); ?></a>
		<ul>
		    <li><a href="#" data-track="0"><?php _e('Reset', 'fudge-lite'); ?></a></li>
		    <?php
		    foreach ($session_locations as $session_location) {
			?>
    		    <li><a href="#" data-location="<?php echo esc_attr($session_location->term_id); ?>"><?php echo esc_html($session_location->name); ?></a></li>
			<?php
		    }
		    ?>
		</ul>
	    </li>
	</ul>
    </div>
    <div id="schedule-sessions">
	<form autocomplete="off">
	    <input type="hidden" id="cur_page" value="0" />
	</form>
	<a class="btn-less main-bkg-color" title="<?php echo(!empty($fudge_lite_schedule_less_text) ? esc_attr($fudge_lite_schedule_less_text) : __('View Less', 'fudge-lite')); ?>" href="#"><?php echo(!empty($fudge_lite_schedule_less_text) ? esc_html($fudge_lite_schedule_less_text) : __('View Less', 'fudge-lite')); ?></a>
	<a class="btn-more main-bkg-color" title="<?php echo(!empty($fudge_lite_schedule_more_text) ? esc_attr($fudge_lite_schedule_more_text) : __('View More', 'fudge-lite')); ?>" href="#"><?php echo(!empty($fudge_lite_schedule_more_text) ? esc_html($fudge_lite_schedule_more_text) : __('View More', 'fudge-lite')); ?></a>
    </div>
</div>
<div class="lightbox-container session-info">
    <div class="lightbox">
    </div>
</div>
<div class="lightbox-container speaker-pop">
    <div class="lightbox"></div>
</div>