<?php

/**
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @author     Showthemes LLC
 * @copyright  Copyright (c) 2017, Showthemes LLC
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Singleton class for launching the theme and setup configuration.
 *
 * @since  1.0.0
 * @access public
 */
final class Fudge_Lite_Theme {

    /**
     * Directory path to the theme folder.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $dir_path = '';

    /**
     * Directory URI to the theme folder.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $dir_uri = '';

    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {
	static $instance = null;

	if (is_null($instance)) {
	    $instance = new self;
	    $instance->setup();
	    $instance->includes();
	    $instance->setup_actions();
	}

	return $instance;
    }

    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {

    }

    /**
     * Initial theme setup.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup() {
	$this->dir_path	 = trailingslashit(get_template_directory());
	$this->dir_uri	 = trailingslashit(get_template_directory_uri());
    }

    /**
     * Loads include and admin files for the plugin.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function includes() {

	// Load the plugin activation component
	require_once($this->dir_path . 'inc/lib/class-tgm-plugin-activation.php');

	// Load theme includes
	require_once($this->dir_path . 'inc/functions/functions-helpers.php');
	require_once($this->dir_path . 'inc/functions/functions-customizer.php');
	require_once($this->dir_path . 'inc/functions/functions-ajax.php');
	require_once($this->dir_path . 'inc/customize/trt-customize-pro/class-customize.php');
	require_once($this->dir_path . 'inc/widgets/widget-event-info.php');
    }

    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {

	// Theme setup.
	add_action('after_setup_theme', array($this, 'theme_setup'), 5);

	// Register menus.
	add_action('init', array($this, 'register_menus'));

	// Register image sizes.
	add_action('init', array($this, 'register_image_sizes'));

	// Register sidebars.
	add_action('widgets_init', array($this, 'register_sidebars'));

	// Register scripts, styles, and fonts.
	add_action('wp_enqueue_scripts', array($this, 'register_scripts'), 0);

	// Register admin editor style
	add_action('admin_init', array($this, 'register_admin_editor_style'), 0);

	// Register admin scripts and styles
	add_action('admin_enqueue_scripts', array($this, 'register_admin_scripts'));
    }

    /**
     * The theme setup function.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function theme_setup() {

	// Load text domain
	load_theme_textdomain('fudge-lite', $this->dir_path . 'languages');

	// Add theme supports
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-logo', array(
	    'height' => 93,
	    'width'	 => 304,
	));
	add_theme_support('custom-header', array(
	    'default-image'	 => $this->dir_uri . 'images/hero.jpg',
	    'width'		 => 1600,
	    'height'	 => 724,
	    'header-text'	 => false
	));
	add_theme_support('custom-background', array(
	    'default-color' => '#ffffff',
	));
	$GLOBALS['content_width'] = apply_filters('fudge_lite_content_width', 900);
    }

    /**
     * Registers nav menus.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register_menus() {
	register_nav_menus(
		array(
		    'primary'	 => __('Navigation Menu', 'fudge-lite'),
		    'social'	 => __('Social', 'fudge-lite')
		)
	);
    }

    /**
     * Registers image sizes.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register_image_sizes() {
	set_post_thumbnail_size(222, 222, true);
	add_image_size('fudge-lite-blog', 306, 306, true);
    }

    /**
     * Registers sidebars.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register_sidebars() {
	register_sidebar(array(
	    'id'		 => 'sidebar-1',
	    'name'		 => __('Home Template Sidebar', 'fudge-lite'),
	    'before_widget'	 => '<section id="%1$s" class="widget %2$s">',
	    'after_widget'	 => '</section>',
	    'before_title'	 => '<h2 class="widget-title">',
	    'after_title'	 => '</h2>',
	));
    }

    /**
     * Enqueues scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register_scripts() {

	// Enqueue scripts.
	wp_enqueue_script('fudge-lite-ie', $this->dir_uri . 'js/ie.js', array('jquery'), false, true);
	wp_enqueue_script('fudge-lite-device', $this->dir_uri . 'js/device.js', array('jquery'), false, true);
	wp_enqueue_script('fudge-lite-plugins', $this->dir_uri . 'js/plugins.js', false, false, true);
	wp_enqueue_script('fudge-lite-modernizr', $this->dir_uri . 'js/libs/modernizr-2.5.0.min.js', false, false, false);
	wp_enqueue_script('fudge-lite-placeholder', $this->dir_uri . 'js/jquery.placeholder.js', array('jquery'), false, true);
	wp_enqueue_script('fudge-lite-menu', $this->dir_uri . 'js/menu.js', array('jquery'), false, true);

	// Enqueue fonts.
	wp_enqueue_style('fudge-lite-fonts', fudge_lite_fonts_url(), array(), null);

	// Enqueue palette style.
	wp_enqueue_style('fudge-lite-color-scheme', $this->dir_uri . 'css/schemes/' . get_theme_mod('color_palette', 'default') . '.css');

	// Enqueue child theme style.
	if (is_child_theme()) {
	    wp_enqueue_style('fudge-lite-parent-style', $this->dir_uri . 'style.css');
	}

	// Enqueue main theme style.
	wp_enqueue_style('fudge-lite-style', get_stylesheet_uri());

	// Add conditional tags for IE.
	wp_script_add_data('fudge-lite-ie', 'conditional', 'lt IE 9');

	// Enqueue comments script.
	if (is_singular()) {
	    wp_enqueue_script('comment-reply');
	}

	// Eenqueue scripts for tempate-home.php page template
	if (is_page_template('template-home.php')) {
	    wp_enqueue_script('fudge-lite-script', $this->dir_uri . 'js/script.js', array('jquery'), false, true);
	    wp_enqueue_script('fudge-lite-home', $this->dir_uri . 'js/home.js', array('jquery'), false, true);
	    // Localized data
	    wp_localize_script('fudge-lite-script', 'fudge_lite_script_vars', array(
		'closewindow'		 => esc_html__('Close Window', 'fudge-lite'),
		'location'		 => esc_html__('LOCATION:', 'fudge-lite'),
		'date'			 => esc_html__('DATE:', 'fudge-lite'),
		'time'			 => esc_html__('TIME:', 'fudge-lite'),
		'company'		 => esc_html__('Company:', 'fudge-lite'),
		'shortbio'		 => esc_html__('Short Bio:', 'fudge-lite'),
		'website'		 => esc_html__('Website:', 'fudge-lite'),
		'twitter'		 => esc_html__('Twitter:', 'fudge-lite'),
		'sessions'		 => esc_html__('Sessions', 'fudge-lite'),
		'editlink'		 => esc_html__('Edit', 'fudge-lite'),
		'contact_fieldmissing'	 => esc_html__('This field must be filled out.', 'fudge-lite'),
		'contact_invalidemail'	 => esc_html__('Sorry! You\'ve entered an invalid email.', 'fudge-lite'),
		'contact_mailok'	 => esc_html__('<strong>Thanks!</strong> Your email has been delivered.', 'fudge-lite'),
		'contact_mailko'	 => esc_html__('<strong>Sorry!</strong> Your email has not been delivered.', 'fudge-lite'),
		'ajaxurl'		 => esc_url_raw(admin_url('admin-ajax.php')),
		'schedule_limit'	 => absint(fudge_lite_get_schedule_limit()),
		'media_limit'		 => absint(fudge_lite_get_media_limit()),
		'speakers_limit'	 => absint(fudge_lite_get_speakers_limit()),
		'mobile_width'		 => 400
		    )
	    );
	}
    }

    /**
     * Registers admin editor style.
     *
     * @since  1.2.0
     * @access public
     * @return void
     */
    public function register_admin_editor_style($hook) {
	add_editor_style('css/schemes/default.css');
    }

    /**
     * Registers admin scripts.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register_admin_scripts($hook) {
	global $post_type;

	// Enqueue scripts and styles for datetime component in session post type edit page
	if (in_array($hook, array('post.php', 'post-new.php')) && $post_type == 'session') {
	    wp_enqueue_script('jquery-ui-datepicker');
	    wp_enqueue_style('fudge-lite-jquery-ui-datepicker', $this->dir_uri . 'css/datepicker/smoothness/jquery-ui-1.10.3.custom.min.css');
	}
    }

}

/**
 * Gets the instance of the `Fudge_Lite` class.
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function fudge_lite_theme() {
    return Fudge_Lite_Theme::get_instance();
}

// Let's roll!
fudge_lite_theme();