<div class="container content">
	
    <div class="row">

        <div class="<?php echo novalite_template('span')." ".novalite_template('sidebar'); ?>"> 

            <div class="row">
            
                <?php if ( have_posts() ) :  ?>
        
                    <?php while ( have_posts() ) : the_post(); ?>
            
                    <div class="pin-article <?php echo novalite_template('span'); ?>" >
                
                        <?php do_action('novalite_postformat'); ?>
                    
                        <div style="clear:both"></div>
                        
                    </div>
                    
                    <?php endwhile; else:  ?>
            
                    <div class="pin-article <?php echo novalite_template('span'); ?>" >
                        
                        <article class="article">
        
                            <h1 class="title"><?php _e( 'Not found',"wip" ) ?></h1>           
                            <p><?php _e( 'Sorry, no posts matched found ',"wip" ) ?></p>
                         
                        </article>
                        
                    </div>
                        
                <?php endif; ?>
            </div>
			<?php get_template_part('pagination'); ?>
        </div>
        
		<?php if ( novalite_template('span') == "span8" ) : ?>
    
                <section id="sidebar" class="span4">
                    <div class="row">
						<?php if ( is_active_sidebar('side_sidebar_area')) { 
                        
                            dynamic_sidebar('side_sidebar_area');
                        
                        } else { 
                            
                            the_widget( 'WP_Widget_Calendar',
                            array("title"=> __('Calendar','wip')),
                                array('before_widget' => '<div class="pin-article span4"><div class="article">',
                                      'after_widget'  => '</div></div>',
                                      'before_title'  => '<h3 class="title">',
                                      'after_title'   => '</h3>'
                                )
                            );
            
                            the_widget( 'WP_Widget_Archives','',
                                array('before_widget' => '<div class="pin-article span4"><div class="article">',
                                      'after_widget'  => '</div></div>',
                                      'before_title'  => '<h3 class="title">',
                                      'after_title'   => '</h3>'
                                )
                            );
            
                            the_widget( 'WP_Widget_Categories','',
                                array('before_widget' => '<div class="pin-article span4"><div class="article">',
                                      'after_widget'  => '</div></div>',
                                      'before_title'  => '<h3 class="title">',
                                      'after_title'   => '</h3>'
                                )
                            );
            
                        
                         } ?>
                    </div>
                </section>
        
		<?php endif; ?>
           
    </div>
</div>