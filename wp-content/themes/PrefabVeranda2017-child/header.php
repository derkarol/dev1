<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
  
</head>
 
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>


	<header id="masthead" class="site-header" role="banner">
		

	<?php 
	
	// <O.O> This part was originaly however I changed to what is below for more edit flexibility This stops displaying of main image on subpages, and puts top nav to top ?<*o*>?.

	if ( twentyseventeen_is_frontpage()  ) :
			get_template_part( 'template-parts/header/header', 'image' ); ?>
			
		
	<?php endif; ?>
	

			<?php if ( has_nav_menu( 'top' ) ) : ?>
					<div class="navigation-top shadow">
						<div class="wrap">
							<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
						</div><!-- .wrap -->
					</div><!-- .navigation-top -->
		<?php endif; ?>


	</header><!-- #masthead -->

	
	<?php
	// If a regular post or page, and not the front page, show the featured image. && ! twentyseventeen_is_frontpage() /<O.O> changed back/ is_home is seppous to show image in news page however not working like intended at the moment <--> is_archive( array( 150, 1405, 1412, 1588 ) )
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) || ( is_front_page() && is_home() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		the_post_thumbnail( 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>
	


	<div class="site-content-contain">
		<div id="content" class="site-content">
