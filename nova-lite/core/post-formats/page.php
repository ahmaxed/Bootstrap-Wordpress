<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

novalite_thumbnail('blog'); 

?>

<article class="article">

	<?php novalite_get_title(); ?>
    
	<?php the_content(); ?>

</article>