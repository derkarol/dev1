<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<div class="custom-header">
	
				
	<div class="custom-header-media">
	
		 <?php /*?><?php the_custom_header_markup(); ?>
<?php */?>
		
		<!-- !!!!!!!!!!
	<O.O>Imoprtant part for making whole headear with call to action, news sliding text etc.- in site branding.!!! -->
		
		<?php if ( get_header_image() ) : ?>
    <div id="site-header" class="panel-image reset-blend" height="<?php echo get_custom_header()->height; ?>" style="background-image: url(<?php header_image(); ?>);  ">

    </div>
	<?php endif; ?>

	<!-- !!!!!!!!!!!!!!!!!!!!!	-->
	</div>
	
	
<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
	

</div><!-- .custom-header -->
