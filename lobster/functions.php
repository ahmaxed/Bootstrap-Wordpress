<?php
/**
 *
 * @package    lobster
 * @subpackage Functions
 * @version    1.9.6
 * @since      1.0
 * @author     Ruairi Phelan <rory@cyberdesigncraft.com>
 * @copyright  2013, Cyberdesign Craft
 * @link       http://cyberdesigncraft.com/themes/wordpress/lobster/
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-3.0.html
 *
 *
 * Defining constants
 *
 * @since 1.0
 */


/**
 * Constants
 *
 * @since 1.0
 */
$lobster_theme_data = wp_get_theme();
define( 'CYBER_DC_LOBSTER_URL', get_template_directory_uri() );
define( 'CYBER_DC_LOBSTER_TEMPLATE', get_template_directory() );
define( 'CYBER_DC_LOBSTER', $lobster_theme_data->Name );

/**
 * Includes
 *
 * @since 1.0
 */
/* Loads Child Theme media file or then uses the parent theme's file. */
if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'inc/media.php' ) ) {

	require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/media.php' 						);

} else {

	/* Loads Parent's media file */
	require_once( trailingslashit( CYBER_DC_LOBSTER_TEMPLATE ) . 'inc/media.php' 						);
}

/* Load extension for WP menu. */
require_once( trailingslashit( CYBER_DC_LOBSTER_TEMPLATE ) . 'inc/cyber-dc-walker.php' 					);

/* Loads Child Theme theme-options file or then uses the parent theme's file. */
if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'inc/theme-options.php' ) ) {

	require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/theme-options.php' 				);

} else {

	/* Loads the Parant theme-options file */
	require_once( trailingslashit( CYBER_DC_LOBSTER_TEMPLATE ) . 'inc/theme-options.php' 				);
}

/* Functions for home page alignment */
require_once( trailingslashit( CYBER_DC_LOBSTER_TEMPLATE ) . 'inc/custom-metaboxes.php' 				);

/* custom image for widgets */
require_once( trailingslashit( CYBER_DC_LOBSTER_TEMPLATE ) . 'inc/widgets.php' 							);

/* Loads Child Theme custom-header file or then uses the parent theme's file. */
if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'inc/custom-header.php'  ) ) {

	require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/custom-header.php'  				);

} else {

	/* Loads Parent's custom-header file */
	require_once( trailingslashit( CYBER_DC_LOBSTER_TEMPLATE ) . 'inc/custom-header.php'  				);
}


/**
 * Prepare the content width
 *
 * @since 1.0
 */

$lobster_theme_options = lobster_theme_options();
if ( ! isset( $content_width ) )
	$content_width = $lobster_theme_options['width'] - 30;

add_action( 'after_setup_theme', 'lobster_setup' );
if ( ! function_exists( 'lobster_setup' ) ) :


/**
 * Initial setup
 *
 * This function is attached to the 'after_setup_theme' action hook.
 *
 * @uses	load_theme_textdomain()
 * @uses	get_locale()
 * @uses	CYBER_DC_LOBSTER_TEMPLATE
 * @uses	add_theme_support()
 * @uses	add_editor_style()
 * @uses	add_custom_background()
 * @uses	add_custom_image_header()
 * @uses	register_default_headers()
 *
 * @since 1.0
 */
function lobster_setup() {
	load_theme_textdomain( 'lobster', CYBER_DC_LOBSTER_TEMPLATE . '/languages' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'lobster' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', 'audio', 'quote', 'link', 'status', 'aside' ) );

	// This theme uses Featured Images (also known as post thumbnails) for archive pages
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'home-page', 500, 500, true );
	add_image_size( 'home-carousel', 1500, 500, true );

	// Add support for custom backgrounds
	add_theme_support( 'custom-background' );

	// Add support for custom header
	add_theme_support( 'custom-header' );

	// Add HTML5 elements
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // lobster_setup


/**
 * Filters the page title appropriately depending on the current page
 *
 * @uses get_bloginfo()
 * @uses is_home()
 * @uses is_front_page()
 *
 * @since 1.0
 */
add_filter( 'wp_title', 'lobster_filter_wp_title', 10, 2 );
if ( !function_exists( 'lobster_filter_wp_title' ) ) :
function lobster_filter_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'lobster' ), max( $paged, $page ) );

	return $title;
}
endif; // lobster_filter_wp_title

