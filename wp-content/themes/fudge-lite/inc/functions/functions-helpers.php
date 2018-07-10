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
// Plugin installation check
add_action('tgmpa_register', 'fudge_lite_register_required_plugins');

/**
 * Adds a check suggesting the plugin installation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function fudge_lite_register_required_plugins() {
    $plugins = array(
	array(
	    'name'		 => 'Fudge Lite Core',
	    'slug'		 => 'fudge-lite-core',
	    'required'	 => false,
	),
    );
    $config	 = array(
	'id'		 => 'fudge-lite',
	'default_path'	 => '',
	'menu'		 => 'tgmpa-install-plugins',
	'has_notices'	 => true,
	'dismissable'	 => true,
	'dismiss_msg'	 => '',
	'is_automatic'	 => true,
	'message'	 => '',
    );
    tgmpa($plugins, $config);
}

/**
 * Sanitizes palette field.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_sanitize_color_scheme($value) {
    $color_schemes = array(
	'default'	 => 'Default',
	'corporate-1'	 => 'Corporate 1',
	'corporate-2'	 => 'Corporate 2',
	'fluo-1'	 => 'Fluo 1',
	'fluo-2'	 => 'Fluo 2',
	'fluo-3'	 => 'Fluo 3',
	'geek-1'	 => 'Geek 1',
	'geek-2'	 => 'Geek 2',
	'minimal-1'	 => 'Minimal 1',
	'minimal-2'	 => 'Minimal 2',
    );

    if (!array_key_exists($value, $color_schemes)) {
	return 'default';
    }

    return $value;
}

/**
 * Renders comments section.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_comment($comment, $args) {
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
	$tag		 = 'div';
	$add_below	 = 'comment';
    } else {
	$tag		 = 'li';
	$add_below	 = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
        <div class="comment-content">
	    <?php echo get_avatar($comment, 32); ?>
	    <?php if ($comment->comment_approved == '0') : ?>
		<p><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'fudge-lite') ?></em></p>
	    <?php endif; ?>
	    <?php comment_text() ?>
        </div>
        <div class="comment-meta">
    	<span><?php printf('%s', get_comment_author_link()); ?>, </span>
	    <?php printf(__('<a href="%1$s">%2$s at %3$s</a>', 'fudge-lite'), esc_url(get_comment_link()), esc_html(get_comment_date()), esc_html(get_comment_time())) ?><?php edit_comment_link(__('(Edit)', 'fudge-lite'), '  ', ''); ?>
        </div>
	<?php if ('div' != $args['style']) : ?>
	</div>
    <?php endif; ?>
    <?php
}

/**
 * Returns the distinct session dates.
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function fudge_lite_get_session_dates() {
    global $wpdb;

    $metas = $wpdb->get_results(
	    "SELECT DISTINCT meta_value
            FROM $wpdb->postmeta
                INNER JOIN $wpdb->posts ON $wpdb->postmeta.post_id = $wpdb->posts.ID
            WHERE
                $wpdb->posts.post_type = 'session' AND
                $wpdb->posts.post_status = 'publish' AND
                $wpdb->postmeta.meta_key = 'date' AND
                $wpdb->postmeta.meta_value != ''
            ORDER BY meta_value ASC");

    return $metas;
}

/**
 * Adds fields to fetch in the query
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_sessions_posts_fields($sql) {
    global $wpdb;
    return $sql . ", $wpdb->postmeta.meta_value as date, mt2.meta_value as time";
}

/**
 * Adds orderby conditions in the query.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_sessions_posts_orderby($sql) {
    return $sql . ", mt2.meta_value ASC";
}

/**
 * Returns the number of sessions to display in the schedule.
 *
 * @since  1.0.0
 * @access public
 * @return int
 */
function fudge_lite_get_schedule_limit() {
    return apply_filters('fudge_lite_schedule_limit', 3);
}

/**
 * Returns the number of medias to display in the media component.
 *
 * @since  1.0.0
 * @access public
 * @return int
 */
function fudge_lite_get_media_limit() {
    return apply_filters('fudge_lite_media_limit', 8);
}

/**
 * Returns the number of speakers to display in the speakers component.
 *
 * @since  1.0.0
 * @access public
 * @return int
 */
function fudge_lite_get_speakers_limit() {
    return apply_filters('fudge_lite_speakers_limit', 8);
}

function fudge_lite_timestamp_fix($timestamp) {
    return $timestamp / 1000;
}

/**
 * Returns the custom logo
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function fudge_lite_get_custom_logo() {
    if (function_exists('get_custom_logo')) {
	return get_custom_logo();
    }
}

/**
 * Returns the Google Fonts url for enqueuing
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
     * supported by Muli, translate this to 'off'. Do not translate
     * into your own language.
     */
    $muli = _x('on', 'Muli font: on or off', 'fudge-lite');

    /* Translators: If there are characters in your language that are not
     * supported by Montserrat, translate this to 'off'. Do not translate
     * into your own language.
     */
    $montserrat = _x('on', 'Montserrat font: on or off', 'fudge-lite');

    if ('off' !== $muli || 'off' !== $montserrat) {
	$font_families = array();

	if ('off' !== $muli) {
	    $font_families[] = 'Muli';
	}

	if ('off' !== $montserrat) {
	    $font_families[] = 'Montserrat:400,700';
	}

	$query_args = array(
	    'family' => urlencode(implode('|', $font_families))
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}

/**
 * Checks if the suggested plugin is installed
 *
 * @since  1.0.0
 * @access public
 * @return int
 */
function fudge_lite_core_plugin_activated() {
    return function_exists('fudge_lite_core_init');
}
