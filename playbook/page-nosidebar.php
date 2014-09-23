<?php
/**
 * Template Name: Page Without Sidebar
 */
?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="ss-full-width">
			<div id="content_box" >
				<div id="content" class="hfeed">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
							<header>
								<h1 class="title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content box mark-links">
								<?php the_content(); ?>
								<?php custom_link_pages(array('before' => '<div class="pagination">' . __(''), 'after' => '</div>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next'), 'previouspagelink' => __('Previous'), 'pagelink' => '%','echo' => 1 )); ?>
							</div><!--.post-content box mark-links -->
						</div><!--.g post-->
						<?php comments_template( '', true ); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</article>
<?php get_footer(); ?>