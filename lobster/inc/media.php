<?php
/**
 * Functions for handling media, scripts, and styles in the theme.
 *
 * @package 	Lobster
 * @subpackage 	Includes
 * @since 		0.1
 * @author 		Ruairi Phelan <rory@cyberdesigncraft.com>
 * @copyright 	2013, Cyberdesign Craft
 * @license 	http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

add_action( 'wp_head', 'lobster_styles' );

/**
 * Add a style block to the theme for the current link color.
 *
 * This function is attached to the 'wp_head' action hook.
 *
 * @since 1.0
 */
function lobster_styles() {
	$lobster_theme_options = lobster_theme_options();
	?>
<style>
.container, .boxed #page, #main > .row, .home #primary article > .row, .archive #primary article > .row, .search #primary article > .row { max-width: <?php echo $lobster_theme_options['width']; ?>px; }
</style>
	<?php
}


add_action( 'wp_enqueue_scripts', 'lobster_add_js' );
if ( ! function_exists( 'lobster_add_js' ) ) :
/**
 * Load all JavaScript to header
 *
 * This function is attached to the 'wp_enqueue_scripts' action hook.
 *
 * @uses is_admin()
 * @uses is_singular()
 * @uses get_option()
 * @uses wp_enqueue_script()
 * @uses CYBER_DC_THEME_URL
 *
 * @since 1.0
 */
function lobster_add_js() {
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'bootstrap', CYBER_DC_LOBSTER_URL .'/js/bootstrap.min.js', array( 'jquery' ), '2.2.2', true );
	wp_enqueue_script( 'lobster-js', CYBER_DC_LOBSTER_URL .'/js/lobster.js', array( 'bootstrap' ), '', true );

	wp_enqueue_style( 'theme_stylesheet', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', CYBER_DC_LOBSTER_URL .'/css/font-awesome.css', false, '3.1.0', 'all' );
	wp_enqueue_style( 'google_fonts', 'http://fonts.googleapis.com/css?family=Lobster', false, null, 'all' );

}
endif; // lobster_add_js
