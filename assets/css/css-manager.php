<?php
add_action( 'wp_enqueue_scripts', 'dttl_register_style');
function dttl_register_style() {
    $cssUrl = get_template_directory_uri() . '/assets/css';
    wp_register_style('normalize', $cssUrl . '/normalize.css', array(), '1.0');
    wp_enqueue_style('normalize');
    wp_register_style('fontawesome-all', $cssUrl . '/font-awesome/css/font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('fontawesome-all');
    wp_register_style('style', $cssUrl . '/style.min.css', array(), '1.0');
    wp_enqueue_style('style');
    wp_register_style('stylelibs', $cssUrl . '/stylelibs.min.css', array(), '1.0');
    wp_enqueue_style('stylelibs');
}
?>