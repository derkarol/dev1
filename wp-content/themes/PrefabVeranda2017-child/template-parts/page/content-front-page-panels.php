<?php
/**
 * Template part for displaying pages on front page <0.0>
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php 
	 $id = get_the_ID();
	if (($id=19 || $id=943 || $id=947) && has_post_thumbnail() ) ://!!<O.O>!!so ok this displays featured image!!!!!
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>
	<?php endif; ?><!-- Start for panel-image extra staff fields ?<O.o>? -->
	
		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			
				<div class=" grid-wrapper column-3 loose-grid">
				
					<div class="panel-graphic-tab" <?php the_field('graphic-aos_1');?> >
						<div>
							<p class="align-center"> <?php the_field('graphic_1_desc');?> <?php the_field('highlight_1_desc');?></p>
						</div>
						<div class="center " <?php the_field('graphic-aos_1');?>> 
<!--							 style="background-image: url(<?php the_field('graphic_1');?>);">-->
							<img class="panel-graphic" src="<?php the_field('graphic_1');?>"/>
						</div>
					</div>
					<div class="panel-graphic-tab" <?php the_field('graphic-aos_2');?> >
						<div> 
							<p class="align-center"> <?php the_field('graphic_2_desc');?> <?php the_field('highlight_2_desc');?></p>
						</div>
						<div class="center of-hidden" <?php the_field('graphic-aos_2');?>> 
<!--							 style="background-image: url(<?php the_field('graphic_2');?>);">-->
							<img class="panel-graphic" src="<?php the_field('graphic_2');?>"/>
						</div>
					</div>	
					<div class="panel-graphic-tab" <?php the_field('graphic-aos_3');?> >
						<div>
							<p class="align-center"> <?php the_field('graphic_3_desc');?> <?php the_field('highlight_3_desc');?></p>
						</div>
						<div class="center of-hidden" <?php the_field('graphic-aos_3');?>> 
<!--							 style="background-image: url(<?php the_field('graphic_3');?>);">-->
							<img class="panel-graphic" src="<?php the_field('graphic_3');?>"/>
						</div>
					</div>	
				
				</div><!-- END graphic fields ?<O.o>? -->
			
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio / 2 ); ?>%"></div>
		</div><!-- .panel-image -->


				<?php //<O.O> for background
					$args = array (						
						'numberposts'	=> -1,
						'orderby'		=> 'menu_order title',	//<o.O> 'meta_value_num' I used this but curent method is working better, no randomnes
						'order'    		=> 'ASC',
						'post_parent' 	=> 0,
						'post_type'		=> 'page',
//						'meta_key'		=> 'graphic',
						'post__not_in' 	=> [19, 943, 947], //<o.O> so that I dont get empty home page with picto
						'met-query'		=> array(
								'relation' => 'OR',//<o.O> is used for displaying either of choosen media
									array(
								'key'		=> 'graphic',
								),
									array(
								'key'		=> 'media_1',
								)
							)										
					);
			
			// query
				$the_query = new WP_Query( $args );
			?>
			<?php if( $the_query->have_posts() ): ?>
					<div class="panel-content bg-graphic" style="background-image: linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 1.0) ), <?php if( get_field('bg_graphic_1') ): ?> url(<?php the_field('bg_graphic_1');?>); <?php endif; ?> background-position: 10% 10%;" id="<?php echo get_post()->post_name; ?>">	
						
						<div class="wrap my-hidden" >
								<div class="boxx" <?php the_field('graphic-aos');?> >
									<?php if( get_field('graphic') ): ?>
										<img class="pullUp" src="<?php the_field('graphic');?>"/>
									<?php elseif( get_field('media_1') ): ?>
										<iframe class="pullUp" width="560" height="315" src="<?php the_field('media_1');?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									<?php endif; ?>
								</div>			
						<!--?<O>O>? Like template name sugest it displays picto on main site panels of rest of the pages-->		

						<header class="entry-header">		

						<!-- To customise frontpage ?<O.o>? -->				
								<div class="noclass"  <?php the_field('title-aos_1');?>>
									<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
									<?php the_title( '<h2 class="my-entry-title" >', '</h2>' ); ?>
									</a>
								</div>				
								<div class="svg-img" <?php the_field('svg-aos_1');?>>
									<svg class="my-icon my-icon-line" >
									  <use xlink:href="#<?php the_field('svg_id');?>" />
									</svg>
								</div>
							<!--?<O>O>? I tried to achve backround with svg graphic to be customable allong sections but inline style svg magic is too much...-->
							<?php /*?>					<div class="bg-graphic" style="background-image: linear-gradient(rgba(255, 255, 255, 0.45), rgba(255, 255, 255, 1.0) ), url(<?php the_field('bg_graphic_1');?>);" <?php if( get_field('bg_graphic_1') ): ?> <?php endif; ?> id="<?php echo get_post()->post_name;?>">
								</div><?php */?>

							<!--?<O>O>? -->

						</header><!-- .entry-header -->	
						<?php endif; ?>	
							<div class="entry-content" <?php the_field('post-aos_1');?>>
						<?php
						// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int). I made  1 one show ?<O.O>?
						if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>				

							<?php // Show four most recent posts.
							$recent_posts = new WP_Query( array(
								'posts_per_page'      => 3,// <O.O>
								'post_status'         => 'publish',
								'ignore_sticky_posts' => true,
								'no_found_rows'       => true,
							) );
							?>
							<?php if ( $recent_posts->have_posts() ) : ?>
								<div class="recent-posts"  <?php the_field('post-aos_1');?>>
									<?php
										while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
											get_template_part( 'template-parts/post/content', 'excerpt' );
										endwhile;
										wp_reset_postdata();
										?>
							<?php endif; ?>
						<?php endif; ?>
								<!--<*O*> -->					
							<?php
								/* translators: %s: Name of current post */
								the_excerpt( sprintf(
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
									get_the_title()
								) );
							?>	
					</div> <!--.recent-posts -->
			</div><!-- .entry-content -->	
		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
