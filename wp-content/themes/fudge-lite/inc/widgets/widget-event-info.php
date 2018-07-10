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
 * Class for Event Info widget.
 *
 * @since  1.0.0
 * @access public
 */
class Fudge_Lite_Event_Info extends WP_Widget {

    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    public function __construct() {
	$widget_ops = array(
	    'classname'	 => 'fudge_lite_event_info main-bkg-color',
	    'description'	 => __('Shows a section displaying event time, date and location', 'fudge-lite'),
	);
	parent::__construct('fudge_lite_event_info', __('Fudge Lite Event Info', 'fudge-lite'), $widget_ops);
    }

    /**
     * Widget content rendering method
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    public function widget($args, $instance) {
	$fudge_lite_event_date		 = isset($instance['eventdate']) ? $instance['eventdate'] : '';
	$fudge_lite_event_time		 = isset($instance['eventtime']) ? $instance['eventtime'] : '';
	$fudge_lite_event_city		 = isset($instance['eventcity']) ? $instance['eventcity'] : '';
	$fudge_lite_event_location	 = isset($instance['eventlocation']) ? $instance['eventlocation'] : '';

	echo $args['before_widget'];
	// Load the template allowing developers to overrid it in child theme
	include(locate_template('templates/widget-event-info.php', false, false));
	echo $args['after_widget'];
    }

    /**
     * Widget form rendering method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    public function form($instance) {
	$eventdate	 = isset($instance['eventdate']) ? $instance['eventdate'] : '';
	$eventtime	 = isset($instance['eventtime']) ? $instance['eventtime'] : '';
	$eventcity	 = isset($instance['eventcity']) ? $instance['eventcity'] : '';
	$eventlocation	 = isset($instance['eventlocation']) ? $instance['eventlocation'] : '';
	?>
	<label><?php _e('Date:', 'fudge-lite'); ?></label><br />
	<input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('eventdate')); ?>" value="<?php echo esc_attr($eventdate); ?>" />
	<br /><br />
	<label><?php _e('Starting Time:', 'fudge-lite'); ?></label><br />
	<input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('eventtime')); ?>" value="<?php echo esc_attr($eventtime); ?>"/>
	<br /><br />
	<label><?php _e('City &amp; Country:', 'fudge-lite'); ?></label><br />
	<input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('eventcity')); ?>" value="<?php echo esc_attr($eventcity); ?>" />
	<br /><br />
	<label><?php _e('Location:', 'fudge-lite'); ?></label><br />
	<input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('eventlocation')); ?>" value="<?php echo esc_attr($eventlocation); ?>" />
	<?php
    }

    /**
     * Widget saving data method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    public function update($new_instance, $old_instance) {
	$instance			 = array();
	$instance['eventdate']		 = (!empty($new_instance['eventdate']) ) ? sanitize_text_field($new_instance['eventdate']) : '';
	$instance['eventtime']		 = (!empty($new_instance['eventtime']) ) ? sanitize_text_field($new_instance['eventtime']) : '';
	$instance['eventcity']		 = (!empty($new_instance['eventcity']) ) ? sanitize_text_field($new_instance['eventcity']) : '';
	$instance['eventlocation']	 = (!empty($new_instance['eventlocation']) ) ? sanitize_text_field($new_instance['eventlocation']) : '';
	return $instance;
    }

}

// Register widget
add_action('widgets_init', create_function('', 'return register_widget("Fudge_Lite_Event_Info");'));
