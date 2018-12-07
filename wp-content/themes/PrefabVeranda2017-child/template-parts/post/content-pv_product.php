<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<div class="wrap">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-headerTT">
					<div class="noclass" <?php the_field('post-aos_1'); //?<O>O>? same as front page?>>
					<?php the_title( '<h2 class="my-entry-title">', '</h2>' ); ?>		
					<?php twentyseventeen_edit_link( get_the_ID() ); ?>
					</div>
				</header><!-- .entry-header -->

				<?php //<O.O> for background
						$args = array (						
						'numberposts'	=> -1,
						'orderby'		=> 'meta_value_num',	//<o.O> 'meta_value_num' I used this but currrrent method is working better, no randomnes
						'order'    		=> 'ASC',						
						'post_type'		=> 'page',
						'meta_key'		=> 'img',
						'post__not_in' 	=> [2240, 1066, 947] //<o.O> so that I dont get empty home page with picto						
					);

				// query
					$the_query = new WP_Query( $args );
				?>
				<?php if( $the_query->have_posts() ): ?>
							
							
				<div class="model-name grid-wrapper product-board column-3">
					<div class="model-name space-t-b"  >
						<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
						<?php the_title( '<h4 class="my-entry-title" >', '</h4>' ); ?>
							<?php the_content( sprintf( '<h2>Where are we?</h2>' ,
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()	
			) ); ?>
						</a>
						<div class="model-name space-t-b" <?php the_field('graphic-aos_1');?>>
							<?php if( get_field('img') ): ?>
							<img class="product-img" src="<?php the_field('img');?>"/>
							<?php endif; ?>	
						</div>
					</div>
					

					<ul class="list-no-style col-span-2-3 grid-wrapper column-4 product-board space-t-b space-l" >
						
						<li>
							<p><?php _e( 'Dimensions', 'twenty-seventeen-child' )?></p>
						</li>
						<li class="grid-wrapper column-4">
							<p><?php _e( 'Length', 'twenty-seventeen-child' )?></p>
							<p><?php the_field('dimensions_L'); ?></p>
							<p><?php _e( 'Depth', 'twenty-seventeen-child' )?></p>
							<p><?php the_field('dimensions_PR'); ?></p>
						</li>

						<li>
							<p><?php _e( 'Colour', 'twenty-seventeen-child' )?></p>
						</li>
						<li class="grid-wrapper column-4 ">
							<p class="row-span-2 product-colour" style="background-color: rgb(<?php the_field('colour_val'); ?>)"></p>
							<p><?php the_field('colour'); ?></p>

						</li>
						<li>
							<p><?php _e( 'Windows/Doors', 'twenty-seventeen-child' )?></p>
						</li>
						<li class="grid-wrapper column-4 ">	
							<p><?php _e( 'Types', 'twenty-seventeen-child' )?></p>
							<p><?php the_field('chassis'); ?></p>
						</li>						
						<li>
							<p><?php _e( 'Roof structure', 'twenty-seventeen-child' )?></p>
						</li>
						<li class="grid-wrapper column-4 ">
							<p><?php _e( 'Flat roof', 'twenty-seventeen-child' )?></p>
							<p><?php the_field('roof_structure'); ?></p>
						</li>
						<li>
							<p> <?php _e( 'Scheduled for', 'twenty-seventeen-child' )?></p>
						</li>
						<li class="grid-wrapper column-4 ">
							<p><?php _e( 'Required glazing', 'twenty-seventeen-child' )?></p>
							<p><?php the_field('scheduled_for'); ?></p>

						</li>
						<li>
							<p><?php _e( 'Our price', 'twenty-seventeen-child' )?></p>
						</li>
						<?php //<O.O> wired structre working with :nth-child(2n) – reason is
									$args = array (						
										'numberposts'	=> -1,
										'order'    		=> 'ASC',
										'post_type'		=> 'page',
										'meta_key'		=> 'btn-more', //<o.o> think i must use one that is actually in the refering post/page not one i fetch to que... end up using 2 different args and quries, one for proper link and secend for fetching fields of tooltips
										'post__in' 	=> [119], 					
									);
							// query
								$the_query = new WP_Query( $args );
							?>
								<?php 
									$id = get_the_ID();
									if($id == 119 || 1478 || 1483 || 1594): ?>
						<li class="grid-wrapper column-4 ">
							<p> <?php _e( 'Calculated for', 'twenty-seventeen-child' )?></br> 
						<?php _e( '*on production', 'twenty-seventeen-child' )?> </p>

							<div class="grid-wrapper pv-expand column-4 col-span-2-4">
								<span>"Eco" </span>
								<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<a class="float-right col-span-2-4 grid-wrapper reset-gap column-4" href="<?php echo get_the_permalink(get_the_ID()); ?>">
										<?php //<O.O> wired structre working with :nth-child(2n) – reason is
											$args2 = array (						
												'numberposts'	=> -1,
												'order'    		=> 'ASC',
												'post_type'		=> 'page',
												'meta_key'		=> 'our_price_btn', //<o.o> think i must use one that is actually in the refering post/page not one i fetch to que
												'post__in' 	=> [2298], 					
												);
										// query
											$the_query2 = new WP_Query( $args2 );
										?>
										<?php while( $the_query2->have_posts() ) : $the_query2->the_post(); ?>
										<div class="tooltip col-span-3">
											<span><?php the_field('our_price_btn'); ?> </span>
											<span class="tooltiptext"><?php the_field('our_price_tooltip'); ?></span>
										</div>
										<div><button class="bx--btn bx--btn--primary bx--btn--sm float-right"  type="button">></button></div>
									</a>

								<span>"Comfort" </span>							
									<a class="float-right col-span-2-4 grid-wrapper reset-gap column-4" href="<?php echo get_the_permalink(get_the_ID()); ?>">
										<div class="tooltip col-span-3">
											<span><?php the_field('our_price_btn'); ?></span>
											<span class="tooltiptext"><?php the_field('our_price_tooltip'); ?></span>
										</div>
										<div><button class="bx--btn bx--btn--primary bx--btn--sm float-right"  type="button">></button></div>
									</a>
								<?php endwhile; ?>
							</div> 

						</li>

								<?php endwhile; ?>
						<?php endif; ?>	
					</ul>
								
				
				</div>	

				<?php endif; ?>	
	
	</article><!-- #post-## -->
</div>								