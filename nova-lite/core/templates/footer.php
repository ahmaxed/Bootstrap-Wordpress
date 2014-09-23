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
/* Bottom */
/*-----------------------------------------------------------------------------------*/ 

function novalite_bottom_content() {
	
	if ( is_active_sidebar('bottom_sidebar_area') ) : ?>
		
		<section class="bottom bottom_widget content">
			<div class="container">
				
				<?php if ( is_active_sidebar('bottom_sidebar_area') ) : ?>
					
					<!-- FOOTER WIDGET BEGINS -->
						
							<section class="row widget">
								<?php dynamic_sidebar('bottom_sidebar_area') ?>
							</section>
			
					<!-- FOOTER WIDGET END -->
						
				<?php endif; ?>
			
			</div>
			
		</section>
	
<?php

    endif;
}

/*-----------------------------------------------------------------------------------*/
/* Socials */
/*-----------------------------------------------------------------------------------*/ 

function novalite_social_function() {
	
	$socials = array ( 
		"icon-facebook" => "facebook" , 
		"icon-twitter" => "twitter" ,
		"icon-flickr" => "flickr" ,
		"icon-google-plus" => "google" ,
		"icon-linkedin" => "linkedin" ,
		"icon-pinterest" => "pinterest" ,
		"icon-tumblr" => "tumblr" ,
		"icon-youtube" => "youtube" ,
		"icon-skype" => "skype" ,
		"icon-instagram" => "instagram" ,
		"icon-github" => "github" ,
		"icon-envelope-alt" => "email" ,
	);
	
	$i = 0;
	$html = "";
	
	foreach ( $socials as $social_icon => $social_name) { 
	
		if (novalite_setting('wip_footer_'.$social_name.'_button')): 
			$i++;	
            $html.= '<a href="'.novalite_setting('wip_footer_'.$social_name.'_button').'" target="_blank" class="social"> <i class="'.$social_icon.'" ></i> </a> ';
		endif;
		
	}
	
	if (novalite_setting('wip_footer_rss_button') == "on"): 
		$i++;	
		$html.= '<a href="'. get_bloginfo('rss2_url'). '" title="Rss" class="social rss"> <i class="icon-rss" ></i>  </a> ';
	endif; 
		
	if ( $i > 0 ) {
		
	?>

    <section class="bottom bottom_socials">
        <div class="container">
            <div class="row copyright" >
                <div class="span12">
        
                    <div class="socials">
                        
                        <?php echo $html; ?>
                        
                    </div>
        
                </div>
            </div>
        </div>
    </section>

	<?php

	}
	
}

add_action( 'novalite_socials', 'novalite_social_function', 10, 2 );

?>