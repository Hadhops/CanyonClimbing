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

	wp_enqueue_style( 'gfont', 'https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Recursive:slnt,wght,CASL@-15..0,300..1000,0..1&display=swap');

	// Climbing gym portal embed, which powers the waiver lightbox. Deferred:
	// it only registers delegated listeners on window and reads data-redpoint
	// at click time, so it never needs to run while the page is parsing.
	// null version so no ?ver= is appended to a third party URL.
	wp_enqueue_script(
		'redpoint-embed',
		'https://portal3.climbing-gym.com/js/embed.js',
		array(),
		null,
		array( 'strategy' => 'defer', 'in_footer' => false )
	);

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


/* YOAST fix homepage title
 */
add_filter('wpseo_title', function($title) {
    if (is_front_page()) {
        return get_the_title() . ' - ' . get_bloginfo('name');
    }
    return $title;
});

/* Add waiver FAB
 */
function waiver_fab_enqueue() {
    wp_add_inline_style( 'wp-block-library', '
        
    ' );
}
add_action( 'wp_enqueue_scripts', 'waiver_fab_enqueue' );

function waiver_fab_html() {
    // ✏️ Change the href below to your waiver page URL
    echo '
    <a class="waiver-fab" data-redpoint="lightbox" data-lightboxcolor="#e3b545" data-lightboxurl="https://portal3.climbing-gym.com/lightbox/uptown/agreements/waiver" href="https://portal3.climbing-gym.com/uptown/agreements/waiver" aria-label="Fill out waiver">
        <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <path id="fab-text-circle"
                    d="M 60,60 m -38,0 a 38,38 0 1,1 76,0 a 38,38 0 1,1 -76,0"/>
            </defs>
            <text font-size="20" font-weight="500" fill="black" letter-spacing="3.2">
                <textPath href="#fab-text-circle" startOffset="0%">
                    FILL OUT WAIVER • 
                </textPath>
            </text>
            <!-- Pencil icon in the centre -->
            <text x="60" y="70" text-anchor="middle"
                  font-size="30" fill="black" font-family="sans-serif">✎</text>
        </svg>
    </a>
    ';
}
add_action( 'wp_footer', 'waiver_fab_html' );