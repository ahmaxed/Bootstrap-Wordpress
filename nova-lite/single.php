<?php 

	/**
	 * Wp in Progress
	 * 
	 * @author WPinProgress
	 *
	 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
	 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
	 */

	get_header(); 
	novalite_header_content();

?> 


<!-- start content -->

<div class="container content">
	
    <div class="row">
       
    <div <?php post_class(array('pin-article', novalite_template('span') , novalite_template('sidebar'))); ?> >
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        
			do_action('novalite_postformat');

		?>
	        
        <div style="clear:both"></div>
        
    </div>

	<?php get_sidebar(); ?>

	<?php endwhile; get_template_part('pagination'); endif;?>
           
    </div>
</div>

<?php get_footer(); ?>