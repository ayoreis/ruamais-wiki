 <?php
    function wiki_register_styles(){
        wp_enqueue_style('styles.css', get_template_directory_uri() . '/styles.css', array(), 1.0, 'all');
    }

    add_action('wp_enqueue_scripts', 'wiki_register_styles');

    function wiki_register_scripts(){
        wp_enqueue_script('search.js', get_template_directory_uri() . '/search.js', array(), 1.0, 'all');
    }

    add_action('wp_enqueue_scripts', 'wiki_register_scripts');

    function add_defer_attribute($tag, $handle) {
        $scripts_to_defer = array('search.js');

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



    // function custom_post_type() {
    //
    //     $labels = array(
    //         'name'                     => 'Terms',
    //         'singular_name'            => 'Term',
    //         'add_new'                  => 'Add New', 'post',
    //         'add_new_item'             => 'Add New Term',
    //         'edit_item'                => 'Edit Term',
    //         'new_item'                 => 'New Term',
    //         'view_item'                => 'View Term',
    //         'view_items'               => 'View Terms',
    //         'search_items'             => 'Search Terms',
    //         'not_found'                => 'No posts found.',
    //         'not_found_in_trash'       => 'No posts found in Trash.',
    //         'parent_item_colon'        => 'Parent Page:',
    //         'all_items'                => 'All Terms',
    //         'archives'                 => 'Term Archives',
    //         'attributes'               => 'Term Attributes',
    //         'insert_into_item'         => 'Insert into post',
    //         'uploaded_to_this_item'    => 'Uploaded to this post',
    //         'featured_image'           => 'Featured image',
    //         'set_featured_image'       => 'Set featured image',
    //         'remove_featured_image'    => 'Remove featured image',
    //         'use_featured_image'       => 'Use as featured image',
    //         'filter_items_list'        => 'Filter posts list',
    //         'filter_by_date'           => 'Filter by date',
    //         'items_list_navigation'    => 'Terms list navigation',
    //         'items_list'               => 'Terms list',
    //         'item_published'           => 'Term published.',
    //         'item_published_privately' => 'Term published privately.',
    //         'item_reverted_to_draft'   => 'Term reverted to draft.',
    //         'item_scheduled'           => 'Term scheduled.',
    //         'item_updated'             => 'Term updated.',
    //         'item_link'                => 'Term Link',
    //         'item_link_description'    => 'A link to a post.',
    //     );
    //
    //     $arguments = array(
    //         'label'               => 'term',
    //         'description'         => '',
    //         'labels'              => $labels,
    //         'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    //         'taxonomies'          => array('post_tag', 'category'),
    //         'hierarchical'        => true,
    //         'public'              => true,
    //         'show_ui'             => true,
    //         'show_in_menu'        => true,
    //         'show_in_nav_menus'   => true,
    //         'show_in_admin_bar'   => true,
    //         'menu_position'       => 4,
    //         'can_export'          => true,
    //         'has_archive'         => true,
    //         'exclude_from_search' => false,
    //         'publicly_queryable'  => true,
    //         'capability_type'     => 'post',
    //         'show_in_rest' => true,
    //     );
    //
    //     register_post_type('term', $arguments);
    //
    // }

    // add_action('init', 'custom_post_type', 0 );

    function data_fetch() {
        echo "Test";
    }

    add_action('wp_ajax_data_fetch', 'data_fetch'); // executed when logged in
    add_action('wp_ajax_nopriv_data_fetch', 'data_fetch'); // executed when logged out

?>
