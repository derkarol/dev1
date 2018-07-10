<div class="container">
</div>
<div class="poi secondary-bkg-color">
    <h2><?php echo esc_html($fudge_lite_explore_main_title); ?></h2>
    <div class="content">
	<h3><?php echo esc_html($fudge_lite_explore_secondary_title); ?></h3>
	<p class="tagline"><?php echo esc_html($fudge_lite_explore_tagline); ?></p>
	<p>
	    <?php
	    if ($poi_query->have_posts()) {
		while ($poi_query->have_posts()) {
		    $poi_query->the_post();
		    ?>
		    <a href="#" data-lat="<?php echo esc_attr(get_post_meta(get_the_ID(), 'lat', true)); ?>" data-lng="<?php echo esc_attr(get_post_meta(get_the_ID(), 'lng', true)); ?>">
			<?php the_title(); ?>
		    </a><br/>
		    <?php
		}
	    }
	    wp_reset_postdata();
	    ?>
	</p>
    </div>
</div>