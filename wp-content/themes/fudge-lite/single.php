<?php get_header(); ?>
<article <?php post_class($post->ID); ?>>
    <div class="container">
        <section id="blog">
	    <?php
	    if (have_posts()) {
		while (have_posts()) {
		    the_post();
		    ?>
		    <h1><?php the_title(); ?></h1>
		    <?php the_content(); ?>
		    <?php
		    wp_link_pages(array(
			'before'	 => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'fudge-lite') . '</span>',
			'after'		 => '</div>',
			'link_before'	 => '<span>',
			'link_after'	 => '</span>',
			'pagelink'	 => '<span class="screen-reader-text">' . __('Page', 'fudge-lite') . ' </span>%',
			'separator'	 => '<span class="screen-reader-text">, </span>',
		    ));
		    ?>
		    <p class="meta">
			<?php
			printf(
				__('Posted %1$s in: %2$s by %3$s', 'fudge-lite'), get_the_date(), get_the_category_list(', '), get_the_author()
			);
			?>
			<br/>
			<?php the_tags(); ?>
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
