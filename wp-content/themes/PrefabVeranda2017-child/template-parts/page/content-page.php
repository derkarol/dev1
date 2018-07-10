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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="noclass" <?php the_field('post-aos_1')?>><!--?<O>O>? same as front page-->
		<?php the_title( '<h2 class="my-entry-title">', '</h2>' ); ?>		
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
		</div>

		<!--?<O>O>? working for side picto in the lower level pages-->

		<div class="svg-img" <?php the_field('svg-aos_1')?>>
			<svg class="my-icon-line" >
			  <use xlink:href="#<?php the_field('svg_id');?>" />
			</svg>
		</div>
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
		
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
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
						'post__in' 	=> [1643], 					//<o.O> !!!!!!!-----to add translation smt not quite as planned hanged-----!!!!!!!
					);
			// query
				$the_query = new WP_Query( $args );
			?>
				<?php 
					$id = get_the_ID();
					if($id == 249 || 1426 || 1432 || 1570 ): ?><?php /*?> <o.O> !!!!!!!-----to add translation ... actually here-----!!!!!!!<?php */?>
					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
<!--
						<div class="">
							<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
								<p class="btn-one" ><?php the_field('btn-more');?></p>
							</a>
						</div>
-->
<!--
						<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
							<button class="bx--btn bx--btn--secondary" type="button"><?php the_field('btn-more');?></button>
						</a>
-->
					<?php endwhile; ?>
			<?php endif; ?>	
			</div><!-- .entry-content -->	
	
</div>
<?php /*?><img src="<?php the_field('thumbnail_1') ?>" /><?php */?>
</article><!-- #post-## -->

