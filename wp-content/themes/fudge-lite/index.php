<?php get_header(); ?>
<article>
    <div class="container">
        <section id="blog">
	    <?php
	    global $wp_query;
	    if (have_posts()) {
		while (have_posts()) {
		    the_post();
		    ?>
		    <div class="post post<?php echo($wp_query->current_post % 2 == 0 ? '1' : '2'); ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			    <?php the_post_thumbnail('fudge-lite-blog'); ?>
			</a>
			<h2><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		    </div>
		    <?php
		}
	    }
	    ?>
            <div class="navigation">
                <span class="older"><?php next_posts_link(__('&laquo; Older Entries', 'fudge-lite')); ?></span>
                <span class="newer"><?php previous_posts_link(__('Newer Entries &raquo;', 'fudge-lite')); ?></span>
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