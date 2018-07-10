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
// Customizer fields
add_action('customize_register', 'fudge_lite_customize_register');

/**
 * Adds theme options as customizer fields.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function fudge_lite_customize_register($wp_customize) {

    $wp_customize->add_section('fudge_lite_theme_options', array(
	'title'		 => __('Theme Options', 'fudge-lite'),
	'priority'	 => 130
    ));

    // Color Palette
    $wp_customize->add_setting('color_palette', array(
	'default'		 => 'default',
	'sanitize_callback'	 => 'fudge_lite_sanitize_color_scheme'
    ));

    $wp_customize->add_control('fudge_lite_color_palette', array(
	'label'		 => __('Color Palette', 'fudge-lite'),
	'section'	 => 'fudge_lite_theme_options',
	'settings'	 => 'color_palette',
	'type'		 => 'select',
	'choices'	 => array(
	    'default'	 => __('Default', 'fudge-lite'),
	    'corporate-1'	 => __('Corporate 1', 'fudge-lite'),
	    'corporate-2'	 => __('Corporate 2', 'fudge-lite'),
	    'fluo-1'	 => __('Fluo 1', 'fudge-lite'),
	    'fluo-2'	 => __('Fluo 2', 'fudge-lite'),
	    'fluo-3'	 => __('Fluo 3', 'fudge-lite'),
	    'geek-1'	 => __('Geek 1', 'fudge-lite'),
	    'geek-2'	 => __('Geek 2', 'fudge-lite'),
	    'minimal-1'	 => __('Minimal 1', 'fudge-lite'),
	    'minimal-2'	 => __('Minimal 2', 'fudge-lite'),
	)
    ));

    // Footer Content
    $wp_customize->add_setting('footer', array(
	'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('fudge_lite_footer', array(
	'label'		 => __('Footer Content', 'fudge-lite'),
	'section'	 => 'fudge_lite_theme_options',
	'settings'	 => 'footer',
    ));

    // Google Maps Key: active if plugin is installed
    $wp_customize->add_setting('googlemaps_key', array(
	'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('fudge_lite_googlemaps_key', array(
	'label'			 => __('Google Maps API key', 'fudge-lite'),
	'section'		 => 'fudge_lite_theme_options',
	'settings'		 => 'googlemaps_key',
	'active_callback'	 => 'fudge_lite_core_plugin_activated'
    ));

    // Hero title
    $wp_customize->add_setting('herotitle', array(
	'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('fudge_lite_herotitle', array(
	'label'		 => __('Event Title', 'fudge-lite'),
	'section'	 => 'fudge_lite_theme_options',
	'settings'	 => 'herotitle',
    ));

    // Hero tagline
    $wp_customize->add_setting('herotagline', array(
	'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('fudge_lite_herotagline', array(
	'label'		 => __('Event Tagline', 'fudge-lite'),
	'section'	 => 'fudge_lite_theme_options',
	'settings'	 => 'herotagline',
    ));

    // Registration button visibility
    $wp_customize->add_setting('registerbutton', array(
	'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('fudge_lite_registerbutton', array(
	'label'		 => __('Show registration button?', 'fudge-lite'),
	'section'	 => 'fudge_lite_theme_options',
	'settings'	 => 'registerbutton',
	'type'		 => 'select',
	'choices'	 => array(
	    'y'	 => 'Yes',
	    'n'	 => 'No'
	)
    ));

    // Registration button url
    $wp_customize->add_setting('registerbutton_url', array(
	'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('fudge_lite_registerbutton_url', array(
	'label'		 => __('Registration button link', 'fudge-lite'),
	'section'	 => 'fudge_lite_theme_options',
	'settings'	 => 'registerbutton_url'
    ));
}
