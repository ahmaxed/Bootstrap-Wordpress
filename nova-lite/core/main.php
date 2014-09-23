<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* LOCALIZE THEME */
/*-----------------------------------------------------------------------------------*/   

load_theme_textdomain('wip', get_template_directory() . '/languages');

/*-----------------------------------------------------------------------------------*/
/* CONTENT WIDTH */
/*-----------------------------------------------------------------------------------*/ 

if ( ! isset( $content_width ) )
	$content_width = 1170;


/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  
 
function novalite_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'novalite_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/* SHORTCODES */
/*-----------------------------------------------------------------------------------*/   

add_filter('widget_text', 'do_shortcode');

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

/*-----------------------------------------------------------------------------------*/
/* REQUIRE FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function novalite_require($folder) {

if (isset($folder)) : 

	$folder = dirname(dirname(__FILE__)) . $folder ;  
	
	$files = scandir($folder);  
	  
	foreach ($files as $key => $name) {  
		if (!is_dir($name)) { 
			require_once $folder . $name;
		} 
	}  

endif;

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function novalite_enqueue_script($folder) {

if (isset($folder)) : 

	$dir = dirname(dirname(__FILE__)) . $folder ;  
	
	$files = scandir($dir);  
	  
	foreach ($files as $key => $name) {  
		if (!is_dir($name)) { 
			
			wp_enqueue_script( str_replace('.js','',$name), get_template_directory_uri() . $folder . "/" . $name , array('jquery'), FALSE, TRUE ); 
			
		} 
	}  

endif;

}

/*-----------------------------------------------------------------------------------*/
/* STYLES FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function novalite_enqueue_style($folder) {

if (isset($folder)) : 

	$dir = dirname(dirname(__FILE__)) . $folder ;  
	
	$files = scandir($dir);  
	  
	foreach ($files as $key => $name) {  
		
		if (!is_dir($name)) { 
			
			wp_enqueue_style( str_replace('.css','',$name), get_template_directory_uri() . $folder . "/" . $name ); 
			
		} 
	}  

endif;

}

/*-----------------------------------------------------------------------------------*/
/* REQUEST FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function novalite_request($id) {
	
	if ( isset ( $_REQUEST[$id])) 
	return $_REQUEST[$id];	
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME PATH */
/*-----------------------------------------------------------------------------------*/ 

