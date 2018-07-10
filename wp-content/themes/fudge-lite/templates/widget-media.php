<div class="container">
    <h2><?php echo esc_html($fudge_lite_media_title); ?></h2>
    <p class="tagline"><?php echo esc_html($fudge_lite_media_tagline); ?></p>
    <div class="sorting">
	<ul class="media-category">
	    <li>
		<a class="btn all active" title="<?php _e('All Media', 'fudge-lite'); ?>" href="#" data-id="0"><?php _e('All', 'fudge-lite'); ?></a>
		<?php
		$terms	 = get_terms('media-type');
		$count	 = count($terms);
		if ($count > 0) {
		    foreach ($terms as $term) {
			?>
		    <li><a class="btn <?php echo esc_attr($term->name); ?>" href='#' data-id="<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name); ?></a></li>
		    <?php
		}
	    }
	    ?>
	</ul>
    </div>
    <ul class="filter track">
	<li>
	    <a title="<?php _e('Filter Results', 'fudge-lite'); ?>" data-id="" data-ignore-click="1"><?php _e('Filter Results', 'fudge-lite'); ?></a>
	    <ul>
		<li><a title="<?php _e('All Media', 'fudge-lite'); ?>" href="#" data-id="0"><?php _e('All', 'fudge-lite'); ?></a></li>
		<?php
		if ($count > 0) {
		    foreach ($terms as $term) {
			?>
			<li><a title="<?php echo esc_attr($term->name); ?>" href='#' data-id="<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name); ?></a></li>
			<?php
		    }
		}
		?>
	    </ul>
	</li>
    </ul>
    <div id="media-grid">
	<div id="all-media">
	</div>
    </div>
    <form autocomplete="off">
	<input type="hidden" id="cur_media_page" value="0" />
    </form>
    <a class="btn btn-less main-text-color" title="<?php echo(!empty($fudge_lite_media_less_text) ? esc_attr($fudge_lite_media_less_text) : __('View Less', 'fudge-lite')); ?>" href="#"><?php echo(!empty($fudge_lite_media_less_text) ? esc_html($fudge_lite_media_less_text) : __('View Less', 'fudge-lite')); ?></a>
    <a class="btn btn-more main-text-color" title="<?php echo(!empty($fudge_lite_media_more_text) ? esc_attr($fudge_lite_media_more_text) : __('View More', 'fudge-lite')); ?>" href="#"><?php echo(!empty($fudge_lite_media_more_text) ? esc_html($fudge_lite_media_more_text) : __('View More', 'fudge-lite')); ?></a>
</div>