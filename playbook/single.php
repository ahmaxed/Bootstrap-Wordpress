<?php get_header(); ?>
<?php $options = get_option('playbook'); ?>
<div id="page" class="single">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_post">
							<header>
								<h1 class="title single-title"><?php the_title(); ?></h1>
								<?php if($options['mts_headline_meta'] == '1') { ?>
									<div class="post-info"><span class="theauthor"><?php _e('by ','mythemeshop'); the_author_posts_link(); ?></span>&nbsp; <span class="thetime"><?php _e(' ','mythemeshop'); the_time('j/m/Y | g:i'); ?></span>
                                    <span class="thecomment"><a href="<?php comments_link(); ?>"><?php echo comments_number( '0', '1', '%' );?></a></span>
                                    <span class="thecategory"><?php _e('Posted in ','mythemeshop'); the_category(', ') ?></span>&nbsp;</div>
								<?php } ?>
							</header><!--.headline_area-->
							<div class="post-single-content box mark-links">
								<?php if ($options['mts_posttop_adcode'] != '') { ?>
									<?php $toptime = $options['mts_posttop_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$toptime day")), get_the_time("Y-m-d") ) >= 0) { ?>
										<div class="topad">
											<?php echo $options['mts_posttop_adcode']; ?>
										</div>
									<?php } ?>
								<?php } ?>
								<?php the_content(); ?>
								<?php custom_link_pages(array('before' => '<div class="pagination">' . __(''), 'after' => '</div>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next'), 'previouspagelink' => __('Previous'), 'pagelink' => '%','echo' => 1 )); ?>
								<?php if ($options['mts_postend_adcode'] != '') { ?>
									<?php $endtime = $options['mts_postend_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$endtime day")), get_the_time("Y-m-d") ) >= 0) { ?>
										<div class="bottomad">
											<?php echo $options['mts_postend_adcode'];?>
										</div>
									<?php } ?>
								<?php } ?> 
								<?php if($options['mts_tags'] == '1') { ?>
									<div class="tags"><?php the_tags('<span class="tagtext">Tags:</span>',', ') ?></div>
								<?php } ?>
							</div>
						</div><!--.post-content box mark-links-->
						<?php if($options['mts_related_posts'] == '1') { ?>	
							<?php $categories = get_the_category($post->ID); if ($categories) { $category_ids = array(); foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id; $args=array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'showposts'=>2, 'caller_get_posts'=>1, 'orderbye' => 'rand' );
							$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
								echo '<div class="related-posts"><div class="postauthor-top"><h3>'.__('Related Posts','mythemeshop').'</h3></div><ul>';
								while( $my_query->have_posts() ) { ++$counter; if($counter == 2) { $postclass = 'last'; $counter = 0; } else { $postclass = ''; } $my_query->the_post();?>
								<li class="<?php echo $postclass; ?>">
									<a rel="nofollow" class="relatedthumb" href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
										<span class="rthumb">
											<?php if(has_post_thumbnail()): ?>
												<?php the_post_thumbnail('related', 'title='); ?>
											<?php else: ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/relthumb.png" alt="<?php the_title(); ?>"  width='180' height='120' class="wp-post-image" />
											<?php endif; ?>
										</span>
										<span>
											<?php the_title(); ?>                                            
										</span>
									</a>
                                    <div><?php echo excerpt(15); ?></div>
								</li>
								<?php } echo '</ul></div>'; }} wp_reset_query(); ?>
							<!-- .related-posts -->
                        <?php }?>  
						<?php if($options['mts_author_box'] == '1') { ?>
							<div class="postauthor">
								<h4 style="display:none"><?php _e('About Author', 'mythemeshop'); ?></h4>
								<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '135' );  } ?>
								<h5><?php the_author_meta( 'nickname' ); ?></h5>
								<p><?php the_author_meta('description') ?></p>
							</div>
						<?php }?>  
					</div><!--.g post-->
					<?php comments_template( '', true ); ?>
				<?php endwhile; /* end loop */ ?>
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>