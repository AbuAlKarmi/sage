<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use function Roots\asset;
use function Roots\config;
use function Roots\view;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('metras/vendor', asset('scripts/customizer.js')->uri(), ['jquery'], null, true);
//    wp_enqueue_script('metras/popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], null, true);
//    wp_enqueue_script('metras/bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', ['jquery'], null, true);
    wp_enqueue_script('metras/app', asset('scripts/app.js')->uri(), ['metras/vendor', 'jquery'], null, true);
    wp_enqueue_script('metras/slick-slider', asset('vendors/slick-carousel/slick/slick.min.js')->uri(), ['metras/vendor', 'jquery'], null, true);
    wp_enqueue_script('metras/sharect', asset('vendors/sharect/dist/sharect.min.js')->uri(), ['metras/vendor', 'jquery'], null, true);

    wp_add_inline_script('metras/vendor', asset('scripts/manifest.js')->contents(), 'before');

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('metras/dubai-font', '//www.fontstatic.com/f=droid-naskh', false, null);

    $styles = ['vendors/slick-carousel/slick/slick.css','vendors/slick-carousel/slick/slick-theme.css','styles/app-rtl.css'];

    foreach ($styles as $stylesheet) {
        if (asset($stylesheet)->exists()) {
            wp_enqueue_style('metras/' . basename($stylesheet, '.css'), asset($stylesheet)->uri(), false, null);
        }
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    $path = get_template_directory() . '/resources/lang';
    load_theme_textdomain('sage', $path );

    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    add_theme_support('infinite-scroll', [
        'type'      => 'scroll',
        'container' => 'posts-infinite-scroll',
        'footer'    => false,
        'render'    => __NAMESPACE__ . '\\infiniteScroll',
    ]);

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');
    add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist
    add_image_size( 'post-image-square', 400, 300 , true ); // Used for featured posts if a large-feature doesn't exist
    add_image_size( 'post-image-slider', 1100, 600 , true ); // Used for featured posts if a large-feature doesn't exist

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/tinymce.scss
     */
    add_editor_style(asset('styles/app-rtl.css')->uri());
    add_theme_support( 'editor-styles' );

//    add_action('init', function(){
//        add_theme_support( 'infinite-scroll',
//            [
//                'container' => 'posts-loop',
//                'render' => 'metras_inifinite_scroll_render',
//                'footer' => 'wrapper',
//            ]
//        );
//    });
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget card %1$s %2$s"><div class="card-body">',
        'after_widget' => '</div></section>',
        'before_title' => '<h5 class="card-title">',
        'after_title' => '</h5>'
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer'
    ] + $config);
});


/**
 * Initialize ACF Builder
 */
//add_action('init', function () {
//    collect(glob('./app/fields/*.php'))->map(function ($field) {
//        return require_once($field);
//    })->map(function ($field) {
//        if ($field instanceof FieldsBuilder) {
//            acf_add_local_field_group($field->build());
//        }
//    });
//});


add_action('widgets_init', function () {
    register_widget('App\Widgets\QuoteOfTheDay');
    register_widget('App\Widgets\ReactionsWidget');
    register_widget('App\Widgets\CategoriesWidget');
    register_widget('App\Widgets\Newsletter');
});


require_once get_theme_file_path(). '/app/Vendors/class-tgm-plugin-activation.php';
require_once get_theme_file_path(). '/app/Vendors/aq_resizer.php';

add_action( 'tgmpa_register', function(){
    $plugins = [
        [
            'name'      => 'Advanced Gutenberg',
            'slug'      => 'advanced-gutenberg',
            'required'  => true, // this plugin is recommended
        ],
        [
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => true, // this plugin is recommended
        ],
        [
            'name'      => 'Custom Post Type UI',
            'slug'      => 'custom-post-type-ui',
            'required'  => true, // this plugin is recommended
        ],
        [
            'name'      => 'Gutenberg',
            'slug'      => 'gutenberg',
            'required'  => true, // this plugin is recommended
        ],
        [
            'name'      => 'Regenerate Thumbnails',
            'slug'      => 'regenerate-thumbnails',
            'required'  => true, // this plugin is recommended
        ],
        [
            'name'      => 'Regenerate Thumbnails',
            'slug'      => 'regenerate-thumbnails',
            'required'  => true, // this plugin is recommended
        ],
        [
            'name'      => 'Social Share',
            'slug'      => 'sassy-social-share',
            'required'  => true, // this plugin is recommended
        ],
    ];
    $config = [];

    tgmpa( $plugins, $config );
});

function infiniteScroll()
{
    global $pagenow;
    print_r($pagenow);
    dd($pagenow);
    if( is_home() ){
        verticalInfiniteScroll();
    }else if(is_archive()){
        if( true ){

        }else{
            horizontalInfiniteScroll();
        }
    }else{
        horizontalInfiniteScroll();
    }

}

function verticalInfiniteScroll(){
    echo '<div class="container-inner"><div class="row">';
    while (have_posts()) : the_post();
        echo "<div class='col-md-6'>";
        echo View::make('partials.content');
        echo "</div>";
    endwhile;
    echo '</div></div>';
}

function horizontalInfiniteScroll(){
    echo '<div class="container-inner">';
    while (have_posts()) : the_post();
        echo View::make('partials.content-horizontal');
    endwhile;
    echo '</div>';
}

function fancyInfiniteScroll(){
    echo View::make('partials.fancy-posts-list');
}
