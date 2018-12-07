<?php

add_image_size('news-list', 380, 190, true);
add_image_size('news-main-photo', 2000, 1300, true);

add_theme_support( 'post-thumbnails' );

function wpdocs_theme_name_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('scripts', get_template_directory_uri() . '/scripts.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

function register_menu()
{
    register_nav_menu('primary', __('Primary Menu', 'gdg'));
    register_nav_menu('footer', __('Footer Menu', 'gdg'));
}

add_action('after_setup_theme', 'register_menu');

function fb_add_custom_user_profile_fields( $user ) {
    ?>
    <h3><?php _e('Dodatkowe pola', 'gdgdomain'); ?></h3>

    <table class="form-table">
        <tr>
            <th>
                <label for="address"><?php _e('Stanowisko', 'gdgdomain'); ?>
                </label></th>
            <td>
                <input type="text" name="job" id="job" value="<?php echo esc_attr( get_the_author_meta( 'job', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Stanowisko, które zajmuje w pracy', 'gdgdomain'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="address"><?php _e('Firma', 'gdgdomain'); ?>
                </label></th>
            <td>
                <input type="text" name="company" id="company" value="<?php echo esc_attr( get_the_author_meta( 'company', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('W jakiej firmie pracuje', 'gdgdomain'); ?></span>
            </td>
        </tr>
    </table>

    <h3><?php _e('Konta użytkownika', 'gdgdomain'); ?></h3>

    <table class="form-table">
        <tr>
            <th>
                <label for="address"><?php _e('Facebook', 'gdgdomain'); ?>
                </label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Adres konta Facebook (włącznie z https://)', 'gdgdomain'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="address"><?php _e('Twitter', 'gdgdomain'); ?>
                </label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Adres konta Twitter (włącznie z https://)', 'gdgdomain'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="address"><?php _e('Google Plus', 'gdgdomain'); ?>
                </label></th>
            <td>
                <input type="text" name="gplus" id="gplus" value="<?php echo esc_attr( get_the_author_meta( 'gplus', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Adres konta Google Plus (włącznie z https://)', 'gdgdomain'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="address"><?php _e('LinkedIn', 'gdgdomain'); ?>
                </label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'gplus', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Adres konta Google Plus (włącznie z https://)', 'gdgdomain'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="address"><?php _e('Strona WWW', 'gdgdomain'); ?>
                </label></th>
            <td>
                <input type="text" name="www" id="www" value="<?php echo esc_attr( get_the_author_meta( 'www', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Adres strony WWW', 'gdgdomain'); ?></span>
            </td>
        </tr>
    </table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return FALSE;

    update_usermeta( $user_id, 'job', $_POST['job'] );
    update_usermeta( $user_id, 'company', $_POST['company'] );

    update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
    update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
    update_usermeta( $user_id, 'gplus', $_POST['gplus'] );
    update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_usermeta( $user_id, 'www', $_POST['www'] );

}

add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );

?>
