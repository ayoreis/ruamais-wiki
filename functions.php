<?php
    $version = wp_get_theme()->get('Version');

    function wiki_register_styles(){
        wp_enqueue_style('styles', get_template_directory_uri() . '/styles.css', array(), $version, 'all');
    }

    add_action('wp_enqueue_scripts', 'wiki_register_styles');
?>
