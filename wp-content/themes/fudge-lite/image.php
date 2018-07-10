<?php get_header(); ?>
<article <?php post_class($post->ID); ?>>
    <div class="container">
        <section id="blog" class="attachment">
	    <?php
	    if (have_posts()) {
		while (have_posts()) {
		    the_post();
		    ?>
		    <h1><?php the_title(); ?></h1>
		    <?php echo wp_get_attachment_image(get_the_ID(), 'large'); ?>
		    <?php
		    if (has_excerpt()) {
			the_excerpt();
		    }
		    ?>
		    <?php
		    $metadata = wp_get_attachment_metadata();
		    if ($metadata) {
			printf('<div class="metadata"><span class="full-size-link"><a href="%1$s">%2$s &times; %3$s</a></span></div>', esc_url(wp_get_attachment_url()), absint($metadata['width']), absint($metadata['height'])
			);
		    }
		    ?>
		    <?php the_content(); ?>
		    <?php wp_link_pages(); ?>
		    <p class="meta">
			<?php
			printf(
				__('Posted %1$s by %2$s', 'fudge-lite'), get_the_date(), get_the_author()
			);
			?>
		    </p>
		    <?php
		}
	    }
	    ?>
	    <?php comments_template(); ?>
            <div class="navigation">
                <div class="prev-link">
		    <?php previous_post_link(); ?>
                </div>
                <div class="next-link">
		    <?php next_post_link(); ?>
                </div>
            </div>
        </section>
    </div>
    <section class="social-media">
        <div class="container">
	    <?php get_template_part('menu', 'social'); ?>
        </div>
    </section>
</article>
<?php
get_footer();
