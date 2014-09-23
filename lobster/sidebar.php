<?php
/**
 * The first/left sidebar widgetized area.
 *
 * If no active widgets in sidebar, alert with default login
 * widget will appear.
 *
 * @since 1.0
 */

/* Conditional check to see if post/page template is full width
   or if no sidebars was selected in layout options */
$lobster_theme_options = lobster_theme_options();
$layout = $lobster_theme_options['layout'];
if ( 6 != $layout ) {
	?>
	<div id="secondary" <?php lobster_sidebar_class(); ?> role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>

		<aside id="meta" class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'lobster' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>
		<?php endif; ?>
	</div><!-- #secondary.widget-area -->
	<?php
}