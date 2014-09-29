<?php get_header(); ?>

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

  
          <div class="carousel-caption flex"> <h1 class="carosel-font"><a href="<?php the_permalink(); ?>">

            <div class="container">         
              <div class="row">
                <div class="col-md-12" id="carusel-title">

            <?php the_title(); ?>
                </div> 
              </div> 
            </div>         
          </a></h1>

            <a class="readmore" href="<?php the_permalink(); ?>"><button type="button" class="btn btn-default">Read More</button></a>
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
  
    <!--social and newsletter-->
    <div class="container">         
      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3  col-lg-2 col-lg-offset-1 center ">
            <h1 class="no-top"><a href="#"><i class="fa fa-facebook-square"></i></a> 
                <a href="#"><i class="fa fa-twitter-square"></i></a>
                <a href="#"><i class="fa fa-envelope-square"></i></a> </h1>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-2 col-sm-offset-0 col-md-3  center subscribe">
            <button type="submit" class="btn btn-info col-xs-12 col-sm-12  col-md-12 ">
              DONATE 
              <a href="#">
                <i class="fa fa-paypal"></i>
              </a>
              PayPal
            </button>  
        </div>
        <div id="mc_embed_signup">
          <form class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-0 col-md-6 col-md-offset-0 col-lg-6 form-inline subscribe " role="form" action="//normanfinkelstein.us9.list-manage.com/subscribe/post?u=284edae059d93053e3ffcc14a&amp;id=320295a52d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <input type="text" class="form-control col-xs-12 col-sm-5 col-md-12"  name="EMAIL" placeholder="Enter Your Email" id="mce-EMAIL">
                 <div id="mce-responses" class="clear">
                      <div class="response" id="mce-error-response" style="display:none"></div>
                      <div class="response" id="mce-success-response" style="display:none"></div>
                      <div style="position: absolute; left: -5000px;"><input type="text" name="b_284edae059d93053e3ffcc14a_320295a52d" tabindex="-1" value=""></div>
                    </div>
                <button type="submit" class="btn btn-sample  col-xs-12 col-sm-5 col-md-5" id="mc-embedded-subscribe" name="subscribe" >Subscribe to Newsletter</button>
          </form>
        </div>        
      </div>
    </div> 

    <!-- three responsive columns -->
    <div class="container columns-top">
      <div class="row equal reading-field">

        <!-- column one: recent posts -->
        <div class="col-md-4">
          <div class="row column-background">
            <div>
              <h2 class="center">Recent<h2>
            </div>
            <?php
              $postslist = get_posts('numberposts=2&category=-5');
              foreach ($postslist as $post) :
                setup_postdata($post);
            ?>
            <div class="post col-sm-6 col-md-12">
              <h3 class="center">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <p> <?php the_excerpt(); ?> <p>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        
        <!-- column one: books -->
        <div class="col-md-4">
          <div class="row">
            <div>
              <h2 class="center">Books<h2>
            </div>
            <?php
              $args=array('post_type'=>'testimonials', 'orderby'=>'rand', 'posts_per_page'=>'2');
              $postslist = get_posts('post_type=book&orderby=rand&numberposts=2');
              foreach ($postslist as $post) :
                setup_postdata($post);
            ?>
            
            <div class="col-xs-6 col-md-12 portfolio-image  center">
            <?php
              $thumbnail_id = get_post_thumbnail_id(); 
              $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
            ?>
            <h3 class="center">
                <a class="center"href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
            <p>
              <a   href="<?php the_permalink(); ?>">
                <img  class="book-main" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic">
              </a>
            </p>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        
        <!-- column one: media -->
        <div class="col-md-4">
          <div class="row column-background">
            <div>
              <h2 class="center">Media<h2>
            </div>
            <?php
              $postslist = get_posts('numberposts=2&offset=0&category=5');
              foreach ($postslist as $post) :
                setup_postdata($post);
              ?>
            <div class="post  col-sm-6 col-md-12 center">
              <h3>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <p> <?php the_excerpt(); ?> <p>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        
      </div> <!-- end row -->
      
      <!-- widgets -->
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
      </div>
<?php get_footer(); ?>