/**
 * Add pagination
 *
 * @uses	paginate_links()
 * @uses	add_query_arg()
 *
 * @since 1.0
 */
if ( ! function_exists( 'lobster_pagination' ) ) :
function lobster_pagination() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'lobster' ); ?></h1>
					<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'lobster' ) ); ?></div>
					<?php endif; ?>

					<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'lobster' ) ); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</nav><!-- .navigation -->
	<?php
}
endif; // lobster_pagination


/**
 * Callback function for comments
 *
 * Referenced via wp_list_comments() in comments.php.
 *
 * @uses get_avatar()
 * @uses get_comment_author_link()
 * @uses get_comment_date()
 * @uses get_comment_time()
 * @uses edit_comment_link()
 * @uses comment_text()
 * @uses comments_open()
 * @uses comment_reply_link()
 *
 * @since 1.0
 */
if ( ! function_exists( 'lobster_comment' ) ) :
function lobster_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :
		case '' :
		?>
		<li <?php comment_class(); ?>>
			<div id="comment-<?php comment_ID(); ?>" class="comment-body">
				<div class="comment-avatar">
					<?php echo get_avatar( $comment, 60 ); ?>
				</div>
				<div class="comment-content">
					<div class="comment-author">
						<?php echo get_comment_author_link() . ' '; ?>
					</div>
					<div class="comment-meta">
						<?php
						printf( __( '%1$s at %2$s', 'lobster' ), get_comment_date(), get_comment_time() );
						edit_comment_link( __( '(edit)', 'lobster' ), '  ', '' );
						?>
					</div>
					<div class="comment-text">
						<?php if ( '0' == $comment->comment_approved ) { echo '<em>' . __( 'Your comment is awaiting moderation.', 'lobster' ) . '</em>'; } ?>
						<?php comment_text() ?>
					</div>
					<?php if ( $args['max_depth'] != $depth && comments_open() && 'pingback' != $comment->comment_type ) { ?>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php
			break;

		case 'pingback'  :
		case 'trackback' :
		?>
		<li id="comment-<?php comment_ID(); ?>" class="pingback">
			<div class="comment-body">
				<i class="icon-paper-clip"></i>
				<?php _e( 'Pingback:', 'lobster' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(edit)', 'lobster' ), ' ' ); ?>
			</div>
			<?php
			break;
	endswitch;
}
endif; // lobster_comment



/**
 * Adds a read more link to all excerpts
 *
 * This function is attached to the 'excerpt_more' filter hook.
 *
 * @param int $more
 *
 * @return Custom excerpt ending
 *
 * @since 1.0
 */
add_filter( 'excerpt_more', 'lobster_excerpt' );
if ( ! function_exists( 'lobster_excerpt' ) ) :
function lobster_excerpt( $more ) {
	return '&hellip;';
}
endif; // lobster_excerpt


/**
 * Adds a read more link to all excerpts
 *
 * This function is attached to the 'wp_trim_excerpt' filter hook.
 *
 * @param string $text
 *
 * @return Custom read more link
 *
 * @since 1.0
 */
add_filter( 'wp_trim_excerpt', 'lobster_excerpt_more' );
if ( ! function_exists( 'lobster_excerpt_more' ) ) :
function lobster_excerpt_more( $text ) {
	$lobster_theme_options = lobster_theme_options();
	return '<p class="lead">' . $text . '</p><p class="more-link-p"><a class="btn btn-primary" href="' . get_permalink( get_the_ID() ) . '">' .  __( 'Read more &#133;', 'lobster' ) . '</a></p>';
}
endif; // lobster_excerpt_more

add_filter( 'the_content_more_link', 'lobster_content_more_link', 10, 2 );
if ( ! function_exists( 'lobster_content_more_link' ) ) :
/**
 * Customize read more link for content
 *
 * This function is attached to the 'the_content_more_link' filter hook.
 *
 * @param string $link
 * @param string $text
 *
 * @return Custom read more link
 *
 * @since 1.0
 */
function lobster_content_more_link( $link, $text ) {
	return '<p class="more-link-p"><a class="btn btn-danger" href="' . get_permalink( get_the_ID() ) . '">' . $text . '</a></p>';
}
endif; // lobster_content_more_link

add_filter( 'excerpt_length', 'lobster_excerpt_length', 999 );
if ( ! function_exists( 'lobster_excerpt_length' ) ) :
/**
 * Custom excerpt length
 *
 * This function is attached to the 'excerpt_length' filter hook.
 *
 * @param int $length
 *
 * @return Custom excerpt length
 *
 * @since 1.0
 */
function lobster_excerpt_length( $length ) {
	return 40;
}
endif; // lobster_excerpt_length

/*
 * Remove default gallery styles
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Full width conditional check
 *
 * @since 1.0
 *
 * @return boolean
 */
function is_lobster_full_width() {
	$lobster_theme_options = lobster_theme_options();
	if ( ! is_front_page() && ! is_search() && ! is_archive() ) {
		$single_layout = ( is_singular() ) ? get_post_meta( get_the_ID(), 'lobster_single_layout', true ) : '';
		if ( 'on' != $single_layout )
			return true;
	}
}



/**
 * Create the required attributes for the #primary container
 *
 * @since 1.0
 */
function lobster_primary_attr() {
	$lobster_theme_options = lobster_theme_options();

	$layout = $lobster_theme_options['layout'];
	$column = ( is_lobster_full_width() ) ? $lobster_theme_options['primary'] : '';
	$class = ( 6 == $layout ) ? $column . ' centered' : $column;
	$style = ( 1 == $layout || 3 == $layout ) ? ' style="float: right;"' : '';

	echo 'class="' . $class . '"' . $style;
}

/**
 * Create the required classes for the #secondary sidebar container
 *
 * @since 1.0
 */
function lobster_sidebar_class() {
	$lobster_theme_options = lobster_theme_options();

	$layout = $lobster_theme_options['layout'];
	if ( 1 == $layout || 2 == $layout || 6 == $layout ) {
		$end = ( 2 == $layout ) ? ' end' : '';
		$class = str_replace( 'col-md-', '', $lobster_theme_options['primary'] );
		$class = 'col-md-' . ( 12 - $class ) . $end;
	} else {
		$class = $lobster_theme_options['secondary'];
	}

	echo 'class="' . $class . '"';
}

add_filter( 'next_posts_link_attributes', 'lobster_add_attr' );
add_filter( 'previous_posts_link_attributes', 'lobster_add_attr' );
/**
 * Add 'btn' class to previous and next posts links
 *
 * This function is attached to the 'next_posts_link_attributes' and 'previous_posts_link_attributes' filter hook.
 *
 * @param string $format
 *
 * @return Modified string
 *
 * @since 1.0
 */
function lobster_add_attr() {
	return 'class="btn btn-primary btn-lg"';
}

add_filter( 'next_post_link', 'lobster_add_class' );
add_filter( 'previous_post_link', 'lobster_add_class' );
add_filter( 'next_image_link', 'lobster_add_class' );
add_filter( 'previous_image_link', 'lobster_add_class' );
/**
 * Add 'btn' class to previous and next post links
 *
 * This function is attached to the 'next_post_link' and 'previous_post_link' filter hook.
 *
 * @param string $format
 *
 * @return Modified string
 *
 * @since 1.0
 */
function lobster_add_class( $format ){
	return str_replace( 'href=', 'class="btn btn-primary" href=', $format );
}


