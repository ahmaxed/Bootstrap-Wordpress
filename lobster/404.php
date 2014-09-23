<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @since 1.0
 */
get_header(); ?>
	<div id="primary" <?php lobster_primary_attr(); ?>>

		<article id="post-0" class="post error404 not-found">
			<img src="<?php echo CYBER_DC_LOBSTER_URL; ?>/images/404.png" class="aligncenter" alt="" />
	    	<header>
	    	   	<h1 class="entry-title"><?php _e( '404 Error', 'lobster' ); ?></h1>
	        </header>
	        <div class="entry-content">
	            <p><?php _e( "Sorry. We can't seem to find the page you're looking for.", 'lobster' ); ?></p>
	            <p><?php get_search_form(); ?></p>
	            <p><?php _e("Please use the search form above and try again.", 'lobster' ); ?></p>
	        </div>
	    </article>

	</div>
<?php get_footer(); ?>