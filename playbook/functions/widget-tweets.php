<?php
/* -----------------------------------------------------------------------

	Plugin Name: MyThemeShop Latest Tweets Widget
	Description: A widget for showing latest tweets in sidebar
	Version: 1.0

------------------------------------------------------------------------*/

// load widget
add_action( 'widgets_init', 'swt_tweets_widgets' );

// Register widget.
function swt_tweets_widgets() {
	register_widget( 'swt_Tweet_Widget' );
}


// Widget class
class swt_tweet_widget extends WP_Widget {

/* ---------------------------------------------------------------------*/
/* Widget setup
/* -------------------------------------------------------------------- */
	
	function swt_Tweet_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'swt_tweet_widget', 'description' => __('A widget for showing latest tweets in sidebar', 'framework') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'swt_tweet_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'swt_tweet_widget', __('MyThemeShop: Latest Tweets','framework'), $widget_ops, $control_ops );
	}

/* ---------------------------------------------------------------------*/
/* Display widget
/* -------------------------------------------------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		
		$swt_twitter_username = $instance['username'];
		$swt_twitter_postcount = $instance['postcount'];
		$tweettext = $instance['tweettext'];
		
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		$id = rand(0,999);

		/* Display Latest Tweets */
		?>
			<script type="text/javascript">
			jQuery(document).ready(function($){
				$.getJSON('http://api.twitter.com/1/statuses/user_timeline/<?php echo $swt_twitter_username; ?>.json?count=<?php echo $swt_twitter_postcount; ?>&callback=?', function(tweets){
					$("#twitter_update_list_<?php echo $id; ?>").html(swt_format_twitter(tweets));
				});
			});
			</script>
            <ul id="twitter_update_list_<?php echo $id; ?>" class="tweets">
                <li><p></p></li>
            </ul>
            
            <?php if ($tweettext) { ?>
            
            <a href="http://twitter.com/<?php echo $swt_twitter_username; ?>" class="twitter-follow"><?php echo $tweettext; ?></a>
		
		<?php }

		/* After widget (defined by themes). */
		echo $after_widget;
	}

/* ---------------------------------------------------------------------*/
/* Update Widget
/* -------------------------------------------------------------------- */	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );
		$instance['tweettext'] = strip_tags( $new_instance['tweettext'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	
/* ---------------------------------------------------------------------*/
/* Widget setting
/* -------------------------------------------------------------------- */
 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Latest Tweets',
		'username' => 'mythemeshopteam',
		'postcount' => '5',
		'tweettext' => 'Follow on Twitter',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>


			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username e.g. mythemeshopteam', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
		
		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (max 20)', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
		
		<!-- Tweettext: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tweettext' ); ?>"><?php _e('Follow Text e.g. Follow me on Twitter', 'framework') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tweettext' ); ?>" name="<?php echo $this->get_field_name( 'tweettext' ); ?>" value="<?php echo $instance['tweettext']; ?>" />
		</p>
		
	<?php
	}
}

?>