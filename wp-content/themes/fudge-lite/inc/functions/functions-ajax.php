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

// Handle ajax calls
add_action('wp_ajax_nopriv_get_session', 'fudge_lite_ajax_get_session');
add_action('wp_ajax_get_session', 'fudge_lite_ajax_get_session');
add_action('wp_ajax_nopriv_get_speaker', 'fudge_lite_ajax_get_speaker');
add_action('wp_ajax_get_speaker', 'fudge_lite_ajax_get_speaker');
add_action('wp_ajax_nopriv_get_media', 'fudge_lite_ajax_get_media');
add_action('wp_ajax_get_media', 'fudge_lite_ajax_get_media');
add_action('wp_ajax_nopriv_get_schedule', 'fudge_lite_ajax_get_schedule');
add_action('wp_ajax_get_schedule', 'fudge_lite_ajax_get_schedule');
add_action('wp_ajax_nopriv_get_speakers', 'fudge_lite_ajax_get_speakers');
add_action('wp_ajax_get_speakers', 'fudge_lite_ajax_get_speakers');


/**
 * Returns session data requested by ajax call.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_ajax_get_session() {
    $ret = array();

    if (isset($_POST['data-id']) && ctype_digit($_POST['data-id'])) {
	$session_id	 = intval($_POST['data-id']);
	$session	 = get_post($session_id);
	$tracks		 = wp_get_post_terms($session_id, 'session-track', array('fields' => 'all'));
	foreach ($tracks as &$track) {
	    if (function_exists('fudge_lite_core_get_track_color')) {
		$track->color = fudge_lite_core_get_track_color($track->term_id);
	    } else {
		$track->color = '';
	    }
	}
	$locations	 = wp_get_post_terms($session_id, 'session-location', array('fields' => 'all'));
	$date		 = get_post_meta($session_id, 'date', true);
	$time		 = get_post_meta($session_id, 'time', true);
	$end_time	 = get_post_meta($session_id, 'end_time', true);

	if (!empty($time)) {
	    $time_parts	 = explode(':', $time);
	    if (count($time_parts) == 2)
		$time		 = date(get_option("time_format"), mktime($time_parts[0], $time_parts[1], 0));
	}
	if (!empty($end_time)) {
	    $time_parts	 = explode(':', $end_time);
	    if (count($time_parts) == 2)
		$end_time	 = date(get_option("time_format"), mktime($time_parts[0], $time_parts[1], 0));
	}

	$speakers	 = array();
	$speakers_list	 = get_post_meta($session_id, 'speakers_list', true);
	if (!empty($speakers_list)) {
	    foreach ($speakers_list as $speaker_id)
		$speakers[] = array(
		    'post_id'	 => $speaker_id,
		    'post_title'	 => get_the_title($speaker_id),
		    'post_image'	 => get_the_post_thumbnail($speaker_id, array(60, 60)),
		);
	}

	$ret = array(
	    'post_title'	 => $session->post_title,
	    'post_content'	 => $session->post_content,
	    'tracks'	 => $tracks,
	    'location'	 => !empty($locations) ? esc_html($locations[0]->name) : '',
	    'date'		 => !empty($date) ? esc_html(date_i18n(get_option('date_format'), fudge_lite_timestamp_fix($date))) : '',
	    'time'		 => esc_html($time),
	    'end_time'	 => esc_html($end_time),
	    'post_edit_link' => is_user_logged_in() ? get_edit_post_link($session_id) : '',
	    'speakers'	 => $speakers
	);
    }

    echo json_encode($ret);
    die;
}

/**
 * Returns speaker data requested by ajax call.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_ajax_get_speaker() {
    $ret = array();

    if (isset($_POST['data-id']) && ctype_digit($_POST['data-id'])) {
	$speaker_id		 = intval($_POST['data-id']);
	$speaker		 = get_post($speaker_id);
	$company		 = get_post_meta($speaker_id, 'company', true);
	$short_bio		 = get_post_meta($speaker_id, 'short_bio', true);
	$website_url		 = get_post_meta($speaker_id, 'website_url', true);
	$twitter_username	 = get_post_meta($speaker_id, 'twitter_username', true);

	$sessions = array();

	add_filter('posts_fields', 'fudge_lite_sessions_posts_fields');
	add_filter('posts_orderby', 'fudge_lite_sessions_posts_orderby');

	$sessions_loop = new WP_Query(
		array(
	    'post_type'	 => 'session',
	    'nopaging'	 => true,
	    'meta_query'	 => array(
		array(
		    'key'		 => 'date',
		    'compare'	 => 'EXISTS',
		),
		array(
		    'key'		 => 'time',
		    'compare'	 => 'EXISTS',
		),
	    ),
	    'meta_key'	 => 'date',
	    'orderby'	 => 'meta_value',
	    'order'		 => 'DESC'
		)
	);

	remove_filter('posts_fields', 'fudge_lite_sessions_posts_fields');
	remove_filter('posts_orderby', 'fudge_lite_sessions_posts_orderby');

	if ($sessions_loop->have_posts()) {
	    while ($sessions_loop->have_posts()) {
		$sessions_loop->the_post();
		$session_speakers = get_post_meta(get_the_ID(), 'speakers_list', true);
		if ($session_speakers && is_array($session_speakers) && in_array($speaker_id, $session_speakers)) {
		    $date		 = get_post_meta(get_the_ID(), 'date', true);
		    $sessions[]	 = array(
			'post_id'	 => intval(get_the_ID()),
			'post_title'	 => esc_html(get_the_title()),
			'date'		 => !empty($date) ? esc_html(date_i18n(get_option('date_format')), esc_html(fudge_lite_timestamp_fix($date))) : '',
		    );
		}
	    }
	    wp_reset_postdata();
	}

	$ret = array(
	    'post_title'		 => $speaker->post_title,
	    'post_content'		 => $speaker->post_content,
	    'post_image'		 => get_the_post_thumbnail($speaker_id),
	    'company'		 => esc_html($company),
	    'short_bio'		 => esc_html($short_bio),
	    'website_url'		 => str_replace('http://', '', esc_url_raw($website_url)),
	    'twitter_username'	 => esc_html($twitter_username),
	    'sessions'		 => $sessions,
	    'post_edit_link'	 => is_user_logged_in() ? get_edit_post_link($speaker_id) : '',
	);
    }

    echo json_encode($ret);
    die;
}

/**
 * Returns media data requested by ajax call.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_ajax_get_media() {
    $ret = array(
	'page'	 => 1,
	'media'	 => array(),
	'more'	 => 0,
	'limit'	 => 1
    );

    if (isset($_POST['data-id']) && ctype_digit($_POST['data-id'])) {
	$page		 = isset($_POST['data-page']) && ctype_digit($_POST['data-page']) ? intval($_POST['data-page']) : '1';
	$term_id	 = intval($_POST['data-id']);
	$media_limit	 = isset($_POST['data-limit']) && ctype_digit($_POST['data-limit']) ? intval($_POST['data-limit']) : get_media_limit();
	$media_loop_args = array(
	    'post_type'	 => 'event-media',
	    'posts_per_page' => $media_limit,
	    'paged'		 => $page
	);

	if ($term_id > 0) {
	    $media_loop_args['tax_query'] = array(
		array(
		    'taxonomy'	 => 'media-type',
		    'field'		 => 'id',
		    'terms'		 => array($term_id)
		)
	    );
	}
	$media_loop = new WP_Query($media_loop_args);
	while ($media_loop->have_posts()) {
	    $media_loop->the_post();

	    $post_video	 = '';
	    $video_url	 = get_post_meta(get_the_ID(), 'video_url', true);
	    if (!empty($video_url)) {
		$post_video = wp_oembed_get($video_url, array('height' => 222, 'width' => 222));
	    }

	    $ret['media'][] = array(
		'post_title'		 => esc_html(get_the_title()),
		'post_content'		 => esc_html(get_the_content()),
		'post_image'		 => get_the_post_thumbnail(get_the_ID(), array(222, 222)),
		'post_video'		 => $post_video,
		'post_image_big_url'	 => wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))
	    );
	}

	$ret['page']	 = $page;
	if ($media_loop->found_posts > $page * $media_limit)
	    $ret['more']	 = 1;
    }

    echo json_encode($ret);
    die;
}

/**
 * Returns schedule data requested by ajax call.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_ajax_get_schedule() {
    $ret = array(
	'page'		 => 1,
	'sessions'	 => array(),
	'more'		 => 0
    );

    if (isset($_POST['data-timestamp'])) {
	$timestamp	 = $_POST['data-timestamp'];
	$page		 = isset($_POST['data-page']) && ctype_digit($_POST['data-page']) ? intval($_POST['data-page']) : '1';
	$location	 = isset($_POST['data-location']) && ctype_digit($_POST['data-location']) ? intval($_POST['data-location']) : '0';
	$track		 = isset($_POST['data-track']) && ctype_digit($_POST['data-track']) ? intval($_POST['data-track']) : '0';
	$schedule_limit	 = fudge_lite_get_schedule_limit();
	$wp_time_format	 = get_option("time_format");

	add_filter('posts_fields', 'fudge_lite_sessions_posts_fields');
	add_filter('posts_orderby', 'fudge_lite_sessions_posts_orderby');

	$session_loop_args = array(
	    'post_type'	 => 'session',
	    'posts_per_page' => $schedule_limit,
	    'paged'		 => $page,
	    'meta_query'	 => array(
		array(
		    'key'	 => 'date',
		    'value'	 => $timestamp,
		),
		array(
		    'key'		 => 'time',
		    'compare'	 => 'EXISTS',
		)
	    ),
	    'tax_query'	 => array(),
	    'meta_key'	 => 'date',
	    'orderby'	 => 'meta_value',
	    'order'		 => 'ASC'
	);

	if ($location > 0)
	    $session_loop_args['tax_query'][]	 = array(
		'taxonomy'	 => 'session-location',
		'field'		 => 'id',
		'terms'		 => $location
	    );
	if ($track > 0)
	    $session_loop_args['tax_query'][]	 = array(
		'taxonomy'	 => 'session-track',
		'field'		 => 'id',
		'terms'		 => $track
	    );
	$sessions_loop				 = new WP_Query($session_loop_args);

	remove_filter('posts_fields', 'fudge_lite_sessions_posts_fields');
	remove_filter('posts_orderby', 'fudge_lite_sessions_posts_orderby');

	while ($sessions_loop->have_posts()) {
	    $sessions_loop->the_post();
	    global $post;

	    $time = $post->time;
	    if (!empty($time)) {
		$time_parts = explode(':', $time);
		if (count($time_parts) == 2) {
		    $time = date_i18n($wp_time_format, mktime($time_parts[0], $time_parts[1], 0));
		}
	    }
	    $locations = wp_get_post_terms(get_the_ID(), 'session-location');
	    if ($locations && count($locations) > 0) {
		$location = $locations[0];
	    } else {
		$location = null;
	    }
	    $tracks = wp_get_post_terms(get_the_ID(), 'session-track', array('fields' => 'ids', 'count' => 1));
	    if ($tracks && count($tracks) > 0) {
		$track = $tracks[0];
	    }
	    $speakers_list	 = get_post_meta(get_the_ID(), 'speakers_list', true);
	    $speakers	 = array();
	    if ($speakers_list && count($speakers_list) > 0) {
		foreach ($speakers_list as $speaker_id)
		    $speakers[] = array(
			'post_image' => get_the_post_thumbnail($speaker_id, array(60, 60))
		    );
	    }
	    $background_color = '';
	    if ($track && function_exists('fudge_lite_core_get_track_color')) {
		$background_color = esc_html(fudge_lite_core_get_track_color($track));
	    }

	    array_push($ret['sessions'], array(
		'id'			 => intval(get_the_ID()),
		'post_title'		 => esc_html(get_the_title()),
		'time'			 => esc_html($time),
		'end_time'		 => esc_html(get_post_meta(get_the_ID(), 'end_time', true)),
		'location'		 => $location ? esc_html($location->name) : '',
		'background_color'	 => $background_color,
		'speakers'		 => $speakers
	    ));
	}

	$ret['page']	 = $page;
	if ($sessions_loop->found_posts > $page * $schedule_limit)
	    $ret['more']	 = 1;
    }
    echo json_encode($ret);
    die;
}

/**
 * Returns speaker data requested by ajax call.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fudge_lite_ajax_get_speakers() {
    $ret = array(
	'page'		 => 1,
	'speakers'	 => array(),
	'more'		 => 0,
	'limit'		 => 1
    );

    $page			 = isset($_POST['data-page']) && ctype_digit($_POST['data-page']) ? intval($_POST['data-page']) : '1';
    $speakers_limit		 = isset($_POST['data-limit']) && ctype_digit($_POST['data-limit']) ? intval($_POST['data-limit']) : get_speakers_limit();
    $speakers_loop_args	 = array(
	'post_type'	 => 'speaker',
	'post_status'	 => 'publish',
	'posts_per_page' => $speakers_limit,
	'paged'		 => $page,
	'orderby'	 => 'menu_order id',
	'order'		 => 'ASC'
    );

    $speakers_loop = new WP_Query($speakers_loop_args);
    while ($speakers_loop->have_posts()) {
	$speakers_loop->the_post();

	$short_bio	 = get_post_meta(get_the_ID(), 'short_bio', true);
	if (mb_strlen($short_bio, 'UTF-8') > 50)
	    $short_bio	 = substr($short_bio, 0, 50) . '&hellip;';

	$ret['speakers'][] = array(
	    'post_ID'	 => intval(get_the_ID()),
	    'post_title'	 => esc_html(get_the_title()),
	    'post_image'	 => get_the_post_thumbnail(get_the_ID()),
	    'post_company'	 => esc_html(get_post_meta(get_the_ID(), 'company', true)),
	    'post_short_bio' => esc_html($short_bio),
	);
    }

    $ret['page']	 = $page;
    if ($speakers_loop->found_posts > $page * $speakers_limit)
	$ret['more']	 = 1;

    echo json_encode($ret);
    die;
}