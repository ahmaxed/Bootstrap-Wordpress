<div class="container ">
      <!-- Example row of columns -->
      <div class="row reading-field">
        
        <div class=" col-md-12 col-lg-4">
          <div><h2 class="center">Recent<h2></div>

          <?php
          $postslist = get_posts('numberposts=2&category=-5');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>

          <div class="post col-xs-12 col-sm-12 col-md-6 col-lg-12">
            <h3 class="center">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
            <p> <?php the_excerpt(); ?> <p>
          </div>
          <?php endforeach ?>
        </div>
        
        <div class="col-md-12 col-lg-4">
          <div>
            <h2 class="center">Media<h2></div>
          <?php
            $postslist = get_posts('numberposts=2&offset=0&category=5');
            foreach ($postslist as $post) :
              setup_postdata($post);
          ?>
          <div class=" col-xs-12 col-sm-5 col-md-6 col-lg-12 post center"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          
            <p> <?php the_excerpt(); ?> <p>
        
          </div>
          <?php endforeach ?>
        </div>

        <div class=" col-md-12 col-lg-4">
          <div><h2 class="center">Books<h2></div>
          <?php $args=array('post_type'=>'testimonials', 'orderby'=>'rand', 'posts_per_page'=>'2'); ?>
          <?php
          $postslist = get_posts('post_type=book&orderby=rand&numberposts=2');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
            <h3 class="center"><a class="center"href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <div class="  portfolio-image  center ">
              <?php
                $thumbnail_id = get_post_thumbnail_id(); 
                $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
              ?>
              <p><a   href="<?php the_permalink(); ?>"><img  class="book-main" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic"></a></p>
            </div>
          </div>
          <?php endforeach ?>

        </div>
      </div>