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
            <h1 class="no-top"><a href="https://www.facebook.com/pages/Norman-Finkelstein/308949505808407"><i class="fa fa-facebook-square"></i></a> 
                <a href="https://twitter.com/normfinkelstein"><i class="fa fa-twitter-square"></i></a>
                <a href="http://localhost/nromanfinkelstein.com/contacts/"><i class="fa fa-envelope-square"></i></a> </h1>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-2 col-sm-offset-0 col-md-3  center subscribe">
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
            ">
            <button type="image" name="submit" class="btn btn-info col-xs-12 col-sm-12  col-md-12 " alt="PayPal - The safer, easier way to pay online!">
              DONATE 
              <a href="#">
                <i class="fa fa-paypal"></i>
              </a>
              PayPal
            </button> 
            </form>
             
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

        <!-- column one: books -->
        <div class="col-md-3">
          <div class="row">
            <div>
              <h2 class="center"><a href="<?php echo get_permalink(96); ?>">BOOKS</a><h2>
            </div>
            <?php
              $args=array('post_type'=>'testimonials', 'orderby'=>'rand', 'posts_per_page'=>'2');
              $postslist = get_posts('post_type=book&numberposts=1');
              foreach ($postslist as $post) :
                setup_postdata($post);
            ?>
            
            <div class="col-xs-12 col-md-12 center">
            <?php
              $thumbnail_id = get_post_thumbnail_id(); 
              $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
            ?>
            <h4 >
                <a class="center"href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h4>
            <p>
              <a   href="<?php the_permalink(); ?>">

                <!-- <?php echo $thumbnail_url[0]; ?> for echoying the related webpage-->
                <img  class="book-mainly" src="method.jpg" alt="<?php the_title();?> graphic">
              </a>
            </p>
            </div>
            <?php endforeach ?>
          </div>
          
            <div class="center col-md-12"><a class="readmore" href="http://localhost/nromanfinkelstein.com/books-2/"><button type="button" class="btn btn-default"> More Books </button></a></div>
          
        </div>

        <!-- column one: recent posts -->
        <div class="col-md-6 ">
          <div class="row column-background">
            <div>
              <h2 class="center"><a href="<?php echo get_permalink(42); ?>">NEW POSTINGS</a><h2>
            </div>
            <?php
              $postslist = get_posts('numberposts=10&category=-9');
              foreach ($postslist as $post) :
                setup_postdata($post);
            ?>
              <div class="container col-md-12">
                <div class="post col-xs-11 col-md-12">
                  <h3 class="">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>
                  <p><em>
              
                  On <?php echo the_time('l, F jS, Y');?>
                  in <?php the_category( ', ' ); ?>.
              
                  </em></p>
                  
                </div>
              </div>
            <?php endforeach ?>
            <div class="center col-md-12"><a class="readmore" href="http://localhost/nromanfinkelstein.com/blog/"><button type="button" class="btn btn-default"> More New Postings </button></a></div>
          </div>
        </div>
        
        
        
        <!-- column one: videos -->
        <div class="col-md-3">
          <div class="row ">
            <div>
              <h2 class="center"><a href="http://localhost/nromanfinkelstein.com/category/video/">VIDEOS</a><h2>
            </div>
            <?php
              $postslist = get_posts('numberposts=2&offset=0&category=9');
              foreach ($postslist as $post) :
                setup_postdata($post);
              ?>

            <div class="post  col-sm-6 col-md-12 ">
              <h4>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h4>
              <p> <?php the_excerpt(); ?> <p>
            </div>
            <?php endforeach ?>
          </div>
          <div class="center col-md-12"><a class="readmore" href="http://localhost/nromanfinkelstein.com/category/video/"><button type="button" class="btn btn-default"> More Videos </button></a></div>
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