<div class="partners">
    <div class="wrap">
        <h3>Nasi partnerzy</h3>
        <div class="row">
            <div class="partner">
                <a href="https://www.google.pl"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/google.png"></a>
            </div>
            <div class="partner">
                <a href="https://www.genymotion.com/">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/partners/genymotion.png">
                </a>
            </div>
            <div class="partner">
                <a href="https://www.sony.pl/"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/sony.png"></a>
            </div>
            <div class="partner">
                <a href="https://multikino.pl/"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/multikino.png"></a>
            </div>

        </div>
        <div class="row">

            <div class="partner">
                <a href="http://www.iwentarium.pl/"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/iwentarium.png"></a>
            </div>
            <div class="partner">
                <a href="https://www.mobiconf.org"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/mobiconf.png"></a>
            </div>
            <div class="partner">
                <a href="https://www.facebook.com/wbijajnakwadrat"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/kwadrat.png"></a>
            </div>

            <div class="partner">
                <a href="https://clubhouse.io/"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/clubhouse.png"></a>
            </div>

        </div>

        <div class="row">

            <div class="partner">
                <a href="https://crossweb.pl/"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/partners/crossweb.png"></a>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="wrap">
            <div class="row">
                <div class="column">
                    <div class="inner">
                        <div class="disclaimer">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-white.png" class="logo">
                            <p>GDG Rzeszow jest niezależną grupą. Nasze działania i opinie wyrażone na tej stronie nie
                                powinny być w żaden sposób powiązane ze stanowiskiem Google.</p>
                            <div class="socials">
                                <a href="https://www.meetup.com/GDGRzeszow/"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/meetup.png"></a>
                                <a href="https://plus.google.com/u/0/109899465967689104804"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/gplus.png"></a>
                                <a href="https://www.facebook.com/gdgrzeszow"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/facebook.png"></a>
                                <a href="https://twitter.com/GDGRzeszow"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/twitter.png"></a>
                                <a href="https://github.com/GDGRzeszow"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/github.png"></a>
                            </div>
                            <div class="email">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/mail.png">
                                gdg.rzeszow@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="inner">
                        <h3>Polecane linki</h3>
                        <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                        <!--                    <div class="donate">-->
                        <!--                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">-->
                        <!--                            <input type="hidden" name="cmd" value="_s-xclick">-->
                        <!--                            <input type="hidden" name="hosted_button_id" value="N9K4FEQKHTWUY">-->
                        <!--                            <input type="image" src="https://www.paypalobjects.com/pl_PL/PL/i/btn/btn_donateCC_LG.gif"-->
                        <!--                                   border="0" name="submit" alt="PayPal – Płać wygodnie i bezpiecznie">-->
                        <!--                            <img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1"-->
                        <!--                                 height="1">-->
                        <!--                        </form>-->
                        <!--                    </div>-->
                    </div>
                </div>
                <div class="column">
                    <div class="inner">
                        <div id="map"></div>
                        <script>
                            var map;
                            function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: 50.0411128, lng: 21.9991572},
                                    zoom: 4,
                                    disableDefaultUI: true
                                });

                                var marker = new google.maps.Marker({
                                    position: {lat: 50.0411128, lng: 21.9991572},
                                    map: map
                                });

                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVLt9wXNoo5RoAeg3n2snKr75WhA02Oqg&callback=initMap"
                                async defer></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <div class="wrap">
                © Copyright 2018
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
    </body>
    </html>
