<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>" />
	<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="fb-root"></div>
	<?php if (is_page_template('template-home.php')) { ?>
    	<section id="hero" style="background-image: url('<?php header_image(); ?>');">
    	    <div class="container">
    		<h1><?php echo esc_html(get_theme_mod('herotitle', '')); ?></h1>
    		<p><?php echo esc_html(get_theme_mod('herotagline', '')); ?></p>
		    <?php if (get_theme_mod('registerbutton', 'y') == 'y') { ?>
			<a class="btn secondary-bkg-color" title="<?php _e('Register Now', 'fudge-lite'); ?>" href="<?php echo(esc_url(get_theme_mod('registerbutton_url'), '#')); ?>"><?php _e('Register Now', 'fudge-lite'); ?></a>
		    <?php } ?>
    	    </div>
	    <?php } ?>
            <header>
                <div class="container">
		    <?php
		    // Show custom logo or, if missing, blog name
		    $fudge_lite_custom_logo = fudge_lite_get_custom_logo();
		    if (!empty($fudge_lite_custom_logo)) {
			echo $fudge_lite_custom_logo;
		    } else {
			?>
    		    <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link site-title"><?php bloginfo('name'); ?></a>
			<?php
		    }
		    ?>
		    <?php
		    wp_nav_menu(
			    array(
				'theme_location' => 'primary',
				'depth' => 1
			    )
		    );
		    ?>
		    <a class="mobile-nav-icon"></a>
                </div>
            </header>
	    <?php if (is_page_template('template-home.php')) { ?>
    	</section>
	    <?php
	}