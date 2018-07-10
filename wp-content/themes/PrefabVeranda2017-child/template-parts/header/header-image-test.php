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


				
				
				
				
				
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
 <!--This is for news on the header area hero to compose in css--> 

				
				
				<!--TEST-->
				
	
		

	
				<div class="custom-header-media">
    <div class="slider">
      <svg class="slider__mask" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" width="0" height="0">
        <defs>
          <!-- Slide 1 -->
          <pattern id="bg1" patternUnits="userSpaceOnUse" width="1920" height="1080" viewBox="0 0 1920 1080">
            <image xlink:href="http://prefabveranda.com/wordpress/wp-content/uploads/2017/07/vill-veranda-hybrid-cover-e1500478014581.png" width="100%" height="100%"/>
          </pattern>
          <pattern id="pattern1l" patternUnits="userSpaceOnUse" width="562" height="366" viewBox="0 120 662 366">
            <image xlink:href="http://prefabveranda.com/wordpress/wp-content/uploads/2017/07/vill-veranda-hybrid-cover-e1500478014581.png" width="700px" height="700px"/>
          </pattern>
          <pattern id="pattern1r" patternUnits="userSpaceOnUse" x="365px" width="562" height="366" viewBox="0 100 562 366">
            <image xlink:href="http://prefabveranda.com/wordpress/wp-content/uploads/2017/07/saw.jpg" width="600px" height="600px"/>
          </pattern>
          
          <!-- Slide 2 -->
          <pattern id="bg2" patternUnits="userSpaceOnUse" width="1920" height="1080" viewBox="0 0 1920 1080">
            <image xlink:href="http://prefabveranda.com/wordpress/wp-content/uploads/2017/07/cover-on-scren.jpg" width="100%" height="100%"/>
          </pattern>
          <pattern id="pattern2l" patternUnits="userSpaceOnUse" width="562" height="366" viewBox="0 100 500 300">
            <image xlink:href="http://prefabveranda.com/wordpress/wp-content/uploads/2017/07/cover-on-scren.jpg" width="600px" height="600px"/>
          </pattern>
          <pattern id="pattern2r" patternUnits="userSpaceOnUse" x="365" width="562" height="366" viewBox="200 250 500 300">
            <image xlink:href="http://prefabveranda.com/wordpress/wp-content/uploads/2017/07/sketch-02.png" width="700px" height="700px"/>
          </pattern>
        </defs>
      </svg>

      <div class="slide" id="slide-1">
        <svg class="slide__bg" viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1920" height="1080">
          <rect x="0" y="0" width="1920" height="1080" fill="url(#bg1)" />
        </svg>
        <div class="slide__images">
          <div class="slide__image slide__image--left">
            <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
              <polygon points="342.6,0.7 87.8,365.3 337.6,365.3 592.4,0.7	" fill="url(#pattern1l)"/>
            </svg>
          </div>

          <div class="slide__image slide__image--right">
            <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
              <polygon points="595, 0 340, 365 590, 365 845,0	" fill="url(#pattern1r)"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="slide" id="slide-2">
        <svg class="slide__bg" viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1920" height="1080">
          <rect x="0" y="0" width="1920" height="1080" fill="url(#bg2)" />
        </svg>
        <div class="slide__images">
          <div class="slide__image slide__image--left">
            <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
                           <polygon points="342.6,0.7 87.8,365.3 337.6,365.3 592.4,0.7	" fill="url(#pattern2l)"/>
            </svg>
          </div>

          <div class="slide__image slide__image--right">
            <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
              <polygon points="595, 0 340, 365 590, 365 845,0	" fill="url(#pattern2r)"/>
            </svg>
          </div>
        </div>
      </div>


    <div class="slider__pagination">
<?php /*?>           <?php // Show four most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				?>

		 		<?php if ( $recent_posts->have_posts() ) : ?>

					

						<?php
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					
				<?php endif; ?><?php */?>
      <a href="#slide-1" class="button">Slide 1</a>
      <a href="#slide-2" class="button">Slide 2</a>
    </div>
  </div>
				
				
				
				
				
				
	<div class="custom-header-media">
	
		 <?php the_custom_header_markup(); ?>

	</div>
	
	

	

</div><!-- .custom-header -->
