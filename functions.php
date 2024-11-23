<?php
if ( ! function_exists( 'azizultex_setup' ) ) {

	function azizultex_setup() {
		/** Make theme available for translation. */
		load_theme_textdomain( 'azizultex', get_template_directory() . '/languages' );

		/** Enable support for Post Thumbnails on posts and pages. */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post_thumb', 180, 240, true );
		add_image_size( 'post_large', 1140, 380, true );

		/** This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
		  	'menu-1' => esc_html__( 'Primary Menu', 'azizultex' )
		));
	}
}
add_action( 'after_setup_theme', 'azizultex_setup' );

/*** Enqueue scripts and styles. */
function venturelane_scripts() {

	/*** Enqueue styles. */
    wp_enqueue_style( 'azizultex', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_template_directory() . '/style.css' )));

	/*** Enqueue scripts. */
	wp_enqueue_script('jquery');
	wp_enqueue_script('sidr', '//cdn.jsdelivr.net/jquery.sidr/2.2.1/jquery.sidr.min.js', array('jquery'), true);
	wp_enqueue_script('ionesm', '//unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js', array('jquery'), true);
	wp_enqueue_script('ionicons', '//unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js', array('jquery'), true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/assets/js/scripts.js' )), true);
}
add_action( 'wp_enqueue_scripts', 'venturelane_scripts' );

/*** Return an alternate title, without prefix, for every type used in the get_the_archive_title(). */
add_filter('get_the_archive_title', function ($title) {

    if ( is_category() || is_tag() || is_tax('solution-category') ) 
    {
        $title = single_tag_title( '', false );
    }
    elseif ( is_author() ) 
    {
        $title = get_the_author();
    }

    return $title;
});


/*** Added Page Custom Meta */
function azizultex_add_page_meta_box() {
    add_meta_box(
        'page_meta_box',         
        'Other Options',
        'azizultex_render_page_meta_box',
        'page',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'azizultex_add_page_meta_box');

function azizultex_render_page_meta_box($post) {
    $disable_left_image = get_post_meta($post->ID, '_azizultex_disable_left_image', true);

    wp_nonce_field('azizultex_save_page_meta', 'azizultex_page_meta_nonce');
    ?>
    <p>
        <label for="azizultex_disable_left_image">
            <input type="checkbox" id="azizultex_disable_left_image" name="azizultex_disable_left_image" value="1" <?php checked($disable_left_image, '1'); ?>>
            Disable Left Image
        </label>
    </p>
    <?php
}

function azizultex_save_page_meta($post_id) {
    if (!isset($_POST['azizultex_page_meta_nonce']) || !wp_verify_nonce($_POST['azizultex_page_meta_nonce'], 'azizultex_save_page_meta')) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $disable_left_image = isset($_POST['azizultex_disable_left_image']) ? '1' : '';
    update_post_meta($post_id, '_azizultex_disable_left_image', $disable_left_image);
}
add_action('save_post', 'azizultex_save_page_meta');
