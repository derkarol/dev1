<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'twentyseventeen' ); ?></button>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',		
	
	) ); ?>
	
	
<?php /*?><?php if ( ! is_page('Clients') ) : ?>	
	<span class="login-right"><p class="login-icon">
			<?php wp_nav_menu( array(
			'theme_location' => 'login',
	
	) ); ?>
		</p></span>
<?php endif; ?><?php */?>



<?php /*?><?php if ( is_page('Clients') ) : ?>	<?php */?>			
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
	
			<?php wp_nav_menu( array(
			'theme_location' => 'login',
			'menu_id'        => 'login-menu',
			'menu_class'	 => 'login-right shadow',
	
	)); ?>
		
		
		
</nav><!-- #site-navigation -->
<?php /*?><?php endif; ?><?php */?>