function novalite_theme_data($id) {
	
	 global $wp_version;	
	 if ( $wp_version <= 3.4 ) :
	 	$themedata = get_theme_data(TEMPLATEPATH. '/style.css');
		return $themedata[$id];
	 else:
		$themedata = wp_get_theme();
		return $themedata->get($id);
	 endif;
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME NAME */
/*-----------------------------------------------------------------------------------*/ 

function novalite_themename() {
	
	$themename = "nova_theme_settings";
	return $themename;	
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

function novalite_setting($id) {

	$wip_setting = get_option(novalite_themename());
	if(isset($wip_setting[$id]))
		return $wip_setting[$id];

}

/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

function novalite_postmeta($id) {

	global $post;
	
	if (!is_404()) {
		$val = get_post_meta( $post->ID , $id, TRUE);
		if(isset($val))
		return $val;
	} else {
		return null;
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

function novalite_setup() {

	add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	
	if (novalite_setting('wip_body_background')):
		$background = novalite_setting('wip_body_background');
	else:
		$background = "/images/background/patterns/pattern12.jpg";
	endif;
	
	add_theme_support( 'custom-background', array(
		'default-color' => 'f3f3f3',
		'default-image' => get_template_directory_uri() . $background,
	) );

	add_image_size( 'blog', 1170,429, TRUE ); 
	add_image_size( 'slide', 1170,429, TRUE ); 
	
	add_image_size( 'large', 449,304, TRUE ); 
	add_image_size( 'medium', 290,220, TRUE ); 
	add_image_size( 'small', 211,150, TRUE ); 

	register_nav_menu( 'main-menu', 'Main menu' );

}

add_action( 'after_setup_theme', 'novalite_setup' );

/*-----------------------------------------------------------------------------------*/
/* DEFAULT STYLE, AFTER THEME ACTIVATION */
/*-----------------------------------------------------------------------------------*/         

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	
	$wip_setting = get_option(novalite_themename());

	if (!$wip_setting) {	
		
		$skins = array( 
		
		"wip_skins" => "turquoise", 
		
		"wip_logo_font" => "Montez", 
		"wip_logo_font_size" => "55px", 
		
		"wip_menu_font" => "Oxygen", 
		"wip_menu_font_size" => "14px", 

		"wip_content_font" => "Oxygen", 
		"wip_content_font_size" => "14px", 

		"wip_titles_font" => "Yanone Kaffeesatz", 
		
		"wip_text_font_color" => "#616161", 
		
		"wip_link_color" => "#48c9b0", 
		"wip_link_color_hover" => "#1abc9c",
	
		"wip_header_text_color" => "#ffffff",
		"wip_subheader_text_color" => "#ffffff",
	
		"wip_bottom_text_color" => "#ffffff",
		"wip_social_icons_color" => "#333333",
		"wip_social_icons_hover" => "#ffffff",
		"wip_copyright_text_color" => "#ffffff",
	
		"wip_body_background" => "/images/background/patterns/pattern12.jpg",
		"wip_body_background_repeat" => "repeat",
		"wip_body_background_color" => "#f3f3f3",
	
		"wip_header_background_color" => "#262626",
		"wip_subheader_background_color" => "#212121",
		"wip_header_border_color" => "#333333",
	
		"wip_bottom_background_color" => "#262626",
		"wip_socialbox_background_color" => "#212121",
		"wip_footer_background_color" => "#262626",
		"wip_bottom_border_color" => "#333333",
	
		"wip_home" => "right-sidebar",
		"wip_category_layout" => "full",
		"wip_search_layout" => "full",
		
		"wip_view_comments" => "on",

		"wip_header_sidebar_area" => "span12",
		"wip_bottom_sidebar_area" => "span4",
		
		"wip_footer_facebook_button" => "",
		"wip_footer_twitter_button" => "",
		"wip_footer_skype_button" => "",
		"wip_footer_email_button" => "",
		
		);
	
		update_option( novalite_themename(), $skins ); 
		
	}
}

/*-----------------------------------------------------------------------------------*/
/* CONTENT TEMPLATE */
/*-----------------------------------------------------------------------------------*/ 

function novalite_template($id) {

	$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );

	$span = $template["full"];
	$sidebar =  "full";

	if ( ( is_search() ) && ( novalite_setting('wip_search_layout')) ) {
		
		$span = $template[novalite_setting('wip_search_layout')];
		$sidebar =  novalite_setting('wip_search_layout');
			
	} else if ( ( (is_category()) || (is_tag()) || (is_tax()) || (is_month()) ) && ( novalite_setting('wip_category_layout')) ) {
		
		$span = $template[novalite_setting('wip_category_layout')];
		$sidebar =  novalite_setting('wip_category_layout');
			
	} else if ( ( is_home() ) && ( novalite_setting('wip_home')) ) {
		
		$span = $template[novalite_setting('wip_home')];
		$sidebar =  novalite_setting('wip_home');
			
	} else if ( ( is_home() ) && ( !novalite_setting('wip_home')) ) {
		
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";
			
	} else if (novalite_postmeta('wip_template')) {
		
		$span = $template[novalite_postmeta('wip_template')];
		$sidebar =  novalite_postmeta('wip_template');
			
	}

	return ${$id};
	
}

/*-----------------------------------------------------------------------------------*/
/* SIDEBAR LIST */
/*-----------------------------------------------------------------------------------*/ 

function novalite_sidebar_list($sidebar_type) {
	
		$wip_sidebars = get_option(wip_themename());

		$default = array("none" => "None", $sidebar_type."_sidebar_area" => "Default");
		
		$sidebar_list = array();
		
		if(!empty($wip_sidebars["wip_sidebars"])):
		
			foreach ($wip_sidebars["wip_sidebars"] as $sidebar_item => $sidebar_items) {
				
				$sidebar = explode("_", $sidebar_items);

					if ($sidebar[0] == $sidebar_type)
						$sidebar_list[str_replace(" ","",strtolower($sidebar_items))] =  $sidebar[1];
					
					} 
				
			return array_merge($default, $sidebar_list);

		else:
			
			return $default;
			
		endif;
		
}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

function novalite_paged() {
	
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	return $paged;
	
}

/*-----------------------------------------------------------------------------------*/
/* OEMBED */
/*-----------------------------------------------------------------------------------*/   

function novalite_oembed_soundcloud(){
	wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
	wp_oembed_add_provider( 'https://soundcloud.com/*', 'http://soundcloud.com/oembed' );
	wp_oembed_add_provider('#https?://(?:api\.)?soundcloud\.com/.*#i', 'http://soundcloud.com/oembed');
}

add_action('init','novalite_oembed_soundcloud');

/*-----------------------------------------------------------------------------------*/
/* ADMIN MENU */
/*-----------------------------------------------------------------------------------*/   

function novalite_option_panel() {
        global $wp_admin_bar, $wpdb;
    	$wp_admin_bar->add_menu( array( 'id' => 'novaoptions', 'title' => '<span> Nova Options </span>', 'href' => get_admin_url() . 'themes.php?page=novaoption' ) );
        $wp_admin_bar->add_menu( array( 'id' => 'get_premium', 'title' => '<span> Get Premium </span>', 'href' => get_admin_url() . 'themes.php?page=getpremium' ) );
}

add_action( 'admin_bar_menu', 'novalite_option_panel', 1000 );

/*-----------------------------------------------------------------------------------*/
/* PRETTYPHOTO */
/*-----------------------------------------------------------------------------------*/   

function novalite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

add_filter( 'wp_get_attachment_link', 'novalite_prettyPhoto', 10, 6);

/*-----------------------------------------------------------------------------------*/
/* CUSTOM EXCERPT MORE */
/*-----------------------------------------------------------------------------------*/   

function novalite_new_excerpt_more() {
	
	global $post;
	return '<p><a class="button" href="'.get_permalink($post->ID).'" title="More">  ' . __( "Read More","wip") . ' →</a></p>';

}

add_filter('excerpt_more', 'novalite_new_excerpt_more');

/*-----------------------------------------------------------------------------------*/
/* REMOVE CATEGORY LIST REL */
/*-----------------------------------------------------------------------------------*/   

function novalite_remove_category_list_rel($output) {
	$output = str_replace('rel="category"', '', $output);
	return $output;
}

add_filter('wp_list_categories', 'novalite_remove_category_list_rel');
add_filter('the_category', 'novalite_remove_category_list_rel');

/*-----------------------------------------------------------------------------------*/
/* REMOVE THUMBNAIL DIMENSION */
/*-----------------------------------------------------------------------------------*/ 

function novalite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'novalite_remove_thumbnail_dimensions', 10, 3 );
  
/*-----------------------------------------------------------------------------------*/
/* REMOVE CSS GALLERY */
/*-----------------------------------------------------------------------------------*/ 

function novalite_my_gallery_style() {
    return "<div class='gallery'>";
}

add_filter( 'gallery_style', 'novalite_my_gallery_style', 99 );

/*-----------------------------------------------------------------------------------*/
/* THEMATIC DROPDOWN OPTIONS */
/*-----------------------------------------------------------------------------------*/ 

function novalite_childtheme_dropdown_options($dropdown_options) {
	$dropdown_options = '<script type="text/javascript" src="'. get_stylesheet_directory_uri() .'/scripts/thematic-dropdowns.js"></script>';
	return $dropdown_options;
}

add_filter('thematic_dropdown_options','novalite_childtheme_dropdown_options');

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

function novalite_scripts_styles() {

	novalite_enqueue_style('/css');

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( "jquery-ui-core", array('jquery'));
	wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
	
	novalite_enqueue_script('/js');

}

add_action( 'wp_enqueue_scripts', 'novalite_scripts_styles' );

/*-----------------------------------------------------------------------------------*/
/* FUNCTIONS */
/*-----------------------------------------------------------------------------------*/ 

novalite_require('/core/templates/');
novalite_require('/core/classes/');
novalite_require('/core/functions/');
novalite_require('/core/metaboxes/');

?>