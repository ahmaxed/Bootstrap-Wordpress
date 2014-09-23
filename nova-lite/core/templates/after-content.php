<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function novalite_after_content_function() {

	if ((is_home()) || (is_category()) || (is_page() )):
		
		the_excerpt(); 
	
	else:
	
		the_content();
		the_tags( '<footer class="line"><span class="entry-info"><strong>'.__( 'Tags','wip').':</strong> ', ', ', '</span></footer>' );

		if ( get_post_format() )  {
			echo '<footer class="line"><span class="entry-info"><strong>'.__( 'Post type','wip').':</strong> '.ucfirst(get_post_format()).'</span></footer>';
		} 

		if (novalite_setting('wip_view_comments') == "on" ) :
			comments_template();
		endif;
	
	endif;

} 

add_action( 'novalite_after_content', 'novalite_after_content_function', 10, 2 );

?>