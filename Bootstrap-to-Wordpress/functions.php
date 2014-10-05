<?php


function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_js' );

//add_filter( 'show_admin_bar', '__return_false' );

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );



function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu'	=> __( 'Header Menu' )
		)
	);
}
add_action( 'init', 'register_theme_menus' );


function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );


create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );




//	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
//}
//add_filter( 'excerpt_more', 'new_excerpt_more' );


// Custom Excerpt
function custom_wp_trim_excerpt($text) {
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content(''); // Original Content
    $text = strip_shortcodes($text); // Minus Shortcodes
    $text = apply_filters('the_content', $text); // Filters
    $text = str_replace(']]>', ']]&gt;', $text); // Replace
    

    $excerpt_length = apply_filters('excerpt_length', 80); // Length
    $firstvid = null;
    $postcustom = get_post_custom_keys();
    if ($postcustom){
      $i = 1;
      foreach ($postcustom as $key){
        if (strpos($key,'oembed')){
          foreach (get_post_custom_values($key) as $video){
            if ($i == 1){
            	$firstvid = $video;
              	$excerpt_length = apply_filters('excerpt_length', 6);
            }
          $i++;
          }
        }  
      }
    }
    $excerpt_more = apply_filters('excerpt_more', ' ' . '<a class="readmore" href="'. get_permalink() .'"><button type="button" class="btn btn-default btn-xs">Read More</button></a>');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    
    // Use First Video as Excerpt
    if ( $firstvid != null){
      $text = $firstvid.$text;
    }
    
  }
  return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');



function my_scripts()
{
	wp_enqueue_script('jquery');
	wp_register_script( 'fitvids-script', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery') );
	if ( !is_admin() ) {
		wp_enqueue_script( 'fitvids-script' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );



function fitvids_script() { 
echo '<script type="text/javascript">
jQuery(document).ready(function($) {     
$(".row").fitVids(); 
});
</script>';
} 
add_action('wp_footer', 'fitvids_script');
?>