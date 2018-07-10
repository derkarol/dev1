<?php

/* Template Name: Home */

get_header();
if (is_active_sidebar('sidebar-1')) {
    dynamic_sidebar('sidebar-1');
}
get_footer();
