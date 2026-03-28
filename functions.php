<?php
/**
 * Canyon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Canyon
 */

/**
 * Custom template tags for _s theme.
 */
require get_template_directory() . '/inc/theme-setup.php';

/**
 * Enqueue scripts and styles.
 */
function canyon_scripts() {

	$themecsspath = get_template_directory() . '/style.css';
	$style_ver = filemtime( $themecsspath );
	$themejspath = get_template_directory() . '/app.js';
	$js_ver = filemtime( $themejspath );

	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), $style_ver );

	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/app.js', false, $js_ver, true );

	wp_enqueue_style( 'gfont', 'https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Recursive:wght@300..1000&display=swap');

}
add_action( 'wp_enqueue_scripts', 'canyon_scripts' );


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom Shortcodes
 */
// require get_template_directory() . '/inc/shortcodes.php';


/**
 * Custom Post Types and Taxonomies
 */
require get_template_directory() . '/inc/posts-and-taxonomies.php';


 /* ACF Fields and Options Pages
 */
require get_template_directory() . '/inc/acf.php';


 /* Basic WP Setup (remove comments, no gutenberg etc.)
 */
require get_template_directory() . '/inc/basic-wp-setup.php';

// redirect to ACF file URL for publications
function redirect_to_acf_file_url() {
 if(is_singular( 'publications' )){
	$file_url = get_field('publication_file', get_the_ID());
	if (!empty($file_url) && is_string( $file_url ) ) {
		wp_redirect( esc_url( $file_url ), 301);
		exit;
	}
  }
}

add_action( 'template_redirect', 'redirect_to_acf_file_url' );