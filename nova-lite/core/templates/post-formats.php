<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function novalite_postformat_function() {
	
	if ( get_post_type( get_the_ID()) == "page" ) {
		$postformats = "page";
	} 
	
	else if ( !get_post_format() )  {
		$postformats = "standard";
	} 
					
	else {
		$postformats = get_post_format();
	}
					
	get_template_part( 'core/post-formats/'.$postformats );

}

add_action( 'novalite_postformat','novalite_postformat_function', 10, 2 );

?>