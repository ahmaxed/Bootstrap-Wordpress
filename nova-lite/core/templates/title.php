<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function novalite_get_title() {
	
	global $post;
	
	$title = get_the_title();
	
	if (!empty($title)) {
	
		if ((is_home()) || (is_category()) || (is_search())): ?>
				
			<h3 class="title"> <a href="<?php echo get_permalink($post->ID); ?>"> <?php echo $title; ?> </a> </h3>
				
	<?php else: ?>
			
			<h1 class="title"> <?php echo $title; ?> </h1>
			
	<?php 
		
			endif; 
	}
	
}

?>