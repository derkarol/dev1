<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );

		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>			
		</div><!-- .panel-image -->

	<?php endif; ?>
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>	
				<!--?<*0*>? Show the selected ACF content, yes we are Front page.-->
				<?php 				
		
					// args
					$args = array (						
						'numberposts'	=> -1,
						'orderby'		=> 'menu_order title',	//<o.O> 'meta_value_num' I used this but currrrent method is working better, no randomnes
						'order'    		=> 'ASC',
						'post_parent' 	=> 0,
						'post_type'		=> 'page',
						'meta_key'		=> 'svg_id',
						'post__not_in' 	=> [19, 943, 947] //<o.O> so that I dont get empty home page with picto
						
					);
				
			// query O.O it is adjusted for request that last panek icin doesnt send to blank /link only panel at the bottom, now thanks to conditions it goes directly to relevrnt page OxO
				$the_query = new WP_Query( $args );

				?>
				<?php if( $the_query->have_posts() ): ?>
					<div class="panel-contentTTT icons-panel style:" style="background-image: linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 1.0) ), <?php if( get_field('bg_graphic') ): ?> url(<?php the_field('bg_graphic_1');?>); <?php endif; ?> background-position: 10% 10%; " id="<?php echo get_post()->post_name; ?>">
						<div class="wrap">
							<div class="grid-wrapper column-3 stay-grid">
							<?php while( $the_query->have_posts()) : $the_query->the_post(); 
								 $id = get_the_ID();
								if( $id=119 || $id=943 || $id=947 || $id=1528 ):?>	
								
								<div class="box">										
									<a class="scrool-me" href="<?php echo get_the_permalink(get_the_ID()); ?>">
										<div class="noclass" <?php the_field('svg-aos_1');?>>
											<h3 class="my-entry-title"><?php the_title(); ?></h3>
										</div>									
										<div class="svg-img" <?php the_field('svg-aos_1');?>>
											<svg class="my-icon my-icon-line" >
											  <use xlink:href="#<?php the_field('svg_id');?>" />
											</svg>
										</div>									
									</a>
								</div>
							<?php else: ?>	
								
									<div class="box">										
									<a class="scrool-me" href="#<?php echo get_post()->post_name; ?>">
										<div class="noclass" <?php the_field('svg-aos_1');?>>
											<h3 class="my-entry-title"><?php the_title(); ?></h3>
										</div>
										<div class="svg-img" <?php the_field('svg-aos_1');?>>
											<svg class="my-icon my-icon-line" >
											  <use xlink:href="#<?php the_field('svg_id');?>" />
											</svg>
										</div>
									</a>
								</div>	
								
							<?php endif; endwhile; endif;?>
								
							</div><!-- grid-wrapper column-3 -->							
						</div><!-- .wrap -->						
					</div><!-- .panel-content -->
	

</article><!-- #post-## -->
