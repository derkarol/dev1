<?php get_header(); ?>
<article>
    <div class="container">
        <h1><?php _e('404 Not Found', 'fudge-lite'); ?></h1>
        <p><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'fudge-lite'); ?></p>
	<?php get_search_form(); ?>
    </div>
    <section class="social-media">
        <div class="container">
	    <?php get_template_part('menu', 'social'); ?>
        </div>
    </section>
</article>
<?php
get_footer();
