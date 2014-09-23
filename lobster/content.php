<?php

$lobster_theme_options = lobster_theme_options();
$format = get_post_format();
$featured_image = ( has_post_thumbnail() ) ? 'featured-image' : 'no-featured-image';
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( $featured_image ); ?>>
		<div class="row">
			<?php
			$align = get_post_meta( get_the_ID(), 'lobster_home_page_alignment', true );
			$col = 'col-md-12';
			if( has_post_thumbnail() && ! is_single() && 'excerpt' == $lobster_theme_options['excerpt_content'] ) {
				$col = 'col-md-7 col-sm-12';
				?>
				<div class="col-md-5 col-sm-12 <?php echo $align; ?>">
					<a href="<?php the_permalink(); ?>" class="image-anchor">
						<?php the_post_thumbnail( 'home-page', array( 'class' => 'aligncenter' ) ); ?>
					</a>
				</div>
				<?php
			}
			?>

			<div class="<?php echo $col; ?>">

			    <?php get_template_part( 'content', 'header' ); ?>

			    <div class="entry-content">
				    <?php
					if ( 'excerpt' == $lobster_theme_options['excerpt_content'] && empty( $format ) && ( ! is_single() || is_search() || is_archive() ) ) {
						the_excerpt();
					} else {
						the_content( __( 'Read more &#133;', 'lobster' ) );
					}
					?>
			    </div><!-- .entry-content -->
			    <?php get_template_part( 'content', 'footer' ); ?>

			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->