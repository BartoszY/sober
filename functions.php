<?php
// add_filter('show_admin_bar', '__return_false');

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support'))
{
    add_theme_support( 'title-tag' );
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    // add_image_size('hd', 1920, '', true);
    // add_image_size('medium', 1200, '', true);
    // add_image_size('small', 350, '', true);

    /*
        Defaults
    thumb: 150x150
    medium: 300x300
    large: 1024x1024
    */
}


add_filter('acf/settings/show_admin', function( $show ) {
    if ( defined('WP_ENV') && WP_ENV === 'development' ) {
        return true;
    }
    return false;
});

add_action('admin_menu', function() {
    remove_menu_page('edit.php');           // ukrywa menu Wpisy
    remove_menu_page('edit-comments.php');  // ukrywa menu Komentarze
});



// Wyłącz komentarze na przyszłych wpisach
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Ukryj wszystkie istniejące komentarze
add_filter('comments_array', '__return_empty_array', 10, 2);

// Ukryj metabox komentarzy w edycji stron/wpisów
add_action('admin_init', function() {
    remove_meta_box('commentstatusdiv', 'post', 'normal'); // wpisy
    remove_meta_box('commentsdiv', 'post', 'normal');      // komentarze
});






/*------------------------------------*\
	Menu
\*------------------------------------*/
function ytheme_register_menu() {
    register_nav_menus(array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
    //   'copyright-menu' => __( 'Copyright Menu' ),
    ));
}
add_action( 'init', 'ytheme_register_menu' );



/*------------------------------------*\
	Scripts
\*------------------------------------*/

function ytheme_header_scripts() {
    $theme = wp_get_theme();
    
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('ytheme_scripts', get_template_directory_uri() . '/prod/js/main.min.js', array(), $theme->get('Version'), true);
        wp_enqueue_script('ytheme_scripts');
    }
}
add_action('wp_enqueue_scripts', 'ytheme_header_scripts');

function ytheme_styles() {
    $theme = wp_get_theme();

    wp_register_style('ytheme_style', get_template_directory_uri() . '/prod/css/main.css', array(), $theme->get('Version'), 'all');
    wp_enqueue_style('ytheme_style');
}
add_action('wp_enqueue_scripts', 'ytheme_styles', 10);



/**
 * WPCF7 disable auto paragraphs
 */
add_filter('wpcf7_autop_or_not', '__return_false');



// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles' );




