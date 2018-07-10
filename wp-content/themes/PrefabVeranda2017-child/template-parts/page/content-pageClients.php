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
<div class="wrap">
	<div id="primary" class="content-area">
	
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		

		
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div>
		<?php			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );

		?>			
		</div>						

			</div><!-- .entry-content -->	
<!-- building clients page... ?<*O*>? -->


</article><!-- #post-## -->
	</div><!-- #primary -->

	
</div><!-- .wrap -->
<div class="dark-section shadow"> <p class="bar-title"><?php the_field('client_types_title')?></p></div>
	

	<div class="grid-wrapper type-a">
	  <div class="box shadow">
		<p class="svg-img"><?php the_field('client_type_1_img'); ?></p>
		  <p class="center"><?php the_field('client_type_1'); ?></p>
	  </div>
	  <div class="box shadow">
		  <p class="svg-img"><?php the_field('client_type_2_img'); ?></p>
		  <p class="center"><?php the_field('client_type_2'); ?></p>
		</div>
	  <div class="box shadow">
		  <p class="svg-img"><?php the_field('client_type_3_img'); ?></p>
		  <p class="center"><?php the_field('client_type_3'); ?></p>
		</div>
	  <div class="box shadow">
		  <p class="svg-img"><?php the_field('client_type_4_img'); ?></p>
		  <p class="center"><?php the_field('client_type_4'); ?></p>
		</div>
	</div>