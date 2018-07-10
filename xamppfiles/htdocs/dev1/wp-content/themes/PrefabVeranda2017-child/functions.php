<?php

function my_theme_enqueue_styles() {   	
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function add_theme_styles() { 
	wp_enqueue_style( 'aos', get_stylesheet_directory_uri() . '/css/aos.css', array(), '1.1', 'all');
	wp_enqueue_style( 'carbon', get_stylesheet_directory_uri() . '/css/styles.css', array(), '1.2', 'all');
}

add_action( 'wp_enqueue_scripts', 'add_theme_styles' );

//?<O.O>? my custom scripts enquing...
function wpb_adding_scripts() {
wp_register_script('my_amazing', get_stylesheet_directory_uri(). '/assets/js/script.js', array('jquery'),'3.2.1', true);
wp_enqueue_script('my_amazing');
wp_register_script('aos-script', get_stylesheet_directory_uri(). '/assets/js/aos.js', array('jquery'),'3.2.1', true);
wp_enqueue_script('aos-script');
	
	//?<O.O>? to adjuct to where it scrools
	if( is_front_page() ){
    wp_register_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
		wp_enqueue_script('twentyseventeen-global');
	  }
	
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  

//for S front page <0.0>

function twentyseventeen_childtheme_front_page_sections() {
    return 6;
}
add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin( $show ) {
    
    return current_user_can('manage_options');
    
}

add_filter( 'twentyseventeen_front_page_sections', 'twentyseventeen_childtheme_front_page_sections' );

//thumb-navigation, not used 

register_nav_menus(array(
'login' => __('Login Button')
));

register_nav_menus(array(
'CTA' => __('CallToAction Button')
));
 
//?<O.O>? making supprt for header media does it changeged it?
add_theme_support( 'custom-header', array(
 'video' => true,
) );

// Excerpt customization https://wordpress.stackexchange.com/questions/141125/allow-html-in-excerpt/141136#141136 <0.0>

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="bx--link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' ' . $link;
}

add_filter('excerpt_more', 'new_excerpt_more');

function child_theme_setup() {
	// override parent theme's 'more' text for excerpts
	remove_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' ); 
//	remove_filter( 'get_the_excerpt', 'twentyseventeen_custom_excerpt_more' );
}
add_action( 'after_setup_theme', 'child_theme_setup' );

// Begin Excerpt Code
function wpse_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>'; 
    }

if ( ! function_exists( 'wpse0001_custom_wp_trim_excerpt' ) ) : 

    function wpse0001_custom_wp_trim_excerpt($wpse0001_excerpt) {
        global $post;
        $raw_excerpt = $wpse0001_excerpt;
        if ( '' == $wpse0001_excerpt ) {

            $wpse0001_excerpt = get_the_content('');
            $wpse0001_excerpt = strip_shortcodes( $wpse0001_excerpt );
            $wpse0001_excerpt = apply_filters('the_content', $wpse0001_excerpt);
            $wpse0001_excerpt = substr( $wpse0001_excerpt, 0, strpos( $wpse0001_excerpt, '</p>' ) + 4 );
            $wpse0001_excerpt = str_replace(']]>', ']]&gt;', $wpse0001_excerpt);
			
//			sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'pietergoosen' ), get_the_title()) . '</a>'; 
//            $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

            $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( ' %s &nbsp;&raquo;', ' ' ), get_the_title()) . '</a>'; 
            $excerpt_more = apply_filters(' ', ' ' . $excerpt_end); 

            //$pos = strrpos($wpse0001_excerpt, '</');
            //if ($pos !== false)
            // Inside last HTML tag
            //$wpse0001_excerpt = substr_replace($wpse0001_excerpt, $excerpt_end, $pos, 0);
            //else
            // After the content
            $wpse0001_excerpt .= $excerpt_more;

            return $wpse0001_excerpt;

        }
        return apply_filters('wpse0001_custom_wp_trim_excerpt', $wpse0001_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse0001_custom_wp_trim_excerpt');



// End Excerpt Code

//?<O.O>? for making header as according to designn...

//get top ancestor, used I changed >post_parent to post_child and works for sub sub pages I dont use it any more...footer to list all maybe?

function get_top_ancestor_id() {
	
	global $post;
	
	if ($post->post_child) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
};

//?<O.O>? attempt for customize svg frome here..
function childtheme_include_svg_icons() {
  // Define SVG sprite file.
  $custom_svg_icons = get_theme_file_path( '/assets/images/svg-custom-icons.svg' );

  // If it exists, include it.
  if ( file_exists( $custom_svg_icons ) ) {
    require_once( $custom_svg_icons );
  }
}
add_action( 'wp_footer', 'childtheme_include_svg_icons', 99999 );

function childtheme_social_links_icons( $social_links_icons ) {
  $social_links_icons['kickstarter.com'] = 'kickstarter';
  return $social_links_icons;
}
add_filter( 'twentyseventeen_social_links_icons', 'childtheme_social_links_icons' );



/**
  * Set up My Child Theme's textdomain.
  * FFS 3 days <.F.> and neede textdomai of child theme, and pas it as secend par  FFFF
  * Declare textdomain for this child theme.
  * Translations can be added to the /languages/ directory.
  */
function twentyseventeen_child_theme_setup() {
    load_child_theme_textdomain( 'twenty-seventeen-child', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'twentyseventeen_child_theme_setup' );



//add_action( 'after_setup_theme', 'theme_review_child_domain');

function theme_review_child_domain() {
//	load_theme_textdomain( 'twentyseventeen', get_stylesheet_directory() . '/languages' );
    load_child_theme_textdomain( 'twentyseventeen', get_stylesheet_directory() . '/languages' );
}



/**
 * Deal with the custom RSS templates.
 *An example of using a template for the default RSS2 feed as well as a custom post type named "photos":
 */
/*function my_custom_rss() {

	if ( 'photos' === get_query_var( 'post_type' ) ) {
		get_template_part( 'feed', 'photos' );
	} else {
		get_template_part( 'feed', 'rss2' );
	}
}
remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'my_custom_rss', 10, 1 );
*/
add_action( 'after_setup_theme', 'my_rss_template' );
/**
 * Register custom RSS template.
 */
function my_rss_template() {
	add_feed( 'MostRecent', 'my_custom_rss_render' );
	add_feed( 'SecendPosts', 'my_custom_rss_render2' );
	add_feed( 'ThirdPosts', 'my_custom_rss_render3' );
}

/**
 * Custom RSS template callback.
 */
function my_custom_rss_render() {
	get_template_part( 'feed', 'MostRecent' );
}
function my_custom_rss_render2() {
	get_template_part( 'feed', 'SecendPosts' );
}
function my_custom_rss_render3() {
	get_template_part( 'feed', 'ThirdPosts' );
}

/**
 * Register custom pv-product Post Type. <o.o>
 */


function create_post_type() {
  register_post_type( 'pv_product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'create_post_type' );

/**
 * Register polylang setup for pv-product Post Type.<o.o> somhow check box on setings for Languages didnt triger [-.-]
 */
add_filter( 'pll_get_post_types', 'add_cpt_to_pll', 10, 2 );
 
function add_cpt_to_pll( $post_types, $is_settings ) {
    if ( $is_settings ) {
        // hides 'pv_product' from the list of custom post types in Polylang settings
        unset( $post_types['pv_product'] );
    } else {
        // enables language and translation management for 'pv_product'
        $post_types['pv_product'] = 'pv_product';
    }
    return $post_types;
}

?>