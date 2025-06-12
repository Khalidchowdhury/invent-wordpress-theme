<?php 


// Basic Theme Setup
function invent_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    register_nav_menus([
        'main_menu' => __('Main Menu', 'invent'),
    ]);
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    load_theme_textdomain('mytheme', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'invent_setup');






function invent_enqueue_assets() {
    // CSS 
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('aos-css', get_template_directory_uri() . '/assets/vendor/aos/aos.css');
    wp_enqueue_style('glightbox-css', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');

    // JavaScript
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('php-email-form-validate', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), null, true);
    wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), null, true);
    wp_enqueue_script('glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), null, true);
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), null, true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), null, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'invent_enqueue_assets');


function mytheme_enqueue_styles() {
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}
function load_font_awesome_frontend() {
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'load_font_awesome_frontend' );

// Enable WebP upload
function allow_webp_upload($mime_types) {
    $mime_types['webp'] = 'image/webp';
    return $mime_types;
}
add_filter('upload_mimes', 'allow_webp_upload');


// Enable SVG upload securely
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

// Allow SVG display in Media Library
function fix_svg_display() {
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg_display');




// ACF options page enable
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

    // Footer Section as Subpage
    acf_add_options_sub_page(array(
        'page_title'  => 'Footer Section',
        'menu_title'  => 'Footer Section',
        'parent_slug' => 'theme-settings',
        'menu_slug'   => 'footer-section'
    ));


add_filter('acf/settings/save_json', function($path) {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});




// Register Portfolio Custom Post Type
function register_portfolio_post_type() {
    $labels = array(
        'name' => 'Portfolios',
        'singular_name' => 'Portfolio',
        'menu_name' => 'Portfolios',
        'name_admin_bar' => 'Portfolio',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Portfolio',
        'new_item' => 'New Portfolio',
        'edit_item' => 'Edit Portfolio',
        'view_item' => 'View Portfolio',
        'all_items' => 'All Portfolios',
        'search_items' => 'Search Portfolios',
        'parent_item_colon' => 'Parent Portfolio:',
        'not_found' => 'No portfolios found.',
        'not_found_in_trash' => 'No portfolios found in Trash.'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest' => true,
        'hierarchical' => false,
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'register_portfolio_post_type');

// Register Portfolio Categories (Taxonomy)
function register_portfolio_taxonomy() {
    $labels = array(
        'name' => 'Portfolio Categories',
        'singular_name' => 'Portfolio Category',
        'search_items' => 'Search Portfolio Categories',
        'all_items' => 'All Portfolio Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'rewrite' => array('slug' => 'portfolio-category'),
        'show_in_rest' => true,
    );

    register_taxonomy('portfolio_category', array('portfolio'), $args);
}
add_action('init', 'register_portfolio_taxonomy');




add_action('after_import', 'set_footer_default_data');
function set_footer_default_data() {
    if ( function_exists('update_field') ) {

        
        $useful_links = array(
            array(
                'useful_link_text' => 'Home',
                'useful_link_url'  => '#home',
            ),
            array(
                'useful_link_text' => 'About Us',
                'useful_link_url'  => '#about-us',
            ),
            array(
                'useful_link_text' => 'Portfolio',
                'useful_link_url'  => '#portfolio',
            ),
            array(
                'useful_link_text' => 'Contact us',
                'useful_link_url'  => '#contact-us',
            ),
        );
        update_field('useful_links', $useful_links, 'option');

        
        $our_services = array(
            array(
                'service_text' => 'Web Design',
                'service_url'  => '#web-design',
            ),
            array(
                'service_text' => 'Web Development',
                'service_url'  => '#web-development',
            ),
            array(
                'service_text' => 'On Page SEO',
                'service_url'  => '#on-page-seo',
            ),
            array(
                'service_text' => 'Graphic Design',
                'service_url'  => '#graphic-design',
            ),
        );
        update_field('our_services', $our_services, 'option');


        $our_contact = array(
            'address' => '123 Main Street, Dhaka',
            'phone'   => '+880123456789',
            'email'   => 'info@example.com',
        );
        update_field('contact_footer', $our_contact, 'option');

    }
}



function invent_register_menus() {
    register_nav_menus([
        'footer_useful_links' => __( 'Footer Useful Links', 'invent' ),
        'our_services' => __( 'Our Serviecs', 'invent' ),
    ]);
}
add_action('after_setup_theme', 'invent_register_menus');





// Load TGM plugin activation
require get_template_directory() . '/inc/tgmpa.php';

// One Click Demo Import config
require_once get_template_directory() . '/inc/demo-import.php';







