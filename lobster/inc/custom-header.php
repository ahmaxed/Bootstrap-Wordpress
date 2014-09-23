<?php
/**
 * Implements a custom header for Lobster
 * See http://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage lobster
 * @since lobster 1.4
 */

/**
 * Sets up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses lobster_header_style() to style front-end.
 * @uses lobster_admin_header_style() to style wp-admin form.
 * @uses lobster_admin_header_image() to add custom markup to wp-admin form.
 * @uses lobster_default_headers() to set up the bundled header images.
 *
 * @since lobster 1.4
 */
function lobster_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '0088cc',
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => 230,
		'width'                  => 1600,

		// Callbacks for styling the header and the admin preview.
		'admin-head-callback'    => 'lobster_admin_header_style',
		'admin-preview-callback' => 'lobster_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );

	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'Pattern One' => array(
			'url'           => '%s/images/headers/one_bg.jpg',
			'thumbnail_url' => '%s/images/headers/one_thumb.png',
			'description'   => _x( 'Pattern One', 'header image description', 'lobster' )
		),
		'Pattern Two' => array(
			'url'           => '%s/images/headers/two_bg.jpg',
			'thumbnail_url' => '%s/images/headers/two_thumb.png',
			'description'   => _x( 'Pattern Two', 'header image description', 'lobster' )
		),
		'Pattern Three' => array(
			'url'           => '%s/images/headers/three_bg.jpg',
			'thumbnail_url' => '%s/images/headers/three_thumb.png',
			'description'   => _x( 'Pattern Three', 'header image description', 'lobster' )
		),
	) );
}
add_action( 'after_setup_theme', 'lobster_custom_header_setup' );


/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since lobster 1.4
 */
function lobster_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="lobster-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll top; background-size: 1600px auto;';
		} ?>
		padding: 0 20px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) || display_header_text() ) {
			echo 'min-height: 230px;';
		} ?>
		width: 100%;
	}
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#headimg h2 {
		position: absolute !important;
		clip: rect(1px 1px 1px 1px); /* IE7 */
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php endif; ?>
	h3.home-jumbotron {
		font: bold 60px/1 Lobster !important;
		margin: 0;
		padding: 58px 0 10px;
	}
	#headimg h3 a {
		text-decoration: none;
	}
	#headimg h1 a:hover {
		text-decoration: none;
	}
	#headimg h2 {
		font: 200 italic 24px Helvetica, arial, sans-serif;
		margin: 0;
		text-shadow: none;
	}
	.default-header img {
		max-width: 230px;
		width: auto;
	}
	</style>
<?php
}

/**
 * Outputs markup to be displayed on the Appearance > Header admin panel.
 * This callback overrides the default markup displayed there.
 *
 * @since lobster 1.4
 */
/** 
 * Create the Custom Header section on the home page
 *
 * @since 1.4
 */


function lobster_admin_header_image() {
	global $paged;
	$lobster_theme_options = lobster_theme_options();
	if ( !empty($lobster_theme_options['custom_header_display']) ) {
	
				/**
				 * Displays the Custom header Text
				 */
				?>
				<div class="displaying-header-text home-jumbotron jumbotron col-xs-12" id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto;">
					<h3 class="lobster-ch-intro" style="color:#<?php header_textcolor(); ?>;"><?php echo $lobster_theme_options['cust_header_headline_title']; ?></h3>
					<i style="color:#<?php header_textcolor(); ?>;" class="jumbo-icon icon-star-empty"></i>
					<p class="lead"><?php if ( is_front_page() || is_home() ) { echo $lobster_theme_options['cust_header_headline_text'];} elseif ( is_page() ){ echo '<small>'.bloginfo( 'description' ).'</small>';} ?></p>
				</div>

	<?php
	}
}
