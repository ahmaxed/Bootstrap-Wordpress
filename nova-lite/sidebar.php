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