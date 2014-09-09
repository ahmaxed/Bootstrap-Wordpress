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

  
          <div class="carousel-caption flex"> <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

            <button type="button" class="btn btn-default">Read More</button>
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
        <div class="col-md-4">
          <h2>social<h2>
        </div>
    
      <div class="row">
        <div class="col-md-4 reading-field">

          <h2>Recent Posts<h2>

        </div>
     
      <div class="row">
        <div class="col-md-4">
          <h2>subscribe<h2>
        </div>
      </div>
    </div> 

    <div class="container reading-field">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">

          <?php
          $postslist = get_posts('numberposts=1');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>
          <div class="post"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>

          </div>
          <?php endforeach ?>

        </div>
        <div class="col-md-4">
          
          <?php
          $postslist = get_posts('numberposts=1&category='.$cat_id.'&offset=1');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>
          <div class="post"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>

          </div>
          <?php endforeach ?>

        </div>
        <div class="col-md-4">
          
          <?php
          $postslist = get_posts('numberposts=1&category='.$cat_id.'&offset=2');
          foreach ($postslist as $post) :
            setup_postdata($post);
          ?>
         <div class="post"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          
            <?php the_excerpt(); ?>
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