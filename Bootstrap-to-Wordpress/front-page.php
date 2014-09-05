<?php get_header(); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>
    
        <?php endwhile; endif; ?>

      </div>
    </div>

    <div class="container">
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