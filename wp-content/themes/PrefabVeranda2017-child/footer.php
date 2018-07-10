<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->


		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="custom-slider">	<h4 class="slider-title"><?php the_field('slider_title'); ?></h4>
				<?php the_field('slider'); ?>
			</div>

			<div class="wrap">
						<!-- my attempt to do site navigation -->
				<nav class="site-nav children-links">
					<ul style="list-style: none;">
						<?php 

							$args = array(

								'child_of' => get_top_ancestor_id(),
								'title_li' => '',
								'depth' =>'0'
							);
							wp_list_pages($args);

							?>
					</ul>
				</nav>
				<?php
				
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
AOS.init();
</script>
</body>
</html>