<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @since 1.0
 */
$lobster_theme_options = lobster_theme_options();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="row">
			<div class="col-md-12">
				<?php get_template_part( 'content', 'header' ); ?>
				<h3 class="post-format"><?php _e( 'Status', 'lobster' ); ?></h3>
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
				<h1 class="author"><?php the_author(); ?></h1>

				<div class="entry-content">
					<time class="published" datetime="<?php echo get_the_date( 'Y-m-d' ) . 'T' . get_the_time( 'H:i' ) . 'Z'; ?>">
						<?php printf( __( 'Posted on %1$s at %2$s', 'lobster' ), get_the_date(), get_the_time() );	?>
					</time>

					<?php the_content( __( 'Read more &#133;', 'lobster' ) ); ?>
			    </div><!-- .entry-content -->

			    <?php get_template_part( 'content', 'footer' ); ?>
			</div>
	    </div>
    </article>