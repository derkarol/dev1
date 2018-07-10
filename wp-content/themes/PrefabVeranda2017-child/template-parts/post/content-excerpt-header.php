<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--	<header class="entry-header">-->
		
		<!-- <O.O> I want the date elswhere Was here before !!! carefull with if -> elsif -->
		
		<?php if ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
			<div class="entry-meta">
				<?php twentyseventeen_edit_link(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( is_front_page() && ! is_home() ) {

			// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.			
		
			the_title( sprintf( '<p class="news-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' );
		} else {
			the_title( sprintf( '<p class="news-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' );
		} ?>
		
		<!-- <O.O> I want the date elswhere under the title-->
		<?php if ( 'post' === get_post_type() ) : ?>
<!--			<div class="news-entry-meta">-->
				<?php
				echo twentyseventeen_time_link();
				twentyseventeen_edit_link();
				?>
<!--			</div> .entry-meta -->
		<?php endif; ?>
		
		
<!--	</header> .entry-header -->

<?php /*?>	<div class="entry-summary">
		
		<!-- <O.O> off for now -->
<!--		<?php the_excerpt(); ?>-->
	</div><!-- .entry-summary -->
<?php */?>
	
</article><!-- #post-## -->
