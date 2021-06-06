<?php
add_action( 'wp_enqueue_scripts', 'dttl_register_js');
function dttl_register_js(){
    $jsUrl = get_template_directory_uri() . '/assets/js';
    wp_register_script('dttl_jquery', $jsUrl . '/jquery-3.5.1.min.js', array(), '1.0', true);
    wp_enqueue_script('dttl_jquery');
    wp_register_script('jsmain', $jsUrl . '/jsmain.min.js', array( 'jquery' ), '1.0', true);
    wp_enqueue_script('jsmain');
    wp_register_script('main', $jsUrl . '/main.js', array( 'jquery' ), '1.2', true);
    wp_enqueue_script('main');
}
?>