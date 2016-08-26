<?php 

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );


    if(is_front_page()) {
    	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/style.css', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_style( 'line-icons', get_stylesheet_directory_uri() . '/css/line-icons.css', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_style( 'venobox', get_stylesheet_directory_uri() . '/css/venobox.css', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/css/app.css', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_style( 'timeline', get_stylesheet_directory_uri() . '/css/shortcode_timeline2.css', array(), wp_get_theme()->get('Version'));


    	wp_enqueue_script('jquery');
    	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_script( 'readmore', get_stylesheet_directory_uri() . '/js/readmore.min.js', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_script( 'ajaxjs', get_stylesheet_directory_uri() . '/lib/ajaxjs.js', array(), wp_get_theme()->get('Version'));
    	wp_enqueue_script( 'setting', get_stylesheet_directory_uri() . '/lib/setting.js', array(), wp_get_theme()->get('Version'));
    }
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );