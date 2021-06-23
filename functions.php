 <?php
    function wiki_register_styles(){
        wp_enqueue_style('styles.css styles', get_template_directory_uri() . '/styles.css', array(), 1.0, 'all');
    }

    add_action('wp_enqueue_scripts', 'wiki_register_styles');

    function wiki_register_scripts(){
        wp_enqueue_script('search.js scripts', get_template_directory_uri() . '/search.js', array(), 1.0, 'all');
    }

    add_action('wp_enqueue_scripts', 'wiki_register_scripts');

    function add_defer_attribute($tag, $handle) {
        $scripts_to_defer = array('search.js scripts');

        foreach($scripts_to_defer as $defer_script) {
          if ($defer_script === $handle) {
             return str_replace(' src', ' defer src', $tag);
          }
        }
        return $tag;
    }

    add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

    function header_clean_up() {

        // Generator
        function thegreatguy_generator_remove() {
            return '';
        }
        add_filter( 'the_generator', 'thegreatguy_generator_remove' );
        // CSS Links Changes
        function cleanup_qstring( $src ) {
            $parts = explode( '?ver', $src );
            return $parts[0];
        }
        add_filter( 'script_loader_src', 'cleanup_qstring', 15, 1 );
        add_filter( 'style_loader_src', 'cleanup_qstring', 15, 1 );
        // Shortlink
        remove_action( 'wp_head', 'wp_shortlink_wp_head' );
        // Emojis
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        // Windows Live Writer
        remove_action( 'wp_head', 'wlwmanifest_link' );
        // Admin Bar Display (Optional)
        add_filter( 'show_admin_bar', '__return_false' );
        // RSD Link
        remove_action( 'wp_head', 'rsd_link' );
        // Relational Links
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
    }

    add_action( 'after_setup_theme', 'header_clean_up' );
?>
