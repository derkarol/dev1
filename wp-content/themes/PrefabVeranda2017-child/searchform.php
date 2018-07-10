<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div data-search class="bx--search bx--search--sm" role="search">
  <svg class="bx--search-magnifier" width="16" height="16" viewBox="0 0 16 16" fill-rule="evenodd">
    <path d="M6 2c2.2 0 4 1.8 4 4s-1.8 4-4 4-4-1.8-4-4 1.8-4 4-4zm0-2C2.7 0 0 2.7 0 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zM16 13.8L13.8 16l-3.6-3.6 2.2-2.2z"></path>
    <path d="M16 13.8L13.8 16l-3.6-3.6 2.2-2.2z"></path>
  </svg>
  <label id="search-input-label-1" class="bx--label" for="<?php echo $unique_id; ?>">Search</label>
	<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'twentyseventeen' ); ?></span>
  <input class="bx--search-input" type="text" id="<?php echo $unique_id; ?>" role="search" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" aria-labelledby="search-input-label-1"> 
  <svg class="bx--search-close bx--search-close--hidden" width="16" height="16" viewBox="0 0 16 16" fill-rule="evenodd">
	  <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?></span>
    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
  </svg>
</div>
</form>
