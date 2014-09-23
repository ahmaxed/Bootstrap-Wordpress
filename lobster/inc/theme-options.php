<?php
/**
 * Set up the default theme options
 *
 * @since 1.0
 */
function lobster_theme_options() {
	//delete_option( 'lobster_theme_options' );
	$default_theme_options = array(
		'width' => '1200',
		'layout' => '2',
		'primary' => 'col-md-8',
		'display_author' => 'on',
		'display_date' => 'on',
		'display_comment_count' => 'on',
		'display_categories' => 'on',
		'excerpt_content' => 'excerpt',
		'home_widget' =>'on',
		'home_posts' =>'on',
		'jumbo_headline_title' => 'Lobster!',
		'jumbo_headline_text' => 'You could write something extraordinary and profound here!',
		'cust_header_headline_title' => 'This is your Custom header!',
		'cust_header_headline_text' => 'You could could change the World!',
		'custom_header_display' => '',
	);

	return get_option( 'lobster_theme_options', $default_theme_options );
}

/** 
 * Create the jumbo headline section on the home page
 *
 * @since 1.0
 */
function lobster_jumbotron() {
	$lobster_theme_options = lobster_theme_options();
	if ( is_home() || is_front_page() && ! empty( $lobster_theme_options['jumbo_headline_title'] ) ) {
	?>
		
				<div class="home-jumbotron jumbotron col-xs-12">
					<h3 style="color:#<?php header_textcolor(); ?>;"><?php echo $lobster_theme_options['jumbo_headline_title']; ?></h3>
					<i style="color:#<?php header_textcolor(); ?>;" class="jumbo-icon icon-star-empty"></i>
					<p class="lead"><?php if ( is_front_page() ) { echo $lobster_theme_options['jumbo_headline_text'];} elseif ( is_home() ){ echo '<small>'.bloginfo( 'description' ).'</small>';} ?></p>
					<?php if ( ! empty( $lobster_theme_options['jumbo_headline_button_text'] ) ) { ?>
					<small><?php echo bloginfo( 'description' ); ?></small>
					<a class="btn btn-lg btn-primary" href="<?php echo $lobster_theme_options['jumbo_headline_button_link']; ?>"><?php echo $lobster_theme_options['jumbo_headline_button_text']; ?></a>
					<?php } ?>
				</div>
			
	<?php
	}
}

/**
 * Create the default widgets that are displayed in the home page top area
 *
 * @since 1.0
 */
function lobster_home_page_default_widgets() {
	global $paged;
	$lobster_theme_options = lobster_theme_options();
	if ( $lobster_theme_options['home_widget'] && is_front_page() && 2 > $paged ) {
		?>
	<div id="home-page-widgets" style="background-color:#<?php header_textcolor(); ?>;">
		<div class="container">
			<div class="row">
			<?php if ( ! dynamic_sidebar( 'home-page-top-area' ) ) : ?>
				<?php
				/**
				 * Default home page top area widgets
				 */
				?>
				<aside class="home-widget col-md-4 lobster_custom_text_widget">
					<img src="<?php echo CYBER_DC_LOBSTER_URL; ?>/images/sample1.png" alt="" class="aligncenter" />
					<h3 class="home-widget-title">Mobile First</h3>
					<div class="textwidget">
						<p>100% Responsive. With <strong><?php echo CYBER_DC_LOBSTER; ?></strong> you just simply resize your browser and watch how this theme adjusts from smartphones, to tablets and desktops.</p>
					</div>
				</aside>

				<aside class="home-widget col-md-4 lobster_custom_text_widget">
					<img src="<?php echo CYBER_DC_LOBSTER_URL; ?>/images/sample2.png" alt="" class="aligncenter" />
					<h3 class="home-widget-title">Launch Ready!</h3>
					<div class="textwidget">
						<p>Launch your new business with <?php echo CYBER_DC_LOBSTER; ?>! Use the Theme Options to customize this theme to your liking and preview your changes in real time before going live!</p>
					</div>
					<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
						<div class=""><?php printf( __( '%sClick Here to Change Widgets%s', 'lobster' ), '<a href="' . admin_url( 'widgets.php' ) . '">', '</a>', '<a href="' . admin_url( 'customize.php' ) . '">', '</a>' ); ?></div>
				<?php } ?>
				</aside>

				<aside class="home-widget col-md-4 lobster_custom_text_widget">
					<img src="<?php echo CYBER_DC_LOBSTER_URL; ?>/images/sample3.png" alt="" class="aligncenter" />
					<h3 class="home-widget-title">Bootstrap 3</h3>
					<div class="textwidget">
						<p>Avail of all the great Bootstrap elements that you know and love, except now it is all mobile first! <strong><?php echo CYBER_DC_LOBSTER; ?></strong> is proudly powered by WordPress and Bootstrap. <a href="#">Link color test</a></p>
					</div>
				</aside>
			<?php endif; ?>
			</div>
		</div>
	</div>
	<?php
	}
}


