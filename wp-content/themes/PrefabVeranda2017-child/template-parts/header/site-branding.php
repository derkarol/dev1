<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<div class="site-branding">

<?php /*?><?php the_custom_logo(); ?><?php */?>

	<div class=" wrap-title">

			<div class="grid-wrapper column-4 loose-grid">
				<?php // Show four most recent posts - <O.O> show one in header area
					$recent_posts = new WP_Query( array(
						'posts_per_page'      => 1,			// <O.O>
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
					) );

					?>		
				<?php //<O.O> for btn in hero header it was, now in product page
				// args
					$args = array (						
						'numberposts'	=> -1,
						'orderby'		=> 'menu_order title',	//<o.O> 'meta_value_num' I used this but currrrent method is working better, no randomnes
						'order'    		=> 'ASC',
						'post_type'		=> 'page',
						'meta_key'		=> 'btn-more',
						'post__in' 	=> [1066], 					//<o.O> !!!!!!!-----to add translation-----!!!!!!!
					);
			// query
				$the_query = new WP_Query( $args );
			?>
				<?php 
					$id = get_the_ID();
					if($id == 19 || 943 || 947): ?>
				
					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<a class="cta-btn" href="<?php echo get_the_permalink(get_the_ID()); ?>"><button class="bx--btn bx--btn--danger--primary" type="button">
							<?php the_field('btn-more');?></button></a>					
					<?php endwhile; ?>
			<?php endif; ?>	
				<div></div>
				<div></div>
				<div></div>
				<div class="site-branding-text col-span-2-3">
					<?php if ( is_front_page() ) : ?>
						<h1 class="site-title"><a href="#content"  rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="#content" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>	
					
					<!-- #CTA-navigation -->
<!--
					<button class="bx--btn bx--btn--primary" type="button" id="CTA-navigation"  aria-label="<?php _e( 'Call To Actions', 'twentyseventeen' ); ?>">	
						<?php wp_nav_menu( array(
							'theme_location' => 'CTA',
							'menu_id'        => 'CTA-menu',	
							'menu_class'	 => 'cta-menu',

						) ); ?>
					</button>
-->
					<!-- #CTA-navigation -->

				</div><!-- .site-branding-text -->
				<div></div>
				<div></div>
					
				
					<?php			
							while ( $recent_posts->have_posts() ) : $recent_posts->the_post();

							if ( has_post_thumbnail()) {
							$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
								echo '
								<div class="col-4 news-wrapper">	
										<a href="' . get_the_permalink(get_the_ID()) . '";>
											<div class="news-image-bgCANCEL">
												<div class="of-hidden">
														<div class="news-image" style="background-image: url(' . $thumbnail_image_url[0] . '" title="' . the_title_attribute('echo=0') . '">	
														</div>		
												</div>
											</div>
										</a>
										<a href="' . get_the_permalink(get_the_ID()) . '";>
											<h3>
												'. get_the_title (get_option( 'page_for_posts' )) .'
											</h3>
										</a>								
										<div class=" ">';
											echo '<span class="recent-posts" >';
											get_template_part( 'template-parts/post/content', 'excerpt-header' );
											echo '</span> 
										</div>
								</div>' ;
						 }
							endwhile;
								wp_reset_postdata();
						?>
				

					<!--			<a href="#content" class="scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>-->


					<div><!-- <O.O> extra for scroll down arrow... And its on row 2 but pading pushes it up as it was on row 1-->
						<a class="center" href="#content" >
							<span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span>
							<div class="arrow scroll-down">
							</div>			
						</a>
					</div>
				
			</div><!--grid-->	
		</div><!-- .wrap title-->
	
</div><!-- .site-branding 
<img src="' . $thumbnail_image_url[0] . '" title="' . the_title_attribute('echo=0') . '"; class="news-image" />
-->
