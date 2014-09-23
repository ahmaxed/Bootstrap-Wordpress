<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @since 1.0
 */
$lobster_theme_options = lobster_theme_options();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="col-md-12">
			    <?php get_template_part( 'content', 'header' ); ?>

			    <div class="entry-content">
			        <?php
					if( has_post_thumbnail() && ! is_single() )
						the_post_thumbnail( 'large', array( 'class' => 'alignnone img-polaroid' ) );
					else
						the_content( __( 'Read more &#133;', 'lobster' ) );
					?>
			    </div><!-- .entry-content -->

			    <?php get_template_part( 'content', 'footer' ); ?>
			</div>
	    </div>
	</article>