<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: MyThemeShop Tabs Widget
	Description: Display the popular Posts and Latest Posts in tabbed format
	Version: 1.0

-----------------------------------------------------------------------------------*/
 function mts_popular_tabs( $posts = 5 ) {
	$popular = new WP_Query('showposts='. $posts .'&orderby=comment_count&order=desc');
	$popular_post_num = 1;
	while ($popular->have_posts()) : $popular->the_post();
?>
<?php if($popular_post_num != 1){echo '';} ?>
<li>
<div class="left">
<?php if(has_post_thumbnail()): ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'widgetthumb'); ?>
<a href='<?php the_permalink(); ?>'><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="wp-post-image" /></a>
<?php else: ?>
<a href='<?php the_permalink(); ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/smallthumb.png" alt="<?php the_title(); ?>"  class="wp-post-image" /></a>
<?php endif; ?>
<div class="clear"></div>
</div>
 	<div class="info">
 	<p class="entry-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
	<div class="meta">
	<?php the_time('F j, Y'); ?>	
	</div> <!--end .entry-meta--> 	
	</div> <!--end .info-->
	<div class="clear"></div>
</li>

<?php $popular_post_num++; endwhile; 
}

function mts_latest_tabs( $posts = 5 ) {
	$the_query = new WP_Query('showposts='. $posts .'&orderby=post_date&order=desc');
	$recent_post_num = 1;		
	while ($the_query->have_posts()) : $the_query->the_post(); 
?>
<li>
<div class="left">
<?php if(has_post_thumbnail()): ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'widgetthumb'); ?>
<a href='<?php the_permalink(); ?>'><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="wp-post-image" /></a>
<?php else: ?>
<a href='<?php the_permalink(); ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/smallthumb.png" alt="<?php the_title(); ?>"  class="wp-post-image" /></a>
<?php endif; ?>
<div class="clear"></div>
</div>
 	<div class="info">
 	<p class="entry-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
	<div class="meta">
	<?php the_time('F j, Y'); ?>
	</div> <!--end .entry-meta--> 	
	</div> <!--end .info-->
	<div class="clear"></div>
</li>

<?php $recent_post_num++; endwhile; 
}
class mts_Widget_Tabs extends WP_Widget {

	function mts_Widget_Tabs() {
		$widget_ops = array('classname' => 'widget_tab', 'description' => __('Display the popular Posts and Latest Posts in tabbed format', 'mythemeshop'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('tab', __('MyThemeShop: Tab Widget', 'mythemeshop'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$popular_post_num = $instance['popular_post_num'];
		$recent_post_num = $instance['recent_post_num'];
		?>
		

	<div id="tabber">
			
		<ul class="tabs">
			<li><a href="#popular-posts"><?php _e('Popular Posts', 'mythemeshop'); ?></a></li>
			<li class="tab-recent-posts"><a href="#recent-posts"><?php _e('Recent Posts', 'mythemeshop'); ?></a></li>
		</ul> <!--end .tabs-->
			
		<div class="clear"></div>
		
		<div class="inside">
		
			<div id="popular-posts">
				<ul>
					<?php rewind_posts(); ?>
					<?php mts_popular_tabs($popular_post_num); ?>
				</ul>			
		    </div> <!--end #popular-posts-->
		       
		    <div id="recent-posts"> 
		        <ul>
					<?php mts_latest_tabs($recent_post_num); ?>                      
				</ul>	
		    </div> <!--end #recent-posts-->
			
			<div class="clear"></div>
			
		</div> <!--end .inside -->
		
		<div class="clear"></div>
		
	</div><!--end #tabber -->

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['popular_post_num'] = $new_instance['popular_post_num'];
		$instance['recent_post_num'] =  $new_instance['recent_post_num'];
		return $instance;
	}

	function form( $instance ) { 
		$instance = wp_parse_args( (array) $instance, array( 'popular_post_num' => '5', 'recent_post_num' => '5') );
		$popular_post_num = $instance['popular_post_num'];
		$recent_post_num = format_to_edit($instance['recent_post_num']);
	?>
		<p><label for="<?php echo $this->get_field_id('popular_post_num'); ?>"><?php _e('Number of popular posts to show::', 'mythemeshop'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('popular_post_num'); ?>" name="<?php echo $this->get_field_name('popular_post_num'); ?>" type="text" value="<?php echo $popular_post_num; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('recent_post_num'); ?>"><?php _e('Number of latest posts to show:', 'mythemeshop'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('recent_post_num'); ?>" name="<?php echo $this->get_field_name('recent_post_num'); ?>" value="<?php echo $recent_post_num; ?>" /></p>

	<?php }
}

register_widget('mts_Widget_Tabs');

?>