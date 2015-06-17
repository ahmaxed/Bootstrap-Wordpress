<?php get_header(); ?>
<?php // Get number of results
$results_count = $wp_query->found_posts;
?>
<div class="container reading-field" id="main">
    <div class="row">
        <div class="col-md-7 col-md-offset-1 ">
            <?php if (have_posts()) : // Results Found ?>
                <h1><?php _e('Search Results:'); ?></h1>
                <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <p>
                      <em>
                      On <?php echo the_time('l, F jS, Y');?>
                      in <?php the_category( ', ' ); ?>.
                      </em>
                    </p>
                </article>
                <hr />
            <?php endwhile; ?>
            <ul class="pager">
              <li><?php previous_posts_link('<i class="icon-chevron-left"></i>&nbsp;Previous ') ?></li>                  
              <li><?php next_posts_link('Next &nbsp;<i class="icon-chevron-right"></i>') ?></li>
            </ul>                
            <?php else : // No Results ?>
                <h1><?php _e('Sorry. We couldn&rsquo;t find anything for that search. View one of our site&rsquo;s pages or a recent article below.'); ?></h1>
                <div class="row">
                    <div class="col-md-6 posts">
                        <h3 class="sidebar" ><?php _e('Recent'); ?></h3>
                        <ul>
                            <?php
                                $args = array(
                                    'numberposts' => '10',
                                    'post_status' => 'publish'
                                );
                                $recent_posts = wp_get_recent_posts( $args );
                                foreach( $recent_posts as $recent ) {
                                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li>';
                                }
                            ?>
                        </ul>

                    <!-- .posts -->   
                    </div> 
                    <div class="col-md-6 pages">
                        <h3 class="sidebar"><?php _e('Pages'); ?></h3>
                        <ul>
                            <?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
                        </ul>

                    <!-- .pages -->    
                    </div>

                <!-- .row -->    
                </div> 
            <?php endif; ?>

        <!-- .col-md-8 -->    
        </div> 
        
    <!-- .row -->    
    </div> 
<?php get_footer(); ?>