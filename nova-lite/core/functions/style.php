<?php function novalite_css_custom() { ?>

<style type="text/css">

<?php

/* =================== END HEADER STYLE =================== */

	if ( novalite_setting('wip_header_background_color') ):

		echo '#header, nav#mainmenu ul ul { background-color: '.novalite_setting('wip_header_background_color').'; } ';
		echo 'nav#mainmenu ul ul { border-top-color: '.novalite_setting('wip_header_background_color').'; } ';

	endif;	

	if ( novalite_setting('wip_subheader_background_color') ):

		echo '#subheader { background-color: '.novalite_setting('wip_subheader_background_color').'; } ';
		
	endif;	

	if ( novalite_setting('wip_header_border_color') ):

		echo '#header, nav#mainmenu ul ul li a, #subheader { border-color: '.novalite_setting('wip_header_border_color').'; } ';
		echo 'nav#mainmenu ul ul { border-left-color: '.novalite_setting('wip_header_border_color').'; border-right-color: '.novalite_setting('wip_header_border_color').'; border-bottom-color: '.novalite_setting('wip_header_border_color').'; } ';
		
	endif;	

/* =================== END HEADER STYLE =================== */

/* =================== END BOTTOM STYLE =================== */

	if ( novalite_setting('wip_bottom_background_color') ):

		echo '.bottom_widget { background-color: '.novalite_setting('wip_bottom_background_color').'; } ';
		
	endif;	

	if ( novalite_setting('wip_socialbox_background_color') ):

		echo '.bottom_socials { background-color: '.novalite_setting('wip_socialbox_background_color').'; } ';
		
	endif;	

	if ( novalite_setting('wip_footer_background_color') ):

		echo '#footer { background-color: '.novalite_setting('wip_footer_background_color').'; } ';
		
	endif;	

	if ( novalite_setting('wip_bottom_border_color') ):

		echo '#footer, .bottom_socials, .bottom_widget, .bottom_widget ul.contact-info li, .bottom_widget .widget-box li { border-color: '.novalite_setting('wip_bottom_border_color').'; } ';
		
	endif;	

/* =================== END HEADER STYLE =================== */

/* =================== BEGIN LOGO STYLE =================== */

	$logostyle = '';
	/* Logo Font */
	if (novalite_setting('wip_logo_font')) 
		$logostyle .= "font-family:'".novalite_setting('wip_logo_font')."',Verdana, Geneva, sans-serif;"; 

	/* Logo Font Size */
	if (novalite_setting('wip_logo_font_size')) 
		$logostyle .= "font-size:".novalite_setting('wip_logo_font_size').";"; 
	
	if ($logostyle)
		echo '#logo a { '.$logostyle.' } ';

/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav Font */
	if (novalite_setting('wip_menu_font')) 
		$navstyle .= "font-family:'".novalite_setting('wip_menu_font')."',Verdana, Geneva, sans-serif;"; 

	/* Nav  Font Size */
	if (novalite_setting('wip_menu_font_size')) 
		$navstyle .= "font-size:".novalite_setting('wip_menu_font_size').";"; 
	
	/* Nav  Font Color */
	if (novalite_setting('wip_menu_font_color')) 
		$navstyle .= "color:".novalite_setting('wip_menu_font_color').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a { '.$navstyle.' } ';

/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (novalite_setting('wip_content_font_size')) 
		echo ".article p, .article li, .article address, .article dd, .article blockquote, .article td, .article th { font-size:".novalite_setting('wip_content_font_size')."}"; 
	

/* =================== END CONTENT STYLE =================== */

/* =================== START TITLE STYLE =================== */

	$titlestyle = '';

	if (novalite_setting('wip_titles_font')) 
		$titlestyle .= "font-family:'".novalite_setting('wip_titles_font')."',Verdana, Geneva, sans-serif;"; 
	
	if ($titlestyle)
		echo 'h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, h1, h2, h3, h4, h5, h6  { '.$titlestyle.' } ';

	if (novalite_setting('wip_h1_font_size')) 
		echo "h1 {font-size:".novalite_setting('wip_h1_font_size')."; }"; 
	if (novalite_setting('wip_h2_font_size')) 
		echo "h2 { font-size:".novalite_setting('wip_h2_font_size')."; }"; 
	if (novalite_setting('wip_h3_font_size')) 
		echo "h3 { font-size:".novalite_setting('wip_h3_font_size')."; }"; 
	if (novalite_setting('wip_h4_font_size')) 
		echo "h4 { font-size:".novalite_setting('wip_h4_font_size')."; }"; 
	if (novalite_setting('wip_h5_font_size')) 
		echo "h5 { font-size:".novalite_setting('wip_h5_font_size')."; }"; 
	if (novalite_setting('wip_h6_font_size')) 
		echo "h6 { font-size:".novalite_setting('wip_h6_font_size')."; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== START LINK STYLE =================== */

	if ( novalite_setting('wip_link_color') ):

		echo '::-moz-selection { background-color: '.novalite_setting('wip_link_color').'; } ';
		echo '::selection { background-color: '.novalite_setting('wip_link_color').'; } ';
		echo 'article blockquote { border-left-color: '.novalite_setting('wip_link_color').'; } ';
		
	endif;	
	
	if ( novalite_setting('wip_link_color_hover') ):

		echo '#back-to-top a:hover, body.light #back-to-top a:hover, .pin-article .link a:hover, .pin-article .quote:hover, #searchform input[type=submit]:hover, .contact-form input[type=submit]:hover, .comment-form input[type=submit]:hover, .widget-category li a:hover, .tagcloud a:hover, .socials a:hover,.button:hover, .wp-pagenavi a:hover, .wp-pagenavi span.current, #wp-calendar #today, #wp-calendar #today a { background-color: '.novalite_setting('wip_link_color_hover').'; } ';

		echo '#sidebar a:hover, .bottom a:hover, #footer a:hover, #logo a:hover, nav#mainmenu ul li a:hover, nav#mainmenu li:hover > a, nav#mainmenu ul li.current-menu-item > a,  nav#mainmenu ul li.current_page_item > a, nav#mainmenu ul li.current-menu-parent > a, nav#mainmenu ul li.current_page_ancestor > a, nav#mainmenu ul li.current-menu-ancestor > a, .pin-article h3.title a:hover, .entry-info a:hover { color: '.novalite_setting('wip_link_color_hover').'; } ';

		echo '#back-to-top a:hover { border-color: '.novalite_setting('wip_link_color_hover').'; } ';

	endif;	

	if ( novalite_setting('wip_header_text_color') ):
	
		echo '#logo a, nav#mainmenu ul li a, nav#mainmenu ul ul li a { color: '.novalite_setting('wip_header_text_color').'; } ';

	endif;	

	if ( novalite_setting('wip_subheader_text_color') ):
	
		echo '#subheader, #subheader p, #subheader h1, #subheader p a, #subheader h1 a { color: '.novalite_setting('wip_subheader_text_color').'; } ';

	endif;	

	if ( novalite_setting('wip_bottom_text_color') ):
	
		echo '.bottom_widget a, .bottom_widget h3, .bottom_widget label, .bottom_widget caption, .bottom_widget p, .bottom_widget li, .bottom_widget address, .bottom_widget dd, .bottom_widget blockquote, .bottom_widget td, .bottom_widget th, .bottom_widget .textwidget { color: '.novalite_setting('wip_bottom_text_color').'; } ';
		
	endif;	

	if ( novalite_setting('wip_copyright_text_color') ):
	
		echo '#footer a, #footer p, #footer li, #footer address, #footer dd, #footer blockquote, #footer td, #footer th, #footer .textwidget  { color: '.novalite_setting('wip_copyright_text_color').'; } ';

	endif;	

	if ( novalite_setting('wip_social_icons_color') ):
	
		echo '.bottom_socials a { color: '.novalite_setting('wip_social_icons_color').'; } ';

	endif;	

	if ( novalite_setting('wip_social_icons_hover') ):
	
		echo '.bottom_socials a:hover { color: '.novalite_setting('wip_social_icons_hover').'; } ';

	endif;	

/* =================== END LINK STYLE =================== */


	if (novalite_setting('wip_custom_css_code'))
		echo novalite_setting('wip_custom_css_code'); 

?>

</style>
    
<?php }

add_action('wp_head', 'novalite_css_custom');

?>