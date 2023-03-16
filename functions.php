<?php 
    function main_files(){
        wp_enqueue_style( 'custom-google-font', '//fonts.googleapis.com/css2?family=Golos+Text:wght@400;500;700&display=swap', false);
        wp_enqueue_style( 'bootstrap5', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
        wp_enqueue_style( 'custom-style',  get_template_directory_uri().'/assets/css/custom.css');
        wp_enqueue_style( 'main-css', get_stylesheet_uri());
    
        wp_enqueue_script( 'bootstrap5-js','//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true );
    }

    add_action('wp_enqueue_scripts', 'main_files');

    function custom_single_product_image_html( $html, $post_id ) {
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        return get_the_post_thumbnail( $post_thumbnail_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
    }
    add_filter('woocommerce_single_product_image_thumbnail_html', 'custom_single_product_image_html', 10, 2);

    function wpb_custom_new_menu() {
        register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
      }
    add_action( 'init', 'wpb_custom_new_menu' );


    require_once get_template_directory() .'/class-wp-bootstrap-navwalker.php';

    add_theme_support('post-thumbnails');

    add_theme_support('title-tag');

    add_post_type_support('page', 'excerpt');

    // Adding wide image support to a Gutenburg block
    add_theme_support( 'align-wide' );

    //Page Slug Body Class
    function add_slug_body_class( $classes ) {
        global $post;
        if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
        }
        return $classes;
    }
    add_filter( 'body_class', 'add_slug_body_class' );

?>