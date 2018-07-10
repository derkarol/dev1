<?php get_header(); ?>
<article>
    <div class="container">
	<?php
	if (have_posts()) {
	    while (have_posts()) {
		the_post();
		?>
		<h1><?php the_title(); ?></h1>
		<?php
		the_content();
		wp_link_pages(array(
		    'before'	 => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'fudge-lite') . '</span>',
		    'after'		 => '</div>',
		    'link_before'	 => '<span>',
		    'link_after'	 => '</span>',
		    'pagelink'	 => '<span class="screen-reader-text">' . __('Page', 'fudge-lite') . ' </span>%',
		    'separator'	 => '<span class="screen-reader-text">, </span>',
		));
	    }
	}
	?>
	<?php comments_template(); ?>
    </div>
    <section class="social-media">
        <div class="container">
	    <?php get_template_part('menu', 'social'); ?>
        </div>
    </section>
</article>
<?php
get_footer();
