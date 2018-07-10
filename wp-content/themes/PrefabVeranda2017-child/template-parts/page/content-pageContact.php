<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
<!-- for adresses and gallery is for contact form not gallary ?<*O*>? -->
	<div class="adresses" <?php the_field('post-aos_1')?>>
		<div>
			<p><?php
				the_field('adress_1');
			?></p>			
		</div>
	</div>
		
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div data-aos="fade-up">
		<?php			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );

		?>			
		</div>

			</div><!-- .entry-content -->	

<div class="custom-slider">	

		
	<?php the_field('gallery'); ?></div>
</article><!-- #post-## -->


