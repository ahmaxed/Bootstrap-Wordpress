<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @since 1.0.0
 */
$lobster_theme_options = lobster_theme_options();
get_header(); ?>
	<?php if ( ( $lobster_theme_options['home_posts'] && is_front_page() ) || ! is_front_page() ) { ?>
	<div id="primary" <?php lobster_primary_attr(); ?>>
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;

			lobster_pagination();
		else :
			?>
			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
				?>
				<h1 class="entry-title"><?php _e( 'No posts to display', 'lobster' ); ?></h1>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'lobster' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

				<?php
			else :
				get_template_part( 'content', 'none' );
			endif; // end current_user_can() check
			?>

			</article><!-- #post-0 -->
		    <?php
		endif;
		?>
	</div>
	<?php }	?>
<?php get_footer(); ?>