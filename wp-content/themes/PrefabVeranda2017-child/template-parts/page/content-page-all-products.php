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
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-headerTT">
					<div class="noclass" <?php the_field('post-aos_1')?>><!--?<O>O>? same as front page-->
					<?php the_title( '<h2 class="my-entry-title">', '</h2>' ); ?>		
					<?php twentyseventeen_edit_link( get_the_ID() ); ?>
					</div>
				</header><!-- .entry-header -->

				<div data-notification class="bx--inline-notification bx--inline-notification--info" aria-live="polite">
					  <div class="bx--inline-notification__details">
						<svg class="bx--inline-notification__icon" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
						  <path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1-3V7H7v6h2zM8 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" fill-rule="evenodd" />
						</svg>
						<div class="bx--inline-notification__text-wrapper">
						  <p class="bx--inline-notification__title">B2B</p>
						  <p class="bx--inline-notification__subtitle"><?php _e( 'You can see the prices by entering the customer area, if you are interested please fill in contact form! We only deliver B2B not to private customer.', 'twenty-seventeen-child' )?></p>
						</div>
					  </div>
					  <button data-notification-btn class="bx--inline-notification__close-button" type="button">
						
						</svg>
					  </button>
					</div>

	
<div class="model-name grid-wrapper product-board column-3">
					
				<?php //<O.O> for background
						$args = array (						
						'numberposts'	=> -1,
						'orderby'		=> 'menu_order title',	//<o.O> 'meta_value_num' I used this but currrrent method is working better, no randomnes
						'order'    		=> 'ASC',						
						'post_type'		=> 'page',
						'meta_key'		=> 'img',
						'post__not_in' 	=> [2240, 1066, 947] //<o.O> sfix of premade meta-in some pages						
					);

				// query
					$the_query = new WP_Query( $args );
				?>
				<?php if( $the_query->have_posts() ): ?>
						
				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>	
		
					
						
							<div class="model-name space-t-b"  >
								<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
								<?php the_title( '<h4 class="my-entry-title" >', '</h4>' ); ?>
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
									<p><?php _e( 'Roof', 'twenty-seventeen-child' )?></p>
								</li>
								<li class="grid-wrapper column-4 ">
									<p><?php _e( 'Roof structure', 'twenty-seventeen-child' )?></p>
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
									$args3 = array (						
										'numberposts'	=> -1,
										'order'    		=> 'ASC',
										'post_type'		=> 'page',
										'meta_key'		=> 'btn-more', //<o.o> think i must use one that is actually in the refering post/page not one i fetch to que... end up using 2 different args and quries, one for proper link and secend for fetching fields of tooltips
										'post__in' 	=> [119], 					
									);
							// query
								$the_query3 = new WP_Query( $args3 );
							?>
								<?php 
									$id3 = get_the_ID();
									if($id3 == 119 || 1478 || 1483 || 1594): ?>
								<li class="grid-wrapper column-4">
									<p> <?php _e( 'Calculated for', 'twenty-seventeen-child' )?></br> 
										<?php _e( '*on production', 'twenty-seventeen-child' )?> </p>

									<div class="grid-wrapper pv-expand product-board column-4 col-span-2-4">
										<span>"Eco" </span>
										<?php while( $the_query3->have_posts() ) : $the_query3->the_post(); ?>
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
												<div>
													<button class="bx--btn bx--btn--primary bx--btn--sm float-right"  type="button">></button>
												</div>
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
									<div></div>
									

								</li>

								<?php endwhile;  wp_reset_postdata();?>
						<?php endif; ?>	

							</ul>	
						

							<?php endwhile; ?>
				
						<?php endif; ?>	
	<!--The loop for custom post not ACP  [-.-]  -->
						<?php
							$args4 = array( 'post_type' => 'pv_product', 'posts_per_page' => 10 );
							$loop = new WP_Query( $args4 );
							while ( $loop->have_posts() ) : $loop->the_post();
							  ?>

							<div class="model-name space-t-b"  >
								<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
								<?php the_title( '<h4 class="my-entry-title" >', '</h4>' ); ?>
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
									<p><?php _e( 'Roof', 'twenty-seventeen-child' )?></p>
								</li>
								<li class="grid-wrapper column-4 ">
									<p><?php _e( 'Roof structure', 'twenty-seventeen-child' )?></p>
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
									$args3 = array (						
										'numberposts'	=> -1,
										'order'    		=> 'ASC',
										'post_type'		=> 'page',
										'meta_key'		=> 'btn-more', //<o.o> think i must use one that is actually in the refering post/page not one i fetch to que... end up using 2 different args and quries, one for proper link and secend for fetching fields of tooltips
										'post__in' 	=> [119], 					
									);
							// query
								$the_query3 = new WP_Query( $args3 );
							?>
								<?php 
									$id3 = get_the_ID();
									if($id3 == 119 || 1478 || 1483 || 1594): ?>
								<li class="grid-wrapper column-4">
									<p> <?php _e( 'Calculated for', 'twenty-seventeen-child' )?></br> 
										<?php _e( '*on production', 'twenty-seventeen-child' )?> </p>

									<div class="grid-wrapper pv-expand product-board column-4 col-span-2-4">
										
										<?php while( $the_query3->have_posts() ) : $the_query3->the_post(); ?>
											
												
										<span>"Eco" </span>
										<a class="float-right col-span-2-4 grid-wrapper reset-gap column-4" href="<?php echo get_the_permalink(get_the_ID()); ?>">
												<div class="tooltip col-span-3">
													<span><?php the_field('our_price_btn'); ?> </span>
													<span class="tooltiptext"><?php the_field('our_price_tooltip'); ?></span>
												</div>
												<div>
													<button class="bx--btn bx--btn--primary bx--btn--sm float-right"  type="button"> > </button>
												</div>
											</a>

										<span>"Comfort" </span>							
											<a class="float-right col-span-2-4 grid-wrapper reset-gap column-4" href="<?php echo get_the_permalink(get_the_ID()); ?>">
												<div class="tooltip col-span-3">
													<span><?php the_field('our_price_btn'); ?></span>
													<span class="tooltiptext"><?php the_field('our_price_tooltip'); ?></span>
												</div>
												<div>
													<button class="bx--btn bx--btn--primary bx--btn--sm float-right"  type="button">></button>
												</div>
											</a>
										
									</div> 
									<div></div>
									

								</li>

								<?php endwhile;  wp_reset_postdata();?>
						<?php endif; ?>	

							</ul>	



			<?php endwhile;
						?>
	</div> <!--.grid-wrapper -->
	<?php /*?><img src="<?php the_field('thumbnail_1') ?>" /><?php */?>
	</article><!-- #post-## -->
</div>
									
						






