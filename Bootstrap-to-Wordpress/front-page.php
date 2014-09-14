<?php get_header(); ?>

    <!-- Main jumbotron for a pfrimary marketing message or call to action -->
    <!--  <div class="jumbotron">
      <div class="container">
      
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>
    
        <?php endwhile; endif; ?>

      </div>
    </div> --> 
    
    <?php

      $args = array(
        'post_type'     => 'post',
        'category_name' => 'featured'
      );
      $the_query = new WP_Query( $args );

    ?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $the_query->current_post; ?>" class="<?php if( $the_query->current_post == 0 ):?>active<?php endif; ?>"></li>
        
        <?php endwhile; endif; ?>
      </ol>

      <?php rewind_posts(); ?>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">

        <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <div class="item <?php if( $the_query->current_post == 0 ):?>active<?php endif; ?>">

  
          <div class="carousel-caption flex"> <h1><a href="<?php the_permalink(); ?>">

            <div class="container">         
              <div class="row">
                <div class="col-md-12">

            <?php the_title(); ?>
                </div> 
              </div> 
            </div>         
          </a></h1>

            <a class="readmore" href="<?php the_permalink(); ?>"><button type="button" class="btn btn-default">Read More</button></a>

            
            <!-- <div class="container">
              
              <div class="row">
                <div class="col-md-6 col-md-offset-3 left-align">
                  <?php the_excerpt(); ?>

                </div>
              </div>
            </div> -->
          </div>

        </div>
        
        <?php endwhile; endif; ?>

      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
  
    <!-- Main jumbotron for a pfrimary marketing message or call to action -->
    <!--  <div class="jumbotron">
      <div class="container">
      
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>
    
        <?php endwhile; endif; ?>

      </div>
    </div> --> 
    <div class="container">         
      <div class="row">
        <div class="col-md-6 center">
          
            <h1><a href="#"><i class="fa fa-facebook-square"></i></a> 
                <a href="#"><i class="fa fa-twitter-square"></i></a>
                <a href="#"><i class="fa fa-envelope-square"></i></a> </h1>
            
        </div>
        <div class="col-md-6">
          <form class="navbar-form navbar-left center" role="search">
            <div class="form-group col-lg-12 ">
              <input type="text" class="form-control col-xs-12" placeholder="Your Email Address">
              <button type="submit" class="btn btn-primary col-xs-12">Subscribe to Newsletter</button>
            </div>
            
          </form>
        </div>
      </div>
    </div> 

    

    <div class="container reading-field">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <div><h2>Books<h2></div>

          <?php $args=array('post_type'=>'testimonials', 'orderby'=>'rand', 'posts_per_page'=>'2'); ?>
          <?php
          $postslist = get_posts('post_type=book&orderby=rand&numberposts=2');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>
          <div class="post col-md-12 ">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>

          <div class="col-md-12 portfolio-image ">
          <?php
            $thumbnail_id = get_post_thumbnail_id(); 
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
          ?>

          <p><a href="<?php the_permalink(); ?>"><img  class="book-main" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic"></a></p>
         
          </div>
          <?php endforeach ?>

        </div>
        <div class="col-md-4">
          <div><h2>Recent<h2></div>
          <?php
          $postslist = get_posts('numberposts=2&category=-5');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>
          <div class="post"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            
            <p> <?php the_excerpt(); ?> <p>

          </div>
          <?php endforeach ?>

        </div>
        <div class="col-md-4">
          <div><h2>Media<h2></div>
          <?php
          $postslist = get_posts('numberposts=2&offset=0&category=5');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>
          <div class="post"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          
            <p> <?php the_excerpt(); ?> <p>
        
        </div>
        <?php endforeach ?>

        </div>
      </div>
      

      <div class="row">
        <div class="col-md-4">

          <?php if ( dynamic_sidebar( 'front-left' ) ); ?>

        </div>
        <div class="col-md-4">
          
          <?php if ( dynamic_sidebar( 'front-center' ) ); ?>

       </div>
        <div class="col-md-4">
          
          <?php if ( dynamic_sidebar( 'front-right' ) ); ?>

        </div>
<?php get_footer(); ?>