class Lobster_Customizer {
	public function __construct() {

		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	/**
	 * Adds theme options to the Customizer screen
	 *
	 * This function is attached to the 'customize_register' action hook.
	 *
	 * @param	class $wp_customize
	 *
	 * @since 1.0
	 */
	public function customize_register( $wp_customize ) {
		$lobster_theme_options = lobster_theme_options();

		// Layout section panel
		$wp_customize->add_section( 'lobster_layout', array(
			'title' => __( 'Layout', 'lobster' ),
			'priority' => 35,
		) );

		$wp_customize->add_setting( 'lobster_theme_options[width]', array(
			'default' => $lobster_theme_options['width'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_width', array(
			'label' => __( 'Site Width', 'lobster' ),
			'section' => 'lobster_layout',
			'settings' => 'lobster_theme_options[width]',
			'priority' => 10,
			'type' => 'select',
			'choices' => array(
				'1200' => __( '1200px', 'lobster' ),
				'960' => __( '960px', 'lobster' ),
			),
		) );

		$wp_customize->add_setting( 'lobster_theme_options[layout]', array(
			'default' => $lobster_theme_options['layout'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_site_layout', array(
			'label' => __( 'Site Layout', 'lobster' ),
			'section' => 'lobster_layout',
			'settings' => 'lobster_theme_options[layout]',
			'priority' => 15,
			'type' => 'radio',
			'choices' => array(
				'1' => __( '1 Sidebar - Left', 'lobster' ),
				'2' => __( '1 Sidebar - Right', 'lobster' ),
				'6' => __( 'No Sidebars', 'lobster' )
			),
		) );

		$choices =  array(
			'col-md-2' 	=> '17%',
			'col-md-3' 	=> '25%',
			'col-md-4' 	=> '34%',
			'col-md-5' 	=> '42%',
			'col-md-6' 	=> '50%',
			'col-md-7' 	=> '58%',
			'col-md-8' 	=> '66%',
			'col-md-9' 	=> '75%',
			'col-md-10' => '83%',
			'col-md-12' => '100%',
		);

		$wp_customize->add_setting( 'lobster_theme_options[primary]', array(
			'default' => $lobster_theme_options['primary'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_primary_column', array(
			'label' => __( 'Main Content', 'lobster' ),
			'section' => 'lobster_layout',
			'settings' => 'lobster_theme_options[primary]',
			'priority' => 20,
			'type' => 'select',
			'choices' => $choices,
		) );

		$wp_customize->add_setting( 'lobster_theme_options[excerpt_content]', array(
			'default' => $lobster_theme_options['excerpt_content'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_excerpt_content', array(
			'label' => __( 'Post Content Display', 'lobster' ),
			'section' => 'lobster_layout',
			'settings' => 'lobster_theme_options[excerpt_content]',
			'priority' => 30,
			'type' => 'radio',
			'choices' => array(
				'excerpt' => __( 'Teaser Excerpt', 'lobster' ),
				'content' => __( 'Full Content', 'lobster' ),
			),
		) );

		$wp_customize->add_setting( 'lobster_theme_options[home_widget]', array(
			'default' => $lobster_theme_options['home_widget'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_home_widget', array(
			'label' => __( 'Display Home Page Top Widget Area', 'lobster' ),
			'section' => 'lobster_layout',
			'settings' => 'lobster_theme_options[home_widget]',
			'priority' => 35,
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'lobster_theme_options[home_posts]', array(
			'default' => $lobster_theme_options['home_posts'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_home_posts', array(
			'label' => __( 'Display Home Page Posts', 'lobster' ),
			'section' => 'lobster_layout',
			'settings' => 'lobster_theme_options[home_posts]',
			'priority' => 40,
			'type' => 'checkbox',
		) );

		// Jumbo headline section panel
		$wp_customize->add_section( 'lobster_jumbo', array(
			'title' => __( 'Jumbo Headline', 'lobster' ),
			'priority' => 36,
		) );

		$wp_customize->add_setting( 'lobster_theme_options[jumbo_headline_title]', array(
			'default' => $lobster_theme_options['jumbo_headline_title'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_jumbo_headline_title', array(
			'label' => __( 'Jumbo Headline Title', 'lobster' ),
			'section' => 'lobster_jumbo',
			'settings' => 'lobster_theme_options[jumbo_headline_title]',
			'priority' => 26,
			'type' => 'text',
		) );

		$wp_customize->add_setting( 'lobster_theme_options[jumbo_headline_text]', array(
			'default' => $lobster_theme_options['jumbo_headline_text'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_jumbo_headline_text', array(
			'label' => __( 'Jumbo Headline Text', 'lobster' ),
			'section' => 'lobster_jumbo',
			'settings' => 'lobster_theme_options[jumbo_headline_text]',
			'priority' => 27,
			'type' => 'text',
		) );

		// Posts panel
		$wp_customize->add_section( 'lobster_posts', array(
			'title' => __( 'Posts', 'lobster' ),
			'priority' => 45,
		) );

		$wp_customize->add_setting( 'lobster_theme_options[display_categories]', array(
			'default' => $lobster_theme_options['display_categories'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_display_categories', array(
			'label' => __( 'Display Categories', 'lobster' ),
			'section' => 'lobster_posts',
			'settings' => 'lobster_theme_options[display_categories]',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'lobster_theme_options[display_author]', array(
			'default' => $lobster_theme_options['display_author'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_display_author', array(
			'label' => __( 'Display Author', 'lobster' ),
			'section' => 'lobster_posts',
			'settings' => 'lobster_theme_options[display_author]',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'lobster_theme_options[display_date]', array(
			'default' => $lobster_theme_options['display_date'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_display_date', array(
			'label' => __( 'Display Date', 'lobster' ),
			'section' => 'lobster_posts',
			'settings' => 'lobster_theme_options[display_date]',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'lobster_theme_options[display_comment_count]', array(
			'default' => $lobster_theme_options['display_comment_count'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_display_comment_count', array(
			'label' => __( 'Display Comment Count', 'lobster' ),
			'section' => 'lobster_posts',
			'settings' => 'lobster_theme_options[display_comment_count]',
			'type' => 'checkbox',
		) );

		// Custom header section panel
		$wp_customize->add_section( 'lobster_cust_header', array(
			'title' => __( 'Custom Header', 'lobster' ),
			'priority' => 54,
		) );

		$wp_customize->add_setting( 'lobster_theme_options[cust_header_headline_title]', array(
			'default' => $lobster_theme_options['cust_header_headline_title'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_cust_header_headline_title', array(
			'label' => __( 'Custom Header Headline Title', 'lobster' ),
			'section' => 'lobster_cust_header',
			'settings' => 'lobster_theme_options[cust_header_headline_title]',
			'priority' => 34,
			'type' => 'text',
		) );

		$wp_customize->add_setting( 'lobster_theme_options[cust_header_headline_text]', array(
			'default' => $lobster_theme_options['cust_header_headline_text'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_cust_header_headline_text', array(
			'label' => __( 'Custom Header Headline Text', 'lobster' ),
			'section' => 'lobster_cust_header',
			'settings' => 'lobster_theme_options[cust_header_headline_text]',
			'priority' => 38,
			'type' => 'text',
		) );

		$wp_customize->add_setting( 'lobster_theme_options[custom_header_display]', array(
			'default' => $lobster_theme_options['custom_header_display'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'lobster_cust_header_display', array(
			'label' => __( 'Display Custom Header and Header Image (This box must be ticked to enable the Header Image feature below.)', 'lobster' ),
			'section' => 'lobster_cust_header',
			'settings' => 'lobster_theme_options[custom_header_display]',
			'priority' => 25,
			'type' => 'checkbox',
		) );

		
	}
}
$lobster_customizer = new Lobster_Customizer;